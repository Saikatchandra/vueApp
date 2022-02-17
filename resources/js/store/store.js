import axios from "axios"

export default {

    state: {
        category: [],
        subCategory: [],
    },
    getters: {
        categoryList(state){
            return state.category;
        },
        subCategoryList(state){
            return state.subCategory;
        },
    },
    actions: {
        getCategoryList(context){
            axios.get('/categoryList').then((res)=>{
                    context.commit('categoryList',res.data.categoryList)
            }).catch((e)=>{
                console.log(e);
            })
        },
        getSubCategoryList(context){
            axios.get('/subCategoryList').then((res)=>{
                    context.commit('subCategoryList',res.data.subCategoryList)
            }).catch((e)=>{
                console.log(e);
            })
        },
    },
    mutations: {
        categoryList(state, responseData){
            return state.category = responseData
        },
        subCategoryList(state, responseData){
            return state.subCategory = responseData
        },
    },


}