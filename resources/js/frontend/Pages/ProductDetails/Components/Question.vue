<template>
    <section class="ask-question q-n-r-section bg-white m-tb-15" id="ask-question">
        <div class="card mt-1">
            <div class="card-header">

                <div class=" d-flex gap-3 justify-content-between">
                    <div class="title-n-action">
                        <h2 class="ask_question_heading">Questions & Answers Section</h2>
                    </div>
                    <div class="q-action" v-if="is_auth">
                        <a href="javaScript:void();" class="btn btn-info"
                            @click="is_question_form_show = !is_question_form_show">Ask
                            Question</a>
                    </div>
                </div>

                <div v-if="is_question_form_show">
                    <form @submit.prevent="submitQuestion($event)">
                        <div class="col-md-12">

                            <textarea class="form-control my-2" name="question" id="question"
                                placeholder="Write Your Question Here" rows="6"></textarea>
                        </div>
                        <div class="col-md-12 my-2 d-flex justify-content-center">
                            <button class="btn btn-normal " type="submit">Submit Your Review</button>
                        </div>
                    </form>
                </div>

            </div>
            <hr>
            <div class="card-header d-flex gap-3 justify-content-between">
                <div class="title-n-action">
                    <h2 class="ask_question_heading">Questions (1)</h2>
                    <p class="ask_question_pg p-0 mt-1">Have question about this
                        product? Get specific details about this product from
                        expert.
                    </p>
                </div>
            </div>
            <div class="card-body">
                <div id="question" class="questions">
                    <div class="question-wrap">
                        <p class="author"><span class="name">Fahim Uddin </span> on
                            15 Nov 2023
                        </p>
                        <h3 class="question text-sm">
                            <span class="hint">Q:</span>
                            <span>
                                Assalamu alaikum. Is this AMD Athlon 3000G Processor
                                with Radeon Graphics good for programing. I am a
                                student of CSE.
                            </span>
                        </h3>
                        <p class="answer">
                            <span class="hint">A:</span>
                            <span>
                                Yes sir, you can do Basic programming with AMD
                                Athlon 3000G Processor with Radeon Graphics. But for
                                running heavy programming language, it will depend
                                on your full PC configuration.
                            </span>
                        </p>
                        <p class="author answerer">
                            <span class="fade">By</span>
                            <span>Etek BD Support</span>
                            <span class="fade">15 Nov 2023</span>
                        </p>
                    </div>
                    <div class="text-right"></div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import { useProductDetailsStore } from '../Store/product_details_store.js';
export default {

    data: () => ({
        is_auth: false,
        is_question_form_show: false,
        slug: '',
        product_question_and_answers: [],
    }),

    created() {
        this.get_all_question_and_answers();
        this.is_auth = localStorage.getItem("token") ? true : false;
        let ProductDetailsStore = useProductDetailsStore();
        this.slug = ProductDetailsStore.slug;
    },

    methods: {
        submitQuestion(event) {
            let formData = new FormData(event.target);
            formData.append('slug', this.slug);
            let response = window.privateAxios('/customer-ecommerce-question', 'post', formData);
            if (response.status === "success") {
                window.s_alert(response.data.message);
                this.is_question_form_show = false
            }
        },
        get_all_question_and_answers() {
            let response = window.privateAxios('/get-customer-ecommerce-question-and-answers');
            if (response.status === "success") {
                this.product_question_and_answers = response.data
                console.log(this.product_question_and_answers);
            }
        }

    }
}
</script>

<style></style>
