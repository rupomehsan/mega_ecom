<template>
    <div class="theme-slider">
        <carousel :items-to-show="1">
            <slide v-for="slider in home_hero_sliders" :key="slider.id">
                <div>
                    <div class="slider-banner">
                        <img :src="`/${slider.image}`" class="w-100" />
                    </div>
                </div>
            </slide>

            <!-- <template #addons>
                <navigation />
                <pagination />
            </template> -->
        </carousel>

        <!-- <div>
            <div class="slider-banner">
                <div class="slider-img">
                    <ul class="layout2-slide-3">
                        <li id="img-3"><img src="https://themes.pixelstrap.com/bigdeal/assets/images/layout-1/slider/1.3.png" class="img-fluid" alt="slider" /></li>
                    </ul>
                </div>
                <div class="slider-banner-contain">
                    <div>
                        <h4>march special</h4>
                        <h1>leather bag</h1>
                        <h2>minimum 60% off</h2>
                        <a href="product-page(left-sidebar).html" class="btn btn-normal">Shop Now</a>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</template>
<script>

import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'
export default {
    components: {
        Carousel,
        Slide,
        Pagination,
        Navigation,
    },
    data: () => ({
        home_hero_sliders: [],
    }),
    created: async function () {
        await this.get_all_home_hero_sliders()
    },
    methods: {

        get_all_home_hero_sliders: async function () {
            let response = await axios.get('/get-home-page-hero-sliders?get_all=1&is_show=1')
            if (response.data.status === "success") {
                this.home_hero_sliders = response.data.data
            }
        },

    }
};
</script>
