@extends('app.layouts.index')

@section('content')

<!-- ============================ Hero Banner  Start================================== -->
<div class="hero_banner image-cover image_bottom h6_bg">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="simple-search-wrap text-left">
                    <div class="hero_search-2">
                        <h1 class="banner_title mb-4">The Best<br>E-Learning Gamification Platform<br><span class="light"> For Brighten Future</span></h1>
                        <p class="font-lg mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                        <div class="inline_btn">
                            <a href="{{route('instructor.login')}}" class="btn theme-bg text-white">Get Started</a>
                            <a href="{{route('instructor.login')}}" class="btn light_btn">Become An Instructor</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="side_block extream_img">
                    <div class="list_crs_img">
                        <img src="{{asset('main/img/img-1.png')}}" class="img-fluid elsio cirl animate-fl-y" alt="" />
                        <img src="{{asset('main/img/img-3.png')}}" class="img-fluid elsio arrow animate-fl-x" alt="" />
                        <img src="{{asset('main/img/img-2.png')}}" class="img-fluid elsio moon animate-fl-x" alt="" />
                    </div>
                    <img src="{{asset('main/img/circle2.png')}}" class="img-fluid" alt="" />
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================ Hero Banner End ================================== -->

<!-- ================================ Tag Award ================================ -->
<section class="p-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="crp_box fl_color ovr_top">
                    <div class="row align-items-center">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <div class="dro_140">
                                <div class="dro_141 de"><i class="fa fa-journal-whills"></i></div>
                                <div class="dro_142">
                                    <h6>200+ Cources</h6>
                                    <p>Duis aute irure dolor in voluptate velit esse cillum labore .</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <div class="dro_140">
                                <div class="dro_141 de"><i class="fa fa-business-time"></i></div>
                                <div class="dro_142">
                                    <h6>Lifetime Access</h6>
                                    <p>Duis aute irure dolor in voluptate velit esse cillum labore .</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <div class="dro_140">
                                <div class="dro_141 de"><i class="fa fa-user-shield"></i></div>
                                <div class="dro_142">
                                    <h6>800k+ Enrolled</h6>
                                    <p>Duis aute irure dolor in voluptate velit esse cillum labore .</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</section>
<!-- ================================ Tag Award ================================ -->

