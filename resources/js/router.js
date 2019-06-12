import Vue from 'vue';
import VueRouter from 'vue-router';


import HomeComponent from "./components/dps/HomeComponent"
import  TestComponent from "./components/dps/testComponent"
import ModelComponent from "./components/dps/modelComponent"
import demoDiv from "./components/dps/demodivinsidedivComponent"
import testnewComponent from './components/dps/testnewComponent'
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
            path: '/model',
            component: ModelComponent,
        },
        {
            path: '/demoDiv',
            component: demoDiv,
        },
        {
            path: '/test',
            component: testnewComponent
        }
    ],
    mode: 'history',
})