// var origin = [1, 2, 'a', 3, 1, 'b', 'a'];
// var result = new Set();
// var repeat = new Set();
// origin.forEach(item => {
//     result.has(item) ? repeat.add(item) : result.add(item);
// })
// console.log('result:', result); // {1, 2, "a", 3, "b"}
// console.log('repeat:', repeat); // {1, "a"}


// var origin2 = [1, 2, 'a', 3, 1, 'b', 'a'];
// var result = new Set();
// var repeat = new Set();
// origin.forEach(item => {
//     result.has(item) ? repeat.add(item) : result.add(item);
// })
// console.log('result:', result); // {1, 2, "a", 3, "b"}
// console.log('repeat:', repeat); // {1, "a"}


var people = [
    {
        name: 'Casper',
        like: '鍋燒意麵',
        age: 18
    },
    {
        name: 'Wang',
        like: '炒麵',
        age: 24
    },
    {
        name: 'Bobo',
        like: '蘿蔔泥',
        age: 1
    },
    {
        name: '滷蛋',
        like: '蘿蔔泥',
        age: 3
    }
];
// let result;
// let r = people.map(function (v, k) {
//     if (v.name.indexOf('Wang') > -1) {
//         return v.age
//     }
// })
// console.log(r)

let result = people.filter(function (v,k) {
    if(v.name.indexOf('Wang') > -1){
        return v
    }
})
console.log(result)