// Example: Prevent default form submission and alert
document.getElementById("contactForm")?.addEventListener("submit", function(e) {
    e.preventDefault();
    alert("Thank you for your message! I will get back to you soon.");
    this.reset();
});

const chatWidget = document.getElementById("chatWidget");
const chatHeader = document.getElementById("chatHeader");
const closeChat = document.getElementById("closeChat");
const chatBody = document.getElementById("chatBody");

let isDragging = false;
let offsetX, offsetY;

chatHeader.addEventListener("mousedown", (e) => {
    isDragging = true;
    offsetX = e.clientX - chatWidget.offsetLeft;
    offsetY = e.clientY - chatWidget.offsetTop;
});

document.addEventListener("mousemove", (e) => {
    if (!isDragging) return;
    chatWidget.style.left = (e.clientX - offsetX) + "px";
    chatWidget.style.top = (e.clientY - offsetY) + "px";
});

document.addEventListener("mouseup", () => {
    isDragging = false;
});

closeChat.onclick = () => {
    chatWidget.style.display = "none";
};

function sendMessage() {
    const input = document.getElementById("userInput");
    const msg = input.value.trim();
    if (!msg) return;

    chatBody.innerHTML += `<div class="user">${msg}</div>`;
    input.value = "";

    setTimeout(() => {
        chatBody.innerHTML += `<div class="bot">You said: ${msg}</div>`;
        chatBody.scrollTop = chatBody.scrollHeight;
    }, 500);
}
