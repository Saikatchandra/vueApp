import dashboard from "./components/dashboard/index"
import categoryList from "./components/category/index"
import addCategory from "./components/category/add"
import editCategory from "./components/category/edit"

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
    {
        path: '/editCategory/:categoryId',
        name: 'editCategory',
        component: editCategory
    },

]   