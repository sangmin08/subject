const username = document.querySelector("#username")
const pw = document.querySelector("#password")

document.querySelector("button").addEventListener('click',(e)=>{
    e.preventDefault()
    console.log(`사용자 이름 : ${username.value} 비밀번호 : ${pw.value}`)
})