<!-- ============================ Cources Start ================================== -->
<section>
    <div class="container">
        
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8">
                <div class="sec-heading center">
                    <h2>Explore Interactive <span class="theme-cl">Videos</span></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                </div>
            </div>
        </div>
        
        <div class="row justify-content-center">
            
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="crs_grid_list">
                    
                    <div class="crs_grid_list_thumb">
                        <a href="course-detail.html"><img src="{{asset('main/img/cr-2.jpg')}}" class="img-fluid rounded" alt=""></a>
                        <div class="crs_video_ico">
                            <i class="fa fa-play"></i>
                        </div>
                        <div class="crs_locked_ico">
                            <i class="fa fa-lock"></i>
                        </div>
                    </div>
                    
                    <div class="crs_grid_list_caption">
                        <div class="crs_lt_101">
                            <span class="est st_1">Development</span>
                        </div>
                        <div class="crs_lt_102">
                            <h4 class="crs_tit">Advance PHP knowledge with laravel to make smart web</h4>
                            <span class="crs_auth"><i>By</i> Adam Wilson</span>
                        </div>
                        <div class="crs_lt_103">
                            <div class="crs_info_detail">
                                <ul>
                                    <li><i class="fa fa-user"></i><span>10k User</span></li>
                                    <li><i class="fa fa-eye"></i><span>92k Views</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="crs_flex justify-content-end">
                            <div class="crs_fl_last">
                                <div class="crs_linkview"><a href="course-detail.html" class="btn btn_view_detail theme-bg text-light">Buy Now</a></div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="crs_grid_list">
                    
                    <div class="crs_grid_list_thumb">
                        <a href="course-detail.html"><img src="{{asset('main/img/cr-3.jpg')}}" class="img-fluid rounded" alt=""></a>
                        <div class="crs_video_ico">
                            <i class="fa fa-play"></i>
                        </div>
                        <div class="crs_locked_ico">
                            <i class="fa fa-lock"></i>
                        </div>
                    </div>
                    
                    <div class="crs_grid_list_caption">
                        <div class="crs_lt_101">
                            <span class="est st_1">Insurence</span>
                        </div>
                        <div class="crs_lt_102">
                            <h4 class="crs_tit">The complete accounting & bank financial course 2021</h4>
                            <span class="crs_auth"><i>By</i> Mike Hussey</span>
                        </div>
                        <div class="crs_lt_103">
                            <div class="crs_info_detail">
                                <ul>
                                    <li><i class="fa fa-user"></i><span>10k User</span></li>
                                    <li><i class="fa fa-eye"></i><span>92k Views</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="crs_flex justify-content-end">
                            <div class="crs_fl_last">
                                <div class="crs_linkview"><a href="course-detail.html" class="btn btn_view_detail theme-bg text-light">Buy Now</a></div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="crs_grid_list">
                    
                    <div class="crs_grid_list_thumb">
                        <a href="course-detail.html"><img src="{{asset('main/img/cr-4.jpg')}}" class="img-fluid rounded" alt=""></a>
                        <div class="crs_video_ico">
                            <i class="fa fa-play"></i>
                        </div>
                        <div class="crs_locked_ico">
                            <i class="fa fa-lock"></i>
                        </div>
                    </div>
                    
                    <div class="crs_grid_list_caption">
                        <div class="crs_lt_101">
                            <span class="est st_1">Software</span>
                        </div>
                        <div class="crs_lt_102">
                            <h4 class="crs_tit">The complete business plan course includes 50 templates</h4>
                            <span class="crs_auth"><i>By</i> Litha Joshi</span>
                        </div>
                        <div class="crs_lt_103">
                            <div class="crs_info_detail">
                                <ul>
                                    <li><i class="fa fa-user"></i><span>10k User</span></li>
                                    <li><i class="fa fa-eye"></i><span>92k Views</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="crs_flex justify-content-end">
                            <div class="crs_fl_last">
                                <div class="crs_linkview"><a href="course-detail.html" class="btn btn_view_detail theme-bg text-light">Buy Now</a></div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="crs_grid_list">
                    
                    <div class="crs_grid_list_thumb">
                        <a href="course-detail.html"><img src="{{asset('main/img/cr-2.jpg')}}" class="img-fluid rounded" alt=""></a>
                        <div class="crs_video_ico">
                            <i class="fa fa-play"></i>
                        </div>
                        <div class="crs_locked_ico">
                            <i class="fa fa-lock"></i>
                        </div>
                    </div>
                    
                    <div class="crs_grid_list_caption">
                        <div class="crs_lt_101">
                            <span class="est st_1">Business</span>
                        </div>
                        <div class="crs_lt_102">
                            <h4 class="crs_tit">Full web designing course with 20 web template designing</h4>
                            <span class="crs_auth"><i>By</i> Adam Wilson</span>
                        </div>
                        <div class="crs_lt_103">
                            <div class="crs_info_detail">
                                <ul>
                                    <li><i class="fa fa-user"></i><span>10k User</span></li>
                                    <li><i class="fa fa-eye"></i><span>92k Views</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="crs_flex justify-content-end">
                            <div class="crs_fl_last">
                                <div class="crs_linkview"><a href="course-detail.html" class="btn btn_view_detail theme-bg text-light">Buy Now</a></div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8 mt-2">
                <div class="text-center"><a href="grid-layout-with-sidebar-5.html" class="btn btn-md theme-bg-light theme-cl">Explore More Cources</a></div>
            </div>
        </div>
        
    </div>
