const input = document.querySelector("#numberInput");
const btn = document.querySelector("#analyzeBtn");
const div = document.querySelector("#resultContainer");
btn.addEventListener('click',analyzeNumber)

function analyzeNumber() {
    console.log(Number(input.value));
    if(Number(input.value)%2===0){
        div.textContent = "짝수입니다!"
    }else if(Number(input.value)%2===1){
        div.textContent = "홀수입니다!"
    }else{
        div.textContent = "숫자를 입력해주세요!"
    }
}