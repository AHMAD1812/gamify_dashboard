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
                                            {{ total_ratings }}
                                        </div>
                                        ({{reviews.length}} ratings)
                                    </div>
                                    <div class="_215b05">
                                        {{leaderboard.length}} students enrolled
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
                                            ><span>{{leaderboard.length}}</span></a
                                        >
                                    </li>
                                    <li>
                                        <a href="#" class="lkcm152"
                                            ><i class="fa fa-heart-o" aria-hidden="true"></i>
                                            <span>{{favourite_count}}</span></a
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
                                                            {{ total_ratings }}
                                                        </div>
                                                        <StarRating :rating="total_ratings"></StarRating>
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
                                                                    class="progress-bar"
                                                                    :style="{width: `${reviews.length == 0 ? 0 :(stars[0]/reviews.length)*100}%`}"
                                                                    role="progressbar"
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
                                                            {{reviews.length == 0 ? 0 :(stars[0]/reviews.length)*100}}%
                                                            </div>
                                                        </div>
                                                        <div class="_rate004">
                                                            <div
                                                                class="progress progress1"
                                                            >
                                                                <div
                                                                    class="progress-bar"
                                                                    :style="{width: `${reviews.length == 0 ? 0 :(stars[1]/reviews.length)*100}%`}"
                                                                    role="progressbar"
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
                                                            {{reviews.length == 0 ? 0 : (stars[1]/reviews.length)*100}}%
                                                            </div>
                                                        </div>
                                                        <div class="_rate004">
                                                            <div
                                                                class="progress progress1"
                                                            >
                                                                <div
                                                                    class="progress-bar"
                                                                    :style="{width: `${reviews.length == 0 ? 0 :(stars[2]/reviews.length)*100}%`}"
                                                                    role="progressbar"
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
                                                            {{(reviews.length == 0 ? 0 :stars[2]/reviews.length)*100}}%
                                                            </div>
                                                        </div>
                                                        <div class="_rate004">
                                                            <div
                                                                class="progress progress1"
                                                            >
                                                                <div
                                                                    class="progress-bar"
                                                                    :style="{width: `${reviews.length == 0 ? 0 :(stars[3]/reviews.length)*100}%`}"
                                                                    role="progressbar"
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
                                                            {{reviews.length == 0 ? 0 :(stars[3]/reviews.length)*100}}%
                                                            </div>
                                                        </div>
                                                        <div class="_rate004">
                                                            <div
                                                                class="progress progress1"
                                                            >
                                                                <div
                                                                    class="progress-bar"
                                                                    role="progressbar"
                                                                    :style="{width: `${reviews.length == 0 ? 0 :(stars[4]/reviews.length)*100}%`}"
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
                                                            {{reviews.length == 0 ? 0 : (stars[2]/reviews.length)*100}}%
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
                                                    <UnavailableData v-if="reviews.length == 0" :message="'No reviews found'"></UnavailableData>
                                                    <div class="review_item" v-for="(review,key) in reviews" :key="`reviews_${key}`">
                                                        <div
                                                            class="review_usr_dt"
                                                        >
                                                            <img
                                                                :src="`${globalBaseUrl}${review.user.profile_img ? review.user.profile_img :'images/left-imgs/img-1.jpg'}`"
                                                                alt=""
                                                            />
                                                            <div class="rv1458">
                                                                <h4
                                                                    class="tutor_name1"
                                                                >
                                                                    {{review.user.full_name}}
                                                                </h4>
                                                                <span
                                                                    class="time_145"
                                                                    >2 hour
                                                                    ago</span
                                                                >
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="mt-20"
                                                        >
                                                        <StarRating :rating="review.rating"></StarRating>
                                                        </div>
                                                        <p class="rvds10">
                                                            {{review.description}}
                                                        </p>
                                                    </div>
                                                    <!-- <div class="review_item">
                                                        <a
                                                            href="#"
                                                            class="more_reviews"
                                                            >See More Reviews</a
                                                        >
                                                    </div> -->
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
                                                                    <h2>{{leaderboard.length}}</h2>
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
                                                                    <h2>{{ average_score }}</h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="c-card">
                                                        <div
                                                            class="c-card__body"
                                                            v-if="leaderboard.length >= 1"
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
                                                                    :src="`${globalBaseUrl}${leaderboard[0].student.profile_img ? leaderboard[0].student.profile_img :'images/left-imgs/img-1.jpg'}`"
                                                                />
                                                                <h3
                                                                    class="u-text--teal u-text--small"
                                                                    >{{leaderboard[0].student.full_name}}</h3
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
                                                        <UnavailableData v-if="leaderboard.length == 0" :message="'No score found'"></UnavailableData>
                                                        <ul
                                                            v-if="leaderboard.length >= 1"
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
                                                                v-for="(score,key) in leaderboard"
                                                                :key="`score-${key}`"
                                                            >
                                                                <div
                                                                    class="c-list__grid"
                                                                >
                                                                    <div
                                                                        class="c-flag c-place u-bg--transparent u-text--dark u-bg--yellow"
                                                                    >
                                                                        {{key+1}}
                                                                    </div>
                                                                    <div
                                                                        class="c-media"
                                                                    >
                                                                        <img
                                                                            class="c-avatar c-media__img"
                                                                            :src="`${globalBaseUrl}${score.student.profile_img ? score.student.profile_img :'images/left-imgs/img-1.jpg'}`"
                                                                        />
                                                                        <div
                                                                            class="c-media__content"
                                                                        >
                                                                            <div
                                                                                class="c-media__title"
                                                                            >
                                                                                {{score.student.full_name}}
                                                                            </div>
                                                                            <!-- <a
                                                                                class="c-media__link u-text--small"
                                                                                href="https://instagram.com/lewishamilton"
                                                                                target="_blank"
                                                                                >@lewishamilton</a 
                                                                            >-->
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="u-text--right c-kudos u-text--yellow"
                                                                    >
                                                                        <div
                                                                            class="u-mt--8"
                                                                        >
                                                                            <strong
                                                                                >{{score.score}}</strong
                                                                            >
                                                                            ⭐️
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <!-- <li
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
                                                            </li> -->
                                                            
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
import StarRating from './rating';

