import axios from "axios";
import { defineStore } from "pinia";

export const product_store = defineStore("product_store", {
    state: () => ({
        slug: '',
        offer_products: [],
        category_group_products: [],
    }),
    getters: {},
    actions: {
        /**
        ## Product information
        ## start
        **/
        get_all_top_offer_products_by_offer_id: async function (url) {
            if (url) {
                let response = await axios.get(url);
                this.offer_products = response.data.data;
            } else {
                let response = await axios.get(`/get-all-top-products-offer-by-offer-id/${this.slug}`)
                if (response.data.status === "success") {
                    this.offer_products = response.data.data
                }
            }

            console.log(this.search_data)
        },
        get_all_products_and_single_group_by_category_group_id: async function (url) {
            if (url) {
                let response = await axios.get(url);
                this.category_group_products = response.data.data;
            } else {
                let response = await axios.get(`/get-all-products-and-single-group-by-category-group-id/${this.slug}`)
                if (response.data.status === "success") {
                    this.category_group_products = response.data.data
                }
            }

            console.log(this.search_data)
        },
        /**
        ## Product information
        ## end
        **/



    }
});
