<template>

    <div class="input-box header_search_area">
        <form class="hungry_coder-form">
            <div class="input-group ">
                <div class="input-group-text">
                    <span class="search"><i class="fa fa-search"></i></span>
                </div>
                <input type="search" v-model="search_key" class="form-control" placeholder="Search a Product">
            </div>
        </form>
        <div v-if="search_key.length" class="search_results">
            <div class="search_types">
                <ul>
                    <li><a href="#" @click.prevent="search_type = 'products'"
                            :class="{ active: search_type == 'products', }">Products</a></li>
                    <li><a href="#" @click.prevent="search_type = 'categories'"
                            :class="{ active: search_type == 'categories', }">Categories</a></li>
                    <li><a href="#" @click.prevent="search_type = 'brand'"
                            :class="{ active: search_type == 'brand', }">Brand</a></li>
                    <li><a href="#" @click.prevent="search_type = 'tag'"
                            :class="{ active: search_type == 'tag', }">Tag</a>
                    </li>
                </ul>
            </div>
            <div class="search_items">
                <div class="products" v-if="search_type == 'products'">
                    <template v-if="search_data.product?.length">
                        <div class="search_item" v-for="product in search_data.product" :key="product.id">
                            <a href="#">
                                <div class="left">
                                    <img :src="`${product.product_image?.url}`"
                                        alt="">
                                </div>
                                <div class="right">
                                    <h3 class="product_title">
                                        {{ product.title }}
                                    </h3>
                                    <div class="price">
                                        <div class="old">
                                            {{ product.purchase_price }}৳
                                        </div>
                                        <div class="new">
                                            {{ product.current_price }}৳
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </template>
                    <template v-else>
                        <p class="alert alert-info">No item found in search</p>
                    </template>

                </div>
                <div class="categories" v-if="search_type == 'categories'">
                    <template v-if="search_data.category?.length">
                        <div class="search_item" v-for="category in search_data.category" :key="category.id">
                            <a href="#">
                                <div class="left">
                                    <img :src="`${category.image}`" alt="">
                                </div>
                                <div class="right">
                                    <h3 class="product_title">
                                        {{ category.title }}
                                    </h3>
                                </div>
                            </a>
                        </div>
                    </template>
                    <template v-else>
                        <p class="alert alert-info">No item found in search</p>
                    </template>
                </div>
                <div class="categories" v-if="search_type == 'brand'">
                    <template v-if="search_data.brand?.length">
                        <div class="search_item" v-for="brand in search_data.brand" :key="brand.id">
                            <a href="#">
                                <div class="left">
                                    <img :src="`${brand.image}`" alt="">
                                </div>
                                <div class="right">
                                    <h3 class="product_title">
                                        {{ brand.title }}
                                    </h3>
                                </div>
                            </a>
                        </div>
                    </template>
                    <template v-else>
                        <p class="alert alert-info">No item found in search</p>
                    </template>
                </div>
                <div class="categories" v-if="search_type == 'tag'">
                    <template v-if="search_data.tag?.length">
                        <div class="search_item" v-for="tag in search_data.tag" :key="tag.id">
                            <a href="#">
                                <div class="left">
                                    <img :src="`${tag.image}`" alt="">
                                </div>
                                <div class="right">
                                    <h3 class="product_title">
                                        {{ tag.title }}
                                    </h3>
                                </div>
                            </a>
                        </div>
                    </template>
                    <template v-else>
                        <p class="alert alert-info">No item found in search</p>
                    </template>
                </div>
            </div>
            <div class="search_action">
                <a href="#">See all results</a>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    components: {
    },
    data: () => ({
        search_type: 'products',
        search_key: '',
        search_data: {}
    }),
    methods: {
        global_search: async function (search_key) {
            let response = await axios.get(`/home-page-global-search?search_key=${search_key}`)
            if (response.data.status === "success") {
                this.search_data = response.data.data
            }
            console.log(this.search_data)
        },
    },

    watch: {
        search_key(newVal) {
            clearTimeout(this.searchTimer);
            this.searchTimer = setTimeout(async () => {
                this.global_search(newVal)
            }, 1000);
        }
    },
}
</script>

<style></style>
