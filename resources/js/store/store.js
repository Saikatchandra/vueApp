import axios from "axios"

export default {

    state: {
        category: [],
        subCategory: [],
        content: [],
    },
    getters: {
        categoryList(state){
            return state.category;
        },
        subCategoryList(state){
            return state.subCategory;
        },
        contentList(state){
            return state.content;
        }
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
        getContentList(context){
            axios.get('/contentList').then((res)=>{
                // alert('hi');
                    context.commit('contentList',res.data.contentList)
            }).catch((e)=>{
                console.log(e);
            })
        }
    },
    mutations: {
        categoryList(state, responseData){
            return state.category = responseData
        },
        subCategoryList(state, responseData){
            return state.subCategory = responseData
        },
        contentList(state, responseData){
            return state.content = responseData
        }
    },


}