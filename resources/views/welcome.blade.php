<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from theme-flix.com/edumen/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Aug 2021 05:01:12 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ipdedu</title>
    <link rel=icon href="{{ asset('front/img/favicon.png') }}" sizes="20x20" type="image/png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('front/css/vendor_main.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/style_main.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/responsive_main.css') }}">

</head>

<body>

    <!-- preloader area start -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
    <!-- preloader area end -->

    <!-- include header -->
    @include('includes/header')

    <!-- banner start -->
    <div class="banner-area banner-area-1 banner-bg-overlay" style="background-image: url('{{ asset('front/img/banner/111.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-7">
                    <div class="banner-inner style-white text-center text-lg-left">
                        <!--                         <h6 class="al-animate-1 sub-title">Save over <span>30%</span> in paid courses</h6> -->
                        <h1 class="al-animate-2 title">INSTITUTE FOR PROFESSIONAL DEVELOPMENT</h1>
                        <!--                         <p class="al-animate-3">Macstudy is by far the most anticipated and most requested online course among our learners.</p>
                        <a class="btn btn-base al-animate-4" href="course.html">All Courses</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner end -->

    <!-- counter area start -->
    <div class="counter-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-quote-inner">
                        <div class="thumb text-right">
                            <img src="{{ asset('front/img/about/Announcing.jpg') }}" alt="img">
                        </div>
                        <div class="details">
                            <h4>Announcing And Media courses</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 pd-top-90">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="single-counter-inner after-bg">
                                <div class="media">
                                    <div class="media-left">
                                        <div class="thumb">
                                            <img src="{{ asset('front/img/icon/1.png') }}" alt="img">
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div class="details">
                                            <h2><span class="counter">5</span>K+</h2>
                                            <p>Online Students</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-area">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="single-block-inner" style="background-image: url('{{ asset('front/img/other/CONSULTANT.jpg') }}');">
                                    <span>CONSULTANT -TRAINING AND</span>
                                    <h4> Skill Development</h4>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single-block-inner" style="background-image: url('{{ asset('front/img/other/EnglishCourse2.jpg') }}');">
                                    <span>Bussiness</span>
                                    <h4>English Course</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- counter end -->
 <!--course-area start-->
 @if (getWorkshop() === null)
      <div class="course-area pd-top-20 pd-top-100 pd-bottom-50">
        <div class="container">
            <div class="text-center">
                <h3 class="sub-title mb-5">Work Shop</h3>
            </div>
            <div class="row justify-content-center">
                
                        <div class="col-lg-4 col-md-6">
                            <div class="single-course-inner ws-box">
                                <div class="thumb text-center p-4">
                                    <img src="{{ asset('storage/' . getWorkshop()->cover) }}" alt="img">
                                </div>
                                <div class="details pt-0">
                                    <div class="details-inner text-center p-2 mb-3 text-light bg-pur">
                                        <h5 class="text-light"><a href="{{ route('register') }}">{{ getWorkshop()->lesson_name }}</a></h5>
                                    </div>
                                    <h6 class="text-center bg-dark p-2 text-light mb-3" >Class date - {{ getWorkshop()->publish_date }}</h6>
                                    <h6 class="text-center bg-primary p-2 text-light mb-3" >Start time - {{ getWorkshop()->start_time }}</h6>
                                    <div class="bottom-area">
                                        <div class="row d-flex align-items-center justify-content-center">
                                            <div class="text-center">
                                                <a href="{{ route('register') }}"><i class="fa fa-play-circle mr-2"></i>Register Class</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                





            </div>

        </div>
    </div>
 @else
     
 @endif

    <!--course-area end-->
    <!-- about area start -->
    <div class="about-area pd-top-90 pd-bottom-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-sm-6 mt-lg-5">
                            <div class="thumb about-thumb  wow animated zoomIn" data-wow-duration="0.8s" data-wow-delay="0.1s">
                                <img src="{{ asset('front/img/about/about1.jpg') }}" alt="img">
                            </div>
                            <div class="thumb about-thumb  wow animated zoomIn" data-wow-duration="0.8s" data-wow-delay="0.2s">
                                <img src="{{ asset('front/img/about/about2.jpg') }}" alt="img">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="thumb about-thumb  wow animated zoomIn" data-wow-duration="0.8s" data-wow-delay="0.3s">
                                <img src="{{ asset('front/img/about/about3.jpg') }}" alt="img">
                            </div>
                            <div class="thumb about-thumb  wow animated zoomIn" data-wow-duration="0.8s" data-wow-delay="0.4s">
                                <img src="{{ asset('front/img/about/about4.jpg') }}" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center mt-4 mt-lg-0">
                    <div class="section-title style-bg mb-0">
                        <h5 class="sub-title">Who we are</h5>
                        <p class="content"> we are offering range of courses targeting children and working professionals and conducting corporate trainings targeting organisations worldwide</p>
                        <div class="single-list-inner mt-4">
                            <ul>
                                <li><i class="fa fa-check"></i> Access to 4,000+ of our top courses</li>
                                <li><i class="fa fa-check"></i> Explore a variety of fresh topics</li>
                                <li><i class="fa fa-check"></i> Find the right instructor for you </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about area end -->

    <!--course-area start-->
    <div class="course-area pd-top-120 pd-bottom-120">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-4 col-md-6">
                    <div class="single-course-inner">
                        <div class="thumb">
                            <img src="{{ asset('front/img/course/CONSULTANT.jpg') }}" alt="img">
                        </div>
                        <div class="details">
                            <!--                             <span class="price">17500</span> -->
                            <p class="status"><i class="fa fa-signal"></i> Beginner</p>
                            <div class="details-inner">
                                <h5><a href="course.php">CONSULTANT -TRAINING AND SKILL DEVELOPMENT </a></h5>
                            </div>
                            <div class="bottom-area">
                                <div class="row  d-flex align-items-center justify-content-center">
                                    <div class="col-6 align-self-center ml-5">
                                        <div class="rating-inner">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-course-inner">
                        <div class="thumb">
                            <img src="{{ asset('front/img/course/EnglishCourse.jpg') }}" alt="img">
                            <div class="cat-area">
                            </div>
                        </div>
                        <div class="details">
                            <!--                             <span class="price">$60</span> -->
                            <p class="status"><i class="fa fa-signal"></i> Beginner</p>
                            <div class="details-inner">
                                <h5><a href="course.php">Bussiness English Course</a></h5><br>
                            </div>
                            <div class="bottom-area">
                                <div class="row  d-flex align-items-center justify-content-center">
                                    <div class="col-6 align-self-center ml-5">
                                        <div class="rating-inner">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-course-inner">
                        <div class="thumb">
                            <img src="{{ asset('front/img/course/Media.jpg') }}" alt="img">
                            <div class="cat-area">
                            </div>
                        </div>
                        <div class="details">
                            <!--                             <span class="price">$90</span> -->
                            <p class="status"><i class="fa fa-signal"></i> Beginner</p>
                            <div class="details-inner">
                                <h5><a href="course.php">Announcing And Media courses</a></h5>
                            </div>
                            <div class="bottom-area">
                                <div class="row  d-flex align-items-center justify-content-center">
                                    <div class="col-6 align-self-center ml-5">
                                        <div class="rating-inner">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
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
    <!--course-area end-->

   

    <!-- call to action area start -->
    <div class="call-to-action-area bg-cover pd-top-110 pd-bottom-120" style="background-image: url('{{ asset('front/img/other/123.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-10">
                    <div class="section-title mb-0 style-white">
                        <h2 class="title">The Art Of Perfect learning</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- call to action area start -->

    <!-- include footer -->
    @include('includes.footer')

    <!-- back to top area start -->
    <div class="back-to-top">
        <span class="back-top"><i class="fa fa-angle-up"></i></span>
    </div>
    <!-- back to top area end -->


    <!-- all plugins here -->
    <script src="{{ asset('front/js/vendor_main.js') }}"></script>
    <script src="{{ asset('front/js/counter_main.js') }}"></script>
    <!-- main js  -->
    <script src="{{ asset('front/js/main_main.js') }}"></script>
</body>

<!-- Mirrored from theme-flix.com/edumen/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Aug 2021 05:06:56 GMT -->

</html>