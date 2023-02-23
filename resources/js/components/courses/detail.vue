<template>
    <span>
        <div class="_215b01">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section3125">
                            <div class="row justify-content-center">
                                <div class="col-xl-4 col-lg-5 col-md-6">
                                    <div class="preview_video" v-if="course.poster">
                                        <a
                                            href="#"
                                            class="fcrse_img"
                                            data-toggle="modal"
                                            data-target="#videoModal"
                                        >
                                            <img
                                                :src="`${globalBaseUrl}${course.poster}`"
                                                alt="poster"
                                                style="height:35vh;"
                                            />
                                            <div class="course-overlay">
                                                <div class="badge_seller">
                                                    Interactive course
                                                </div>
                                                <span class="play_btn1"
                                                    ><i class="uil uil-play"></i
                                                ></span>
                                                <span class="_215b02"
                                                    >Preview this course</span
                                                >
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-lg-7 col-md-6">
                                    <div class="_215b03">
                                        <h2>{{course.title}}</h2>
                                        <span class="_215b04">
                                            {{course.description}}</span
                                        >
                                    </div>
                                    <div class="_215b05">
                                        <div class="crse_reviews mr-2">
                                            <i class="uil uil-star"></i>
                                            4.5
                                        </div>
                                        (81,665 ratings)
                                    </div>
                                    <div class="_215b05">
                                        114,521 students enrolled
                                    </div>
                                    <div class="_215b06">
                                        <div class="_215b07">
                                            <span>
                                                <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                            </span>
                                            {{course.course_level}}
                                        </div>
                                    </div>
                                    <div class="_215b05">
                                        {{course.start_date}} - {{ course.end_date }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="_215b15 _byt1458">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="user_dt5">
                            <div class="user_dt_right">
                                <ul>
                                    <li>
                                        <a href="#" class="lkcm152"
                                            ><i class="uil uil-eye"></i
                                            ><span>1452</span></a
                                        >
                                    </li>
                                    <li>
                                        <a href="#" class="lkcm152"
                                            ><i class="uil uil-thumbs-up"></i
                                            ><span>100</span></a
                                        >
                                    </li>
                                    <li>
                                        <a href="#" class="lkcm152"
                                            ><i class="uil uil-thumbs-down"></i
                                            ><span>20</span></a
                                        >
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="course_tabs">
                            <nav>
                                <div
                                    class="nav nav-tabs tab_crse justify-content-center"
                                    id="nav-tab"
                                    role="tablist"
                                >
                                    <a
                                        class="nav-item nav-link active"
                                        id="nav-about-tab"
                                        data-toggle="tab"
                                        href="#nav-about"
                                        role="tab"
                                        aria-selected="true"
                                        >About</a
                                    >
                                    <a
                                        class="nav-item nav-link"
                                        id="nav-reviews-tab"
                                        data-toggle="tab"
                                        href="#nav-reviews"
                                        role="tab"
                                        aria-selected="false"
                                        >Reviews</a
                                    >
                                    <a
                                        class="nav-item nav-link"
                                        id="nav-reviews-tab"
                                        data-toggle="tab"
                                        href="#nav-leaderboard"
                                        role="tab"
                                        aria-selected="false"
                                        >Leaderboard</a
                                    >
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="_215b17">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="course_tab_content">
                            <div class="tab-content" id="nav-tabContent">
                                <div
                                    class="tab-pane fade show active"
                                    id="nav-about"
                                    role="tabpanel"
                                >
                                    <div class="_htg451">
                                        <div class="_htgdrt mt-35">
                                            <h3>Requirements</h3>
                                            <div class="_scd123">
                                                {{course.requirement}}
                                            </div>
                                        </div>
                                        <div class="_htgdrt mt-35">
                                            <h3>Objectives</h3>
                                            <div class="_scd123">
                                                {{course.objectives}}
                                            </div>
                                        </div>
                                        <div class="_htgdrt mt-35">
                                            <h3>Descriptions</h3>
                                            <div class="_scd123">
                                                {{course.description}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="tab-pane fade"
                                    id="nav-reviews"
                                    role="tabpanel"
                                >
                                    <div class="student_reviews">
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <div class="reviews_left">
                                                    <h3>Student Feedback</h3>
                                                    <div class="total_rating">
                                                        <div class="_rate001">
                                                            4.6
                                                        </div>
                                                        <div class="rating-box">
                                                            <span
                                                                class="rating-star full-star"
                                                            ></span>
                                                            <span
                                                                class="rating-star full-star"
                                                            ></span>
                                                            <span
                                                                class="rating-star full-star"
                                                            ></span>
                                                            <span
                                                                class="rating-star full-star"
                                                            ></span>
                                                            <span
                                                                class="rating-star half-star"
                                                            ></span>
                                                        </div>
                                                        <div class="_rate002">
                                                            Course Rating
                                                        </div>
                                                    </div>
                                                    <div class="_rate003">
                                                        <div class="_rate004">
                                                            <div
                                                                class="progress progress1"
                                                            >
                                                                <div
                                                                    class="progress-bar w-70"
                                                                    role="progressbar"
                                                                    aria-valuenow="70"
                                                                    aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                ></div>
                                                            </div>
                                                            <div
                                                                class="rating-box"
                                                            >
                                                                <span
                                                                    class="rating-star full-star"
                                                                ></span>
                                                                <span
                                                                    class="rating-star full-star"
                                                                ></span>
                                                                <span
                                                                    class="rating-star full-star"
                                                                ></span>
                                                                <span
                                                                    class="rating-star full-star"
                                                                ></span>
                                                                <span
                                                                    class="rating-star full-star"
                                                                ></span>
                                                            </div>
                                                            <div
                                                                class="_rate002"
                                                            >
                                                                70%
                                                            </div>
                                                        </div>
                                                        <div class="_rate004">
                                                            <div
                                                                class="progress progress1"
                                                            >
                                                                <div
                                                                    class="progress-bar w-30"
                                                                    role="progressbar"
                                                                    aria-valuenow="30"
                                                                    aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                ></div>
                                                            </div>
                                                            <div
                                                                class="rating-box"
                                                            >
                                                                <span
                                                                    class="rating-star full-star"
                                                                ></span>
                                                                <span
                                                                    class="rating-star full-star"
                                                                ></span>
                                                                <span
                                                                    class="rating-star full-star"
                                                                ></span>
                                                                <span
                                                                    class="rating-star full-star"
                                                                ></span>
                                                                <span
                                                                    class="rating-star empty-star"
                                                                ></span>
                                                            </div>
                                                            <div
                                                                class="_rate002"
                                                            >
                                                                40%
                                                            </div>
                                                        </div>
                                                        <div class="_rate004">
                                                            <div
                                                                class="progress progress1"
                                                            >
                                                                <div
                                                                    class="progress-bar w-5"
                                                                    role="progressbar"
                                                                    aria-valuenow="10"
                                                                    aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                ></div>
                                                            </div>
                                                            <div
                                                                class="rating-box"
                                                            >
                                                                <span
                                                                    class="rating-star full-star"
                                                                ></span>
                                                                <span
                                                                    class="rating-star full-star"
                                                                ></span>
                                                                <span
                                                                    class="rating-star full-star"
                                                                ></span>
                                                                <span
                                                                    class="rating-star empty-star"
                                                                ></span>
                                                                <span
                                                                    class="rating-star empty-star"
                                                                ></span>
                                                            </div>
                                                            <div
                                                                class="_rate002"
                                                            >
                                                                5%
                                                            </div>
                                                        </div>
                                                        <div class="_rate004">
                                                            <div
                                                                class="progress progress1"
                                                            >
                                                                <div
                                                                    class="progress-bar w-2"
                                                                    role="progressbar"
                                                                    aria-valuenow="2"
                                                                    aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                ></div>
                                                            </div>
                                                            <div
                                                                class="rating-box"
                                                            >
                                                                <span
                                                                    class="rating-star full-star"
                                                                ></span>
                                                                <span
                                                                    class="rating-star full-star"
                                                                ></span>
                                                                <span
                                                                    class="rating-star empty-star"
                                                                ></span>
                                                                <span
                                                                    class="rating-star empty-star"
                                                                ></span>
                                                                <span
                                                                    class="rating-star empty-star"
                                                                ></span>
                                                            </div>
                                                            <div
                                                                class="_rate002"
                                                            >
                                                                1%
                                                            </div>
                                                        </div>
                                                        <div class="_rate004">
                                                            <div
                                                                class="progress progress1"
                                                            >
                                                                <div
                                                                    class="progress-bar w-1"
                                                                    role="progressbar"
                                                                    aria-valuenow="0"
                                                                    aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                ></div>
                                                            </div>
                                                            <div
                                                                class="rating-box"
                                                            >
                                                                <span
                                                                    class="rating-star full-star"
                                                                ></span>
                                                                <span
                                                                    class="rating-star empty-star"
                                                                ></span>
                                                                <span
                                                                    class="rating-star empty-star"
                                                                ></span>
                                                                <span
                                                                    class="rating-star empty-star"
                                                                ></span>
                                                                <span
                                                                    class="rating-star empty-star"
                                                                ></span>
                                                            </div>
                                                            <div
                                                                class="_rate002"
                                                            >
                                                                1%
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="review_right">
                                                    <div
                                                        class="review_right_heading"
                                                    >
                                                        <h3>Reviews</h3>
                                                        <div
                                                            class="review_search"
                                                        >
                                                            <input
                                                                class="rv_srch"
                                                                type="text"
                                                                placeholder="Search reviews..."
                                                            />
                                                            <button
                                                                class="rvsrch_btn"
                                                            >
                                                                <i
                                                                    class="uil uil-search"
                                                                ></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="review_all120">
                                                    <div class="review_item">
                                                        <div
                                                            class="review_usr_dt"
                                                        >
                                                            <img
                                                                :src="`${globalBaseUrl}images/left-imgs/img-1.jpg`"
                                                                alt=""
                                                            />
                                                            <div class="rv1458">
                                                                <h4
                                                                    class="tutor_name1"
                                                                >
                                                                    John Doe
                                                                </h4>
                                                                <span
                                                                    class="time_145"
                                                                    >2 hour
                                                                    ago</span
                                                                >
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="rating-box mt-20"
                                                        >
                                                            <span
                                                                class="rating-star full-star"
                                                            ></span>
                                                            <span
                                                                class="rating-star full-star"
                                                            ></span>
                                                            <span
                                                                class="rating-star full-star"
                                                            ></span>
                                                            <span
                                                                class="rating-star full-star"
                                                            ></span>
                                                            <span
                                                                class="rating-star half-star"
                                                            ></span>
                                                        </div>
                                                        <p class="rvds10">
                                                            Nam gravida elit a
                                                            velit rutrum, eget
                                                            dapibus ex
                                                            elementum. Interdum
                                                            et malesuada fames
                                                            ac ante ipsum primis
                                                            in faucibus. Fusce
                                                            lacinia, nunc sit
                                                            amet tincidunt
                                                            venenatis.
                                                        </p>
                                                        <div class="rpt100">
                                                            <span
                                                                >Was this review
                                                                helpful?</span
                                                            >
                                                            <div
                                                                class="radio--group-inline-container"
                                                            >
                                                                <div
                                                                    class="radio-item"
                                                                >
                                                                    <input
                                                                        id="radio-1"
                                                                        name="radio"
                                                                        type="radio"
                                                                    />
                                                                    <label
                                                                        for="radio-1"
                                                                        class="radio-label"
                                                                        >Yes</label
                                                                    >
                                                                </div>
                                                                <div
                                                                    class="radio-item"
                                                                >
                                                                    <input
                                                                        id="radio-2"
                                                                        name="radio"
                                                                        type="radio"
                                                                    />
                                                                    <label
                                                                        for="radio-2"
                                                                        class="radio-label"
                                                                        >No</label
                                                                    >
                                                                </div>
                                                            </div>
                                                            <a
                                                                href="#"
                                                                class="report145"
                                                                >Report</a
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="review_item">
                                                        <div
                                                            class="review_usr_dt"
                                                        >
                                                            <img
                                                                :src="`${globalBaseUrl}images/left-imgs/img-1.jpg`"
                                                                alt=""
                                                            />
                                                            <div class="rv1458">
                                                                <h4
                                                                    class="tutor_name1"
                                                                >
                                                                    Jassica
                                                                    William
                                                                </h4>
                                                                <span
                                                                    class="time_145"
                                                                    >12 hour
                                                                    ago</span
                                                                >
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="rating-box mt-20"
                                                        >
                                                            <span
                                                                class="rating-star full-star"
                                                            ></span>
                                                            <span
                                                                class="rating-star full-star"
                                                            ></span>
                                                            <span
                                                                class="rating-star full-star"
                                                            ></span>
                                                            <span
                                                                class="rating-star full-star"
                                                            ></span>
                                                            <span
                                                                class="rating-star empty-star"
                                                            ></span>
                                                        </div>
                                                        <p class="rvds10">
                                                            Nam gravida elit a
                                                            velit rutrum, eget
                                                            dapibus ex
                                                            elementum. Interdum
                                                            et malesuada fames
                                                            ac ante ipsum primis
                                                            in faucibus. Fusce
                                                            lacinia, nunc sit
                                                            amet tincidunt
                                                            venenatis.
                                                        </p>
                                                        <div class="rpt100">
                                                            <span
                                                                >Was this review
                                                                helpful?</span
                                                            >
                                                            <div
                                                                class="radio--group-inline-container"
                                                            >
                                                                <div
                                                                    class="radio-item"
                                                                >
                                                                    <input
                                                                        id="radio-3"
                                                                        name="radio1"
                                                                        type="radio"
                                                                    />
                                                                    <label
                                                                        for="radio-3"
                                                                        class="radio-label"
                                                                        >Yes</label
                                                                    >
                                                                </div>
                                                                <div
                                                                    class="radio-item"
                                                                >
                                                                    <input
                                                                        id="radio-4"
                                                                        name="radio1"
                                                                        type="radio"
                                                                    />
                                                                    <label
                                                                        for="radio-4"
                                                                        class="radio-label"
                                                                        >No</label
                                                                    >
                                                                </div>
                                                            </div>
                                                            <a
                                                                href="#"
                                                                class="report145"
                                                                >Report</a
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="review_item">
                                                        <div
                                                            class="review_usr_dt"
                                                        >
                                                            <img
                                                                :src="`${globalBaseUrl}images/left-imgs/img-1.jpg`"
                                                                alt=""
                                                            />
                                                            <div class="rv1458">
                                                                <h4
                                                                    class="tutor_name1"
                                                                >
                                                                    Albert Dua
                                                                </h4>
                                                                <span
                                                                    class="time_145"
                                                                    >5 days
                                                                    ago</span
                                                                >
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="rating-box mt-20"
                                                        >
                                                            <span
                                                                class="rating-star full-star"
                                                            ></span>
                                                            <span
                                                                class="rating-star full-star"
                                                            ></span>
                                                            <span
                                                                class="rating-star full-star"
                                                            ></span>
                                                            <span
                                                                class="rating-star half-star"
                                                            ></span>
                                                            <span
                                                                class="rating-star empty-star"
                                                            ></span>
                                                        </div>
                                                        <p class="rvds10">
                                                            Nam gravida elit a
                                                            velit rutrum, eget
                                                            dapibus ex
                                                            elementum. Interdum
                                                            et malesuada fames
                                                            ac ante ipsum primis
                                                            in faucibus. Fusce
                                                            lacinia, nunc sit
                                                            amet tincidunt
                                                            venenatis.
                                                        </p>
                                                        <div class="rpt100">
                                                            <span
                                                                >Was this review
                                                                helpful?</span
                                                            >
                                                            <div
                                                                class="radio--group-inline-container"
                                                            >
                                                                <div
                                                                    class="radio-item"
                                                                >
                                                                    <input
                                                                        id="radio-5"
                                                                        name="radio2"
                                                                        type="radio"
                                                                    />
                                                                    <label
                                                                        for="radio-5"
                                                                        class="radio-label"
                                                                        >Yes</label
                                                                    >
                                                                </div>
                                                                <div
                                                                    class="radio-item"
                                                                >
                                                                    <input
                                                                        id="radio-6"
                                                                        name="radio2"
                                                                        type="radio"
                                                                    />
                                                                    <label
                                                                        for="radio-6"
                                                                        class="radio-label"
                                                                        >No</label
                                                                    >
                                                                </div>
                                                            </div>
                                                            <a
                                                                href="#"
                                                                class="report145"
                                                                >Report</a
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="review_item">
                                                        <div
                                                            class="review_usr_dt"
                                                        >
                                                            <img
                                                                :src="`${globalBaseUrl}images/left-imgs/img-1.jpg`"
                                                                alt=""
                                                            />
                                                            <div class="rv1458">
                                                                <h4
                                                                    class="tutor_name1"
                                                                >
                                                                    Zoena Singh
                                                                </h4>
                                                                <span
                                                                    class="time_145"
                                                                    >15 days
                                                                    ago</span
                                                                >
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="rating-box mt-20"
                                                        >
                                                            <span
                                                                class="rating-star full-star"
                                                            ></span>
                                                            <span
                                                                class="rating-star full-star"
                                                            ></span>
                                                            <span
                                                                class="rating-star full-star"
                                                            ></span>
                                                            <span
                                                                class="rating-star full-star"
                                                            ></span>
                                                            <span
                                                                class="rating-star full-star"
                                                            ></span>
                                                        </div>
                                                        <p class="rvds10">
                                                            Nam gravida elit a
                                                            velit rutrum, eget
                                                            dapibus ex
                                                            elementum. Interdum
                                                            et malesuada fames
                                                            ac ante ipsum primis
                                                            in faucibus. Fusce
                                                            lacinia, nunc sit
                                                            amet tincidunt
                                                            venenatis.
                                                        </p>
                                                        <div class="rpt100">
                                                            <span
                                                                >Was this review
                                                                helpful?</span
                                                            >
                                                            <div
                                                                class="radio--group-inline-container"
                                                            >
                                                                <div
                                                                    class="radio-item"
                                                                >
                                                                    <input
                                                                        id="radio-7"
                                                                        name="radio3"
                                                                        type="radio"
                                                                    />
                                                                    <label
                                                                        for="radio-7"
                                                                        class="radio-label"
                                                                        >Yes</label
                                                                    >
                                                                </div>
                                                                <div
                                                                    class="radio-item"
                                                                >
                                                                    <input
                                                                        id="radio-8"
                                                                        name="radio3"
                                                                        type="radio"
                                                                    />
                                                                    <label
                                                                        for="radio-8"
                                                                        class="radio-label"
                                                                        >No</label
                                                                    >
                                                                </div>
                                                            </div>
                                                            <a
                                                                href="#"
                                                                class="report145"
                                                                >Report</a
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="review_item">
                                                        <div
                                                            class="review_usr_dt"
                                                        >
                                                            <img
                                                                :src="`${globalBaseUrl}images/left-imgs/img-1.jpg`"
                                                                alt=""
                                                            />
                                                            <div class="rv1458">
                                                                <h4
                                                                    class="tutor_name1"
                                                                >
                                                                    Joy Dua
                                                                </h4>
                                                                <span
                                                                    class="time_145"
                                                                    >20 days
                                                                    ago</span
                                                                >
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="rating-box mt-20"
                                                        >
                                                            <span
                                                                class="rating-star full-star"
                                                            ></span>
                                                            <span
                                                                class="rating-star full-star"
                                                            ></span>
                                                            <span
                                                                class="rating-star full-star"
                                                            ></span>
                                                            <span
                                                                class="rating-star empty-star"
                                                            ></span>
                                                            <span
                                                                class="rating-star empty-star"
                                                            ></span>
                                                        </div>
                                                        <p class="rvds10">
                                                            Nam gravida elit a
                                                            velit rutrum, eget
                                                            dapibus ex
                                                            elementum. Interdum
                                                            et malesuada fames
                                                            ac ante ipsum primis
                                                            in faucibus. Fusce
                                                            lacinia, nunc sit
                                                            amet tincidunt
                                                            venenatis.
                                                        </p>
                                                        <div class="rpt100">
                                                            <span
                                                                >Was this review
                                                                helpful?</span
                                                            >
                                                            <div
                                                                class="radio--group-inline-container"
                                                            >
                                                                <div
                                                                    class="radio-item"
                                                                >
                                                                    <input
                                                                        id="radio-9"
                                                                        name="radio4"
                                                                        type="radio"
                                                                    />
                                                                    <label
                                                                        for="radio-9"
                                                                        class="radio-label"
                                                                        >Yes</label
                                                                    >
                                                                </div>
                                                                <div
                                                                    class="radio-item"
                                                                >
                                                                    <input
                                                                        id="radio-10"
                                                                        name="radio4"
                                                                        type="radio"
                                                                    />
                                                                    <label
                                                                        for="radio-10"
                                                                        class="radio-label"
                                                                        >No</label
                                                                    >
                                                                </div>
                                                            </div>
                                                            <a
                                                                href="#"
                                                                class="report145"
                                                                >Report</a
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="review_item">
                                                        <a
                                                            href="#"
                                                            class="more_reviews"
                                                            >See More Reviews</a
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="tab-pane fade"
                                    id="nav-leaderboard"
                                    role="tabpanel"
                                >
                                    <div class="l-wrapper">
                                        <div class="l-grid">
                                            <div
                                                class="l-grid__item l-grid__item--sticky"
                                            >
                                                <div
                                                    class="l-grid__item l-grid__item--sticky"
                                                >
                                                    <div
                                                        class="c-card u-bg--light-gradient u-text--dark"
                                                    >
                                                        <div
                                                            class="c-card__body"
                                                        >
                                                            <div
                                                                class="u-display--flex u-justify--space-between"
                                                            >
                                                                <div
                                                                    class="u-text--left"
                                                                >
                                                                    <div
                                                                        class="u-text--small"
                                                                    >
                                                                        Total
                                                                        Students
                                                                    </div>
                                                                    <h2>100</h2>
                                                                </div>
                                                                <div
                                                                    class="u-text--right"
                                                                >
                                                                    <div
                                                                        class="u-text--small"
                                                                    >
                                                                        Average
                                                                        Score
                                                                    </div>
                                                                    <h2>24</h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="c-card">
                                                        <div
                                                            class="c-card__body"
                                                        >
                                                            <div
                                                                class="u-text--center"
                                                                id="winner"
                                                            >
                                                                <div
                                                                    class="u-text-small u-text--medium u-mb--16"
                                                                >
                                                                    Highest
                                                                    Score
                                                                </div>
                                                                <img
                                                                    class="c-avatar c-avatar--lg"
                                                                    src="https://www.formula1.com/content/dam/fom-website/drivers/D/DANRIC01_Daniel_Ricciardo/danric01.png.transform/2col-retina/image.png"
                                                                />
                                                                <h3
                                                                    class="u-mt--16"
                                                                >
                                                                    Daniel
                                                                    Ricciardo
                                                                </h3>
                                                                <span
                                                                    class="u-text--teal u-text--small"
                                                                    >Daniel
                                                                    Ricciardo</span
                                                                >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="l-grid__item">
                                                <div class="c-card">
                                                    <div
                                                        class="c-card__body pt-0"
                                                    >
                                                        <ul
                                                            class="c-list"
                                                            id="list"
                                                        >
                                                            <li
                                                                class="c-list__item"
                                                            >
                                                                <div
                                                                    class="c-list__grid"
                                                                >
                                                                    <div
                                                                        class="u-text--left u-text--small u-text--medium"
                                                                    >
                                                                        Rank
                                                                    </div>
                                                                    <div
                                                                        class="u-text--left u-text--small u-text--medium"
                                                                    >
                                                                        Students
                                                                    </div>
                                                                    <div
                                                                        class="u-text--right u-text--small u-text--medium"
                                                                    >
                                                                        Scores
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li
                                                                class="c-list__item"
                                                            >
                                                                <div
                                                                    class="c-list__grid"
                                                                >
                                                                    <div
                                                                        class="c-flag c-place u-bg--transparent u-text--dark u-bg--yellow"
                                                                    >
                                                                        1
                                                                    </div>
                                                                    <div
                                                                        class="c-media"
                                                                    >
                                                                        <img
                                                                            class="c-avatar c-media__img"
                                                                            src="https://www.formula1.com/content/dam/fom-website/drivers/L/LEWHAM01_Lewis_Hamilton/lewham01.png.transform/2col-retina/image.png"
                                                                        />
                                                                        <div
                                                                            class="c-media__content"
                                                                        >
                                                                            <div
                                                                                class="c-media__title"
                                                                            >
                                                                                Lewis
                                                                                Hamilton
                                                                            </div>
                                                                            <a
                                                                                class="c-media__link u-text--small"
                                                                                href="https://instagram.com/lewishamilton"
                                                                                target="_blank"
                                                                                >@lewishamilton</a
                                                                            >
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="u-text--right c-kudos u-text--yellow"
                                                                    >
                                                                        <div
                                                                            class="u-mt--8"
                                                                        >
                                                                            <strong
                                                                                >36</strong
                                                                            >
                                                                            ⭐️
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li
                                                                class="c-list__item"
                                                            >
                                                                <div
                                                                    class="c-list__grid"
                                                                >
                                                                    <div
                                                                        class="c-flag c-place u-bg--transparent u-text--dark u-bg--teal"
                                                                    >
                                                                        2
                                                                    </div>
                                                                    <div
                                                                        class="c-media"
                                                                    >
                                                                        <img
                                                                            class="c-avatar c-media__img"
                                                                            src="https://www.formula1.com/content/dam/fom-website/drivers/K/KIMRAI01_Kimi_R%C3%A4ikk%C3%B6nen/kimrai01.png.transform/2col-retina/image.png"
                                                                        />
                                                                        <div
                                                                            class="c-media__content"
                                                                        >
                                                                            <div
                                                                                class="c-media__title"
                                                                            >
                                                                                Kimi
                                                                                Raikkonen
                                                                            </div>
                                                                            <a
                                                                                class="c-media__link u-text--small"
                                                                                href="https://instagram.com/kimimatiasraikkonen"
                                                                                target="_blank"
                                                                                >@kimimatiasraikkonen</a
                                                                            >
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="u-text--right c-kudos u-text--teal"
                                                                    >
                                                                        <div
                                                                            class="u-mt--8"
                                                                        >
                                                                            <strong
                                                                                >31</strong
                                                                            >
                                                                            👍
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li
                                                                class="c-list__item"
                                                            >
                                                                <div
                                                                    class="c-list__grid"
                                                                >
                                                                    <div
                                                                        class="c-flag c-place u-bg--transparent u-text--dark u-bg--orange"
                                                                    >
                                                                        3
                                                                    </div>
                                                                    <div
                                                                        class="c-media"
                                                                    >
                                                                        <img
                                                                            class="c-avatar c-media__img"
                                                                            src="https://www.formula1.com/content/dam/fom-website/drivers/S/SEBVET01_Sebastian_Vettel/sebvet01.png.transform/2col-retina/image.png"
                                                                        />
                                                                        <div
                                                                            class="c-media__content"
                                                                        >
                                                                            <div
                                                                                class="c-media__title"
                                                                            >
                                                                                Sebastian
                                                                                Vettel
                                                                            </div>
                                                                            <a
                                                                                class="c-media__link u-text--small"
                                                                                href="https://instagram.com/vettelofficial"
                                                                                target="_blank"
                                                                                >@vettelofficial</a
                                                                            >
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="u-text--right c-kudos u-text--orange"
                                                                    >
                                                                        <div
                                                                            class="u-mt--8"
                                                                        >
                                                                            <strong
                                                                                >24</strong
                                                                            >
                                                                            ⭐️
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li
                                                                class="c-list__item"
                                                            >
                                                                <div
                                                                    class="c-list__grid"
                                                                >
                                                                    <div
                                                                        class="c-flag c-place u-bg--transparent"
                                                                    >
                                                                        4
                                                                    </div>
                                                                    <div
                                                                        class="c-media"
                                                                    >
                                                                        <img
                                                                            class="c-avatar c-media__img"
                                                                            src="https://www.formula1.com/content/dam/fom-website/drivers/M/MAXVER01_Max_Verstappen/maxver01.png.transform/2col-retina/image.png"
                                                                        />
                                                                        <div
                                                                            class="c-media__content"
                                                                        >
                                                                            <div
                                                                                class="c-media__title"
                                                                            >
                                                                                Max
                                                                                Verstappen
                                                                            </div>
                                                                            <a
                                                                                class="c-media__link u-text--small"
                                                                                href="https://instagram.com/maxverstappen1"
                                                                                target="_blank"
                                                                                >@maxverstappen1</a
                                                                            >
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="u-text--right c-kudos"
                                                                    >
                                                                        <div
                                                                            class="u-mt--8"
                                                                        >
                                                                            <strong
                                                                                >22</strong
                                                                            >
                                                                            💯
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li
                                                                class="c-list__item"
                                                            >
                                                                <div
                                                                    class="c-list__grid"
                                                                >
                                                                    <div
                                                                        class="c-flag c-place u-bg--transparent"
                                                                    >
                                                                        5
                                                                    </div>
                                                                    <div
                                                                        class="c-media"
                                                                    >
                                                                        <img
                                                                            class="c-avatar c-media__img"
                                                                            src="https://www.formula1.com/content/dam/fom-website/drivers/L/LANNOR01_Lando_Norris/lannor01.png.transform/2col-retina/image.png"
                                                                        />
                                                                        <div
                                                                            class="c-media__content"
                                                                        >
                                                                            <div
                                                                                class="c-media__title"
                                                                            >
                                                                                Lando
                                                                                Norris
                                                                            </div>
                                                                            <a
                                                                                class="c-media__link u-text--small"
                                                                                href="https://instagram.com/landonorris"
                                                                                target="_blank"
                                                                                >@landonorris</a
                                                                            >
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="u-text--right c-kudos"
                                                                    >
                                                                        <div
                                                                            class="u-mt--8"
                                                                        >
                                                                            <strong
                                                                                >18</strong
                                                                            >
                                                                            🔥
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li
                                                                class="c-list__item"
                                                            >
                                                                <div
                                                                    class="c-list__grid"
                                                                >
                                                                    <div
                                                                        class="c-flag c-place u-bg--transparent"
                                                                    >
                                                                        6
                                                                    </div>
                                                                    <div
                                                                        class="c-media"
                                                                    >
                                                                        <img
                                                                            class="c-avatar c-media__img"
                                                                            src="https://www.formula1.com/content/dam/fom-website/drivers/C/CHALEC01_Charles_Leclerc/chalec01.png.transform/2col-retina/image.png"
                                                                        />
                                                                        <div
                                                                            class="c-media__content"
                                                                        >
                                                                            <div
                                                                                class="c-media__title"
                                                                            >
                                                                                Charles
                                                                                Leclerc
                                                                            </div>
                                                                            <a
                                                                                class="c-media__link u-text--small"
                                                                                href="https://instagram.com/charles_leclerc"
                                                                                target="_blank"
                                                                                >@charles_leclerc</a
                                                                            >
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="u-text--right c-kudos"
                                                                    >
                                                                        <div
                                                                            class="u-mt--8"
                                                                        >
                                                                            <strong
                                                                                >16</strong
                                                                            >
                                                                            🔥
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li
                                                                class="c-list__item"
                                                            >
                                                                <div
                                                                    class="c-list__grid"
                                                                >
                                                                    <div
                                                                        class="c-flag c-place u-bg--transparent"
                                                                    >
                                                                        7
                                                                    </div>
                                                                    <div
                                                                        class="c-media"
                                                                    >
                                                                        <img
                                                                            class="c-avatar c-media__img"
                                                                            src="https://www.formula1.com/content/dam/fom-website/drivers/G/GEORUS01_George_Russell/georus01.png.transform/2col-retina/image.png"
                                                                        />
                                                                        <div
                                                                            class="c-media__content"
                                                                        >
                                                                            <div
                                                                                class="c-media__title"
                                                                            >
                                                                                George
                                                                                Russell
                                                                            </div>
                                                                            <a
                                                                                class="c-media__link u-text--small"
                                                                                href="https://instagram.com/georgerussell63"
                                                                                target="_blank"
                                                                                >@georgerussell63</a
                                                                            >
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="u-text--right c-kudos"
                                                                    >
                                                                        <div
                                                                            class="u-mt--8"
                                                                        >
                                                                            <strong
                                                                                >10</strong
                                                                            >
                                                                            💯
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li
                                                                class="c-list__item"
                                                            >
                                                                <div
                                                                    class="c-list__grid"
                                                                >
                                                                    <div
                                                                        class="c-flag c-place u-bg--transparent"
                                                                    >
                                                                        8
                                                                    </div>
                                                                    <div
                                                                        class="c-media"
                                                                    >
                                                                        <img
                                                                            class="c-avatar c-media__img"
                                                                            src="https://www.formula1.com/content/dam/fom-website/drivers/D/DANRIC01_Daniel_Ricciardo/danric01.png.transform/2col-retina/image.png"
                                                                        />
                                                                        <div
                                                                            class="c-media__content"
                                                                        >
                                                                            <div
                                                                                class="c-media__title"
                                                                            >
                                                                                Daniel
                                                                                Ricciardo
                                                                            </div>
                                                                            <a
                                                                                class="c-media__link u-text--small"
                                                                                href="https://instagram.com/danielricciardo"
                                                                                target="_blank"
                                                                                >@danielricciardo</a
                                                                            >
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="u-text--right c-kudos"
                                                                    >
                                                                        <div
                                                                            class="u-mt--8"
                                                                        >
                                                                            <strong
                                                                                >7</strong
                                                                            >
                                                                            💯
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li
                                                                class="c-list__item"
                                                            >
                                                                <div
                                                                    class="c-list__grid"
                                                                >
                                                                    <div
                                                                        class="c-flag c-place u-bg--transparent"
                                                                    >
                                                                        9
                                                                    </div>
                                                                    <div
                                                                        class="c-media"
                                                                    >
                                                                        <img
                                                                            class="c-avatar c-media__img"
                                                                            src="https://www.formula1.com/content/dam/fom-website/drivers/A/ALEALB01_Alexander_Albon/alealb01.png.transform/2col-retina/image.png"
                                                                        />
                                                                        <div
                                                                            class="c-media__content"
                                                                        >
                                                                            <div
                                                                                class="c-media__title"
                                                                            >
                                                                                Alexander
                                                                                Albon
                                                                            </div>
                                                                            <a
                                                                                class="c-media__link u-text--small"
                                                                                href="https://instagram.com/alex_albon"
                                                                                target="_blank"
                                                                                >@alex_albon</a
                                                                            >
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="u-text--right c-kudos"
                                                                    >
                                                                        <div
                                                                            class="u-mt--8"
                                                                        >
                                                                            <strong
                                                                                >4</strong
                                                                            >
                                                                            🏆
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li
                                                                class="c-list__item"
                                                            >
                                                                <div
                                                                    class="c-list__grid"
                                                                >
                                                                    <div
                                                                        class="c-flag c-place u-bg--transparent"
                                                                    >
                                                                        10
                                                                    </div>
                                                                    <div
                                                                        class="c-media"
                                                                    >
                                                                        <img
                                                                            class="c-avatar c-media__img"
                                                                            src="https://www.formula1.com/content/dam/fom-website/drivers/C/CARSAI01_Carlos_Sainz/carsai01.png.transform/2col-retina/image.png"
                                                                        />
                                                                        <div
                                                                            class="c-media__content"
                                                                        >
                                                                            <div
                                                                                class="c-media__title"
                                                                            >
                                                                                Carlos
                                                                                Sainz
                                                                                Jr.
                                                                            </div>
                                                                            <a
                                                                                class="c-media__link u-text--small"
                                                                                href="https://instagram.com/carlossainz55"
                                                                                target="_blank"
                                                                                >@carlossainz55</a
                                                                            >
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="u-text--right c-kudos"
                                                                    >
                                                                        <div
                                                                            class="u-mt--8"
                                                                        >
                                                                            <strong
                                                                                >1</strong
                                                                            >
                                                                            👍
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
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

        <div
            class="modal vd_mdl fade"
            id="videoModal"
            tabindex="-1"
            role="dialog"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                    >
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-body" v-if="course.video">
                        <video height="320" class="w-100" controls>
                            <source :src="`${globalBaseUrl}${course.video}`" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <!-- <iframe
                            src="https://www.youtube.com/embed/Ohe_JzKksvA"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen
                        ></iframe> -->
                    </div>
                </div>
            </div>
        </div>
    </span>
</template>

<script>

export default {
    name: "CourseDetail",
    data(){
        return {
            id:null,
            course:{},
        }
    },
    async created(){
        this.$store.dispatch('toggleLoader',true);
        if(!this.$route.params.id){
            this.$router.push({
                name: "Courses",
            });
        }
        this.id = this.$route.params.id;
        let response  = await axios.get(`${globalBaseUrl}instructor/get_course_detail/${this.id}`)
        this.course = response.data.data;
        console.log(this.course);
        this.$store.dispatch('toggleLoader',false);
    }
};
</script>

<style></style>
