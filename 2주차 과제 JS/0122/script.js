// // 1번
// function concatArray(arr1, arr2){
//     return console.log(arr1.concat(arr2))
// }

// const array1 = ['A','B','C'];
// const array2 = ['D','E','F']

// console.log(concatArray(array1, array2));

// // 2번
// function insertElement(arr, index, value){
//     if (arr.length < index) {
//         console.error(`현재 배열의 길이는 ${arr.length}로 ${index}은 입력 불가능합니다.`)
//     }else {
//         arr.splice(index, 0, value)
//         console.log(arr)
//     }
// }

// const nums = [1,2,3,4,5];

// console.log(insertElement(nums, 2, 6));
// console.log(insertElement(nums, 10, 6));

// // 3번
// function removeElement(arr, index) {
//     arr.splice(index,1)
//     console.log(arr)
// }

// const chars = ['A','B','C','D','E'];

// console.log(removeElement(chars, 3));

// // 4번 
// function removeElement(arr, character){
//     if (arr.find((value) => value === character)){
//         r1 = arr.filter((value)=>value !== character)
//         console.log(r1)
//     } else {
//         console.error(`배열에 ${character}가 없습니다`);
//     }
// }

// const chars = ['A','B','B','C','D','E'];

// console.log(removeElement(chars, 'B'));
// console.log(removeElement(chars, 'D'));
// console.log(removeElement(chars, 'Z'));

// // 5번
// function excludeElements(arr, start, end){
//     arr.splice(start,end)
//     console.log(arr);
// }

// const nums = [1, 2, 3, 4, 5, 6, 7];

// console.log(excludeElements(nums, 2, 5));

// // 6번
// function reverseArray(arr) {
//     return arr.reverse()
// }

// const nums = [1,2,3,4,5];

// console.log(reverseArray(nums));

// // 7번
// function joinStrings(arr){
//     console.log(arr.join(''))
// }

// const words = ['Hello','World','!']

// console.log(joinStrings(words))

// // 8번
// function removeDuplicates(arr){
//     const newArr = [] 
//     for (let i = 0; i < arr.length; i++){
//         if(newArr.includes(arr[i])){
//             continue;
//         } else {
//             newArr.push(arr[i])
//         }
//     }
//     console.log(newArr);
// }

// const nums = [1,2,3,1,4,2,5]

// console.log(removeDuplicates(nums));
 
// // 9번
// function average(arr) {
//     const newArr = [];
//     for (let i = 0; i < arr[0].length; i++){
//         newArr.push(arr[0][i])
//     }
//     for (let i = 0; i < arr[1].length; i++){
//         newArr.push(arr[1][i])
//     }

//     const sum = newArr.reduce((acc, cur) => {
//         return acc + cur
//     }, 0)
    
//     return sum/newArr.length
// }

// const nums = [[1,2,3,4,5],[9,10,11,12,13]]

// console.log(average(nums))

// // 10번
// function getLongestString(arr) {
//     const max = [''];
//     for(let i = 0; i < arr.length; i++){
//         if(arr[i].length > max[0].length){
//             max.pop()
//             max.push(arr[i])
//         }
//     }

//     return max[0]
// }

// const strings = ['apple','banana','orange','kiwi','grape']

// console.log(getLongestString(strings));