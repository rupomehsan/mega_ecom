<template>

    <Head>
        <title>
            {{ product_initial_data.title }}
        </title>
    </Head>
    <Layout>
        <section v-if="loaded" class="section-big-pt-space b-g-light">
            <div class="collection-wrapper">
                <div class="custom-container">
                    <div class="container-fluid">
                        <ProductBasicInfo :product="product_initial_data"></ProductBasicInfo>
                    </div>

                    <ProductBottomDetails :product="product_details"></ProductBottomDetails>
                </div>
            </div>
        </section>
        <section v-else>
            <div class="custom-container">
                <img src="/frontend/images/product_skeleton.png" class="w-100" alt="product-loading">
            </div>
        </section>
        <TopProducts :products="top_products"></TopProducts>
    </Layout>
</template>

<script>

import Layout from "../../Shared/Layout.vue";
import { useProductDetailsStore } from './Store/product_details_store.js';
import ProductBasicInfo from './Components/ProductBasicInfo.vue';
import ProductBottomDetails from './Components/ProductBottomDetails.vue';
import TopProducts from './Components/TopProducts.vue';
import { mapActions, mapState, mapWritableState } from 'pinia';
import ProductImage from './Components/ProductImage.vue';

export default {
    components: { Layout, ProductBasicInfo, ProductBottomDetails, TopProducts, ProductImage },
    props: {
        slug: String,
    },
    data: () =>({
        loaded: false,
        product: null,
    }),
    created: async function () {
        console.log(this.slug);

        this.product_initial_data = {};

        await this.get_single_product_initial_data(this.slug);
        this.loaded = true;

        await this.get_single_product_details(this.slug);
        await this.get_all_question_and_answers(this.slug);

        this.get_top_products();

        // axios.get('/product/'+this.slug)
        //     .then(res=>{
        //         console.log(res.data);
        //         // this.product_initial_data = res.data;
        //         this.product = res.data;
        //     })
    },
    methods: {
        ...mapActions(useProductDetailsStore, {
            get_single_product_initial_data: "get_single_product_initial_data",
            get_single_product_details: "get_single_product_details",
            get_all_question_and_answers: "get_all_question_and_answers",
            get_top_products: "get_top_products",
        }),

    },

    computed: {
        ...mapState(useProductDetailsStore, {
            top_products: "top_products",
        }),
        ...mapWritableState(useProductDetailsStore, {
            product_details: 'product_details',
            store_slug: 'slug',
            product_initial_data: 'product_initial_data',
        })
    }


};
</script>

<style scoped>
/* Add your styles here */
</style>
