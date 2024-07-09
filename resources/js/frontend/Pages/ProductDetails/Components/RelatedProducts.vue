<template>
    <div class="theme-card creative-card creative-inner related_product_card">
        <h5 class="title-border">Related Products</h5>
        <div class="media-banner plrb-0 b-g-white1 border-0">
            <template v-if="product.related_products?.length">
                <div class="media-banner-box" v-for="item in product.related_products" :key="item.id">
                    <div class="media">
                        <Link :href="`/product-details/${item.slug}`" tabindex="0">
                        <img :src="`/${item.product_image?.url}`" height="100" width="100" class="img-fluid"
                            alt="banner">
                        </Link>
                        <div class="media-body">
                            <div class="media-contant">
                                <div>
                                    <div class="product-detail">
                                        <ul class="rating">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                        </ul>
                                        <Link :href="`product-details/${item.slug}`" tabindex="0">
                                        <p>{{ item.title }}</p>
                                        </Link>
                                        <h6>$ {{ item.current_price }} <span>$ {{ item.customer_sales_price }}</span>
                                        </h6>
                                    </div>
                                    <div class="cart-info">
                                        <button class="tooltip-top add-cartnoty">
                                            <i class="fa fa-shopping-cart"></i>
                                        </button>
                                        <a href="javascript:void(0)" class="add-to-wish tooltip-top">
                                            <i class="add-to-wish fa fa-heart-o"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="tooltip-top">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="#" class="tooltip-top" data-tippy-content="Compare">
                                            <i class="fa fa-recycle"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
            <template v-else>
                <h4 class="text-warning">No Related Product found</h4>
            </template>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        product: Object
    },
}
</script>

<style></style>
