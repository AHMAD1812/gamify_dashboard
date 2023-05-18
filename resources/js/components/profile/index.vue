<template>
  <span>
      <div class="_216b01">
        <div class="container-fluid">
          <div class="row justify-content-md-center">
            <div class="col-md-10">
              <div class="section3125 rpt145">
                <div class="row">
                  <div class="col-lg-7">
                    <a href="#" class="_216b22">
                      <span><i class="uil uil-cog"></i></span>Setting
                    </a>
                    <div class="dp_dt150">
                      <div class="img148">
                        <img :src="user.profile_img == null ? `${globalBaseUrl}images/avatar.png` : `${globalBaseUrl}${user.profile_img}`" alt="" />
                      </div>
                      <div class="prfledt1">
                        <h2>{{user.full_name}}</h2>
                        <span>{{user.email}}</span>
                      </div>
                    </div>
                    <ul class="_ttl120">
                      <li>
                        <div class="_ttl121">
                          <div class="_ttl122">Enroll Students</div>
                          <div class="_ttl123">{{enrolled_students}}</div>
                        </div>
                      </li>
                      <li>
                        <div class="_ttl121">
                          <div class="_ttl122">Videos</div>
                          <div class="_ttl123">{{ courses.length }}</div>
                        </div>
                      </li>
                      <li>
                        <div class="_ttl121">
                          <div class="_ttl122">Reviews</div>
                          <div class="_ttl123">{{ reviews_count }}</div>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <div class="col-lg-5">
                    <div class="rgt-145">
                      <ul class="tutor_social_links">
                        <li>
                          <a href="#" class="fb"
                            ><i class="fab fa-facebook-f"></i
                          ></a>
                        </li>
                        <li>
                          <a href="#" class="tw"
                            ><i class="fab fa-twitter"></i
                          ></a>
                        </li>
                        <li>
                          <a href="#" class="ln"
                            ><i class="fab fa-linkedin-in"></i
                          ></a>
                        </li>
                        <li>
                          <a href="#" class="yu"
                            ><i class="fab fa-youtube"></i
                          ></a>
                        </li>
                      </ul>
                    </div>
                    <ul class="_bty149">
                      <li>
                        <button
                          class="msg125 btn500"
                          @click="$router.push({name: 'Setting'})"
                        >
                          Edit
                        </button>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="_215b15">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="course_tabs">
                <nav>
                  <div
                    class="nav nav-tabs tab_crse"
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
                      id="nav-courses-tab"
                      data-toggle="tab"
                      href="#nav-courses"
                      role="tab"
                      aria-selected="false"
                      >Videos</a
                    >
                    <a
                      class="nav-item nav-link"
                      id="nav-subscriptions-tab"
                      data-toggle="tab"
                      href="#nav-subscriptions"
                      role="tab"
                      aria-selected="false"
                      >Students</a
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
                      <div class="_htg452">
                        <h3>About Me</h3>
                        <p>
                          {{ user.biography}}
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="nav-courses" role="tabpanel">
                    <div class="crse_content">
                      <h3>My videos ({{ courses.length }})</h3>
                      <div class="_14d25">
                        <div class="w-100 text-center" v-if="courses.length == 0">
                          <UnavailableData
                              :message="'No courses found'"
                          ></UnavailableData>
                        </div>
                        <div class="row">
                          <div class="col-lg-3 col-md-4" v-for="(course,key) in courses" :key="key">
                            <div class="fcrse_1 mt-30">
                              <router-link
                                :to="{name : 'CourseDetail',
                                params:{id: course.id}}"
                                class="fcrse_img"
                              >
                                <img :src="`${globalBaseUrl}${course.poster}`" alt="" />
                                <div class="course-overlay">
                                  <div class="badge_seller">Bestseller</div>
                                  <div class="crse_reviews">
                                    <i class="uil uil-star"></i>4.5
                                  </div>
                                  <span class="play_btn1"
                                    ><i class="uil uil-play"></i
                                  ></span>
                                  <div class="crse_timer">{{course.playing_time}}</div>
                                </div>
                              </router-link>
                              <div class="fcrse_content">
                                <a
                                  href="course_detail_view.html"
                                  class="crse14s"
                                  >{{course.title}}</a
                                >
                                <a href="#" class="crse-cate"
                                  >{{course.categories}}</a
                                >
                                <div class="auth1lnkprce">
                                  <p class="cr1fot">
                                    By <a href="#">{{user.full_name}}</a>
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div
                    class="tab-pane fade show"
                    id="nav-subscriptions"
                    role="tabpanel"
                  >
                    <div class="_htg451">
                      <div class="_htg452">
                        <h3>Students</h3>
                        <div class="w-100 text-center" v-if="students.length == 0">
                          <UnavailableData
                              :message="'No students found'"
                          ></UnavailableData>
                        </div>
                        <div class="row">
                          <div class="col-lg-3 col-md-4" v-for="(student,key) in students" :key="`student_${key}`">
                            <div class="fcrse_1 mt-30">
                              <div class="tutor_img">
                                <a href="#"
                                  ><img :src="`${globalBaseUrl}${student.profile_img ? student.profile_img : 'images/left-imgs/img-1.jpg'}`" alt=""
                                /></a>
                              </div>
                              <div class="tutor_content_dt">
                                <div class="tutor150">
                                  <a href="#" class="tutor_name">{{ student.full_name }}</a>
                                  <div class="mef78" title="Verify">
                                    <i class="uil uil-check-circle"></i>
                                  </div>
                                </div>
                                <ul class="tutor_social_links">
                                  <li>
                                    <button class="sbbc145">Subscribed</button>
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
      </div>
    </span>
</template>

<script>
import UnavailableData from '../layouts/UnavailableData.vue';
export default {
    name:"Profile",
    components:{
      UnavailableData
    },
    data(){
      return {
        courses:[],
        students:[],
        reviews_count:0,
        enrolled_students:0,
      }
    },
    async mounted() {
        this.$store.dispatch("toggleLoader", true);
        await axios
            .get(`${globalBaseUrl}instructor/profile_data`)
            .then((response) => {
              console.log(response);
              response = response.data.data;
              this.courses = response.courses;
              this.students = response.students;
              this.enrolled_students = response.enrolled_student;
              this.reviews_count = response.reviews_count;
              this.$store.dispatch("toggleLoader", false);
            }).catch((e)=>{
              this.$store.dispatch("toggleLoader", false);
            });
    },
    computed:{
      user() {
        return this.$store.state.user;
      }
    }
}
</script>

<style>

</style>