</section>
<div class="clearfix"></div>
<!-- ============================ Cources End ================================== -->
<section>
    <div class="container">
        <div class="sec-heading center mb-4">
            <h2>About <span class="theme-cl">Student Gamify US Application</span></h2>
            <p>The objective of student mobile app is to give users ease of access to the interactive courses and provide reliable communication with instructors .</p>
        </div>
        <div class="row align-items-center justify-content-between">
            
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                
                <div class="lmp_caption">
                    <span class="theme-cl">About Us</span>
                    <h2 class="mb-3">What we do & our Aim</h2>
                    <p>Gamification can reward many academic problems, not just knowledge acquisition. Gamification helps you educate users and help users self-learn. </p>
                    <div class="mb-3 mr-4 ml-lg-0 mr-lg-4">
                        <div class="d-flex align-items-center">
                          <div class="rounded-circle bg-light-success theme-cl p-2 small d-flex align-items-center justify-content-center">
                            <i class="fas fa-check"></i>
                          </div>
                          <h6 class="mb-0 ml-3">Full lifetime access</h6>
                        </div>
                    </div>
                    <div class="mb-3 mr-4 ml-lg-0 mr-lg-4">
                        <div class="d-flex align-items-center">
                          <div class="rounded-circle bg-light-success theme-cl p-2 small d-flex align-items-center justify-content-center">
                            <i class="fas fa-check"></i>
                          </div>
                          <h6 class="mb-0 ml-3">Course resources</h6>
                        </div>
                    </div>
                    <div class="mb-3 mr-4 ml-lg-0 mr-lg-4">
                        <div class="d-flex align-items-center">
                          <div class="rounded-circle bg-light-success theme-cl p-2 small d-flex align-items-center justify-content-center">
                            <i class="fas fa-check"></i>
                          </div>
                          <h6 class="mb-0 ml-3">Points on completion</h6>
                        </div>
                    </div>
                    <div class="mb-3 mr-4 ml-lg-0 mr-lg-4">
                        <div class="d-flex align-items-center">
                          <div class="rounded-circle bg-light-success theme-cl p-2 small d-flex align-items-center justify-content-center">
                            <i class="fas fa-check"></i>
                          </div>
                          <h6 class="mb-0 ml-3">Free of cost</h6>
                        </div>
                    </div>
                    <div class="text-left mt-4"><a href="#" class="btn btn-md text-light theme-bg">Enrolled Today</a></div>
                </div>
            </div>
            
            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
                <div class="lmp_thumb">
                    <img src="{{asset('main/img/h-5.png')}}" width="360px" class="img-fluid" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ============================ About Detail ================================== -->
<div class="clearfix"></div>
<!-- ============================ Categories End ================================== -->


<section id="how-work">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="section-heading text-center">
                    <h2 class="font-700 color-base text-uppercase wow fadeInUp" data-wow-delay="0.1s">How It Works</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="how-work-single wow fadeIn" data-wow-delay="0.1s">
                    <div class="how-work-btn position-relative">
                        <span class="font-600 gradient-bg-1 color-white text-center">Select Course</span>
                        <div class="arrow-line">
                            <div class="round-circle"></div>
                        </div>
                    </div>
                    <div class="how-work-image">
                        <img src="{{asset('main/img/main-screen.png')}}" class="img-responsive" alt="Image">
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="how-work-single wow fadeIn" data-wow-delay="0.2s">
                    <div class="how-work-btn position-relative">
                        <span class="font-600 gradient-bg-1 color-white text-center">Filter Course</span>
                        <div class="arrow-line">
                            <div class="round-circle"></div>
                        </div>
                    </div>
                    <div class="how-work-image">
                        <img src="{{asset('main/img/filter.png')}}" class="img-responsive" alt="Image">
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="how-work-single wow fadeIn" data-wow-delay="0.3s">
                    <div class="how-work-btn position-relative">
                        <span class="font-600 gradient-bg-1 color-white text-center">Take Course</span>
                        <div class="arrow-line">
                            <div class="round-circle"></div>
                        </div>
                    </div>
                    <div class="how-work-image">
                        <img src="{{asset('main/img/take-course.png')}}" class="img-responsive" alt="Image">
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="how-work-single wow fadeIn" data-wow-delay="0.4s">
                    <div class="how-work-btn position-relative">
                        <span class="font-600 gradient-bg-1 color-white text-center">Feedback</span>
                        <div class="arrow-line">
                            <div class="round-circle"></div>
                        </div>
                    </div>
                    <div class="how-work-image">
                        <img src="{{asset('main/img/feedback.png')}}" class="img-responsive" alt="Image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================ Top Instructor Start ================================== -->
