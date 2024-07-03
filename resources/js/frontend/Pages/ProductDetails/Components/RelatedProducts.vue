<template>
    <div class="theme-card creative-card creative-inner related_product_card">
        <h5 class="title-border">Related Products</h5>
        <div class="media-banner plrb-0 b-g-white1 border-0">
            <div class="media-banner-box" v-for="i in 3" :key="i">
                <div class="media">
                    <a href="product-page(left-sidebar).html" tabindex="0">
                        <img :src="`https://themes.pixelstrap.com/bigdeal/assets/images/layout-2/media-banner/${i}.jpg`"
                            class="img-fluid " alt="banner">
                    </a>
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
                                    <a href="product-page(left-sidebar).html" tabindex="0">
                                        <p>sumsung galaxy</p>
                                    </a>
                                    <h6>$47.05 <span>$55.21</span></h6>
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
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style></style>
