<template>
    <div >
        <div class="tab-from-content">
            <div class="title-icon">
                <h3 class="title">
                    <i class="uil uil-info-circle"></i>Basic Information
                </h3>
            </div>
            <div class="course__form">
                <div class="general_info10">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="ui search focus mt-30 lbel25">
                                <label>Course Title*</label>
                                <div class="ui left icon input swdh19">
                                    <input
                                        class="prompt srch_explore"
                                        v-model="request.title"
                                        type="text"
                                        placeholder="Course title here"
                                        name="title"
                                        data-purpose="edit-course-title"
                                    />
                                </div>
                                <div class="help-block">
                                    (Please make this a maximum of 100
                                    characters and unique.)
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="course_des_textarea mt-30 lbel25">
                                <label>Course Description*</label>
                                <div class="course_des_bg">
                                    <div class="textarea_dt">
                                        <div class="ui form swdh339">
                                            <div class="field">
                                                <textarea
                                                    rows="5"
                                                    name="description"
                                                    v-model="request.descriptions"
                                                    placeholder="Insert your course description"
                                                ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="ui search focus lbel25 mt-30">
                                <label
                                    >What will students learn in your
                                    course?*</label
                                >
                                <div class="ui form swdh30">
                                    <div class="field">
                                        <textarea
                                            rows="3"
                                            name="description"
                                            v-model="request.objectives"
                                            placeholder="What skills students will learn"
                                        ></textarea>
                                    </div>
                                </div>
                                <div class="help-block">
                                    Student will gain this skills, knowledge
                                    after completing this course. (One per
                                    line).
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="ui search focus lbel25 mt-30">
                                <label>Requirements*</label>
                                <div class="ui form swdh30">
                                    <div class="field">
                                        <textarea
                                            rows="3"
                                            name="description"
                                            v-model="request.requirement"
                                            placeholder="Requirements to take this course"
                                        ></textarea>
                                    </div>
                                </div>
                                <div class="help-block">
                                    What knowledge, technology, tools required
                                    by users to start this course. (One per
                                    line).
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="mt-30 lbel25">
                                <label>Course Level*</label>
                            </div>
                            <sui-dropdown
                                selection
                                placeholder="Select Level"
                                class="cntry152 prompt srch_explore"
                                :options="levelOptions"
                                v-model="request.level"
                            />
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="mt-30 lbel25">
                                <label>Course Category*</label>
                            </div>
                            <sui-dropdown
                                multiple
                                fluid
                                placeholder="Select Category"
                                :max-selections="2"
                                class="cntry152 prompt srch_explore"
                                search
                                selection
                                allow-additions
                                :options="categoryOptions"
                                v-model="request.category"
                            />
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="mt-30 lbel25">
                                <label>Start Date*</label>
                            </div>
                            <div>
                                <input type="date" class="input-date" v-model="request.start_date" :min="request.today_date"/>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="mt-30 lbel25">
                                <label>End Date*</label>
                            </div>
                            <input type="date" class="input-date" v-model="request.end_date" :min="request.today_date"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import moment from 'moment';
export default {
    name: "Basic",
    data(){
        return{
            request:{
                category:[],
                level:null,
                title:"",
                descriptions:"",
                objectives:"",
                requirement:"",
                start_date:"",
                end_date:"",
                today_date: moment(new Date()).format("YYYY-MM-DD"),
            },
            levelOptions: [
                {
                    text: "Beginner",
                    value: "beginner",
                },
                {
                    text: "Intermediate",
                    value: "intermediate",
                },
                {
                    text: "Expert",
                    value: "expert",
                },
            ],
            categoryOptions: [],
        }
    },
    async created(){
        try {
            let response = await axios.get(
                `${globalBaseUrl}instructor/get_categories`
            );
            let category = response.data.data;
            this.categoryOptions = category.map((item) => {
                return {
                    text: item.name,
                    value: item.name,
                };
            });
        } catch (error) {
            console.log(error);
        }
    },
    methods:{
        addBasic(){
            if(this.validateData()){
                this.$emit('add-basic',this.request);
            }
        }, 
        validateData() {
            if (this.request.title == "") {
                this.errorToast("Title is Required.");
                return false;
            } else if (this.request.descriptions == "") {
                this.errorToast("Description is required.");
                return false;
            } else if (this.request.objectives == "") {
                this.errorToast("Objective is required.");
                return false;
            } else if (this.request.requirement == "") {
                this.errorToast("Requirement is required.");
                return false;
            } else if (this.request.level == null) {
                this.errorToast("Level is required.");
                return false;
            } else if (this.request.category.length == 0) {
                this.errorToast("Categories are required.");
                return false;
            } else if (this.request.start_date == "") {
                this.errorToast("Start date is required.");
                return false;
            } else if (this.request.end_date == "") {
                this.errorToast("End date is required.");
                return false;
            } 
            return true;
        },
        errorToast(message) {
            Vue.$toast.open({
                message: message,
                type: "error",
                position: "top-right",
            });
        },
    }

};
</script>

<style></style>
