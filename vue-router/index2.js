// 1. 定義路由組件，可以從其他文件 import 進來
const Foo = {template: '<div>foo</div>'}
const Bar = {template: '<div>bar</div>'}

// 2. 定義路由
const routes = [
    {path: '/foo', component: Foo},
    {path: '/bar', component: Bar}
]

// 3. 創建 router 實例
const router = new VueRouter({
    routes  // routes: routes
})

// 4. 創建與掛載根實例
const app = new Vue({
    router
}).$mount('#app')