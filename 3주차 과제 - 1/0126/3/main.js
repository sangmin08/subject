const btn1 = document.querySelector("#btn1")
const btn2 = document.querySelector("#btn2")
const btn3 = document.querySelector("#btn3")
const area = document.querySelector("#displayArea")
btn1.addEventListener('click',onClick1)
btn2.addEventListener('click',onClick2)
btn3.addEventListener('click',onClick3)

function onClick1() {
    area.textContent = "버튼1"
}

function onClick2() {
    area.textContent = "버튼2"
}

function onClick3() {
    area.textContent = "버튼3"
}