<template>
    <div class="sa4d25">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="st_title">
                        <i class="uil uil-book-alt"></i>Courses
                    </h2>
                </div>
                <div class="col-md-12">
                    <div class="card_dash1">
                        <div class="card_dash_left1">
                            <i class="uil uil-book-alt"></i>
                            <h1>Jump Into Interactive Video Creation</h1>
                        </div>
                        <div class="card_dash_right1">
                            <button
                                class="create_btn_dash"
                                @click="navigate()"
                            >
                                Create Your Video
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="my_courses_tabs">
                        <ul
                            class="nav nav-pills my_crse_nav"
                            id="pills-tab"
                            role="tablist"
                        >
                            <li class="nav-item">
                                <a
                                    class="nav-link active"
                                    id="pills-my-courses-tab"
                                    data-toggle="pill"
                                    href="#pills-my-courses"
                                    role="tab"
                                    aria-controls="pills-my-courses"
                                    aria-selected="true"
                                    ><i class="uil uil-book-alt"></i>My
                                    Courses</a
                                >
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    id="pills-upcoming-courses-tab"
                                    data-toggle="pill"
                                    href="#pills-upcoming-courses"
                                    role="tab"
                                    aria-controls="pills-upcoming-courses"
                                    aria-selected="false"
                                    ><i class="uil uil-upload-alt"></i>Expired
                                    Courses</a
                                >
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    id="pills-promotions-tab"
                                    data-toggle="pill"
                                    href="#pills-promotions"
                                    role="tab"
                                    aria-controls="pills-promotions"
                                    aria-selected="false"
                                    ><i class="uil uil-megaphone"></i
                                    >Promotions</a
                                >
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div
                                class="tab-pane fade show active"
                                id="pills-my-courses"
                                role="tabpanel"
                            >
                                <div class="table-responsive mt-30">
                                    <table class="table ucp-table">
                                        <thead class="thead-s">
                                            <tr>
                                                <th
                                                    class="text-center"
                                                    scope="col"
                                                >
                                                    Item No.
                                                </th>
                                                <th>Title</th>
                                                <th
                                                    class="text-center"
                                                    scope="col"
                                                >
                                                    Publish Date
                                                </th>
                                                <th
                                                    class="text-center"
                                                    scope="col"
                                                >
                                                    Total Students
                                                </th>
                                                <th
                                                    class="text-center"
                                                    scope="col"
                                                >
                                                    Rating
                                                </th>
                                                <th
                                                    class="text-center"
                                                    scope="col"
                                                >
                                                    Course Level
                                                </th>
                                                <th
                                                    class="text-center"
                                                    scope="col"
                                                >
                                                    Status
                                                </th>
                                                <th
                                                    class="text-center"
                                                    scope="col"
                                                >
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-if="!loading && courses.length == 0">
                                                <td colspan="8">
                                                    <UnavailableData
                                                        :message="'No courses found'"
                                                    ></UnavailableData>
                                                </td>
                                            </tr>
                                            <tr
                                                v-for="(course,key) in courses"
                                                :key="`courses_${key}`">
                                                <td class="text-center">
                                                    CR-{{course.id}}
                                                </td>
                                                <td>{{course.title}}</td>
                                                <td class="text-center">
                                                    {{ $moment(course.created_at).format('DD MMMM YYYY | hh:mm') }}
                                                </td>
                                                <td class="text-center">{{ course.enrolled_students_count }}</td>
                                                <td class="text-center">{{ course.course_rating_avg_rating ?  course.course_rating_avg_rating : 0}}</td>
                                                <td class="text-center">
                                                    {{ course.course_level }}
                                                </td>
                                                <td class="text-center">
                                                    <b class="course_active"
                                                        >Active</b
                                                    >
                                                </td>
                                                <td class="text-center">
                                                    <router-link
                                                        :to="{name : 'CourseDetail',
                                                        params:{id: course.id}}"
                                                        title="View"
                                                        class="gray-s"
                                                        ><i
                                                            class="uil uil-eye"
                                                        ></i
                                                    ></router-link>
                                                    <a
                                                        href="#"
                                                        title="Delete"
                                                        class="gray-s"
                                                        @click="deleteCourse(course.id,key)"
                                                        ><i
                                                            class="uil uil-trash-alt"
                                                        ></i
                                                    ></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="w-100 text-center my-4">
                                        <SpinnerLoader :loading="loading" :color="'#3454b4'"></SpinnerLoader>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="tab-pane fade"
                                id="pills-upcoming-courses"
                                role="tabpanel"
                            >
                                <div class="table-responsive mt-30">
                                    <table class="table ucp-table">
                                        <thead class="thead-s">
                                            <tr>
                                                <th
                                                    class="text-center"
                                                    scope="col"
                                                >
                                                    Item No.
                                                </th>
                                                <th>Title</th>
                                                <th
                                                    class="text-center"
                                                    scope="col"
                                                >
                                                    Publish Date
                                                </th>
                                                <th
                                                    class="text-center"
                                                    scope="col"
                                                >
                                                    Total Students
                                                </th>
                                                <th
                                                    class="text-center"
                                                    scope="col"
                                                >
                                                    Rating
                                                </th>
                                                <th
                                                    class="text-center"
                                                    scope="col"
                                                >
                                                    Course Level
                                                </th>
                                                <th
                                                    class="text-center"
                                                    scope="col"
                                                >
                                                    Status
                                                </th>
                                                <th
                                                    class="text-center"
                                                    scope="col"
                                                >
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="8">
                                                    <UnavailableData
                                                        :message="'No courses found'"
                                                    ></UnavailableData>
                                                </td>
                                            </tr>
                                            <!-- <tr>
                                                <td class="text-center">01</td>
                                                <td class="cell-ta">
                                                    Course Title Here
                                                </td>
                                                <td class="text-center">
                                                    <a href="#">View</a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="#"
                                                        >Web Development</a
                                                    >
                                                </td>
                                                <td class="text-center">$15</td>
                                                <td class="text-center">
                                                    9 April 2020
                                                </td>
                                                <td class="text-center">
                                                    <b class="course_active"
                                                        >Pending</b
                                                    >
                                                </td>
                                                <td class="text-center">
                                                    <a
                                                        href="#"
                                                        title="Edit"
                                                        class="gray-s"
                                                        ><i
                                                            class="uil uil-edit-alt"
                                                        ></i
                                                    ></a>
                                                    <a
                                                        href="#"
                                                        title="Delete"
                                                        class="gray-s"
                                                        ><i
                                                            class="uil uil-trash-alt"
                                                        ></i
                                                    ></a>
                                                </td>
                                            </tr> -->
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div
                                class="tab-pane fade"
                                id="pills-promotions"
                                role="tabpanel"
                                aria-labelledby="pills-promotions-tab"
                            >
                                <div class="promotion_tab mb-10">
                                    <img
                                        :src="`${globalBaseUrl}images/illustrations/working.png`"
                                        alt=""
                                    />
                                    <h4>Promotion Plan will be available soon!</h4>
                                    <p>
                                        By activating promotion plans you can
                                        improve course views and student.
                                    </p>
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
import UnavailableData from '../layouts/UnavailableData.vue';

