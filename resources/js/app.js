require('./bootstrap')

import { createApp } from 'vue'

import CartComponent from './components/CartComponent'
import AddProductComponent from './components/AddProductComponent'
import {Toaster} from "@meforma/vue-toaster";


const app = createApp({})
app.use(Toaster,{
    position: "top-right",

});

app.component('cart-component', CartComponent)
app.component('add-product-component', AddProductComponent)

app.mount('#app')
