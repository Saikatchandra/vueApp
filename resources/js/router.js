import dashboard from "./components/dashboard/index"
import categoryList from "./components/category/index"
import addCategory from "./components/category/add"

export const routes = [
    {
        path: '/',
        name: 'dashboard',
        component: dashboard
    },
    {
        path: '/categoryList',
        name: 'categoryList',
        component: categoryList
    },
    {
        path: '/addCategory',
        name: 'addCategory',
        component: addCategory
    },

]   