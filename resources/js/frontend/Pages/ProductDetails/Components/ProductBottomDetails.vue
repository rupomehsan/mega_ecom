<template>
    <section class="tab-product tab-exes creative-card creative-inner">
        <div class="row">
            <div class="col-xl-8">
                <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="top-home-tab" data-bs-toggle="tab" href="#top-home" role="tab"
                            aria-selected="false">
                            <i class="icofont icofont-ui-home"></i>
                            Specifications
                        </a>
                        <div class="material-border"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="profile-top-tab" data-bs-toggle="tab" href="#top-profile"
                            role="tab" aria-selected="true">
                            <i class="icofont icofont-man-in-glasses"></i>
                            Details
                        </a>
                        <div class="material-border"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-top-tab" data-bs-toggle="tab" href="#top-contact" role="tab"
                            aria-selected="false">
                            <i class="icofont icofont-contacts"></i>
                            Video
                        </a>
                        <div class="material-border"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="review-top-tab" data-bs-toggle="tab" href="#top-review" role="tab"
                            aria-selected="false">
                            <i class="icofont icofont-contacts"></i>
                            Write Review
                        </a>
                        <div class="material-border"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="question-top-tab" data-bs-toggle="tab" href="#top-question" role="tab"
                            aria-selected="false">
                            <i class="icon icon-contacts"></i>
                            Questions
                        </a>
                        <div class="material-border"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="policy-top-tab" data-bs-toggle="tab" href="#top-policy" role="tab"
                            aria-selected="false">
                            <i class="icofont icofont-contacts"></i>
                            Waranty policy
                        </a>
                        <div class="material-border"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="bestproduct-top-tab" data-bs-toggle="tab" href="#top-bestproduct"
                            role="tab" aria-selected="false">
                            <i class="icofont icofont-contacts"></i>
                            Best products
                        </a>
                        <div class="material-border"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pricereview-top-tab" data-bs-toggle="tab" href="#top-pricereview"
                            role="tab" aria-selected="false">
                            <i class="icofont icofont-contacts"></i>
                            Price Review
                        </a>
                        <div class="material-border"></div>
                    </li>
                </ul>
                <div class="tab-content nav-material" id="top-tabContent">
                    <div class="tab-pane fade" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                        <table class="data-table flex-table" cellpadding="0" cellspacing="0">
                            <colgroup>
                                <col class="name" />
                                <col class="value" />
                            </colgroup>
                            <thead>
                                <tr>
                                    <td class="heading-row py-2" colspan="3">
                                        <b>
                                            Lense
                                        </b>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="name">Focal Length</td>
                                    <td class="value">3.6mm</td>
                                </tr>
                                <tr>
                                    <td class="name">Angle of View</td>
                                    <td class="value">93°(H), 48°(V), 115°(D), 355°Pan &amp; -5~80°Tilt
                                    </td>
                                </tr>
                                <tr>
                                    <td class="name">Others</td>
                                    <td class="value">Night Vision: 10m(33ft) Distance<br /></td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <td class="heading-row py-2" colspan="3">
                                        <b>
                                            Physical Specification
                                        </b>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="name">Dimension</td>
                                    <td class="value">106.1 × 77.4× 77.4mm (4.17× 3.04 × 3.04 inch)</td>
                                </tr>
                                <tr>
                                    <td class="name">Weight</td>
                                    <td class="value">238g (0.52lb)</td>
                                </tr>
                                <tr>
                                    <td class="name">Power</td>
                                    <td class="value">
                                        DC 5V1A Power Supply<br />
                                        Power Consumption:&lt; 3.5W
                                    </td>
                                </tr>
                                <tr>
                                    <td class="name">Interface</td>
                                    <td class="value">
                                        Micro SD Card Slot (up to 256GB)<br />
                                        Built-in Mic &amp; Speaker<br />
                                        Reset Button
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade active show" id="top-profile" role="tabpanel"
                        aria-labelledby="profile-top-tab">
                        <div v-html="product.description"></div>
                    </div>
                    <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                        <div class="mt-3 text-center" v-if="video_url">
                            <iframe width="560" height="315" :src="video_url" allow="autoplay; encrypted-media"
                                allowfullscreen=""></iframe>
                        </div>
                        <div class="mt-3 text-center" v-else>
                            No video found
                        </div>
                    </div>
                    <div class="tab-pane fade" id="top-review" role="tabpanel" aria-labelledby="review-top-tab">
                        <write-review></write-review>
                    </div>
                    <div class="tab-pane fade" id="top-question" role="tabpanel" aria-labelledby="question-top-tab">
                      <question></question>
                    </div>
                    <div class="tab-pane fade" id="top-policy" role="tabpanel" aria-labelledby="policy-top-tab">
                        <p>
                           {{ product.warranty_policy }}
                        </p>
                    </div>
                    <div class="tab-pane fade" id="top-bestproduct" role="tabpanel"
                        aria-labelledby="bestproduct-top-tab">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td colspan="5"><strong>Product Details</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="compare-name">
                                        <td>Product</td>
                                        <td>
                                            <a href="https://www.ultratech.com.bd/intel-core-i5-3470-3rd-gen-processor"><strong>Intel
                                                    Core i5-3470 3rd Gen Processor</strong></a>
                                        </td>
                                        <td>
                                            <a
                                                href="https://www.ultratech.com.bd/intel-core-i5-2400-2nd-gen-310-ghz-processor"><strong>Intel
                                                    Core i5-2400 2nd Gen 3.10 GHz Processor</strong></a>
                                        </td>
                                        <td>
                                            <a
                                                href="https://www.ultratech.com.bd/intel-core-i3-6100-6th-gen-processor-bulk"><strong>Intel
                                                    Core i3 6100 6th Gen Processor (Bulk)</strong></a>
                                        </td>
                                        <td>
                                            <a
                                                href="https://www.ultratech.com.bd/intel-core-i5-4460-4th-generation-32-ghz-processor-tray"><strong>Intel
                                                    Core i5 4460 4th Generation 3.2 GHz Processor
                                                    TRAY</strong></a>
                                        </td>
                                    </tr>
                                    <tr class="compare-image">
                                        <td>Image</td>
                                        <td class="text-left">
                                            <img src="https://www.ultratech.com.bd/image/cache/catalog/products_2023/intel-core-i5-3470-3rd-gen-processor-90x90.jpg.webp"
                                                alt="Intel Core i5-3470 3rd Gen Processor"
                                                title="Intel Core i5-3470 3rd Gen Processor" class="img-thumbnail" />
                                        </td>
                                        <td class="text-left">
                                            <img src="https://www.ultratech.com.bd/image/cache/catalog/products_2023/intel-core-i5-2400-2nd-gen-310-ghz-processor-90x90.jpg.webp"
                                                alt="Intel Core i5-2400 2nd Gen 3.10 GHz Processor"
                                                title="Intel Core i5-2400 2nd Gen 3.10 GHz Processor"
                                                class="img-thumbnail" />
                                        </td>
                                        <td class="text-left">
                                            <img src="https://www.ultratech.com.bd/image/cache/catalog/processor/intel/core-i3-6100/intel-core-i3-6100-6th-gen-processor-bulk-90x90.jpg.webp"
                                                alt="Intel Core i3 6100 6th Gen Processor (Bulk)"
                                                title="Intel Core i3 6100 6th Gen Processor (Bulk)"
                                                class="img-thumbnail" />
                                        </td>
                                        <td class="text-left">
                                            <img src="https://www.ultratech.com.bd/image/cache/catalog/processor/intel%20/core-i5-4460/intel-core-i5-4460-4th-generation-32-ghz-processor-tray-90x90.jpg.webp"
                                                alt="Intel Core i5 4460 4th Generation 3.2 GHz Processor TRAY"
                                                title="Intel Core i5 4460 4th Generation 3.2 GHz Processor TRAY"
                                                class="img-thumbnail" />
                                        </td>
                                    </tr>
                                    <tr class="compare-price">
                                        <td>Price</td>
                                        <td class=""><del>2,500৳</del> 1,900৳</td>
                                        <td class=""><del>2,500৳</del> 1,500৳</td>
                                        <td class=""><del>5,200৳</del> 2,400৳</td>
                                        <td class=""><del>4,800৳</del> 2,500৳</td>
                                    </tr>
                                    <tr class="compare-model">
                                        <td>Model</td>
                                        <td>Core i5-3470</td>
                                        <td>Core i5-2400</td>
                                        <td>6100</td>
                                        <td>Core i5 4460</td>
                                    </tr>
                                    <tr class="compare-manufacturer">
                                        <td>Brand</td>
                                        <td>Intel</td>
                                        <td>Intel</td>
                                        <td>Intel</td>
                                        <td>Intel</td>
                                    </tr>
                                    <tr class="compare-availability">
                                        <td>Availability</td>
                                        <td>In Stock</td>
                                        <td>In Stock</td>
                                        <td>In Stock</td>
                                        <td>In Stock</td>
                                    </tr>
                                    <tr class="compare-rating">
                                        <td>Rating</td>
                                        <td class="rating">
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                    class="fa fa-star-o fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                    class="fa fa-star-o fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                    class="fa fa-star-o fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                    class="fa fa-star-o fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                    class="fa fa-star-o fa-stack-2x"></i></span> <br />
                                            Based on 1 reviews.
                                        </td>
                                        <td class="rating">
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                    class="fa fa-star-o fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                    class="fa fa-star-o fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                    class="fa fa-star-o fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                    class="fa fa-star-o fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                    class="fa fa-star-o fa-stack-2x"></i></span> <br />
                                            Based on 1 reviews.
                                        </td>
                                        <td class="rating">
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                    class="fa fa-star-o fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                    class="fa fa-star-o fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                    class="fa fa-star-o fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                    class="fa fa-star-o fa-stack-2x"></i></span> <span
                                                class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                            <br />
                                            Based on 2 reviews.
                                        </td>
                                        <td class="rating">
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                    class="fa fa-star-o fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                    class="fa fa-star-o fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                    class="fa fa-star-o fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                    class="fa fa-star-o fa-stack-2x"></i></span>
                                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                    class="fa fa-star-o fa-stack-2x"></i></span> <br />
                                            Based on 1 reviews.
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td class="out-of-stock">
                                            <div class="compare-buttons">
                                                <button class="btn btn-primary btn-cart"
                                                    onclick="cart.add('7955', '1');"><span>Add to
                                                        Cart</span></button>
                                            </div>
                                        </td>
                                        <td class="out-of-stock">
                                            <div class="compare-buttons">
                                                <button class="btn btn-primary btn-cart"
                                                    onclick="cart.add('7956', '1');"><span>Add to
                                                        Cart</span></button>
                                            </div>
                                        </td>
                                        <td class="out-of-stock">
                                            <div class="compare-buttons">
                                                <button class="btn btn-primary btn-cart"
                                                    onclick="cart.add('1333', '1');"><span>Add to
                                                        Cart</span></button>
                                            </div>
                                        </td>
                                        <td class="out-of-stock">
                                            <div class="compare-buttons">
                                                <button class="btn btn-primary btn-cart"
                                                    onclick="cart.add('5549', '1');"><span>Add to
                                                        Cart</span></button>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="top-pricereview" role="tabpanel"
                        aria-labelledby="pricereview-top-tab">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td class="compatibility-table-name">
                                        <strong>Best intel Processor Series Price list 2024</strong>
                                    </td>
                                    <td class="compatibility-table-price"><strong>Price</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="i in 10" :key="i">
                                    <td class="compatibility-table-name">
                                        <a href="#" class="compatibility_product_title">Intel Core i5
                                            6500 6th gen 3.20GHz Processor (Tray)</a>
                                    </td>
                                    <td class="compatibility-table-price">
                                        <p class="price">
                                            <span class="new">4,300৳</span>
                                            <span class="old">6,800৳</span>
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <hr class="my-3">
            <div class="col-xl-4">
                <related-products :product="product"></related-products>
            </div>
        </div>
    </section>
</template>

<script>
import Question from './Question.vue';
import RelatedProducts from './RelatedProducts.vue';
import WriteReview from './WriteReview.vue';
export default {
    props: {
        product: Object
    },
    components: { RelatedProducts, WriteReview, Question },
    data: () => ({
        video_url: '',
        is_auth: false
    }),
    created: function () {
        this.video_url = this.getEmbedUrl(this.product.video_url);
        this.is_auth = localStorage.getItem("token") ? true : false;
    },
    methods: {
        getEmbedUrl(url) {
            if (url) {
                const videoId = url.split('v=')[1];
                return `https://www.youtube.com/embed/${videoId}`;
            }

        }
    }

}
</script>

<style></style>
