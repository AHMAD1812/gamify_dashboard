<template>
    <div class="row">
        <div class="col-lg-12">
            <h2 class="st_title">
                <i class="uil uil-apps"></i> Instructor Dashboard
            </h2>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="card_dash">
                <div class="card_dash_left">
                    <h5>Total Courses</h5>
                    <h2>{{stats.courses}}</h2>
                    <!-- <span class="crdbg_1">New $50</span> -->
                </div>
                <div class="card_dash_right">
                    <img :src="`${globalBaseUrl}images/dashboard/achievement.svg`" alt="" />
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="card_dash">
                <div class="card_dash_left">
                    <h5>Total Students Enrolled</h5>
                    <h2>{{stats.enrolled}}</h2>
                    <!-- <span class="crdbg_2">New 125</span> -->
                </div>
                <div class="card_dash_right">
                    <img :src="`${globalBaseUrl}images/dashboard/graduation-cap.svg`" alt="" />
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="card_dash">
                <div class="card_dash_left">
                    <h5>Total Question Attempted</h5>
                    <h2>{{stats.attempted_question}}</h2>
                    <!-- <span class="crdbg_3">New 5</span> -->
                </div>
                <div class="card_dash_right">
                    <img :src="`${globalBaseUrl}images/dashboard/online-course.svg`" alt="" />
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="card_dash">
                <div class="card_dash_left">
                    <h5>Student Score Average</h5>
                    <h2>{{stats.average_score}}</h2>
                    <!-- <span class="crdbg_4">New 245</span> -->
                </div>
                <div class="card_dash_right">
                    <img :src="`${globalBaseUrl}images/dashboard/knowledge.svg`" alt="" />
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card_dash1">
                <div class="card_dash_left1">
                    <i class="uil uil-book-alt"></i>
                    <h1>Jump Into Video Creation</h1>
                </div>
                <div class="card_dash_right1">
                    <button
                        class="create_btn_dash"
                        @click="$router.push({name: 'CreateVideo' })"
                    >
                        Create Your Video
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"Analytics",
    props:['stats']
};
</script>

<style></style>
