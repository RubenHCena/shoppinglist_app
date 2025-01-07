<template>
    <q-layout view="hHh lpr fFf">
  
      <q-header elevated class="bg-primary text-white" height-hint="98">
        <q-toolbar>
          <q-toolbar-title>
            <q-avatar>
              <img src="https://cdn.quasar.dev/logo-v2/svg/logo-mono-white.svg">
            </q-avatar>
            Title
          </q-toolbar-title>
        </q-toolbar>
  
     <q-tabs align="left">
        <q-route-tab to="/index" label="Index" />
        <q-route-tab to="/ShopList" label="Shoppinglist" />
        <q-route-tab to="/categories" label="Categories" />
        <q-route-tab to="/registerUser" label="register" class="right"/> 
        <q-route-tab to="/loginUser" label="Login" class="right"/> 
      </q-tabs>
      </q-header>
  
      <q-page-container>
        <router-view />
      </q-page-container>
  
    </q-layout>
  </template>