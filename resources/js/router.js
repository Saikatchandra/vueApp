import dashboard from "./components/dashboard/index"
//  category componenet
import categoryList from "./components/category/index"
import addCategory from "./components/category/add"
import editCategory from "./components/category/edit"
//  sub-category componenet
import subCategoryList from "./components/subCategory/index"
import addSubCategory from "./components/subCategory/add"
import editSubCategory from "./components/subCategory/edit"
//  content componenet
import contentList from "./components/content/index"
import addContent from "./components/content/add"
import editContent from "./components/content/edit"

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
    },
    {
        path: '/contentList',
        name: 'contentList',
        component: contentList
    },
    {
        path: '/addContent',
        name: 'addContent',
        component: addContent
    },
    {
        path: '/editContent/:contentId',
        name: 'editContent',
        component: editContent
    }

]   