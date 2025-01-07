const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '/index', component: () => import('pages/IndexPage.vue') },
      { path: '/shopList', component: () => import('pages/ShopList.vue') },
      { path: '/categories', component: () => import('src/pages/CategoriesPage.vue') },
    ]
  },

  {
    path: '/auth',
    component: () => import('layouts/AuthLayout.vue'),
    children: [
      { path: '/registerUser', component: () => import('src/pages/RegisterUserPage.vue') },
      { path: '/loginUser', component: () => import('src/pages/LoginUserPage.vue') },
    ]
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: '/:catchAll(.*)*',
    component: () => import('pages/ErrorNotFound.vue')
  }
]

export default routes
