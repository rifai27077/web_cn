<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Robi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="h-screen flex flex-col bg-[linear-gradient(to_bottom,white_0%,white_60%,#ABD469_100%)]">

    <!-- Bagian atas (avatar & intro) -->
    <div id="intro-section" class="flex flex-col items-center text-center px-6 pt-4">
        <!-- Tombol back -->
        <div class="w-full flex justify-start mb-4">
            <a href="/" class="text-gray-600 hover:text-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" 
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                        d="M15 19l-7-7 7-7" />
                </svg>
            </a>
        </div>

        <!-- Avatar -->
        <img src="/robi.png" alt="Robi" class="w-20 h-20 rounded-full mb-3">

        <!-- Judul & deskripsi -->
        <h2 class="text-xl font-bold mb-1">Kenalan sama Robi yuk!</h2>
        <p class="text-gray-600 mb-4 text-md">Aku bukan manusia, tapi aku bisa jadi teman ngobrolmu 😉</p>

        <!-- Menu button -->
        <div id="menu-buttons" class="flex gap-2 flex-wrap justify-center mb-4">
            <button class="menu-button px-4 py-2 border-2 rounded-full hover:bg-gray-100 transition text-sm">Fasilitas sekolah</button>
            <button class="menu-button px-4 py-2 border-2 rounded-full hover:bg-gray-100 transition text-sm">Syarat SPMB</button>
            <button class="menu-button px-4 py-2 border-2 rounded-full hover:bg-gray-100 transition text-sm">Jurusan</button>
        </div>
    </div>

    <!-- Chat area -->
    <div id="chat-box" class="flex-1 overflow-y-auto px-4 space-y-3 pb-2 mt-16 min-h-[200px]"></div>

    <!-- Bagian bawah -->
    <div class="px-4 pb-3">
        <!-- Input chat -->
        <form id="chat-form" class="flex items-center bg-white rounded-full shadow px-3 py-2">
            <input type="text" id="message" placeholder="Cobain ketik apa aja, aku bakal coba jawab 😎"
                class="flex-1 outline-none text-sm px-2">
            <button type="submit" 
                class="bg-[#699D15] text-white p-2 rounded-full hover:bg-green-600 transition flex items-center justify-center">
                <!-- Ikon Paper Plane -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" 
                    viewBox="0 0 24 24" class="w-5 h-5">
                    <path d="M2.01 21 23 12 2.01 3 2 10l15 2-15 2z"/>
                </svg>
            </button>
        </form> 

        <!-- Catatan bawah -->
        <p class="text-[13px] text-gray-600 mt-2 text-center">
            Robi dapat membuat kesalahan. Periksa kembali informasi penting dengan 
            <a href="#" class="underline">pihak sekolah</a>.
        </p>
    </div>

<script>
document.querySelectorAll(".menu-button").forEach(btn => {
    btn.addEventListener("click", () => {
        const input = document.getElementById("message");
        input.value = btn.textContent; 
        document.getElementById("chat-form").dispatchEvent(new Event("submit")); 
    });
});

const menuButtons = document.getElementById('menu-buttons');

document.getElementById('chat-form').addEventListener('submit', async (e) => {
    e.preventDefault();
    const input = document.getElementById('message');
    const chatBox = document.getElementById('chat-box');
    const submitBtn = document.querySelector('#chat-form button');

    if (!input.value.trim() || input.disabled) return;

    // Hide menu button setelah user chat pertama kali
    if (menuButtons && !menuButtons.classList.contains("hidden")) {
        menuButtons.classList.add("hidden");
    }

    // Disable input & tombol
    input.disabled = true;
    submitBtn.disabled = true;
    submitBtn.classList.add("opacity-50", "cursor-not-allowed");

    // Tambah pesan user
    chatBox.innerHTML += `
        <div class="flex justify-end">
            <span class="bg-[#699D15] text-white px-3 py-2 rounded-lg inline-block max-w-[80%] md:max-w-[65%] text-right break-words">
                ${input.value}
            </span>
        </div>`;
    chatBox.scrollTop = chatBox.scrollHeight;

    // Indikator typing
    const typingId = "typing-" + Date.now();
    chatBox.innerHTML += `
        <div id="${typingId}" class="flex justify-start">
            <span class="bg-gray-200 px-3 py-2 rounded-lg inline-block animate-pulse max-w-[80%] md:max-w-[65%] break-words">
                Robi sedang mengetik...
            </span>
        </div>`;
    chatBox.scrollTop = chatBox.scrollHeight;

    try {
        const res = await fetch("{{ url('/chatbot') }}", {
            method: "POST",
            headers: { 
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
            },
            body: JSON.stringify({ message: input.value })
        });

        if (!res.ok) throw new Error("Server error: " + res.status);

        const data = await res.json();

        document.getElementById(typingId)?.remove();

        // Pesan balasan
        const botMessage = document.createElement("div");
        botMessage.className = "flex justify-start";
        botMessage.innerHTML = `
            <span class="bg-gray-200 px-3 py-2 rounded-lg inline-block max-w-[80%] md:max-w-[65%] break-words"></span>
        `;
        chatBox.appendChild(botMessage);

        const span = botMessage.querySelector("span");
        const text = data.reply;
        let i = 0;

        const typingEffect = setInterval(() => {
            if (i < text.length) {
                span.textContent += text.charAt(i);
                chatBox.scrollTop = chatBox.scrollHeight;
                i++;
            } else {
                clearInterval(typingEffect);
                input.disabled = false;
                submitBtn.disabled = false;
                submitBtn.classList.remove("opacity-50", "cursor-not-allowed");
                input.focus();
            }
        }, 30);

    } catch (err) {
        console.error(err);
        document.getElementById(typingId)?.remove();
        chatBox.innerHTML += `
            <div class="flex justify-start text-red-500 text-sm">Gagal menghubungi server 😢</div>
        `;
        input.disabled = false;
        submitBtn.disabled = false;
        submitBtn.classList.remove("opacity-50", "cursor-not-allowed");
    }

    input.value = "";
});
</script>

</body>
</html>
