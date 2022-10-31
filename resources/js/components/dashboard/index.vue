<template>
  <div class="sa4d25">
        <div class="container-fluid">
            <Analytics></Analytics>

            <div class="row">
                <div class="col-xl-8 col-lg-6 col-md-8">
                    <div class="card card-default analysis_card p-0" id="user-activity">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="border-right">
                                    <div class="card-header justify-content-between">
                                        <h2 class="m-0">User Activity</h2>
                                        <div class="date-range-report">
                                            <span></span>
                                        </div>
                                    </div>
                                    <ul class="nav nav-tabs justify-content-between justify-content-xl-start nav-fill"
                                        role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active pb-md-0" data-toggle="tab" href="#user"
                                                role="tab" aria-selected="true">
                                                <span class="type-name">User</span>
                                                <h4 class="views_title d-inline-block mt-2 mr-2 mb-3">
                                                    5248
                                                </h4>
                                                <span class="text-success1">5%
                                                    <i class="uil uil-top-arrow-from-top"></i>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link pb-md-0" data-toggle="tab" href="#session" role="tab"
                                                aria-selected="false">
                                                <span class="type-name">Sessions</span>
                                                <h4 class="views_title d-inline-block mt-2 mr-2 mb-3">
                                                    638
                                                </h4>
                                                <span class="text-success">20%
                                                    <i class="uil uil-top-arrow-from-top"></i>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link pb-md-0" data-toggle="tab" href="#bounce" role="tab"
                                                aria-selected="false">
                                                <span class="type-name">Bounce Rate</span>
                                                <h4 class="views_title d-inline-block mt-2 mr-2 mb-3">
                                                    36.9%
                                                </h4>
                                                <span class="text-danger">7%
                                                    <i class="uil uil-arrow-to-bottom"></i>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link pb-md-0" data-toggle="tab" href="#session-duration"
                                                role="tab" aria-selected="false">
                                                <span class="type-name">Session Duration</span>
                                                <h4 class="views_title d-inline-block mt-2 mr-2 mb-3">
                                                    4m 49s
                                                </h4>
                                                <span class="text-success">15%
                                                    <i class="uil uil-top-arrow-from-top"></i>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="card-body">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="user" role="tabpanel">
                                                <canvas id="activity" class="chartjs p-4" style="height: 350px"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex flex-wrap bg-white border-top">
                                        <a href="#" class="text-uppercase py-3 ovrvew-1">Audience Overview</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="fcrse_3 mt-30">
                        <div class="cater_ttle">
                            <h4>Live Streaming</h4>
                        </div>
                        <div class="live_text">
                            <div class="live_icon"><i class="uil uil-kayak"></i></div>
                            <div class="live-content">
                                <p>Set up your channel and stream live to your students</p>
                                <button class="live_link" onclick="window.location.href = 'add_streaming.html';">
                                    Get Started
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="section3125 mt-10">
                        <h4 class="item_title">Profile Analytics</h4>
                        <div class="la5lo1">
                            <div class="fcrse_1">
                                <div class="fcrse_content">
                                    <h6 class="crsedt8145">Current subscribers</h6>
                                    <h3 class="subcribe_title">856</h3>
                                    <div class="allvperf">
                                        <div class="crse-perf-left">View</div>
                                        <div class="crse-perf-right">
                                            17k<span class="analyics_pr"><i class="uil uil-arrow-to-bottom"></i>75%</span>
                                        </div>
                                    </div>
                                    <div class="allvperf">
                                        <div class="crse-perf-left">
                                            Purchased<span class="per_text">(per hour)</span>
                                        </div>
                                        <div class="crse-perf-right">
                                            1<span class="analyics_pr"><i
                                                    class="uil uil-top-arrow-from-top"></i>100%</span>
                                        </div>
                                    </div>
                                    <div class="allvperf">
                                        <div class="crse-perf-left">
                                            Enroll<span class="per_text">(per hour)</span>
                                        </div>
                                        <div class="crse-perf-right">
                                            50<span class="analyics_pr"><i
                                                    class="uil uil-top-arrow-from-top"></i>70%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="section3125 mt-30">
                        <h4 class="item_title">Your Reviews</h4>
                        <div class="la5lo1">
                            <div class="owl-carousel Student_says owl-theme">
                                <div class="item">
                                    <div class="fcrse_4 mb-20">
                                        <div class="say_content">
                                            <p>
                                                "Donec ac ex eu arcu euismod feugiat. In venenatis
                                                bibendum nisi, in placerat eros ultricies vitae.
                                                Praesent pellentesque blandit scelerisque.
                                                Suspendisse potenti."
                                            </p>
                                        </div>
                                        <div class="st_group">
                                            <div class="stud_img">
                                                <img src="images/left-imgs/img-4.jpg" alt="" />
                                            </div>
                                            <h4>Rida Fatima</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="fcrse_4 mb-20">
                                        <div class="say_content">
                                            <p>
                                                "Cras id enim lectus. Fusce at arcu tincidunt,
                                                iaculis libero quis, vulputate mauris. Morbi
                                                facilisis vitae ligula id aliquam. Nunc consectetur
                                                malesuada bibendum."
                                            </p>
                                        </div>
                                        <div class="st_group">
                                            <div class="stud_img">
                                                <img src="images/left-imgs/img-1.jpg" alt="" />
                                            </div>
                                            <h4>David Martin</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="fcrse_4 mb-20">
                                        <div class="say_content">
                                            <p>
                                                "Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Class aptent taciti sociosqu ad litora
                                                torquent per conubia nostra, per inceptos himenaeos
                                                eros ac, sagittis orci."
                                            </p>
                                        </div>
                                        <div class="st_group">
                                            <div class="stud_img">
                                                <img src="images/left-imgs/img-7.jpg" alt="" />
                                            </div>
                                            <h4>Aqeel Hameed</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="fcrse_4 mb-20">
                                        <div class="say_content">
                                            <p>
                                                "Nulla bibendum lectus pharetra, tempus eros ac,
                                                sagittis orci. Suspendisse posuere dolor neque, at
                                                finibus mauris lobortis in. Pellentesque vitae
                                                laoreet tortor."
                                            </p>
                                        </div>
                                        <div class="st_group">
                                            <div class="stud_img">
                                                <img src="images/left-imgs/img-6.jpg" alt="" />
                                            </div>
                                            <h4>Poonam Sharma</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="fcrse_4 mb-20">
                                        <div class="say_content">
                                            <p>
                                                "Curabitur placerat justo ac mauris condimentum
                                                ultricies. In magna tellus, eleifend et volutpat id,
                                                sagittis vitae est. Pellentesque vitae laoreet
                                                tortor."
                                            </p>
                                        </div>
                                        <div class="st_group">
                                            <div class="stud_img">
                                                <img src="images/left-imgs/img-3.jpg" alt="" />
                                            </div>
                                            <h4>Davinder Singh</h4>
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
</template>

<script>
import Analytics from './components/Analytics.vue';
export default {
    name:"Dashboard",
    components:{
        Analytics,
    }
}
</script>

<style>

</style>