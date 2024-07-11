<template>
    <div class="my-3">
        <div class="row">
            <div class="col-lg-12">
                <div>

                    <h3 class="alert-secondary px-2 py-2 mb-1">Customer Reviews</h3>
                </div>
                <div v-for="review in product.product_reviews" :key="review.id" class="card review-card mb-3">
                    <div class="row g-0">
                        <div class="col-md-12">
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2 text-muted">
                                    <span>Reviewed by</span>
                                    <span class="fw-bold mx-2"> {{ review.user?.name }}
                                    </span> on {{ new Date(review.created_at).toDateString() }}
                                </h6>
                                <p class="card-text">{{ review.description }}</p>
                                <div class="rating">
                                    <span v-for="n in 5" :key="n" class="star"
                                        :class="{ filled: n <= review.rating }">&#9733;</span>
                                </div>
                                <div class="additional-images mt-3">

                                    <a v-for="(imageItem, index) in review.product_review_images" :key="index"
                                        :href="`/${imageItem.image}`" data-lightbox="image-set"
                                        :data-title="`Additional image ${index + 1}`">
                                        <img :src="imageItem.image ? `/${imageItem.image}` : ''"
                                            class="img-thumbnail product-image-small"
                                            :alt="`Additional image ${index + 1}`">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>


export default {

    props: {
        product: Object
    },
    data() {
        return {
            reviews: [
                {
                    id: 1,
                    productName: 'Product Name 1',
                    reviewer: 'John Doe',
                    date: 'July 1, 2024',
                    text: 'This is an excellent product! Highly recommend it to everyone.',
                    rating: 4,
                    images: [
                        'path/to/product-image1.jpg',
                        'path/to/additional-image1-1.jpg',
                        'path/to/additional-image1-2.jpg'
                    ]
                },
                {
                    id: 2,
                    productName: 'Product Name 2',
                    reviewer: 'Jane Smith',
                    date: 'July 3, 2024',
                    text: 'Good value for money. A solid choice for budget-conscious buyers.',
                    rating: 3,
                    images: [
                        'path/to/product-image2.jpg',
                        'path/to/additional-image2-1.jpg',
                        'path/to/additional-image2-2.jpg'
                    ]
                },
                {
                    id: 3,
                    productName: 'Product Name 3',
                    reviewer: 'Alice Brown',
                    date: 'July 5, 2024',
                    text: 'The product has a few issues, but overall it works well.',
                    rating: 2,
                    images: [
                        'path/to/product-image3.jpg',
                        'path/to/additional-image3-1.jpg',
                        'path/to/additional-image3-2.jpg'
                    ]
                }
            ]
        };
    },

    created() {
        // console.log(this.product);
    }
};
</script>

<style scoped>
.review-card {
    margin-bottom: 20px;
}

.rating {
    color: gold;
}

.product-image {
    max-width: 150px;
    margin-right: 20px;
}

.product-image-small {
    max-width: 70px;
    margin-right: 10px;
    margin-bottom: 10px;
}

.star {
    font-size: 1.5em;
    color: lightgray;
}

.star.filled {
    color: gold;
}
</style>