<section>
    <div class="container">
    
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10 text-center">
                <div class="sec-heading center mb-4">
                    <h2>Screenshots of <span class="theme-cl">Mobile Application</span></h2>
                </div>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="tutor-slide">
                
                    <!-- Single Item -->
                    <div class="lios_item">	
                        
                            <div class="crs_trt_thumb">
                                <img src="{{asset('main/img/main-screen.png')}}" class="img-fluid app-images" alt="">
                            </div>
                            
                        
                    </div>
                    
                    <!-- Single Item -->
                    <div class="lios_item">	
                    
                            <div class="crs_trt_thumb">
                                <img src="{{asset('main/img/take-course.png')}}" class="img-fluid app-images" alt="">
                            </div>
                        
                    </div>
                    
                    <!-- Single Item -->
                    <div class="lios_item">	
                        
                            <div class="crs_trt_thumb">
                                <img src="{{asset('main/img/filter.png')}}" class="img-fluid app-images" alt="">
                            </div>
                            
                        
                    </div>
                    
                    <!-- Single Item -->
                    <div class="lios_item">	
                        
                            <div class="crs_trt_thumb">
                                <img src="{{asset('main/img/feedback.png')}}" class="img-fluid app-images" alt="">
                            </div>
                            
                        
                    </div>
                    
                    <!-- Single Item -->
                    <div class="lios_item">	
                        
                            <div class="crs_trt_thumb">
                                <img src="{{asset('main/img/profile.png')}}" class="img-fluid app-images" alt="">
                            </div>
                            
                        
                    </div>
                    
                    <!-- Single Item -->
                    <div class="lios_item">	
                            <div class="crs_trt_thumb">
                                <img src="{{asset('main/img/faq.png')}}" class="img-fluid app-images" alt="">
                            </div>
                    </div>

                    <div class="lios_item">	
                        <div class="crs_trt_thumb">
                            <img src="{{asset('main/img/notification.png')}}" class="img-fluid app-images" alt="">
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
        
    </div>
</section>



