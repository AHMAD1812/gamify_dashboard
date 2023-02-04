<template>
    <span>
        <div class="sa4d25">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="st_title">
                            <i class="uil uil-video"></i> Create new interactive
                            video
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="course_tabs_1">
                            <div id="add-course-tab" class="step-app">
                                <ul class="step-steps">
                                    <li class="active">
                                        <a href="#tab_step1">
                                            <span class="number"></span>
                                            <span class="step-name">Basic</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab_step2">
                                            <span class="number"></span>
                                            <span class="step-name"
                                                >Curriculum</span
                                            >
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab_step3">
                                            <span class="number"></span>
                                            <span class="step-name">Media</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#tab_step5">
                                            <span class="number"></span>
                                            <span class="step-name"
                                                >Publish</span
                                            >
                                        </a>
                                    </li>
                                </ul>
                                <div class="step-content">
                                    <div class="step-tab-panel step-tab-info active" id="tab_step1">
                                        <Basic></Basic>
                                    </div>
                                    <div class="step-tab-panel step-tab-gallery" id="tab_step2">
                                        <Curriculum></Curriculum>
                                    </div>
                                    <div class="step-tab-panel step-tab-location" id="tab_step3">
                                        <Media></Media>
                                    </div>
                                    <div
                                        class="step-tab-panel step-tab-location"
                                        id="tab_step5"
                                    >
                                        <div class="tab-from-content">
                                            <div class="title-icon">
                                                <h3 class="title">
                                                    <i
                                                        class="uil uil-upload"
                                                    ></i
                                                    >Submit
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="publish-block">
                                            <i class="far fa-edit"></i>
                                            <p>
                                                Your course is in a draft state.
                                                Students cannot view or take this course. 
                                                <br/>
                                                Course will appear on students dashboard once it is approved.
                                            </p>
                                        </div>
                                    </div>
                                    
                                    <!-- <div
                                        class="step-tab-panel step-tab-amenities"
                                        id="tab_step4"
                                    >
                                        <div class="tab-from-content">
                                            <div class="title-icon">
                                                <h3 class="title">
                                                    <i
                                                        class="uil uil-usd-square"
                                                    ></i
                                                    >Price
                                                </h3>
                                            </div>
                                            <div class="course__form">
                                                <div class="price-block">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div
                                                                class="course-main-tabs"
                                                            >
                                                                <div
                                                                    class="nav nav-pills flex-column flex-sm-row nav-tabs"
                                                                    role="tablist"
                                                                >
                                                                    <a
                                                                        class="flex-sm-fill text-sm-center nav-link active"
                                                                        data-toggle="tab"
                                                                        href="#nav-free"
                                                                        role="tab"
                                                                        aria-selected="true"
                                                                        ><i
                                                                            class="fas fa-tag mr-2"
                                                                        ></i
                                                                        >Free</a
                                                                    >
                                                                    <a
                                                                        class="flex-sm-fill text-sm-center nav-link"
                                                                        data-toggle="tab"
                                                                        href="#nav-paid"
                                                                        role="tab"
                                                                        aria-selected="false"
                                                                        ><i
                                                                            class="fas fa-cart-arrow-down mr-2"
                                                                        ></i
                                                                        >Paid</a
                                                                    >
                                                                </div>
                                                                <div
                                                                    class="tab-content"
                                                                >
                                                                    <div
                                                                        class="tab-pane fade show active"
                                                                        id="nav-free"
                                                                        role="tabpanel"
                                                                    >
                                                                        <div
                                                                            class="price-require-dt"
                                                                        >
                                                                            <div
                                                                                class="cogs-toggle center_d"
                                                                            >
                                                                                <label
                                                                                    class="switch"
                                                                                >
                                                                                    <input
                                                                                        type="checkbox"
                                                                                        id="require_login"
                                                                                        value=""
                                                                                    />
                                                                                    <span></span>
                                                                                </label>
                                                                                <label
                                                                                    for="require_login"
                                                                                    class="lbl-quiz"
                                                                                    >Require
                                                                                    Log
                                                                                    In</label
                                                                                >
                                                                            </div>
                                                                            <div
                                                                                class="cogs-toggle center_d mt-3"
                                                                            >
                                                                                <label
                                                                                    class="switch"
                                                                                >
                                                                                    <input
                                                                                        type="checkbox"
                                                                                        id="require_enroll"
                                                                                        value=""
                                                                                    />
                                                                                    <span></span>
                                                                                </label>
                                                                                <label
                                                                                    for="require_enroll"
                                                                                    class="lbl-quiz"
                                                                                    >Require
                                                                                    Enroll</label
                                                                                >
                                                                            </div>
                                                                            <p>
                                                                                If
                                                                                the
                                                                                course
                                                                                is
                                                                                free,
                                                                                if
                                                                                student
                                                                                require
                                                                                to
                                                                                enroll
                                                                                your
                                                                                course,
                                                                                if
                                                                                not
                                                                                required
                                                                                enroll,
                                                                                if
                                                                                students
                                                                                required
                                                                                sign
                                                                                in
                                                                                to
                                                                                your
                                                                                website
                                                                                to
                                                                                take
                                                                                this
                                                                                course.
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="tab-pane"
                                                                        id="nav-paid"
                                                                        role="tabpanel"
                                                                    >
                                                                        <div
                                                                            class="license_pricing mt-30"
                                                                        >
                                                                            <label
                                                                                class="label25"
                                                                                >Regular
                                                                                Price*</label
                                                                            >
                                                                            <div
                                                                                class="row"
                                                                            >
                                                                                <div
                                                                                    class="col-lg-4 col-md-6 col-sm-6"
                                                                                >
                                                                                    <div
                                                                                        class="loc_group"
                                                                                    >
                                                                                        <div
                                                                                            class="ui left icon input swdh19"
                                                                                        >
                                                                                            <input
                                                                                                class="prompt srch_explore"
                                                                                                type="text"
                                                                                                placeholder="$0"
                                                                                                name=""
                                                                                                id=""
                                                                                                value=""
                                                                                            />
                                                                                        </div>
                                                                                        <span
                                                                                            class="slry-dt"
                                                                                            >USD</span
                                                                                        >
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="license_pricing mt-30 mb-30"
                                                                        >
                                                                            <label
                                                                                class="label25"
                                                                                >Discount
                                                                                Price*</label
                                                                            >
                                                                            <div
                                                                                class="row"
                                                                            >
                                                                                <div
                                                                                    class="col-lg-4 col-md-6 col-sm-6"
                                                                                >
                                                                                    <div
                                                                                        class="loc_group"
                                                                                    >
                                                                                        <div
                                                                                            class="ui left icon input swdh19"
                                                                                        >
                                                                                            <input
                                                                                                class="prompt srch_explore"
                                                                                                type="text"
                                                                                                placeholder="$0"
                                                                                                name=""
                                                                                                id=""
                                                                                                value=""
                                                                                            />
                                                                                        </div>
                                                                                        <span
                                                                                            class="slry-dt"
                                                                                            >USD</span
                                                                                        >
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="step-footer step-tab-pager">
                                    <button
                                        data-direction="prev"
                                        class="btn btn-default steps_btn"
                                    >
                                        PREVIOUS
                                    </button>
                                    <button
                                        data-direction="next"
                                        v-if="validation"
                                        class="btn btn-default steps_btn"
                                    >
                                        Next
                                    </button>
                                    <button
                                        v-else
                                        class="btn btn-default steps_btn"
                                    >
                                        Next
                                    </button>
                                    <button
                                        data-direction="finish"
                                        class="btn btn-default steps_btn"
                                    >
                                        Submit for Review
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </span>
</template>

<script>
import Basic from './components/Basic.vue';
import Curriculum from './components/Curriculum.vue';
import Media from './components/Media.vue';
export default {
    name: "CreateVideo",
    components:{
        Basic,
        Curriculum,
        Media,
    },
    data() {
        return {
            level: null,
            category: null,
            steps: "",
            validation:true,
        };
    },
    async mounted() {
        $(document).ready(function () {
            $(".ui.dropdown").dropdown();
            this.steps = $("#add-course-tab").steps({
                onFinish: function () {
                    alert("Course Created");
                    window.location.reload();
                },
            });

            $(".sortable").sortable();
            $(".sortable").disableSelection();
        });
    },
    methods: {
    },
};
</script>

<style>
.vue__time-picker input {
    font-size: 14px !important;
    font-weight: 400 !important;
    width: 100% !important;
    border: 1px solid #efefef !important;
    height: 40px !important;
    padding: 0 16px !important;
    background: #fff !important;
    border-radius: 3px !important;
    box-shadow: inset 0px 1px 4px rgb(0 0 0 / 2%) !important;
}
</style>
