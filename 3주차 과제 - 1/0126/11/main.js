const list = document.querySelector("#list")

function clickEventHandler(event,id){
    // console.log(event.target);

    if(event.target.id === "item"){
        console.log(`Clicked:${id}`);
    }else if(event.target.id === "list"){
        console.log(`Clicked:${id}`);
    }
}

list.addEventListener("click",(e)=>{
    e.stopPropagation();
})