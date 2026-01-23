// // 1번
// function mergeObjects(obj1, obj2){
//     console.log({...obj1,...obj2})
// }

// const object1 = {a:'A',b:'B',c:'C'};
// const object2 = {b:'X',c:'Y',d:'Z'};

// console.log(mergeObjects(object1, object2));

// // 2번
// function countLetters(string) {
//     console.log(Object.keys(string))
//     console.log(Object.values(string))
// }

// const str = "apple";

// console.log(countLetters(str));

// // 3번
// function getObjectKeysAndValues(object) {
//     console.log([[...Object.keys(object)],[...Object.values(object)]])
// }

// const obj = { a: "A", b: "B", c: "C" };

// console.log(getObjectKeysAndValues(obj));

// // 5번
// function selectValuesByKey(objectArray, key) {
//     const arr = [];
//     for(let i = 0; i<objectArray.length; i++){
//         arr.push(objectArray[i][key])
//     }
//     return arr

//     //AI개선코드 : return objectArray.map(objectArray => objectArray[key])
// }

// const objectArray = [
// 	{ id: 1, name: "Alice" },
// 	{ id: 2, name: "Bob" },
// 	{ id: 3, name: "Cathy" },
// ];

// console.log(selectValuesByKey(objectArray, "name")); 

// // 6번
// function filterByScore(students, score) {
//     return students.filter(students=>students.score >= score).map(students=>students.name)
// }

// const students = [
// 	{ name: "Alice", score: 85 },
// 	{ name: "Bob", score: 75 },
// 	{ name: "Cathy", score: 90 },
// 	{ name: "David", score: 65 },
// ];

// console.log(filterByScore(students, 80));

// // 7번
// function filterByAverageScore(students, score) {

// }

// const students = [
// 	{ name: "Alice", score: [90, 60, 70, 100] },
// 	{ name: "Bob", score: [75, 35, 40, 60] },
// 	{ name: "Cathy", score: [90, 10, 20, 30] },
// 	{ name: "David", score: [70, 75, 85, 95] },
// ];

// console.log(filterByAverageScore(students, 80)); // ["Alice", "David"] 출력