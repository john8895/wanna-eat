// export {orderApp}
//
// const orderApp = Vue.createApp({
//     delimiters: ['%%', '%%'],
//     data() {
//         return {
//             message: 'Hello'
//         }
//     },
//     methods: {
//         getOrdersById(orderId) {
//             const api = `group_buy_api.php?res=order_list&order_id=${orderId}`;
//             axios.get(api)
//                 .then((response) => {
//                     // console.log(response.data);
//                     this.calculateOrders(response.data);
//                 })
//                 .catch((error) => {
//                     console.log(error);
//                 })
//         },
//         calculateOrders(orderData) {
//             /* todo: 新的訂單統計：
//              * 1.同名餐點、價格合併，數量、小計加總，記錄所有訂購人
//              * 2.同名餐點但備註不同要分別列出：餐點名稱、數量、單價、訂購人、備註
//              * 3.訂單總計
//              * 4.共幾人訂購、累計幾筆訂單
//              */
//             console.log(orderData);
//             let totalBuyer = [];
//             let orderResult = [];
//             let orderCount = 0;
//             orderData.forEach((order, key) => {
//                 console.log(key, order)
//                 if (orderData.length > 1) {
//                     totalBuyer.push(order.order_name);
//                     orderCount += parseInt(order.order_number);
//                 } else {
//                     orderCount = 1;
//                 }
//                 const meal = order.order_meal;
//                 // if (orderResult[key]['meal']) {
//                 // todo: 相同餐點合在一起不知怎麼寫
//                 // orderResult['meal']
//                 orderResult.push({
//                     'meal': order.order_meal,
//                     'price': parseInt(order.order_price),
//                     'orderCount': orderCount,
//                     'totalBuyer': order.length,
//                 })
//                 totalBuyer = [];
//                 orderCount = 0;
//                 // }else{
//                 //     orderResult.push({
//                 //         'meal': order.order_meal,
//                 //         'price': parseInt(order.order_price),
//                 //         'orderCount': orderCount,
//                 //         'totalBuyer': order.length,
//                 //     })
//                 // }
//             })
//             console.log(totalBuyer);
//             console.log(orderResult)
//         },
//         // computed: {
//         //    stringToNumber(string){
//         //        return parseInt(string);
//         //    }
//         // }
//     },
//     created() {
//         // this.calculateOrders();
//         this.getOrdersById('210811145659');
//     },
// });
//
// // orderApp.mount('.orderApp');