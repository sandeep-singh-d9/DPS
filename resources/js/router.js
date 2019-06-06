import Vue from 'vue';
import VueRouter from 'vue-router';


import HomeComponent from "./components/dps/HomeComponent";
import  TestComponent from "./components/dps/testComponent"
import  test from "./components/dps/test"
import  model from "./components/dps/modelComponent"

Vue.use(VueRouter)

export default new VueRouter ({
    routes: [
        {
            path: '/',
            component: HomeComponent,
        },
        {
            path: '/demo',
            component: TestComponent,
        },
        {
            path: '/test',
            component: test,
        },
        {
            path: '/model',
            component: model,
        }
    ],
    mode: 'history',
})