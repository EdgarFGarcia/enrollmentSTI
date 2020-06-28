import Vue from 'vue';

import Home from '../js/views/pages/Home';
import About from '../js/views/pages/About';
import Dashboard from '../js/views/pages/Dashboard';

import VueRouter from 'vue-router';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
        },
        {
            path: '/about',
            name: 'about',
            component: About,
        },
        {
            path: '/dashboard',
            redirect: to => {
                const position = localStorage.getItem('user_positions');
                if(position == 4){
                    return {path: '/student'}
                }
            },
            meta: {
                requireAuth: true,
            }
        },
        {
            path: '/student',
            name: 'student',
            component: Dashboard
        }
    ]
});

export default router;