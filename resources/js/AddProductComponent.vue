<template>
    <button class="btn btn-success" @click.prevent="addProduct()">Dodaj Produkt</button>
</template>

<script>
export default {
    props: ['product'],
    data() {
        return {

        }
    },
    methods: {
        addProduct() {
            axios.post('/produkt/' + this.product)
                .then((response) => {
                    this.$toast.success(`Produkt został dodany!`);
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                })
        },
    }
}
</script>
<style scoped>

</style>
