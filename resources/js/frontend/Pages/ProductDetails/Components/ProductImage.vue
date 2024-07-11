<template>
    <template v-if="product.product_images.length > 0">
        <img :src="check_image_url(product.product_images[0].url)" alt="" class="img-fluid image_zoom_cls-0" />
    </template>
</template>

<script>
export default {
    props: ["product"],
    methods: {
        check_image_url: function (url) {
            try {
                new URL(url);
                return url;
            } catch (e) {
                return "/" + url;
            }
        },
    }
}
</script>

<style></style>
