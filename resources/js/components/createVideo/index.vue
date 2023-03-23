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
                                            <span class="step-name">Media</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab_step3">
                                            <span class="number"></span>
                                            <span class="step-name"
                                                >Curriculum</span
                                            >
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
                                    <div
                                        class="step-tab-panel step-tab-info active"
                                        id="tab_step1"
                                    >
                                        <Basic
                                            ref="basic"
                                            @add-basic="addBasic"
                                        ></Basic>
                                    </div>
                                    <div
                                        class="step-tab-panel step-tab-location"
                                        id="tab_step2"
                                    >
                                        <Media
                                            ref="media"
                                            @add-media="addMedia"
                                        >
                                        </Media>
                                    </div>
                                    
                                    <div
                                        class="step-tab-panel step-tab-gallery"
                                        id="tab_step3"
                                    >
                                        <Curriculum
                                            ref="curriculum"
                                            :video_duration="video_duration"
                                            @add-curriculum="addCurriculum"
                                        ></Curriculum>
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
                                                Students cannot view or take
                                                this course.
                                                <br />
                                                Course will appear on students
                                                dashboard once it is approved.
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
                                        class="btn btn-default steps_btn"
                                        @click="prevStep"
                                        v-if="steps > 1"
                                    >
                                        PREVIOUS
                                    </button>
                                    <button
                                        data-direction="prev"
                                        class="btn btn-default steps_btn prev-btn"
                                        style="visibility: hidden"
                                    >
                                        PREVIOUS
                                    </button>
                                    <button
                                        data-direction="next"
                                        class="btn btn-default steps_btn next-btn"
                                        style="visibility: hidden"
                                    >
                                        Next
                                    </button>
                                    <button
                                        class="btn btn-default steps_btn"
                                        @click="nextStep"
                                        v-if="steps < 4"
                                    >
                                        Next
                                    </button>
                                    <button
                                        data-direction="finish"
                                        @click="addCourse"
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
        <Prompt
            :type="'success'"
            :message="'Your course has been created successfully'"
            @btn-clicked="btnClicked"
        ></Prompt>
    </span>
</template>

