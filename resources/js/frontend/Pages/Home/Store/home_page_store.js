import { defineStore } from "pinia";


export const use_home_page_store = defineStore("use_home_page_store", {
    state: () => ({
        home_hero_slider_side_banner: [],
        all_category_groups: [],
        all_top_products_offer: [],
    }),

    actions: {

        get_all_home_slider_side_banners: async function () {
            let response = await axios.get('/get-home-page-hero-slider-side-banners')
            if (response.data.status === "success") {
                this.home_hero_slider_side_banner = response.data.data
            }
        },
        get_all_top_products_offer: async function () {
            let response = await axios.get('/get-all-top-product-offer?get_all=1')
            if (response.data.status === "success") {
                this.all_top_products_offer = response.data.data
            }
        },
        get_all_category_groups: async function () {
            let response = await axios.get('/get-all-category-groups?get_all=1')
            if (response.data.status === "success") {
                this.all_category_groups = response.data.data
            }
        }

    },
});
