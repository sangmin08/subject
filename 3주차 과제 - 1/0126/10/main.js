const box = document.querySelector("#custombox")
box.addEventListener("contextmenu",(e)=>{
    e.preventDefault();
    console.log("Custom right-click action");
})