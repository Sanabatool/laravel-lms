document.addEventListener("DOMContentLoaded", () => {
    const input = document.getElementById("chat-input");
    const sendBtn = document.getElementById("send-btn");
    const messagesEl = document.querySelector(".chatbot-messages");
    const chatForm = document.getElementById("chat-form");
    const chatbotPanel = document.getElementById("chatbot-panel");
    const chatbotIcon = document.getElementById("chatbot-icon");
    const closeChat = document.getElementById("close-chat");

    function addMessage(text, who) {
        const div = document.createElement("div");
        div.className = "message " + (who === "user" ? "user" : "bot");
        div.innerHTML = text; 
        messagesEl.appendChild(div);
        messagesEl.scrollTop = messagesEl.scrollHeight;
    }

    function showTyping() {
        const typingEl = document.createElement("div");
        typingEl.className = "message bot typing";
        typingEl.innerHTML = "Bot is typing...";
        messagesEl.appendChild(typingEl);
        messagesEl.scrollTop = messagesEl.scrollHeight;
        return typingEl;
    }

    async function sendMessage(event) {
        event.preventDefault(); // stop reload
        const question = input.value.trim();
        if (!question) return;

        addMessage(question, "user");
        input.value = "";
        const typingEl = showTyping();

        try {
            const response = await fetch("http://127.0.0.1:5000/chatbot", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ question })
            });

            const data = await response.json();
            typingEl.remove();
            addMessage(data.response, "bot");
        } catch (error) {
            typingEl.remove();
            addMessage("⚠️ Error: Could not connect to chatbot server.", "bot");
        }
    }

    // Attach events
    chatForm.addEventListener("submit", sendMessage);

    // Panel toggle
    chatbotIcon.addEventListener("click", () => {
        chatbotPanel.classList.add("open");
    });
    closeChat.addEventListener("click", () => {
        chatbotPanel.classList.remove("open");
    });
});
