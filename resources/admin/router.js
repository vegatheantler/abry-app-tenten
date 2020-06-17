import Vue from 'vue';
import Router from 'vue-router';

import Welcome from './pages/Welcome.vue';

Vue.use(Router);

export default new Router({
  mode: 'history',
  base: 'admin',
  routes: [
    {
      path: '/welcome',
      component: Welcome,
      name: 'welcome'
    }
  ]
});