export default {
    name: "CourseDetail",
    components:{
        StarRating,
    },
    data(){
        return {
            id:null,
            course:{},
            leaderboard:[],
            reviews:[],
            stars:[0,0,0,0,0],
            total_ratings:0,
            average_score:0,
            favourite_count:0,
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
        response = response.data.data;
        this.course = response.course;
        if(this.course == null){
            this.$router.push({
                name: "Courses",
            });
            Vue.$toast.open({
                message: "Invalid Id",
                type: "error",
                position: "top-right",
            });
        }
        this.leaderboard = response.leaderboard;
        this.reviews = response.reviews;
        let ratings = 0;
        this.favourite_count = response.favourite_count;
        this.reviews.forEach((val)=>{
            if(val.rating <= 1){
                this.stars[4] += 1;
            }else if(val.rating <= 2){
                this.stars[3] += 1;
            }else if(val.rating <= 3){
                this.stars[2] += 1;
            }else if(val.rating <= 4){
                this.stars[1] += 1;
            }else if(val.rating <= 5){
                this.stars[0] += 1;
            }
            ratings += val.rating;
        });
        let scores = 0;
        this.leaderboard.forEach((val)=>{
            scores += val.score;
        });
        this.average_score = this.leaderboard == 0 ? 0 : scores/this.leaderboard.length;
        this.total_ratings = this.reviews.length == 0 ? 0 : ratings/this.reviews.length;
        this.$store.dispatch('toggleLoader',false);
    },
    mounted(){
        $(window).scrollTop(0);
    }
};
</script>

<style></style>
