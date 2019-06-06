import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        // states
        test: 'sdf',
        test2: [],
        show: false,
        showIn: false,
        selectedClass: [],
        width: '',
        height: '',
    },
    getters: {
        // getters
    },
    mutations: {
        // change state value
        CHANGE_TEST (state, value) {
            state.test = value
        },
        CHANGE_TEST2 (state, value) {
            state.test2 = value
        },
        CHANGE_INPUT_VALUE (state, value) {
            state.show = false
            state.showIn = false
            if (value == 1) {
                state.show = !state.show
            }
            if (value == 2) {
                state.showIn = !state.showIn
            }
        },
        // change selectedClass state
        CHANGE_SELECTED_CLASS (state, value) {
            state.selectedClass = value
        },
        // Dynamic state changes
        CHANGE_STATE (state, value) {
            state[value[0]] = value[1]
        }
    },
    actions: {
        // call mutation on actions
        ACTION_CHANGE_STATE (context, value) {
            context.commit('CHANGE_TEST', value)
        },
        ACTION_CHANGE_INPUT (context, value) {
            context.commit('CHANGE_INPUT_VALUE', value)
        }
    },
    modules: {

    }

})