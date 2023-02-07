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
                          <div class="_ttl123">612K</div>
                        </div>
                      </li>
                      <li>
                        <div class="_ttl121">
                          <div class="_ttl122">Videos</div>
                          <div class="_ttl123">8</div>
                        </div>
                      </li>
                      <li>
                        <div class="_ttl121">
                          <div class="_ttl122">Reviews</div>
                          <div class="_ttl123">11K</div>
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
                      <h3>My videos (8)</h3>
                      <div class="_14d25">
                        <div class="row">
                          <div class="col-lg-3 col-md-4">
                            <div class="fcrse_1 mt-30">
                              <a
                                href="course_detail_view.html"
                                class="fcrse_img"
                              >
                                <img :src="`${globalBaseUrl}images/courses/img-1.jpg`" alt="" />
                                <div class="course-overlay">
                                  <div class="badge_seller">Bestseller</div>
                                  <div class="crse_reviews">
                                    <i class="uil uil-star"></i>4.5
                                  </div>
                                  <span class="play_btn1"
                                    ><i class="uil uil-play"></i
                                  ></span>
                                  <div class="crse_timer">25 hours</div>
                                </div>
                              </a>
                              <div class="fcrse_content">
                                <div class="eps_dots more_dropdown">
                                  <a href="#"
                                    ><i class="uil uil-ellipsis-v"></i
                                  ></a>
                                  <div class="dropdown-content">
                                    <span
                                      ><i class="uil uil-share-alt"></i
                                      >Share</span
                                    >
                                    <span
                                      ><i class="uil uil-edit-alt"></i
                                      >Edit</span
                                    >
                                  </div>
                                </div>
                                <div class="vdtodt">
                                  <span class="vdt14">109k views</span>
                                  <span class="vdt14">15 days ago</span>
                                </div>
                                <a
                                  href="course_detail_view.html"
                                  class="crse14s"
                                  >Complete Python Bootcamp: Go from zero to
                                  hero in Python 3</a
                                >
                                <a href="#" class="crse-cate"
                                  >Web Development | Python</a
                                >
                                <div class="auth1lnkprce">
                                  <p class="cr1fot">
                                    By <a href="#">John Doe</a>
                                  </p>
                                  <!-- <div class="prce142">$10</div> -->
                                  <button class="shrt-cart-btn" title="cart">
                                    <i class="uil uil-shopping-cart-alt"></i>
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-4">
                            <div class="fcrse_1 mt-30">
                              <a
                                href="course_detail_view.html"
                                class="fcrse_img"
                              >
                                <img :src="`${globalBaseUrl}images/courses/img-2.jpg`" alt="" />
                                <div class="course-overlay">
                                  <div class="badge_seller">Bestseller</div>
                                  <div class="crse_reviews">
                                    <i class="uil uil-star"></i>4.5
                                  </div>
                                  <span class="play_btn1"
                                    ><i class="uil uil-play"></i
                                  ></span>
                                  <div class="crse_timer">28 hours</div>
                                </div>
                              </a>
                              <div class="fcrse_content">
                                <div class="eps_dots more_dropdown">
                                  <a href="#"
                                    ><i class="uil uil-ellipsis-v"></i
                                  ></a>
                                  <div class="dropdown-content">
                                    <span
                                      ><i class="uil uil-share-alt"></i
                                      >Share</span
                                    >
                                    <span
                                      ><i class="uil uil-edit-alt"></i
                                      >Edit</span
                                    >
                                  </div>
                                </div>
                                <div class="vdtodt">
                                  <span class="vdt14">5M views</span>
                                  <span class="vdt14">15 days ago</span>
                                </div>
                                <a
                                  href="course_detail_view.html"
                                  class="crse14s"
                                  >The Complete JavaScript Course 2020: Build
                                  Real Projects!</a
                                >
                                <a href="#" class="crse-cate"
                                  >Development | JavaScript</a
                                >
                                <div class="auth1lnkprce">
                                  <p class="cr1fot">
                                    By <a href="#">John Doe</a>
                                  </p>
                                  <!-- <div class="prce142">$5</div> -->
                                  <button class="shrt-cart-btn" title="cart">
                                    <i class="uil uil-shopping-cart-alt"></i>
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-4">
                            <div class="fcrse_1 mt-30">
                              <a
                                href="course_detail_view.html"
                                class="fcrse_img"
                              >
                                <img :src="`${globalBaseUrl}images/courses/img-20.jpg`" alt="" />
                                <div class="course-overlay">
                                  <div class="crse_reviews">
                                    <i class="uil uil-star"></i>5.0
                                  </div>
                                  <span class="play_btn1"
                                    ><i class="uil uil-play"></i
                                  ></span>
                                  <div class="crse_timer">21 hours</div>
                                </div>
                              </a>
                              <div class="fcrse_content">
                                <div class="eps_dots more_dropdown">
                                  <a href="#"
                                    ><i class="uil uil-ellipsis-v"></i
                                  ></a>
                                  <div class="dropdown-content">
                                    <span
                                      ><i class="uil uil-share-alt"></i
                                      >Share</span
                                    >
                                    <span
                                      ><i class="uil uil-edit-alt"></i
                                      >Edit</span
                                    >
                                  </div>
                                </div>
                                <div class="vdtodt">
                                  <span class="vdt14">200 Views</span>
                                  <span class="vdt14">4 days ago</span>
                                </div>
                                <a
                                  href="course_detail_view.html"
                                  class="crse14s"
                                  >WordPress Development - Themes, Plugins &amp;
                                  Gutenberg</a
                                >
                                <a href="#" class="crse-cate"
                                  >Design | Wordpress</a
                                >
                                <div class="auth1lnkprce">
                                  <p class="cr1fot">
                                    By <a href="#">John Doe</a>
                                  </p>
                                  <!-- <div class="prce142">$14</div> -->
                                  <button class="shrt-cart-btn" title="cart">
                                    <i class="uil uil-shopping-cart-alt"></i>
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-4">
                            <div class="fcrse_1 mt-30">
                              <a
                                href="course_detail_view.html"
                                class="fcrse_img"
                              >
                                <img :src="`${globalBaseUrl}images/courses/img-4.jpg`" alt="" />
                                <div class="course-overlay">
                                  <div class="badge_seller">Bestseller</div>
                                  <div class="crse_reviews">
                                    <i class="uil uil-star"></i>5.0
                                  </div>
                                  <span class="play_btn1"
                                    ><i class="uil uil-play"></i
                                  ></span>
                                  <div class="crse_timer">1 hour</div>
                                </div>
                              </a>
                              <div class="fcrse_content">
                                <div class="eps_dots more_dropdown">
                                  <a href="#"
                                    ><i class="uil uil-ellipsis-v"></i
                                  ></a>
                                  <div class="dropdown-content">
                                    <span
                                      ><i class="uil uil-share-alt"></i
                                      >Share</span
                                    >
                                    <span
                                      ><i class="uil uil-edit-alt"></i
                                      >Edit</span
                                    >
                                  </div>
                                </div>
                                <div class="vdtodt">
                                  <span class="vdt14">153k views</span>
                                  <span class="vdt14">3 months ago</span>
                                </div>
                                <a
                                  href="course_detail_view.html"
                                  class="crse14s"
                                  >The Complete Digital Marketing Course - 12
                                  Courses in 1</a
                                >
                                <a href="#" class="crse-cate"
                                  >Digital Marketing | Marketing</a
                                >
                                <div class="auth1lnkprce">
                                  <p class="cr1fot">
                                    By <a href="#">John Doe</a>
                                  </p>
                                  <!-- <div class="prce142">$12</div> -->
                                  <button class="shrt-cart-btn" title="cart">
                                    <i class="uil uil-shopping-cart-alt"></i>
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-4">
                            <div class="fcrse_1 mt-30">
                              <a
                                href="course_detail_view.html"
                                class="fcrse_img"
                              >
                                <img :src="`${globalBaseUrl}images/courses/img-13.jpg`" alt="" />
                                <div class="course-overlay">
                                  <span class="play_btn1"
                                    ><i class="uil uil-play"></i
                                  ></span>
                                  <div class="crse_timer">30 hours</div>
                                </div>
                              </a>
                              <div class="fcrse_content">
                                <div class="eps_dots more_dropdown">
                                  <a href="#"
                                    ><i class="uil uil-ellipsis-v"></i
                                  ></a>
                                  <div class="dropdown-content">
                                    <span
                                      ><i class="uil uil-share-alt"></i
                                      >Share</span
                                    >
                                    <span
                                      ><i class="uil uil-edit-alt"></i
                                      >Edit</span
                                    >
                                  </div>
                                </div>
                                <div class="vdtodt">
                                  <span class="vdt14">20 Views</span>
                                  <span class="vdt14">1 day ago</span>
                                </div>
                                <a
                                  href="course_detail_view.html"
                                  class="crse14s"
                                  >The Complete Node.js Developer Course (3rd
                                  Edition)</a
                                >
                                <a href="#" class="crse-cate"
                                  >Development | Node.js</a
                                >
                                <div class="auth1lnkprce">
                                  <p class="cr1fot">
                                    By <a href="#">John Doe</a>
                                  </p>
                                  <!-- <div class="prce142">$3</div> -->
                                  <button class="shrt-cart-btn" title="cart">
                                    <i class="uil uil-shopping-cart-alt"></i>
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-4">
                            <div class="fcrse_1 mt-30">
                              <a
                                href="course_detail_view.html"
                                class="fcrse_img"
                              >
                                <img :src="`${globalBaseUrl}images/courses/img-7.jpg`" alt="" />
                                <div class="course-overlay">
                                  <div class="badge_seller">Bestseller</div>
                                  <div class="crse_reviews">
                                    <i class="uil uil-star"></i>5.0
                                  </div>
                                  <span class="play_btn1"
                                    ><i class="uil uil-play"></i
                                  ></span>
                                  <div class="crse_timer">5.4 hours</div>
                                </div>
                              </a>
                              <div class="fcrse_content">
                                <div class="eps_dots more_dropdown">
                                  <a href="#"
                                    ><i class="uil uil-ellipsis-v"></i
                                  ></a>
                                  <div class="dropdown-content">
                                    <span
                                      ><i class="uil uil-share-alt"></i
                                      >Share</span
                                    >
                                    <span
                                      ><i class="uil uil-edit-alt"></i
                                      >Edit</span
                                    >
                                  </div>
                                </div>
                                <div class="vdtodt">
                                  <span class="vdt14">109k views</span>
                                  <span class="vdt14">15 days ago</span>
                                </div>
                                <a
                                  href="course_detail_view.html"
                                  class="crse14s"
                                  >WordPress for Beginners: Create a Website
                                  Step by Step</a
                                >
                                <a href="#" class="crse-cate"
                                  >Design | Wordpress</a
                                >
                                <div class="auth1lnkprce">
                                  <p class="cr1fot">
                                    By <a href="#">John Doe</a>
                                  </p>
                                  <!-- <div class="prce142">$18</div> -->
                                  <button class="shrt-cart-btn" title="cart">
                                    <i class="uil uil-shopping-cart-alt"></i>
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-4">
                            <div class="fcrse_1 mt-30">
                              <a
                                href="course_detail_view.html"
                                class="fcrse_img"
                              >
                                <img :src="`${globalBaseUrl}images/courses/img-8.jpg`" alt="" />
                                <div class="course-overlay">
                                  <div class="badge_seller">Bestseller</div>
                                  <div class="crse_reviews">
                                    <i class="uil uil-star"></i>4.0
                                  </div>
                                  <span class="play_btn1"
                                    ><i class="uil uil-play"></i
                                  ></span>
                                  <div class="crse_timer">23 hours</div>
                                </div>
                              </a>
                              <div class="fcrse_content">
                                <div class="eps_dots more_dropdown">
                                  <a href="#"
                                    ><i class="uil uil-ellipsis-v"></i
                                  ></a>
                                  <div class="dropdown-content">
                                    <span
                                      ><i class="uil uil-share-alt"></i
                                      >Share</span
                                    >
                                    <span
                                      ><i class="uil uil-edit-alt"></i
                                      >Edit</span
                                    >
                                  </div>
                                </div>
                                <div class="vdtodt">
                                  <span class="vdt14">196k views</span>
                                  <span class="vdt14">1 month ago</span>
                                </div>
                                <a
                                  href="course_detail_view.html"
                                  class="crse14s"
                                  >CSS - The Complete Guide 2020 (incl. Flexbox,
                                  Grid &amp; Sass)</a
                                >
                                <a href="#" class="crse-cate">Design | CSS</a>
                                <div class="auth1lnkprce">
                                  <p class="cr1fot">
                                    By <a href="#">John Doe</a>
                                  </p>
                                  <!-- <div class="prce142">$10</div> -->
                                  <button class="shrt-cart-btn" title="cart">
                                    <i class="uil uil-shopping-cart-alt"></i>
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-4">
                            <div class="fcrse_1 mt-30">
                              <a
                                href="course_detail_view.html"
                                class="fcrse_img"
                              >
                                <img :src="`${globalBaseUrl}images/courses/img-16.jpg`" alt="" />
                                <div class="course-overlay">
                                  <span class="play_btn1"
                                    ><i class="uil uil-play"></i
                                  ></span>
                                  <div class="crse_timer">22 hours</div>
                                </div>
                              </a>
                              <div class="fcrse_content">
                                <div class="eps_dots more_dropdown">
                                  <a href="#"
                                    ><i class="uil uil-ellipsis-v"></i
                                  ></a>
                                  <div class="dropdown-content">
                                    <span
                                      ><i class="uil uil-share-alt"></i
                                      >Share</span
                                    >
                                    <span
                                      ><i class="uil uil-edit-alt"></i
                                      >Edit</span
                                    >
                                  </div>
                                </div>
                                <div class="vdtodt">
                                  <span class="vdt14">11 Views</span>
                                  <span class="vdt14">5 Days ago</span>
                                </div>
                                <a
                                  href="course_detail_view.html"
                                  class="crse14s"
                                  >Vue JS 2 - The Complete Guide (incl. Vue
                                  Router &amp; Vuex)</a
                                >
                                <a href="#" class="crse-cate"
                                  >Development | Vue JS</a
                                >
                                <div class="auth1lnkprce">
                                  <p class="cr1fot">
                                    By <a href="#">John Doe</a>
                                  </p>
                                  <!-- <div class="prce142">$10</div> -->
                                  <button class="shrt-cart-btn" title="cart">
                                    <i class="uil uil-shopping-cart-alt"></i>
                                  </button>
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
                        <div class="row">
                          <div class="col-lg-3 col-md-4">
                            <div class="fcrse_1 mt-30">
                              <div class="tutor_img">
                                <a href="#"
                                  ><img :src="`${globalBaseUrl}images/left-imgs/img-1.jpg`" alt=""
                                /></a>
                              </div>
                              <div class="tutor_content_dt">
                                <div class="tutor150">
                                  <a href="#" class="tutor_name">John Doe</a>
                                  <div class="mef78" title="Verify">
                                    <i class="uil uil-check-circle"></i>
                                  </div>
                                </div>
                                <div class="tutor_cate">
                                  Wordpress &amp; Plugin Tutor
                                </div>
                                <ul class="tutor_social_links">
                                  <li>
                                    <button class="sbbc145">Subscribed</button>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-4">
                            <div class="fcrse_1 mt-30">
                              <div class="tutor_img">
                                <a href="#"
                                  ><img :src="`${globalBaseUrl}images/left-imgs/img-2.jpg`" alt=""
                                /></a>
                              </div>
                              <div class="tutor_content_dt">
                                <div class="tutor150">
                                  <a href="#" class="tutor_name"
                                    >Kerstin Cable</a
                                  >
                                  <div class="mef78" title="Verify">
                                    <i class="uil uil-check-circle"></i>
                                  </div>
                                </div>
                                <div class="tutor_cate">
                                  Language Learning Coach, Writer, Online Tutor
                                </div>
                                <ul class="tutor_social_links">
                                  <li>
                                    <button class="sbbc145">Subscribed</button>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-4">
                            <div class="fcrse_1 mt-30">
                              <div class="tutor_img">
                                <a href="#"
                                  ><img :src="`${globalBaseUrl}images/left-imgs/img-3.jpg`" alt=""
                                /></a>
                              </div>
                              <div class="tutor_content_dt">
                                <div class="tutor150">
                                  <a href="#" class="tutor_name"
                                    >Jose Portilla</a
                                  >
                                  <div class="mef78" title="Verify">
                                    <i class="uil uil-check-circle"></i>
                                  </div>
                                </div>
                                <div class="tutor_cate">
                                  Head of Data Science, Pierian Data Inc.
                                </div>
                                <ul class="tutor_social_links">
                                  <li>
                                    <button class="sbbc145">Subscribed</button>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-4">
                            <div class="fcrse_1 mt-30">
                              <div class="tutor_img">
                                <a href="#"
                                  ><img :src="`${globalBaseUrl}images/left-imgs/img-3.jpg`" alt=""
                                /></a>
                              </div>
                              <div class="tutor_content_dt">
                                <div class="tutor150">
                                  <a href="#" class="tutor_name"
                                    >Jose Portilla</a
                                  >
                                  <div class="mef78" title="Verify">
                                    <i class="uil uil-check-circle"></i>
                                  </div>
                                </div>
                                <div class="tutor_cate">
                                  Head of Data Science, Pierian Data Inc.
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
export default {
    name:"Profile",
    computed:{
      user() {
        return this.$store.state.user;
      }
    }
}
</script>

<style>

</style>