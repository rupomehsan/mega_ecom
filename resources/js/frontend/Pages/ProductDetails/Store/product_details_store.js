import { defineStore } from "pinia";

export const useProductDetailsStore = defineStore("useProductDetailsStore", {
    state: () => ({
        slug: '',
        rating: '',
        review: '',
        imageFiles: [],
        imagePreviews: []
    }),
    getters: {},
    actions: {
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
