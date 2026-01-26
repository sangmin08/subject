const btn = document.querySelector("#changeBtn");
const text = document.querySelector("#textContainer");

btn.addEventListener('click',changeText)

function changeText() {
    text.textContent = "Hello, JavaScript!"
}