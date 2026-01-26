window.addEventListener("load", displayCurrentTime())

function displayCurrentTime(){
    const div = document.querySelector("#timeContainer")
    const date = new Date()
    div.textContent = `${date.getHours()%12}:${date.getMinutes()}:${date.getSeconds()}`
}