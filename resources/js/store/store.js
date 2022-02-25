import axios from "axios"

export default {

    state: {
        category: [],
        subCategory: [],
        content: [],
        user: [],
        role: [],
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
        },
        userList(state){
            return state.user;
        },
        roleList(state){
            return state.role;
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
        },
        getUserList(context){
            axios.get('/userList').then((res)=>{
                // alert('hi');
                console.log(res);
                    context.commit('userList',res.data.userList)
            }).catch((e)=>{
                console.log(e);
            })
        },
        getRoleList(context){
            axios.get('/roleList').then((res)=>{
                context.commit('roleList',res.data.roleList)
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
        contentList(state, responseData){
            return state.content = responseData
        },
        userList(state, responseData){
            return state.user = responseData
        },
        roleList(state, responseData){
            return state.role = responseData
        },
    },


}