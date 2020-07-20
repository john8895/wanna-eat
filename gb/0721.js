// let arr = [1, 2, 3, 4, 5];

let avg = function (...arr) {
    let sum = 0;
    for (let i = 0; i < arr.length; i++) {
        sum += arr[i];
    }
    return sum / arr.length;
}

console.log(avg(1,3,5,7,9));  //  3

let number = [1,2,3,4,5]

console.log(Math.max(...number))