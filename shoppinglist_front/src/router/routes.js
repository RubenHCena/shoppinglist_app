const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '/index', component: () => import('pages/IndexPage.vue') },
      { path: '/shopList', component: () => import('pages/ShopList.vue') },
      { path: '/categories', component: () => import('src/pages/CategoriesPage.vue') },
      { path: '/registerUser', component: () => import('src/pages/RegisterUserPage.vue') },
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
