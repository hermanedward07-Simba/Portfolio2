
const chatToggle = document.getElementById("chatToggle");
const chatBox = document.getElementById("chatBox");
const closeChat = document.getElementById("closeChat");
const chatBody = document.getElementById("chatBody");

chatToggle.onclick = () => {
    chatBox.style.display = "block";
};

closeChat.onclick = () => {
    chatBox.style.display = "none";
};

function sendMessage() {
    const input = document.getElementById("userInput");
    const message = input.value;

    if (message.trim() === "") return;

    chatBody.innerHTML += `<div class="user">${message}</div>`;
    input.value = "";

    // Simple bot reply
    setTimeout(() => {
        chatBody.innerHTML += `<div class="bot">I received: "${message}"</div>`;
        chatBody.scrollTop = chatBody.scrollHeight;
    }, 600);
}
