document.addEventListener("DOMContentLoaded", () => {
    const chatInput = document.querySelector(".chat-input textarea");
    const sendChatBtn = document.querySelector("#send-btn");
    const chatbox = document.querySelector(".chatbox");
    const chatbotToggler = document.querySelector(".chatbot-toggler");
    const chatbotCloseBtn = document.querySelector(".chatbot header span");

    let userMessage;
    let loadingMessageElement; // Variabel untuk menyimpan elemen loading
    const InputInitHeight = chatInput.scrollHeight;

    // Debugging: Pastikan elemen ditemukan
    console.log("Close button element:", chatbotCloseBtn);

    // Event listener untuk tombol close di header chatbot
    chatbotCloseBtn.addEventListener("click", (e) => {
        e.preventDefault();
        e.stopPropagation();
        console.log("Tombol close diklik"); // Debugging
        document.body.classList.remove("show-chatbot");
    });

    // Tambahkan event listener pada toggler
    chatbotToggler.addEventListener("click", () => {
        document.body.classList.toggle("show-chatbot");
    });

    // Fungsi untuk membuat elemen chat baru (bubble chat)
    const createChatLi = (message, ClassName) => {
        const chatLi = document.createElement("li");
        chatLi.classList.add("chat", ClassName);
        let chatContent = ClassName === "outgoing" ? `<p></p>` : `<span class="material-symbols-outlined">smart_toy</span><p></p>`;
        chatLi.innerHTML = chatContent;
        chatLi.querySelector("p").textContent = message;
        return chatLi;
    }

    const handleChat = () => {
        userMessage = chatInput.value.trim();
        if (!userMessage) return;

        chatbox.appendChild(createChatLi(userMessage, "outgoing"));
        chatInput.value = "";
        chatInput.style.height = `${InputInitHeight}px`;
        scrollToBottom();

        loadingMessageElement = createChatLi("Tunggu Sebentar...", "incoming");
        chatbox.appendChild(loadingMessageElement);
        scrollToBottom();

        setTimeout(() => {
            generateResponse(userMessage);
        }, 1000);
    }

    // Fungsi untuk menangani respons bot
    const generateResponse = (userMessage) => {
        // Simulasi respons dari bot
        $.ajax({
            url: 'bot_response.php', // URL dari file PHP yang akan mengirimkan respons
            type: 'POST',
            data: { message: userMessage },
            success: function(response) {
                if (loadingMessageElement) {
                    loadingMessageElement.remove();
                    loadingMessageElement = null;
                }

                chatbox.appendChild(createChatLi(response, "incoming"));
                scrollToBottom();
            },
            error: function(xhr, status, error) {
                console.error(error);

                if (loadingMessageElement) {
                    loadingMessageElement.remove();
                    loadingMessageElement = null;
                }

                chatbox.appendChild(createChatLi("Error: Tidak bisa mendapatkan respons bot.", "incoming"));
                scrollToBottom();
            }
        });
    }

    // Otomatis sesuaikan tinggi textarea saat pengguna mengetik
    chatInput.addEventListener("input", () => {
        chatInput.style.height = `${InputInitHeight}px`;
        chatInput.style.height = `${chatInput.scrollHeight}px`;
    });

    // Tambahkan event listener untuk menangani Enter dan Shift + Enter
    chatInput.addEventListener("keydown", (e) => {
        if (e.key === "Enter" && !e.shiftKey) {
            e.preventDefault();
            handleChat();
        }
    });

    const scrollToBottom = () => {
        chatbox.scrollTop = chatbox.scrollHeight;
    };

    sendChatBtn.addEventListener("click", handleChat);
});
