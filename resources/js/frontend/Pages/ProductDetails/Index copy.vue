<template>

    <Head>
        <title>
            {{ product_details.title }}
        </title>
    </Head>
    <Layout>
        <section v-if="Object.keys(product_details).length" class="section-big-pt-space b-g-light">
            <div class="collection-wrapper">
                <div class="custom-container">
                    <div class="container-fluid">
                        <product-basic-info :product="product_details"></product-basic-info>
                    </div>
                    <product-bottom-details :product="product_details"></product-bottom-details>
                </div>
            </div>
        </section>
        <section v-else>
            <div class="custom-container">
                <img src="/frontend/images/product_skeleton.png" class="w-100" alt="product-loading">
            </div>
        </section>
        <top-products :products="products"></top-products>
    </Layout>
</template>

<script>


import Layout from "../../Shared/Layout.vue";
import { mapActions, mapState } from "pinia";
import { common_store } from "../../Store/common_store";
import { useProductDetailsStore } from './Store/product_details_store.js';

import ProductBasicInfo from './Components/ProductBasicInfo.vue';
import ProductBottomDetails from './Components/ProductBottomDetails.vue';
import TopProducts from './Components/TopProducts.vue';

export default {
    components: { Layout, ProductBasicInfo, ProductBottomDetails, TopProducts },
    props: {
        slug: String,
    },
    data: () => ({
        products: [],
        is_auth: false,
        product_details: {},
        product: {},
    }),

    created: async function () {
        // console.log(this.slug);
        this.is_auth = localStorage.getItem("token") ? true : false;
        // await this.get_product();
        await this.get_single_product_initial_data();
        await this.get_single_product_details();
        await this.get_featured_products();
    },

    setup(props) {
        const ProductDetailsStore = useProductDetailsStore();
        ProductDetailsStore.slug = props.slug;

        return {
            ProductDetailsStore
        };
    },

    methods: {

        ...mapActions(common_store, {
            add_to_wish_list: "add_to_wish_list",
            get_all_cart_data: "get_all_cart_data",
        }),


        get_single_product_details: async function () {
            let response = await axios.get('/get-product-details/' + this.slug)
            if (response.data.status === "success") {
                this.product_details = response.data.data
            }
            console.log(this.product_details);
        },

        get_featured_products: async function () {
            let res = await axios.get('/featured-products');
            let data = res.data;
            this.products = data;
        },

        openAccount() {
            document.getElementById("myAccount").classList.add('open-side');
        },

        AdujustQuantity: function (type) {
            if (type == "plus") {
                this.quantity++;
            } else {
                if (this.quantity > 1) {
                    this.quantity--;
                }
            }
        },

        add_to_cart: async function (productId) {
            const response = await window.privateAxios(`/add-to-cart?quantity=${this.quantity}`, 'post',
                {
                    product_id: productId,
                }
            );

            if (response.status === "success") {
                window.s_alert(response.message);
                this.get_all_cart_data();
            }
        },

    }
};
</script>

<style></style>
