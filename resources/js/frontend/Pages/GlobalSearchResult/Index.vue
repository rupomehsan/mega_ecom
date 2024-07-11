<template>
    <Layout>
        <div class="breadcrumb-main py-3">
            <div class="custom-container">
                <BreadCumb :bread_cumb="bread_cumb" />
            </div>
        </div>
        <section class="category_page_header">
            <div class="custom-container">
                <h5 class="my-2">Catregory</h5>
                <ul class="page_sub_category_lists">
                    <li v-for="category in search_result.category?.data" :key="category.id">
                        <Link :href="`/category/${category.slug}`">{{ category.title }}</Link>
                    </li>

                </ul>
            </div>
        </section>
        <section class="category_page_header">
            <div class="custom-container">
                <h5 class="my-2">Brands</h5>
                <ul class="page_sub_category_lists">
                    <li v-for="brand in search_result.brand?.data" :key="brand.id">
                        <Link :href="`/category/${brand.slug}`">{{ brand.title }}</Link>
                    </li>

                </ul>
            </div>
        </section>
        <section class="section-big-pt-space ratio_asos b-g-light">
            <div class="collection-wrapper">
                <div class="custom-container">
                    <div class="row">

                        <div class="collection-content col">
                            <div class="page-main-content">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="top-bar ws-box">
                                            <div class="row">
                                                <div class="col-sm-4 col-xs-2 actions"><button class="tool-btn"
                                                        id="lc-toggle"><i class="fa fa-filter"></i> Filter
                                                    </button><label class="page-heading m-hide">Laptop</label></div>
                                                <div class="col-sm-8 col-xs-10 show-sort">
                                                    <div class="form-group rs-none"><label>Show:</label>
                                                        <div class="custom-select"><select id="input-limit">
                                                                <option value="20">20</option>
                                                                <option value="24">24</option>
                                                                <option value="48">48</option>
                                                                <option value="75">75</option>
                                                                <option value="90">90</option>
                                                            </select></div>
                                                    </div>
                                                    <div class="form-group"><label>Sort By:</label>
                                                        <div class="custom-select"><select id="input-sort">
                                                                <option value="">Default</option>
                                                                <option value="p.price-ASC">Price (Low &gt; High)
                                                                </option>
                                                                <option value="p.price-DESC">Price (High &gt; Low)
                                                                </option>
                                                            </select></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="collection-product-wrapper">


                                            <div class="py-5">
                                                <div class="product_list product_left">

                                                    <div v-for="product in search_result.product?.data"
                                                        :key="product.id">
                                                        <ProductItem :product="product" />
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="product-pagination">
                                                <div class="theme-paggination-block">
                                                    <div class="row">
                                                        <div class="col-xl-6 col-md-6 col-sm-12">
                                                            <nav aria-label="Page navigation">
                                                                <ul class="pagination">
                                                                    <li class="page-item"
                                                                        :class="{ active: link.active }"
                                                                        v-for="(link, index) in search_result.product?.links"
                                                                        :key="index">
                                                                        <a :href="link.url"
                                                                            @click.prevent="loadProduct(link)"
                                                                            class="page-link text_no_wrap">
                                                                            <span v-html="link.label"></span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </nav>
                                                        </div>
                                                        <div class="col-xl-6 col-md-6 col-sm-12">
                                                            <div class="product-search-count-bottom">
                                                                <h5>Showing Products {{ search_result.product?.from
                                                                    }}-{{
                    search_result.product?.to }} of {{
                                                                    search_result.product?.total }}
                                                                    Result</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--v-if-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-4"></div>
        </section>
    </Layout>
</template>

<script>
import Layout from "../../Shared/Layout.vue";
import BreadCumb from '../../Components/BreadCumb.vue';

import { computed, watch } from 'vue';
import { use_global_search_store } from "./Store/global_search_store.js"

import ProductItem from "../../Components/ProductItem.vue";

export default {
    components: { Layout, ProductItem, BreadCumb },

    setup() {
        const global_search_store = use_global_search_store();
        const search_result = computed(() => global_search_store.search_result_data);
        const loadProduct = async (link) => {
            try {
                let url = new URL(link.url, window.location.origin);
                await global_search_store.global_search(url.href);
            } catch (error) {
                console.error('Error loading product:', error);
            }
        };
        return {
            search_result,
            loadProduct
        };
    },

    data: () => ({
        bread_cumb: [
            {
                title: 'Seacrh Result',
                url: '#',
                active: false,
            },
        ],
    }),


};
</script>


<style></style>