<!-- ============================ Categories Start ================================== -->
<section class="min gray">
    <div class="container">
        
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8">
                <div class="sec-heading center">
                    <h2>Select Your <span class="theme-cl">Category for Gamify Video</span></h2>
                    <p>.</p>
                </div>
            </div>
        </div>
        
        <div class="row justify-content-center">
            
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                <div class="cates_crs_wrip">
                    <div class="crs_trios">
                        <div class="crs_cate_icon"><i class="fa fa-code"></i></div>
                        <div class="crs_cate_link"><a href="grid-layout-with-sidebar-5.html">View Cources</a></div>
                    </div>
                    <div class="crs_capt_cat">
                        <h4>Development</h4>
                        <p>At vero eos et accusamus et iusto odio dignissimos.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                <div class="cates_crs_wrip">
                    <div class="crs_trios">
                        <div class="crs_cate_icon"><i class="fa fa-window-restore"></i></div>
                        <div class="crs_cate_link"><a href="grid-layout-with-sidebar-5.html">View Cources</a></div>
                    </div>
                    <div class="crs_capt_cat">
                        <h4>Web Designing</h4>
                        <p>At vero eos et accusamus et iusto odio dignissimos.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                <div class="cates_crs_wrip">
                    <div class="crs_trios">
                        <div class="crs_cate_icon"><i class="fa fa-leaf"></i></div>
                        <div class="crs_cate_link"><a href="grid-layout-with-sidebar-5.html">View Cources</a></div>
                    </div>
                    <div class="crs_capt_cat">
                        <h4>Lifestyle</h4>
                        <p>At vero eos et accusamus et iusto odio dignissimos.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                <div class="cates_crs_wrip">
                    <div class="crs_trios">
                        <div class="crs_cate_icon"><i class="fa fa-heartbeat"></i></div>
                        <div class="crs_cate_link"><a href="grid-layout-with-sidebar-5.html">View Cources</a></div>
                    </div>
                    <div class="crs_capt_cat">
                        <h4>Health & Fitness</h4>
                        <p>At vero eos et accusamus et iusto odio dignissimos.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                <div class="cates_crs_wrip">
                    <div class="crs_trios">
                        <div class="crs_cate_icon"><i class="fa fa-landmark"></i></div>
                        <div class="crs_cate_link"><a href="grid-layout-with-sidebar-5.html">View Cources</a></div>
                    </div>
                    <div class="crs_capt_cat">
                        <h4>Gov. Exams</h4>
                        <p>At vero eos et accusamus et iusto odio dignissimos.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                <div class="cates_crs_wrip">
                    <div class="crs_trios">
                        <div class="crs_cate_icon"><i class="fa fa-photo-video"></i></div>
                        <div class="crs_cate_link"><a href="grid-layout-with-sidebar-5.html">View Cources</a></div>
                    </div>
                    <div class="crs_capt_cat">
                        <h4>Photography</h4>
                        <p>At vero eos et accusamus et iusto odio dignissimos.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                <div class="cates_crs_wrip">
                    <div class="crs_trios">
                        <div class="crs_cate_icon"><i class="fa fa-stamp"></i></div>
                        <div class="crs_cate_link"><a href="grid-layout-with-sidebar-5.html">View Cources</a></div>
                    </div>
                    <div class="crs_capt_cat">
                        <h4>Finance & Accounting</h4>
                        <p>At vero eos et accusamus et iusto odio dignissimos.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                <div class="cates_crs_wrip">
                    <div class="crs_trios">
                        <div class="crs_cate_icon"><i class="fa fa-school"></i></div>
                        <div class="crs_cate_link"><a href="grid-layout-with-sidebar-5.html">View Cources</a></div>
                    </div>
                    <div class="crs_capt_cat">
                        <h4>Office Productivity</h4>
                        <p>At vero eos et accusamus et iusto odio dignissimos.</p>
                    </div>
                </div>
            </div>
        
        </div>
        
    </div>
</section>
<div class="clearfix"></div>
<!-- ============================ Categories End ================================== -->