export default {
    name:"Courses",
    components:{
        UnavailableData,
    },
    data(){
        return {
            courses:[],
            loading:true,
        }
    },
    async mounted(){
        try {
            let response = await axios.get(`${globalBaseUrl}instructor/get_courses`);
            this.courses = response.data.data;
            this.loading = false;
        } catch (error) {
            this.loading = false;
            console.log(error);
            Vue.$toast.open({
              message:'Something Went Wrong',
              type: "error",
              position: "top-right",
            });
        }
    },
    methods:{
        navigate(){
            this.$router.push({
                name:'CreateVideo'
            });
        },
        deleteCourse(course_id,key){
            this.$store.dispatch('toggleLoader',true);
            axios
            .post(`${globalBaseUrl}instructor/delete_course`,{
                course_id:course_id,
            })
            .then((response) => {
                if (response.data.status == 200) {
                    this.courses.splice(key,1);
                    Vue.$toast.open({
                      message: "Course Deleted",
                      type: "success",
                      position: "top-right",
                    });
                }
                if (response.data.status == 400) {
                    Vue.$toast.open({
                        message: response.data.message,
                        type: "warning",
                        position: "top-right",
                    });
                }
                this.$store.dispatch('toggleLoader',false);
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
        }
    },
};
</script>

<style></style>
