<template>
    <div class="sa4d25">
        <div class="container-fluid">
            <Analytics :stats="stats"></Analytics>

            <div class="row">
                <div class="col-xl-8 col-lg-6 col-md-8">
                    <div
                        class="card card-default analysis_card p-0"
                        id="user-activity"
                    >
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="border-right">
                                    <div
                                        class="card-header justify-content-between"
                                    >
                                        <h2 class="m-0">User Activity</h2>
                                        <div class="date-range-report">
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div
                                            class="tab-content"
                                            id="myTabContent"
                                        >
                                            <div
                                                class="tab-pane fade show active"
                                                id="user"
                                                role="tabpanel"
                                            >
                                                <canvas
                                                    id="activity"
                                                    class="chartjs p-4"
                                                    style="height: 350px"
                                                ></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="card-footer d-flex flex-wrap bg-white border-top"
                                    >
                                        <a
                                            href="#"
                                            class="text-uppercase py-3 ovrvew-1"
                                            >Audience Overview</a
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="fcrse_3 mt-30">
                        <div class="cater_ttle">
                            <h4>Share Interactive course</h4>
                        </div>
                        <div class="live_text">
                            <div class="live_icon">
                                <i class="uil uil-video"></i>
                            </div>
                            <div class="live-content">
                                <p>
                                    Set up your video and share to your students
                                </p>
                                <button
                                    class="live_link"
                                    @click="
                                        $router.push({ name: 'CreateVideo' })
                                    "
                                >
                                    Get Started
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12" v-if="reviews.length > 0">
                    <div class="section3125 mt-30">
                        <h4 class="item_title">Your Reviews</h4>
                        <div class="la5lo1">
                            <carousel
                                :responsive="{
                                    0: {
                                        items: 1,
                                    },
                                    600: {
                                        items: 2,
                                    },
                                    1000: { items: 2 },
                                    1200: { items: 3 },
                                    1400: { items: 3 },
                                }"
                                :loop="false"
                                :margin="30"
                                :nav="false"
                                :dots="false"
                                :autoplay="true"
                            >
                                <div
                                    class="item"
                                    v-for="(review, key) in reviews"
                                    :key="`review_${key}`"
                                >
                                    <div class="fcrse_4 mb-20">
                                        <div class="say_content">
                                            <p>"{{ review.description }}"</p>
                                        </div>
                                        <div class="st_group">
                                            <div class="stud_img">
                                                <img
                                                    :src="`${globalBaseUrl}${
                                                        review.user.profile_img
                                                            ? review.user
                                                                  .profile_img
                                                            : 'images/left-imgs/img-2.jpg'
                                                    }`"
                                                    alt="student image"
                                                />
                                            </div>
                                            <h4>{{ review.user.full_name }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </carousel>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Analytics from "./components/Analytics.vue";
import carousel from "vue-owl-carousel";

export default {
    name: "Dashboard",
    components: {
        Analytics,
        carousel,
    },
    data() {
        return {
            reviews: [],
            stats: {
                courses: 0,
                enrolled: 0,
                attempted_question: 0,
                average_score: 0,
            },
        };
    },
    async mounted() {
        this.$store.dispatch("toggleLoader", true);
        await axios
            .get(`${globalBaseUrl}instructor/get_dashboard_data`)
            .then((response) => {
                response = response.data.data;
                console.log(response);
                this.reviews = response.reviews;
                this.stats.courses = response.total_courses;
                this.stats.enrolled = response.stats.total_enrolled;
                this.stats.average_score = response.stats.average;
                this.stats.question_answered =
                    response.stats.attempted_question;

                var activity = document.getElementById("activity");
                if (activity !== null) {
                    var config = {
                        // The type of chart we want to create
                        type: "line",
                        // The data for our dataset
                        data: {
                            labels: response.label,
                            datasets: [
                                {
                                    label: "Course Enrolled",
                                    backgroundColor: "transparent",
                                    borderColor: "#3454b4",
                                    data: response.user,
                                    lineTension: 0,
                                    pointRadius: 5,
                                    pointBackgroundColor: "rgba(255,255,255,1)",
                                    pointHoverBackgroundColor:
                                        "rgba(255,255,255,1)",
                                    pointBorderWidth: 2,
                                    pointHoverRadius: 7,
                                    pointHoverBorderWidth: 1,
                                },
                            ],
                        },
                        // Configuration options go here
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            legend: {
                                display: false,
                            },
                            scales: {
                                xAxes: [
                                    {
                                        gridLines: {
                                            display: false,
                                        },
                                        ticks: {
                                            fontColor: "#686f7a", // this here
                                        },
                                    },
                                ],
                                yAxes: [
                                    {
                                        gridLines: {
                                            fontColor: "#686f7a",
                                            fontFamily: "Roboto, sans-serif",
                                            display: true,
                                            color: "#efefef",
                                            zeroLineColor: "#efefef",
                                        },
                                        ticks: {
                                            // callback: function(tick, index, array) {
                                            //   return (index % 2) ? "" : tick;
                                            // }
                                            stepSize: 5,
                                            fontColor: "#686f7a",
                                            fontFamily: "Roboto, sans-serif",
                                        },
                                    },
                                ],
                            },
                        },
                    };

                    var ctx = document
                        .getElementById("activity")
                        .getContext("2d");
                    var myLine = new Chart(ctx, config);

                    // var items = document.querySelectorAll(
                    //     "#user-activity .nav-tabs .nav-item"
                    // );
                    // items.forEach(function (item, index) {
                    //     item.addEventListener("click", function () {
                    //         config.data.datasets[0].data = activityData[index].first;
                    //         config.data.datasets[1].data = activityData[index].second;
                    //         myLine.update();
                    //     });
                    // });
                }
            });

        this.$store.dispatch("toggleLoader", false);
    },
};
</script>

<style></style>
