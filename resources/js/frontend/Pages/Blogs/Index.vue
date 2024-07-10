<template>
    <Layout>
        <div class="breadcrumb-main ">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="breadcrumb-contain">
                            <div>
                                <h2>Blogs</h2>
                                <ul>
                                    <li>
                                        <Link href="/">home</Link>
                                    </li>
                                    <li><i class="fa fa-angle-double-right"></i></li>
                                    <li>
                                        <Link href="/blogs">blogs</Link>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="section-big-py-space blog-page ratio2_3">
            <div class="custom-container">
                <div class="row">
                    <div class="col-xl-9 col-lg-8 col-md-7">
                        <div class="row blog-media">
                            <div class="col-xl-6">
                                <div class="blog-left">
                                    <a href="javascript:void(0)"><img src="/frontend/assets/images/blog/1.jpg"
                                            class="img-fluid  " alt=""></a>
                                    <div class="date-label">
                                        26 nov 2019
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="blog-right">
                                    <div>
                                        <a href="javascript:void(0)">
                                            <h4>you how all this mistaken idea of denouncing pleasure and praising pain
                                                was born.</h4>
                                        </a>
                                        <ul class="post-social">
                                            <li>Posted By : Admin Admin</li>
                                            <li><i class="fa fa-heart"></i> 5 Hits</li>
                                            <li><i class="fa fa-comments"></i> 10 Comment</li>
                                        </ul>
                                        <p>Consequences that are extremely painful. Nor again is there anyone who loves
                                            or pursues or desires to obtain pain of itself, because it is pain, but
                                            because occasionally circumstances occur in which toil and pain can procure
                                            him some great pleasure.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-5 order-sec">
                        <div class="blog-sidebar">
                            <div class="theme-card">
                                <h4>Recent Blog</h4>
                                <ul class="recent-blog">
                                    <li>
                                        <div class="media"> <img class="img-fluid "
                                                src="/frontend/assets/images/blog/1.jpg"
                                                alt="Generic placeholder image">
                                            <div class="media-body align-self-center">
                                                <h6>25 Dec 2018</h6>
                                                <p>0 hits</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="theme-card">
                                <h4>Popular Blog</h4>
                                <ul class="popular-blog">
                                    <li>
                                        <div class="media">
                                            <div class="blog-date"><span>03 </span><span>may</span></div>
                                            <div class="media-body align-self-center">
                                                <h6>Injected humour the like</h6>
                                                <p>0 hits</p>
                                            </div>
                                        </div>
                                        <p>it look like readable English. Many desktop publishing text.</p>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <div class="blog-date"><span>03 </span><span>may</span></div>
                                            <div class="media-body align-self-center">
                                                <h6>Injected humour the like</h6>
                                                <p>0 hits</p>
                                            </div>
                                        </div>
                                        <p>it look like readable English. Many desktop publishing text.</p>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <div class="blog-date"><span>03 </span><span>may</span></div>
                                            <div class="media-body align-self-center">
                                                <h6>Injected humour the like</h6>
                                                <p>0 hits</p>
                                            </div>
                                        </div>
                                        <p>it look like readable English. Many desktop publishing text.</p>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <div class="blog-date"><span>03 </span><span>may</span></div>
                                            <div class="media-body align-self-center">
                                                <h6>Injected humour the like</h6>
                                                <p>0 hits</p>
                                            </div>
                                        </div>
                                        <p>it look like readable English. Many desktop publishing text.</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </Layout>
</template>

<script>
import Layout from "../../Shared/Layout.vue";
export default {
    data() {
        return {
            userData: [],
        };
    },
    components: { Layout },
    props: ["users"],
    created: function () {
        this.userData = this.users;
    }
};
</script>

<style></style>
