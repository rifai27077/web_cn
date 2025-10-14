<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat Robi</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <style>
    .fade-slide-up {
      opacity: 0;
      transform: translateY(-50px);
      transition: all 0.7s ease-in-out;
    }
  </style>
</head>

<body class="h-screen flex flex-col bg-[linear-gradient(to_bottom,white_0%,white_60%,#ABD469_100%)]">
  <div class="max-w-7xl mx-auto w-full relative flex flex-col flex-1">
    <div class="fixed top-4 left-4 z-50">
      <a href="/" class="text-gray-600 hover:text-gray-800 bg-white shadow rounded-full p-2 flex items-center justify-center transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 19l-7-7 7-7" />
        </svg>
      </a>
    </div>

    <!-- Intro -->
    <div id="intro-section" class="flex flex-col items-center text-center px-6 pt-16 transition-all duration-700 ease-in-out">
     <img 
      src="/images/robi.png" 
      alt="Robi" 
      class="max-w-[60px] h-auto mb-3 object-contain"
    />

      <h2 class="text-xl font-bold mb-1">Kenalan sama Robi yuk!</h2>
      <p class="text-gray-600 mb-4 text-md">Aku bukan manusia, tapi aku bisa jadi teman ngobrolmu 😉</p>

      <div id="menu-buttons" class="flex gap-2 flex-wrap justify-center mb-4">
        <button class="menu-button px-4 py-2 border-2 rounded-full hover:bg-gray-100 transition text-sm">Fasilitas sekolah</button>
        <button class="menu-button px-4 py-2 border-2 rounded-full hover:bg-gray-100 transition text-sm">Syarat SPMB</button>
        <button class="menu-button px-4 py-2 border-2 rounded-full hover:bg-gray-100 transition text-sm">Jurusan</button>
      </div>
    </div>

    <!-- Chat area -->
    <div id="chat-box" class="flex-1 overflow-y-auto px-6 sm:px-10 lg:px-16 space-y-3 pb-4 mt-16 min-h-[200px]"></div>

    <!-- Input bawah -->
    <div class="px-4 pb-3">
      <form id="chat-form" class="flex items-center bg-white rounded-full shadow px-3 py-2">
        <input type="text" id="message" placeholder="Cobain ketik apa aja, aku bakal coba jawab 😎"
          class="flex-1 outline-none text-sm px-2">
        <button type="submit"
          class="bg-[#699D15] text-white p-2 rounded-full hover:bg-green-600 transition flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 24 24" class="w-5 h-5">
            <path d="M2.01 21 23 12 2.01 3 2 10l15 2-15 2z"/>
          </svg>
        </button>
      </form>

      <p class="text-[13px] text-gray-600 mt-2 text-center">
        Robi dapat membuat kesalahan. Periksa kembali informasi penting dengan 
        <a href="#" class="underline">pihak sekolah</a>.
      </p>
    </div>
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

  function formatBotMessageWithLinks(text) {
    const parts = [];
    const regex = /(https?:\/\/[^\s]+)/g;
    let lastIndex = 0, match;
    while ((match = regex.exec(text)) !== null) {
      if (match.index > lastIndex) parts.push({ type: 'text', content: text.slice(lastIndex, match.index) });
      parts.push({ type: 'link', content: match[0] });
      lastIndex = regex.lastIndex;
    }
    if (lastIndex < text.length) parts.push({ type: 'text', content: text.slice(lastIndex) });
    return parts;
  }

  // Kirim chat
  document.getElementById('chat-form').addEventListener('submit', async (e) => {
    e.preventDefault();
    const input = document.getElementById('message');
    const chatBox = document.getElementById('chat-box');
    const submitBtn = document.querySelector('#chat-form button');

    if (!input.value.trim() || input.disabled) return;

    const intro = document.getElementById('intro-section');
    if (intro && !intro.classList.contains('fade-slide-up')) {
      intro.classList.add('fade-slide-up');
      setTimeout(() => intro.remove(), 700);
    }

    if (menuButtons && !menuButtons.classList.contains("hidden")) {
      menuButtons.classList.add("hidden");
    }

    input.disabled = true;
    submitBtn.disabled = true;
    submitBtn.classList.add("opacity-50", "cursor-not-allowed");

    const timestamp = new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});

    chatBox.innerHTML += `
      <div class="flex justify-end flex-col items-end space-y-1 px-2">
        <span class="bg-[#699D15] text-white px-4 py-2 rounded-2xl shadow-sm max-w-[80%] md:max-w-[65%] break-words whitespace-pre-line">${input.value}</span>
        <span class="text-[10px] text-gray-500">${timestamp}</span>
      </div>`;
    chatBox.scrollTo({ top: chatBox.scrollHeight, behavior: 'smooth' });

    const typingId = "typing-" + Date.now();
    chatBox.innerHTML += `
      <div id="${typingId}" class="flex justify-start flex-col space-y-1 px-2">
        <span class="bg-gray-200 text-gray-600 px-4 py-2 rounded-2xl inline-block animate-pulse max-w-[80%] md:max-w-[65%] whitespace-pre-line break-words">
          Robi sedang mengetik...
        </span>
      </div>`;
    chatBox.scrollTo({ top: chatBox.scrollHeight, behavior: 'smooth' });

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

      const botTimestamp = new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});

      const botMessage = document.createElement("div");
      botMessage.className = "flex justify-start flex-col space-y-1 items-start px-2";
      botMessage.innerHTML = `
        <div class="flex items-start space-x-2">
         <img 
            src="/images/robi.png" 
            alt="Robi" 
            class="w-8 h-auto object-contain"
          />

          <span class="bg-gray-200 text-gray-800 px-4 py-2 rounded-2xl shadow-sm max-w-[80%] md:max-w-[65%] break-words whitespace-pre-line"></span>
        </div>
        <span class="text-[10px] text-gray-500 ml-10">${botTimestamp}</span>
      `;
      chatBox.appendChild(botMessage);

      const span = botMessage.querySelector("span.bg-gray-200");
      const textParts = formatBotMessageWithLinks(data.reply);

      let partIndex = 0, charIndex = 0;

      function typeNextChar() {
        if (partIndex >= textParts.length) {
          input.disabled = false;
          submitBtn.disabled = false;
          submitBtn.classList.remove("opacity-50", "cursor-not-allowed");
          input.focus();
          return;
        }

        const part = textParts[partIndex];
        if (part.type === 'text') {
          if (charIndex < part.content.length) {
            span.innerHTML += part.content.charAt(charIndex);
            charIndex++;
            chatBox.scrollTo({ top: chatBox.scrollHeight, behavior: 'smooth' });
            setTimeout(typeNextChar, 15);
          } else {
            partIndex++; charIndex = 0; typeNextChar();
          }
        } else {
          const a = document.createElement('a');
          a.href = part.content;
          a.target = "_blank";
          a.className = "underline text-blue-600 hover:text-blue-800";
          a.textContent = part.content;
          span.appendChild(a);
          partIndex++; typeNextChar();
        }
      }

      typeNextChar();

    } catch (err) {
      console.error(err);
      document.getElementById(typingId)?.remove();
      chatBox.innerHTML += `
        <div class="flex justify-start text-red-500 text-sm px-2">Gagal menghubungi server 😢</div>
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
