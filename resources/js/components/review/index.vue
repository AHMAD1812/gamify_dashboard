<template>
    <div class="sa4d25">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="st_title">
                        <i class="uil uil-star"></i> All Review
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="student_reviews">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="reviews_left">
                                    <h3>Student Feedback</h3>
                                    <div class="total_rating">
                                        <div class="_rate001">
                                            {{ total_ratings }}
                                        </div>
                                        <StarRating
                                            :rating="total_ratings"
                                        ></StarRating>
                                        <div class="_rate002">
                                            Course Rating
                                        </div>
                                    </div>
                                    <div class="_rate003">
                                        <div class="_rate004">
                                            <div class="progress progress1">
                                                <div
                                                    class="progress-bar"
                                                    :style="{
                                                        width: `${
                                                            reviews.length == 0
                                                                ? 0
                                                                : (stars[0] /
                                                                      reviews.length) *
                                                                  100
                                                        }%`,
                                                    }"
                                                    role="progressbar"
                                                ></div>
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
                                                    class="rating-star full-star"
                                                ></span>
                                            </div>
                                            <div class="_rate002">
                                                {{
                                                    reviews.length == 0
                                                        ? 0
                                                        : (stars[0] /
                                                              reviews.length) *
                                                          100
                                                }}%
                                            </div>
                                        </div>
                                        <div class="_rate004">
                                            <div class="progress progress1">
                                                <div
                                                    class="progress-bar"
                                                    :style="{
                                                        width: `${
                                                            reviews.length == 0
                                                                ? 0
                                                                : (stars[1] /
                                                                      reviews.length) *
                                                                  100
                                                        }%`,
                                                    }"
                                                    role="progressbar"
                                                ></div>
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
                                                    class="rating-star empty-star"
                                                ></span>
                                            </div>
                                            <div class="_rate002">
                                                {{
                                                    reviews.length == 0
                                                        ? 0
                                                        : (stars[1] /
                                                              reviews.length) *
                                                          100
                                                }}%
                                            </div>
                                        </div>
                                        <div class="_rate004">
                                            <div class="progress progress1">
                                                <div
                                                    class="progress-bar"
                                                    :style="{
                                                        width: `${
                                                            reviews.length == 0
                                                                ? 0
                                                                : (stars[2] /
                                                                      reviews.length) *
                                                                  100
                                                        }%`,
                                                    }"
                                                    role="progressbar"
                                                ></div>
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
                                                    class="rating-star empty-star"
                                                ></span>
                                                <span
                                                    class="rating-star empty-star"
                                                ></span>
                                            </div>
                                            <div class="_rate002">
                                                {{
                                                    (reviews.length == 0
                                                        ? 0
                                                        : stars[2] /
                                                          reviews.length) * 100
                                                }}%
                                            </div>
                                        </div>
                                        <div class="_rate004">
                                            <div class="progress progress1">
                                                <div
                                                    class="progress-bar"
                                                    :style="{
                                                        width: `${
                                                            reviews.length == 0
                                                                ? 0
                                                                : (stars[3] /
                                                                      reviews.length) *
                                                                  100
                                                        }%`,
                                                    }"
                                                    role="progressbar"
                                                ></div>
                                            </div>
                                            <div class="rating-box">
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
                                            <div class="_rate002">
                                                {{
                                                    reviews.length == 0
                                                        ? 0
                                                        : (stars[3] /
                                                              reviews.length) *
                                                          100
                                                }}%
                                            </div>
                                        </div>
                                        <div class="_rate004">
                                            <div class="progress progress1">
                                                <div
                                                    class="progress-bar"
                                                    role="progressbar"
                                                    :style="{
                                                        width: `${
                                                            reviews.length == 0
                                                                ? 0
                                                                : (stars[4] /
                                                                      reviews.length) *
                                                                  100
                                                        }%`,
                                                    }"
                                                ></div>
                                            </div>
                                            <div class="rating-box">
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
                                            <div class="_rate002">
                                                {{
                                                    reviews.length == 0
                                                        ? 0
                                                        : (stars[2] /
                                                              reviews.length) *
                                                          100
                                                }}%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="review_right">
                                    <div class="review_right_heading">
                                        <h3>All Reviews</h3>
                                        <div class="review_search">
                                            <input
                                                class="rv_srch"
                                                type="text"
                                                placeholder="Search reviews..."
                                            />
                                            <button class="rvsrch_btn">
                                                <i class="uil uil-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <UnavailableData
                                    v-if="reviews.length == 0"
                                    :message="'No reviews found'"
                                ></UnavailableData>
                                <div
                                    class="review_all120"
                                    v-for="(review, key) in reviews"
                                    :key="`review_${key}`"
                                    :class="key != 0 ? 'mt-30' : ''"
                                >
                                    <div class="review_item_course_title">
                                        <a href="#">{{ review.course.title }}</a>
                                    </div>

                                    <div class="review_item">
                                        <div class="review_usr_dt">
                                            <img
                                                :src="`${globalBaseUrl}${
                                                    review.user.profile_img
                                                        ? review.user
                                                              .profile_img
                                                        : 'images/left-imgs/img-1.jpg'
                                                }`"
                                                alt=""
                                            />
                                            <div class="rv1458">
                                                <h4 class="tutor_name1">
                                                    {{ review.user.full_name }}
                                                </h4>
                                                <span class="time_145"
                                                    >2 hour ago</span
                                                >
                                            </div>
                                        </div>
                                        <div class="mt-20">
                                            <StarRating
                                                :rating="review.rating"
                                            ></StarRating>
                                        </div>
                                        <p class="rvds10">
                                            {{ review.description }}
                                        </p>
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
import StarRating from "../courses/rating";
import UnavailableData from "../layouts/UnavailableData.vue";

export default {
    name: "Review",
    components: {
        StarRating,
        UnavailableData,
    },
    data() {
        return {
            reviews: [],
            stars: [0, 0, 0, 0, 0],
            total_ratings: 0,
        };
    },
    async created() {
        this.$store.dispatch("toggleLoader", true);
        let response = await axios.get(
            `${globalBaseUrl}instructor/get_reviews`
        );
        this.reviews = response.data.data;
        let ratings = 0;
        this.reviews.forEach((val) => {
            if (val.rating <= 1) {
                this.stars[4] += 1;
            } else if (val.rating <= 2) {
                this.stars[3] += 1;
            } else if (val.rating <= 3) {
                this.stars[2] += 1;
            } else if (val.rating <= 4) {
                this.stars[1] += 1;
            } else if (val.rating <= 5) {
                this.stars[0] += 1;
            }
            ratings += val.rating;
        });
        this.total_ratings =
            this.reviews.length == 0 ? 0 : ratings / this.reviews.length;
        this.$store.dispatch("toggleLoader", false);
    },
    mounted() {
        $(window).scrollTop(0);
    },
};
</script>

<style></style>
