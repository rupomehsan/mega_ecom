<template>
    <div class="row">
        <div class="col-lg-5">
            <!-- <div>
                <product-image :product="product"></product-image>
            </div> -->
        </div>
        <div class="col-lg-7">
            <div class="single-product-info ps-3">
                <div class="single-product-info-top">
                    <h3 class="single-product-title">
                        asdfasdf
                    </h3>
                    <div class="single-product-price display-flex-center mb-24">
                        <div class="product-price-widget regular-price">
                            <span class="regular-price-title">Regular price:</span>
                            <span class="regular-main-price">
                                123 BDT
                            </span>
                        </div>

                        <span class="product-price-save">
                            12 SAVE
                        </span>
                    </div>
                </div>
                <div class="product-core-info-list">
                    <span class="p-core-info-list-title">Status</span>
                    <span class="p-core-info-list-sub-title stock-in">Stock in</span>

                </div>
                <div class="product-core-info-list">
                    <span class="p-core-info-list-title">Sku</span>
                    <span class="p-core-info-list-sub-title product-code">
                        234
                    </span>
                </div>
                <div class="product-core-info-list">
                    <span class="p-core-info-list-title">Brand</span>
                    <span class="p-core-info-list-sub-title brand-name">234</span>
                </div>
                <div class="product-core-info-list">
                    <span class="p-core-info-list-title">Region</span>
                    <span class="p-core-info-list-sub-title region-name">
                        asdfasdf
                    </span>
                    <span class="p-core-info-list-sub-title region-name">Bangladesh</span>
                </div>
                <div class="short-description">
                    dfasdfasdfs
                </div>

                <div class="product-core-info-list" >
                    <span class="p-core-info-list-title">Warranty</span>
                    <span class="p-core-info-list-sub-title emi-facility">
                        <span>asdfas</span>
                    </span>
                </div>

            </div>
            <div class="ps-3">
                <h6 class="product-title d-block mt-3">quantity</h6>
                <div class="qty-box">
                    <div class="input-group">
                        <button class="qty-minus" @click="AdujustQuantity('minus')"></button>
                        <input class="qty-adj form-control" type="number" min="1" v-model="quantity" />
                        <button class="qty-plus" @click="AdujustQuantity('plus')"></button>
                    </div>
                </div>
            </div>
            <div class="product-buttons ps-3 d-flex flex-wrap gap-2 mt-4">
                <button @click="is_auth ? add_to_cart(12) : openAccount()" class="btn btn-normal">
                    <i class="icon icon-shopping-cart"></i>
                    Add to Cart
                </button>
                <a @click="is_auth ? add_to_wish_list(123) : openAccount()"
                    class="btn px-4 btn-normal btn-outline add-to-wish tooltip-top"
                    data-tippy-content="Add to wishlist">
                    <i class="fa fa-heart" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
</template>

<script>

import Layout from "../../Shared/Layout.vue";
import { useProductDetailsStore } from './Store/product_details_store.js';
import ProductBasicInfo from './Components/ProductBasicInfo.vue';
import ProductBottomDetails from './Components/ProductBottomDetails.vue';
import TopProducts from './Components/TopProducts.vue';
import { mapActions, mapState, mapWritableState } from 'pinia';
import ProductImage from './Components/ProductImage.vue';
import BreadCumb from '../../Components/BreadCumb.vue';

export default {
    components: { BreadCumb, Layout, ProductBasicInfo, ProductBottomDetails, TopProducts, ProductImage },
    props: {
        slug: String,
    },
    data: () => ({
        loaded: false,
        product: null,
        bread_cumb: [
            {
                title: 'product-details',
                url: '#',
                active: false,
            },
        ],
    }),


    computed: {
        ...mapWritableState(useProductDetailsStore, {
            product_details: 'product_details',
            product_initial_data: 'product_initial_data',
        })
    }


};
</script>

<style scoped>
/* Add your styles here */
</style>
