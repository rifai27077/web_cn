<div id="chat-robibtn-wrapper" 
        class="fixed bottom-10 right-10 flex flex-col items-end space-y-2 z-50">
        <!-- Tooltip -->
        <div id="robi-tooltip" 
            class="bg-white text-gray-800 text-sm px-3 py-1 rounded-full shadow-md opacity-0 translate-y-2 transition-all duration-700">
            Hai! Chat dengan Robi 👋
        </div>

        <a href="/chat" id="chat-robibtn" aria-label="Buka chat Robi"
            class="relative bg-[#699D15] hover:bg-[#558512] text-white shadow-xl rounded-full w-14 h-14 sm:w-16 sm:h-16 flex items-center justify-center transition-all duration-300 opacity-0 scale-75 translate-y-4"
            style="overflow:visible;">
            <img src="/images/robi.png" alt="Chat Robi" class="w-[85%] h-[85%] object-contain object-bottom -mb-0.5" />
        </a>
    </div>
<style>
#chatrobibtn {
    animation: pulse 2s infinite;
}
@keyframes pulse {
    0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(124,181,24, 0.6); }
    70% { transform: scale(1.1); box-shadow: 0 0 0 15px rgba(124,181,24, 0); }
    100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(124,181,24, 0); }
}
</style>


<script>
        document.addEventListener("DOMContentLoaded", () => {

            const btn = document.getElementById("chat-robibtn");
            const tooltip = document.getElementById("robi-tooltip");

            window.addEventListener('DOMContentLoaded', () => {
                const btn = document.getElementById('chat-robibtn');
                setTimeout(() => btn.classList.remove('opacity-0','scale-75','translate-y-4'), 300);
            });
            // Animasi tombol muncul
            setTimeout(() => {
            btn.style.transition = "all 0.6s cubic-bezier(0.22, 1, 0.36, 1)";
            btn.style.opacity = "1";
            btn.style.transform = "scale(1) translateY(-5px)";
            }, 300);

            // Munculkan tooltip
            setTimeout(() => {
            tooltip.classList.remove("opacity-0", "translate-y-2");
            }, 800);

            // Sembunyikan tooltip otomatis
            setTimeout(() => {
            tooltip.classList.add("opacity-0", "translate-y-2");
            }, 3500);
        });
    </script>