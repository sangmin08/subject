const addbtn = document.querySelector('#addBtn')
const itemlist = document.querySelector('#itemList')
addbtn.addEventListener('click',addListItem)
let num = 1;

function addListItem() {
    const li = document.createElement("li")
    li.textContent = `아이템 ${num}`
    itemlist.appendChild(li)
    num += 1;
}
