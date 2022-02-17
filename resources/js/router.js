import dashboard from "./components/dashboard/index"
//  category componenet
import categoryList from "./components/category/index"
import addCategory from "./components/category/add"
import editCategory from "./components/category/edit"
//  sub-category componenet
import subCategoryList from "./components/subCategory/index"
import addSubCategory from "./components/subCategory/add"
import editSubCategory from "./components/subCategory/edit"

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
    {
        path: '/subCategoryList',
        name: 'subCategoryList',
        component: subCategoryList
    },
    {
        path: '/addSubCategory',
        name: 'addSubCategory',
        component: addSubCategory
    },
    {
        path: '/editSubCategory/:subCategoryId',
        name: 'editSubCategory',
        component: editSubCategory
    }

]   