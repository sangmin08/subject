document.getElementById("addTodoBtn").addEventListener("click", addTodo);
document.getElementById("todoList").addEventListener("click", deleteTodo);
const input = document.getElementById("todoInput")

function addTodo() {
    document.getElementById("todoList").insertAdjacentHTML("beforeend", `
        <li>
            <span>${input.value}</span>    
            <button>삭제</button>
        </li>
    `)
}

function deleteTodo() {
    const delbtn = document.querySelectorAll("button")

    
}