<script>
import Basic from "./components/Basic.vue";
import Curriculum from "./components/Curriculum.vue";
import Media from "./components/Media.vue";
import Prompt from "../modals/Prompt.vue";
export default {
    name: "CreateVideo",
    components: {
        Basic,
        Curriculum,
        Media,
        Prompt,
    },
    data() {
        return {
            level: null,
            category: null,
            title: "",
            descriptions: "",
            objectives: "",
            requirement: "",
            start_date: "",
            end_date: "",
            steps: 1,
            questions: [],
            curriculum: [],
            lecture_title: "",
            lecture_description: "",
            lecture_file: null,
            video_type: "mp4",
            thumbnail_file: null,
            video: null,
            video_link: "",
            validation: true,
            video_duration: 0,
        };
    },
    async mounted() {
        $(document).ready(function () {
            $(".ui.dropdown").dropdown();
            $("#add-course-tab").steps({
                onFinish: function () {},
            });

            $(".sortable").sortable();
            $(".sortable").disableSelection();
        });
    },
    methods: {
        addCourse() {
            this.$store.dispatch('toggleLoader',true);
            const config = {
                headers: {
                    "Content-Type": "multipart/form-data",
                },
            };

            let formData = new FormData();
            formData.append('level',this.level);
            this.category.forEach((value, index) => {
                formData.append(`category[${index}]`, value);
            });
            formData.append('title',this.title);
            formData.append('descriptions',this.descriptions);
            formData.append('objectives',this.objectives);
            formData.append('requirement',this.requirement);
            formData.append('start_date',this.start_date);
            formData.append('end_date',this.end_date);
            this.curriculum.forEach((value, index) => {
                formData.append(`curriculum[${index}][name]`, value.name);
                formData.append(`curriculum[${index}][type]`, value.type);
            });
            this.questions.forEach((value, index) => {
                value.options.forEach((option,key)=>{
                    formData.append(`questions[${index}][options][${key}][isCorrect]`, option.isCorrect);
                    formData.append(`questions[${index}][options][${key}][name]`, option.name);
                })    
                formData.append(`questions[${index}][is_hour]`, value.is_hour);
                formData.append(`questions[${index}][name]`, value.name);
                formData.append(`questions[${index}][score]`, value.score);
                if(value.is_hour){
                    formData.append(`questions[${index}][time]`, `${value.time.hh}:${value.time.mm}:${value.time.ss}`);
                }else{
                    formData.append(`questions[${index}][time]`, `${value.time.mm}:${value.time.ss}`);
                }
            });
            formData.append('lecture_title',this.lecture_title);
            formData.append('lecture_description',this.lecture_description);
            formData.append('lecture_file',this.lecture_file);
            formData.append('video_type',this.video_type);
            formData.append('thumbnail_file',this.thumbnail_file);
            formData.append('video',this.video);
            formData.append('video_link',this.video_link);
            // const postData = {
            //         level: this.level,
            //         category: this.category,
            //         title: this.title,
            //         descriptions: this.descriptions,
            //         objectives: this.objectives,
            //         requirement: this.requirement,
            //         start_date: this.start_date,
            //         end_date: this.end_date,
            //         questions: this.questions,
            //         curriculum: this.curriculum,
            //         lecture_title: this.lecture_title,
            //         lecture_description: this.lecture_description,
            //         lecture_file: this.lecture_file,
            //         video_type: this.video_type,
            //         thumbnail_file: this.thumbnail_file,
            //         video: this.video,
            //         video_link: this.video_link,
            //     };
            axios
                .post(`${globalBaseUrl}instructor/add_course`, formData, config)
                .then((response) => {
                    this.$store.dispatch('toggleLoader',false);
                    if (response.data.status == 200) {
                        $(".show-prompt").click();
                    }
                    if (response.data.status == 400) {
                        Vue.$toast.open({
                            message: response.data.message,
                            type: "warning",
                            position: "top-right",
                        });
                    }
                })
                .catch((e) => {
                    this.$store.dispatch('toggleLoader',false);
                    Vue.$toast.open({
                        message: "Something Went Wrong",
                        type: "error",
                        position: "top-right",
                    });
                    console.log(e);
                });
        },
        btnClicked(){
            window.location.reload();
        },
        nextStep() {
            if (this.steps == 1) {
                this.$refs.basic.addBasic();
            }else if (this.steps == 2) {
                this.$refs.media.addMedia();
            } else if (this.steps == 3) {
                this.$refs.curriculum.addRequestCurriculum();
            } 
        },
        prevStep() {
            this.steps--;
            $(window).scrollTop(0);
            $(".prev-btn").click();
        },
        addBasic(request) {
            this.level = request.level;
            this.category = request.category;
            this.title = request.title;
            this.descriptions = request.descriptions;
            this.objectives = request.objectives;
            this.requirement = request.requirement;
            this.start_date = request.start_date;
            this.end_date = request.end_date;
            this.steps++;
            $(".next-btn").click();
            $(window).scrollTop(0);
        },
        addCurriculum(request) {
            this.questions = request.questions;
            this.curriculum = request.curriculum;
            this.lecture_title = request.lecture_title;
            this.lecture_description = request.lecture_description;
            this.lecture_file = request.lecture_file;
            this.steps++;
            $(".next-btn").click();
            $(window).scrollTop(0);
        },
        addMedia(request) {
            this.video_type = request.video_type;
            this.thumbnail = request.thumbnail;
            this.thumbnail_file = request.thumbnail_file;
            this.video = request.video;
            this.video_link = request.video_link;
            this.video_duration = request.video_duration;
            this.steps++;
            $(".next-btn").click();
            $(window).scrollTop(0);
        },
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