<!-- ============================ Top Instructor Start ================================== -->
<section>
    <div class="container">
    
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10 text-center">
                <div class="sec-heading center mb-4">
                    <h2>Meet Top <span class="theme-cl">Instructors</span></h2>
                    <p>Instructor with high ratings have used platform to gamify their video to engage students.</p>
                </div>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="tutor-slide">
                
                    <!-- Single Item -->
                    <div class="lios_item">	
                        <div class="crs_trt_grid theme-light shadow_none">
                            <div class="crs_trt_thumb">
                                <img src="{{asset('main/img/t-1.png')}}" class="img-fluid" alt="">
                            </div>
                            <div class="crs_trt_caption large">
                                <div class="instructor_tag dark"><span>Sanskrit Teacher</span></div>
                                <div class="instructor_title"><h4><a href="instructor-detail.html">Luella J. Robles</a></h4></div>
                                <div class="trt_rate_inf">
                                    <i class="fa fa-star filled"></i>
                                    <i class="fa fa-star filled"></i>
                                    <i class="fa fa-star filled"></i>
                                    <i class="fa fa-star filled"></i>
                                    <i class="fa fa-star-half filled"></i>
                                    <span class="alt_rates">(244 Reviews)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Single Item -->
                    <div class="lios_item">	
                        <div class="crs_trt_grid theme-light shadow_none">
                            <div class="crs_trt_thumb">
                                <a href="instructor-detail.html" class="crs_trt_thum_link"><img src="{{asset('main/img/t-2.png')}}" class="img-fluid" alt=""></a>
                            </div>
                            <div class="crs_trt_caption large">
                                <div class="instructor_tag dark"><span>Math Teacher</span></div>
                                <div class="instructor_title"><h4><a href="instructor-detail.html">David E. Lampkin</a></h4></div>
                                <div class="trt_rate_inf">
                                    <i class="fa fa-star filled"></i>
                                    <i class="fa fa-star filled"></i>
                                    <i class="fa fa-star filled"></i>
                                    <i class="fa fa-star filled"></i>
                                    <i class="fa fa-star-half filled"></i>
                                    <span class="alt_rates">(244 Reviews)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Single Item -->
                    <div class="lios_item">	
                        <div class="crs_trt_grid theme-light shadow_none">
                            <div class="crs_trt_thumb">
                                <a href="instructor-detail.html" class="crs_trt_thum_link"><img src="{{asset('main/img/t-1.png')}}" class="img-fluid" alt=""></a>
                            </div>
                            <div class="crs_trt_caption large">
                                <div class="instructor_tag dark"><span>History Teacher</span></div>
                                <div class="instructor_title"><h4><a href="instructor-detail.html">Michael B. Maxwell</a></h4></div>
                                <div class="trt_rate_inf">
                                    <i class="fa fa-star filled"></i>
                                    <i class="fa fa-star filled"></i>
                                    <i class="fa fa-star filled"></i>
                                    <i class="fa fa-star filled"></i>
                                    <i class="fa fa-star-half filled"></i>
                                    <span class="alt_rates">(244 Reviews)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Single Item -->
                    <div class="lios_item">	
                        <div class="crs_trt_grid theme-light shadow_none">
                            <div class="crs_trt_thumb">
                                <a href="instructor-detail.html" class="crs_trt_thum_link"><img src="{{asset('main/img/user-9.png')}}" class="img-fluid" alt=""></a>
                            </div>
                            <div class="crs_trt_caption large">
                                <div class="instructor_tag dark"><span>Physics Teacher</span></div>
                                <div class="instructor_title"><h4><a href="instructor-detail.html">Daniel D. Couse</a></h4></div>
                                <div class="trt_rate_inf">
                                    <i class="fa fa-star filled"></i>
                                    <i class="fa fa-star filled"></i>
                                    <i class="fa fa-star filled"></i>
                                    <i class="fa fa-star filled"></i>
                                    <i class="fa fa-star-half filled"></i>
                                    <span class="alt_rates">(244 Reviews)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Single Item -->
                    <div class="lios_item">	
                        <div class="crs_trt_grid theme-light shadow_none">
                            <div class="crs_trt_thumb">
                                <a href="instructor-detail.html" class="crs_trt_thum_link"><img src="{{asset('main/img/t-2.png')}}" class="img-fluid" alt=""></a>
                            </div>
                            <div class="crs_trt_caption large">
                                <div class="instructor_tag dark"><span>PHP Developer</span></div>
                                <div class="instructor_title"><h4><a href="instructor-detail.html">Linda R. Gibson</a></h4></div>
                                <div class="trt_rate_inf">
                                    <i class="fa fa-star filled"></i>
                                    <i class="fa fa-star filled"></i>
                                    <i class="fa fa-star filled"></i>
                                    <i class="fa fa-star filled"></i>
                                    <i class="fa fa-star-half filled"></i>
                                    <span class="alt_rates">(244 Reviews)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                
                
                </div>
            </div>
        </div>
        
    </div>
</section>
<!-- ============================ Top Instructor End ================================== -->

<div class="clearfix"></div>

@endsection