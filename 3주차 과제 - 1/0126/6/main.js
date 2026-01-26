document.getElementById("buttonContainer").addEventListener("click",changeColor)
const box = document.querySelector("#coloredBox")

function changeColor(e) {
    box.style.backgroundColor = e.target.dataset.color
}