document.getElementById("tableContainer").addEventListener("click",displayRowData);
const div = document.querySelector("#displayArea")

function displayRowData(e) {
    const tr = e.target.closest("tr")
    div.textContent = tr.children[1].textContent
}