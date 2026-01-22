// 1번
function concatArray(arr1, arr2){
    return console.log(arr1.concat(arr2))
}

const array1 = ['A','B','C'];
const array2 = ['D','E','F']

console.log(concatArray(array1, array2));

// 2번
function insertElement(arr, index, value){
    if (arr.length < index) {
        console.error(`현재 배열의 길이는 ${arr.length}로 ${index}은 입력 불가능합니다.`)
    }else {
        arr.splice(index, 0, value)
        console.log(arr)
    }
}

const nums = [1,2,3,4,5];

console.log(insertElement(nums, 2, 6));
console.log(insertElement(nums, 10, 6));

// 3번
function removeElement(arr, index) {
    arr.splice(index,1)
    console.log(arr)
}

const chars = ['A','B','C','D','E'];

console.log(removeElement(chars, 3));

// 4번 
function removeElement(arr, character)