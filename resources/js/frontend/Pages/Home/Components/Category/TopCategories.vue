<template>
    <section class="section_gap">
        <div class="custom-container">
            <div class="section_title">
                <h4 class="text">Top Offers</h4>
            </div>
            <div class="top_categries">
                <div class="category" v-for="item in all_top_products_offer" :key="item.id">
                    <Link :href="`offer-products/${item.slug}`" class="category_link">
                    <div class="title"></div><img :src="`${item.image}`">
                    </Link>
                </div>
                <!-- <div class="category">
                    <Link :href="`offer-products/popular-products`" class="category_link">
                    <div class="title"></div><img src="/frontend/assets/images/popular_products.webp">
                    </Link>
                </div>
                <div class="category">
                    <Link :href="`offer-products/flash-sale`" class="category_link">
                    <div class="title"></div><img src="/frontend/assets/images/flash_sale.webp">
                    </Link>
                </div>
                <div class="category">
                    <Link :href="`offer-products/super-saver`" class="category_link">
                    <div class="title"></div><img src="/frontend/assets/images/super_saver.webp">
                    </Link>
                </div> -->

            </div>

        </div>
        <div class="custom-container">
            <div class="section_title">
                <h4 class="text my-5">Top Categories</h4>
            </div>

            <div class="top_categries">

                <div v-for="(item, index) in all_category_groups" :key="index" class="category">
                    <Link :href="`/category-group/${item.slug}`" class="category_link">
                    <div class="title"> {{ item.title }}</div>
                    <img :src="item.image" />
                    </Link>
                </div>

            </div>
        </div>
    </section>
</template>

<script>
import { computed, onMounted } from 'vue';

import { use_home_page_store } from '../../Store/home_page_store.js';
import { mapState } from 'pinia';
export default {

    data: () => ({
        categories: [
            {
                title: '',
                image: '/frontend/assets/images/summer_collection.webp',
            },
            {
                title: '',
                image: '/frontend/assets/images/popular_products.webp',
            },
            {
                title: '',
                image: '/frontend/assets/images/flash_sale.webp',
            },
            {
                title: '',
                image: '/frontend/assets/images/super_saver.webp',
            },

            {
                title: 'grocery',
                image: '/frontend/assets/images/khaddo_sosso.webp',
            },
            {
                title: 'Cooking',
                image: '/frontend/assets/images/ranna_samogri.webp',
            },
            {
                title: 'Bath and Body',
                image: '/frontend/assets/images/bath_and_body.webp',
            },
            {
                title: 'baby care',
                image: '/frontend/assets/images/baby-care.webp',
            },

            {
                title: 'laptop and desktop',
                image: '/frontend/assets/images/laptops-desktops.webp',
            },
            {
                title: 'mobile and tablets',
                image: '/frontend/assets/images/mobiles-tablets.webp',
            },
            {
                title: 'large kitchen',
                image: '/frontend/assets/images/large-kitchen-appliances.webp',
            },
            {
                title: 'heating and cooling',
                image: '/frontend/assets/images/heating-cooling-air-quality.webp',
            },
        ]
    }),

    computed: {
        ...mapState(use_home_page_store, {
            all_category_groups: 'all_category_groups',
            all_top_products_offer: 'all_top_products_offer',
        })
    }
    
}
</script>

<style></style>
