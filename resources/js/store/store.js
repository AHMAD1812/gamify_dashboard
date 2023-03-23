import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const store = new Vuex.Store({
    state:{
        user:{},
        loader:false,
        categories:[],
    },
    getters:{
        
    },
    mutations:{
        SET_USER(state,data){
            state.user = data;
        },
        SET_CATEGORIES(state,data){
            state.categories = data;
        },
        TOGGLE_LOADER(state,data){
            state.loader=data;
        }
    },
    actions:{
        setUser({commit},data){
            commit("SET_USER",data);
        },
        setCategories({commit}, data){
            commit("SET_CATEGORIES",data);
        },
        toggleLoader({commit}, data){
            commit("TOGGLE_LOADER",data);
        }
    }
})