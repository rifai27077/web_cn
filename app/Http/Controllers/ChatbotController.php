<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Faq;

class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        $message = trim($request->input('message'));

        // 🔒 Validasi minimal pertanyaan
        if (strlen($message) < 3 || str_word_count($message) < 1) {
            return response()->json([
                'reply' => "Pertanyaan kurang jelas, bisa tuliskan lebih lengkap? 😊"
            ]);
        }

        $reply   = "Maaf, saya belum tahu jawabannya.";

        // 🔹 Coba cari di FAQ dulu
        [$faqReply, $confidence] = $this->faqFallback($message);

        if ($confidence >= 75) {
            // Confidence tinggi → pakai jawaban FAQ
            $reply = $faqReply;
        } else {
            // Confidence rendah → tanya Groq
            $reply = $this->askGroq($message);

            // Kalau Groq gagal → fallback ke FAQ
            if ($reply === null || strlen($reply) < 10) {
                $reply = $faqReply ?? "Maaf, saya hanya bisa menjawab pertanyaan tentang sekolah ini.";
            }
        }

        return response()->json(['reply' => $reply]);
    }

    private function askGroq($message)
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('GROQ_API_KEY'),
                'Content-Type'  => 'application/json',
            ])->post('https://api.groq.com/openai/v1/chat/completions', [
                'model'    => 'llama-3.1-8b-instant',
                'messages' => [
                    [
                        'role'    => 'system',
                        'content' => "Kamu adalah chatbot sekolah yang ramah bernama Robi 🤖. 
                        Jawablah hanya seputar sekolah Citra Negara: alamat, jurusan, fasilitas, pendaftaran, dan kegiatan sekolah. 
                        Jika ada pertanyaan di luar topik sekolah, jawab singkat (maksimal 1–2 kalimat) dengan sopan, lalu arahkan kembali ke topik sekolah. 
                        Gunakan bahasa santai dan ramah, jangan lebih dari 3 kalimat.",
                    ],

                    ['role' => 'user', 'content' => $message],
                ],
            ]);

            if ($response->successful()) {
                return $response->json()['choices'][0]['message']['content'] ?? null;
            }
        } catch (\Exception $e) {
            return null;
        }

        return null;
    }

    private function faqFallback($userQuestion)
    {
        $cleanUserQuestion = strtolower(trim(preg_replace("/[^\w\s]/", "", $userQuestion)));

        // 🔹 Cari dengan Scout TNTSearch
        $searchResults = Faq::search($cleanUserQuestion)->take(1)->get();

        if ($searchResults->isNotEmpty()) {
            $faq = $searchResults->first();
            return [$faq->answer, 95];
        }

        $faqs  = Faq::with('aliases')->get();
        $words = explode(" ", $cleanUserQuestion);

        // 🔸 Jika ada keyword cocok dengan kategori
        foreach ($faqs as $faq) {
            if (str_contains($cleanUserQuestion, strtolower($faq->category))) {
                return [$faq->answer, 85];
            }
        }

        // 🔸 Cek pertanyaan pendek (1–2 kata)
        if (count($words) <= 2) {
            foreach ($faqs as $faq) {
                $allQuestions = strtolower(
                    $faq->question . " " . $faq->aliases->pluck('question')->implode(" ")
                );
                foreach ($words as $word) {
                    if (str_contains($allQuestions, $word)) {
                        return [$faq->answer, 80];
                    }
                }
            }
        }

        // 🔸 Fuzzy match manual
        $bestMatch    = null;
        $highestScore = 0;
        foreach ($faqs as $faq) {
            similar_text($cleanUserQuestion, strtolower($faq->question), $percent);
            if ($percent > $highestScore) {
                $highestScore = $percent;
                $bestMatch    = $faq;
            }

            foreach ($faq->aliases as $alias) {
                similar_text($cleanUserQuestion, strtolower($alias->question), $percent);
                if ($percent > $highestScore) {
                    $highestScore = $percent;
                    $bestMatch    = $faq;
                }
            }
        }

        if ($highestScore > 60 && $bestMatch) {
            return [$bestMatch->answer, $highestScore];
        }

        return ["Maaf, saya hanya bisa menjawab pertanyaan tentang sekolah ini.", 0];
    }

}
