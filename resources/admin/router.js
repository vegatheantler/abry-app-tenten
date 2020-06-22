import Vue from 'vue';
import Router from 'vue-router';

import IndexPage from './pages/Index.vue';
import CreatePage from './pages/Create.vue';
import EditPage from './pages/Edit.vue';

Vue.use(Router);

export default new Router({
  mode: 'history',
  base: 'admin',
  routes: [
    {
      path: '/',
      component: IndexPage,
      name: 'index',
    },
    {
      path: '/create',
      component: CreatePage,
      name: 'create',
    },
    {
      path: '/:id/edit',
      component: EditPage,
      name: 'edit',
    },
  ]
});