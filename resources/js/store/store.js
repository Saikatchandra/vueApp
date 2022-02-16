import axios from "axios"

export default {

    state: {
        category: [],
    },
    getters: {
        categoryList(state){
            return state.category;
        }
    },
    actions: {
        getCategoryList(context){
            axios.get('/categoryList').then((res)=>{
                    context.commit('categoryList',res.data.categoryList)
            }).catch((e)=>{
                console.log(e);
            })
        }
    },
    mutations: {
        categoryList(state, responseData){
            return state.category = responseData
        }
    }


}