import axios from "axios";
import { defineStore } from "pinia";

export const useProductDetailsStore = defineStore("useProductDetailsStore", {
    state: () => ({
        product_details: {},
        product_question_and_answers: [],
        slug: '',
        rating: '',
        review: '',
        imageFiles: [],
        imagePreviews: []
    }),
    getters: {},
    actions: {
        async getProductDetails(slug) {
            try {
                const response = await axios.get(`/product-details/${slug} }`);
                this.product_details = response.data;
                this.slug = response.data.data.slug;
            } catch (error) {
                console.error('There was an error!', error);
            }
        },



        // get_all_question_and_answers: async function () {
        //     try {
        //         let response = await window.privateAxios('/get-customer-ecommerce-question-and-answers');
        //         if (response.status === "success") {
        //             this.product_question_and_answers = response.data

        //         }
        //     }
        //     catch (error) {
        //         console.log(error);
        //     }
        // },

        // submitQuestion(event) {
        //     let formData = new FormData(event.target);
        //     formData.append('slug', this.slug);
        //     let response = window.privateAxios('/customer-ecommerce-question', 'post', formData);
        //     if (response.status === "success") {
        //         window.s_alert(response.data.message);
        //         this.is_question_form_show = false
        //         this.get_all_question_and_answers();
        //     }
        // },

        async submitReview() {
            const formData = new FormData();
            formData.append('rating', this.rating);
            formData.append('review', this.review);
            formData.append('slug', this.slug);
            this.imageFiles.forEach((file, index) => {
                formData.append(`review_images[${index}]`, file);
            });
            try {
                const response = await window.privateAxios('/submit-product-review', 'post', formData);

                if (response.status === "success") {
                    window.s_alert(response.message);
                    this.rating = 0;
                    this.review = '';
                    this.imageFiles = [];
                    this.imagePreviews = [];
                }


            } catch (error) {
                console.error('There was an error!', error);
            }
        },
        setRating(rating) {
            this.rating = rating;
        },
        addImageFile(file) {
            this.imageFiles.push(file);
        },
        addImagePreview(preview) {
            this.imagePreviews.push(preview);
        },
        removeImageFile(index) {
            this.imageFiles.splice(index, 1);
        },
        setReview(review) {
            this.review = review;
        }
    }
});
