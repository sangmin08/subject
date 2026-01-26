document.querySelector("#container").addEventListener("click", () => {
    console.log("event capturing: container");
}, true);

document.querySelector("#list").addEventListener("click", () => {
    console.log("event capturing: list");
}, true);

document.querySelector("#item").addEventListener("click", () => {
    console.log("event capturing: item");
}, true);

document.querySelector("#container").addEventListener("click", () => {
    console.log("event capturing: container");
});

document.querySelector("#list").addEventListener("click", () => {
    console.log("event capturing: list");
});

document.querySelector("#item").addEventListener("click", () => {
    console.log("event capturing: item");
});