<template>
            <div class="col-md-8">
                <div class="p-2">
                    <h4>Koszyk</h4>
                </div>
                <div class="d-flex flex-row justify-content-between
                 align-items-center p-2 bg-white mt-4 px-3 rounded"
                     v-for="(cart, index) in carts" :key="index">
                    <div class="mr-1"><img class="rounded" src="https://i.imgur.com/XiFJkhI.jpg" width="70">
                    </div>
                    <div class="d-flex flex-column align-items-center product-details"><span class="font-weight-bold">{{cart.products.name}}</span>
                    </div>
                    <div class="d-flex flex-row align-items-center qty"><i class="fa fa-minus text-danger"></i>
                        <h5 class="text-grey mt-1 mr-1 ml-1">Cena: {{cart.products.price}} zł </h5>
                    </div>
                    <div>
                        <button class="btn btn-danger" @click.prevent="deleteProduct(cart.id)">X</button>
                    </div>
                    <div class="d-flex align-items-center"><i class="fa fa-trash mb-1 text-danger"></i></div>
                </div>
                <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded">
                    <button class="btn btn-outline-warning btn-sm ml-2" type="button">Zamów</button>
                </div>
        </div>
</template>

<script>
export default {
    data() {
        return {
            carts: null
        }
    },
    methods: {
        getCart() {
            axios.get('koszyk/show-product/').then((response) => {
                this.carts = response.data
            }).catch((errors) => {

            });
        },
        deleteProduct(cart)
        {
            axios.post('/koszyk/'+cart)
        }
    },
    mounted() {
        this.getCart();
    }
}
</script>
<style scoped>

</style>
