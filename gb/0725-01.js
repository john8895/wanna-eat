// const arr = [
//     {name: 'alex', value: 10},
//     {name: 'alex', value: 20},
//     {name: 'tom', value: 30},
//     {name: 'tom', value: 40}
// ];
// // const set = new Set();
// // const result = arr.filter(item => !set.has(item.name) ? set.add(item.name) : false);
// // console.log(result);
// // // [{name: "alex", value: 10}, {name: "tom", value: 30}]
//
// const set = new Set();
// const result = arr.filter(item => !set.has(item.name) ? set.add(item.name) : false)
//
// console.log(result)


let arr = [
        {
            name: '便當',
            id: "3"
        },
        {
            name: '外送',
            id: "3"
        },
        {
            name: '便當',
            id: "22"
        },
        {
            name: '麵',
            id: "1"
        }
    ],
    result = [],
    idTemp = []

arr.forEach(function (a) {
    if (!this[a.name]) {  // 如果 a.name 不等於（一定成立）因為都是undefined
        this[a.name] = {name: a.name, ids: ''};  // this[a.name] 拿來當容器，重點是後面組出 Object 的格式
        result.push(this[a.name]);  // 把陣列推入結果
    }
    let sp = this[a.name].ids.length > 0 ? ',' : '';  // 如果ids裡面有值，就在要推入的數據前加逗號
    idTemp.push(sp + a.id)  // 推入臨時陣列
    this[a.name].ids += idTemp;  // 用字串形式組成多個 id 值
    idTemp = []  // 清空臨時陣列
});

console.log(result);
/*
[ { name: '便當', ids: '3,22' },
  { name: '外送', ids: '3' },
  { name: '麵', ids: '1' } ]
 */

// ============================

// 用 forEach 試讀取資料
result.forEach(item => {
    console.log('item=', item)
})
/* 可以讀出一筆筆資料含 id ，前台就可做處理，之後刪除 tag 時也能同步刪除在 id 中的數據
item= { name: '便當', ids: '3,22' }
item= { name: '外送', ids: '3' }
item= { name: '麵', ids: '1' }
 */