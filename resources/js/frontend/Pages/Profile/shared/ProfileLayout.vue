<template>
    <Layout>
        <div id="customer-dashboard" class="d-none">
            <div class="breadcrumb-main py-3">
                <div class="container">
                    <BreadCumb :bread_cumb="bread_cumb" />
                </div>
            </div>
            <section class="section-big-py-space b-g-light">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <ProfileNav :userInfo="userInfo" />
                        </div>
                        <div class="col-lg-9">
                            <div class="dashboard-right">
                                <slot />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </Layout>
</template>

<script>

import BreadCumb from "../../../Components/BreadCumb.vue";
import Layout from "../../../Shared/Layout.vue";
import ProfileNav from "./ProfileNav.vue";

import { auth_store } from "../../../Store/auth_store.js";

export default {
    components: { Layout, ProfileNav, BreadCumb },
    props: {
        bread_cumb: {
            required: true,
            type: Array,
            default: [],
        },


    },
    data: () => ({
        userInfo: {},
    }),

    created: async function () {


        const authStore = auth_store();
        await authStore.check_is_auth();
        this.userInfo = authStore.auth_info;


        if (!authStore.is_auth) {
            this.$inertia.visit('/login');
        } else {
            this.userInfo = { ...authStore.auth_info }; // Ensure reactivity
            document.getElementById("customer-dashboard").classList.remove("d-none");
        }

    },

};
</script>

<style></style>
