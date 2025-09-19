@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center h-[80vh]">
    <div class="w-full max-w-lg bg-white shadow-xl rounded-2xl p-6 flex flex-col">

        <!-- Header Chatbot -->
        <div class="flex items-center space-x-3 border-b pb-3 mb-3">
            <img src="/robi.png" alt="Robi" class="w-12 h-12 rounded-full border-2 border-green-400">
            <div>
                <h2 class="text-lg font-bold">Robi 🤖</h2>
                <p class="text-sm text-gray-500">Aku bisa bantu jawab tentang sekolah ✨</p>
            </div>
        </div>

        <!-- Chat Box -->
        <div id="chat-box" class="flex-1 h-80 overflow-y-auto border rounded-lg p-3 bg-gray-50 space-y-2">
            <div class="text-left">
                <span class="bg-green-200 px-3 py-2 rounded-lg inline-block">
                    Halo! Aku Robi 👋. Tanyakan apa saja tentang sekolah ini!
                </span>
            </div>
        </div>

        <!-- Input Form -->
        <form id="chat-form" class="mt-3 flex">
            <input type="text" id="message" placeholder="Tulis pesan kamu..."
                class="flex-1 border rounded-l px-3 py-2 focus:outline-none focus:ring focus:ring-green-300">
            <button type="submit" 
                class="bg-green-500 hover:bg-green-600 text-white px-4 rounded-r transition">
                Kirim
            </button>
        </form>
    </div>
</div>

<script>
document.getElementById('chat-form').addEventListener('submit', async (e) => {
    e.preventDefault();
    const input = document.getElementById('message');
    const chatBox = document.getElementById('chat-box');

    if (!input.value.trim()) return;

    // Tambah pesan user
    chatBox.innerHTML += `
        <div class="text-right">
            <span class="bg-blue-200 px-3 py-2 rounded-lg inline-block">${input.value}</span>
        </div>`;
    chatBox.scrollTop = chatBox.scrollHeight;

    // Tambah indikator typing Robi
    const typingId = "typing-" + Date.now();
    chatBox.innerHTML += `
        <div id="${typingId}" class="text-left">
            <span class="bg-gray-200 px-3 py-2 rounded-lg inline-block animate-pulse">
                Robi sedang mengetik...
            </span>
        </div>`;
    chatBox.scrollTop = chatBox.scrollHeight;

    // Kirim ke backend
    const res = await fetch('/chatbot', {
        method: 'POST',
        headers: { 
            'Content-Type': 'application/json', 
            'X-CSRF-TOKEN': '{{ csrf_token() }}' 
        },
        body: JSON.stringify({ message: input.value })
    });
    const data = await res.json();

    // Hapus typing indicator
    document.getElementById(typingId)?.remove();

    // Buat container kosong untuk balasan Robi
    const botMessage = document.createElement("div");
    botMessage.className = "text-left";
    botMessage.innerHTML = `<span class="bg-gray-200 px-3 py-2 rounded-lg inline-block"></span>`;
    chatBox.appendChild(botMessage);

    const span = botMessage.querySelector("span");
    const text = data.reply;
    let i = 0;

    // Efek mesin ketik (huruf demi huruf)
    const typingEffect = setInterval(() => {
        if (i < text.length) {
            span.textContent += text.charAt(i);
            chatBox.scrollTop = chatBox.scrollHeight;
            i++;
        } else {
            clearInterval(typingEffect);
        }
    }, 30); // atur kecepatan (ms)

});
</script>
@endsection
