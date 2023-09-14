<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from theme-flix.com/edumen/course-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Aug 2021 05:10:50 GMT -->
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
  @include('includes.header')

    <!-- page title start -->
    <div class="page-title-area bg-overlay" style="background-image: url('{{ asset('front/img/bg/3.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="breadcrumb-inner">
                        <h2 class="page-title">INSTITUTE FOR PROFESSINAL DEVELOPMENT</h2>
                        <ul class="page-list">
                            <li><a href="index.php">Home</a></li>
                            <li>Course</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page title end -->

    <!-- single blog page -->
    <div class="main-blog-area pd-top-120 pd-bottom-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-12">
                    <div class="course-details-page">
                        <div class="course-details-meta-list">
                          
                        </div>
                        <div class="thumb">
                            <img src="{{ asset('front/img/course/couse.jpg') }}" alt="img">
                        </div>
                        <div class="course-details-nav-tab text-center">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab1-tab" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true"><i class="fa fa-book"></i> Overview</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab2-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">
                                        <i class="fa fa-file-text-o"></i> Course Features</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab3-tab" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false">
                                        <i class="fa fa-graduation-cap"></i> Lecturer</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab4-tab" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false">
                                        <i class="fa fa-th"></i> CSR</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                                <div class="course-details-content">
                                    <h4 class="title">What you will Do</h4>
                                  <p>
                                    I'm currently working as a Professional  Trainer  and Lecturer,
                                    conducting Training and development programmes especially targeting 
                                    the Corporates,Universities and for working professionals. I have been 
                                    working as the  corporate branding manager and worked in the indutries 
                                    related to renewable energy  and IT industry.<br><br>
                                    Furthermore,  I have been working in the federation of chambers of commerce 
                                    and industry in Sri Lanka as the Consultant - Training and skill development.
                                  </p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                                <div class="course-details-content">
                                    <h4 class="title">Course Features Here</h4>
                                    <p>eLearning for the learnxyz You can start and finish one of these popular courses in under a day - for free! Check out the list below. “ LearnPress WordPress LMS Plugin designed with flexible & scalable</p>
                                    <div class="course-feature-area">
                                        <ul class="row">
                                            <li class="col-6">
                                                Course Features
                                            </li>
                                            <li class="col-6">
                                                <span>12</span>
                                            </li>
                                            <li class="col-6">
                                                Quizzes
                                            </li>
                                            <li class="col-6">
                                                <span>1</span>
                                            </li>
                                            <li class="col-6">
                                                Course Duration
                                            </li>
                                            <li class="col-6">
                                                <span>3 Hours</span>
                                            </li>
                                            <li class="col-6">
                                                Skill level 
                                            </li>
                                            <li class="col-6">
                                                <span>All Level</span>
                                            </li>
                                            <li class="col-6">
                                                Language 
                                            </li>
                                            <li class="col-6">
                                                <span>English</span>
                                            </li>
                                            <li class="col-6">
                                                Assessments
                                            </li>
                                            <li class="col-6">
                                                <span>Yes</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="single-team-inner">
                                            <div class="thumb">
                                                <img src="{{ asset('front/img/team/team.jpg') }}" alt="img">
                                            </div>
                                            <div class="details pt-5">
                                                <ul class="team-social-media">
                                                    <li>
                                                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                                    </li>
                                                </ul>
                                                <h5><a href="single-team.html">Maria Helen</a> <span>  -  Mathmetics</span></h5>
                                              
                                    <div class="single-list-inner style-check">
                                        <h4>Name : K.A.PRIYANKA PERERA  CONSULTANT -TRAINING AND SKILL DEVELOPMENT - IPD INSTITUTE</h4>
                                        <ul>
                                            <li><i class="fa fa-check"></i>Corporate Trainer  (Professional and Personality Development)</li>
                                            <li><i class="fa fa-check"></i>Lecturer (Language Training )</li> 
                                            <li><i class="fa fa-check"></i>TV Presenter </li>
                                        </ul>
                                    </div>
                                  <div class="single-list-inner style-check">
                                        <h4>Education Qualifications</h4>
                                        <ul>
                                            <li><i class="fa fa-check"></i>Reading MA (Media and Communication -Kingston University UK)</li>
                                            <li><i class="fa fa-check"></i>BA (Hons), Bachelor of Business Administration, London</li> 
                                            <li><i class="fa fa-check"></i>Metropolitan University – United Kingdom  </li>
                                          <li><i class="fa fa-check"></i>HND (EDEXCEL - UK) Business Management, ESOFT metro campus – Sri Lanka (2015)</li>
                                            <li><i class="fa fa-check"></i>Diploma in Business Management, ESOFT metro campus – Sri Lanka (2012)</li> 
                                            <li><i class="fa fa-check"></i>Diploma in Media (Media Foundation – Sri Lanka ”-(compeering, voicing & Presenting) </li>
                                        </ul>
                                    </div>
                                                <p><i class="fa fa-user"></i>  100+ Courses  </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4-tab">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-course-inner">
                                            <div class="thumb">
                                                <img src="{{ asset('front/img/course/CONSULTANT.jpg') }}" alt="img">
                                                <div class="cat-area">
                                                    <a class="cat bg-base" href="course.html">Data</a>
                                                    <a class="cat bg-red" href="course.html">Marketing</a>
                                                </div>
                                            </div>
                                            <div class="details">
                                                <span class="price">$50</span>
                                                <p class="status"><i class="fa fa-signal"></i> Expart</p>
                                                <div class="details-inner">
                                                    <h5><a href="course-single.html">People Management Skills development</a></h5>
                                                    <div class="author media">
                                                        <div class="media-left">
                                                            <img src="{{ asset('front/img/team/1.png') }}" alt="img">
                                                        </div>
                                                        <div class="media-body align-self-center">
                                                            <p>Mithila Hedge</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="bottom-area">
                                                    <div class="row">
                                                        <div class="col-6 align-self-center">
                                                            <div class="rating-inner">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-6 align-self-center text-right">
                                                            <a class="readmore-text" href="course-single.html">Read More</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-course-inner">
                                            <div class="thumb">
                                                <img src="{{ asset('front/img/course/CONSULTANT.jpg') }}" alt="img">
                                                <div class="cat-area">
                                                    <a class="cat bg-base" href="course.html">Art</a>
                                                    <a class="cat bg-red" href="course.html">Design</a>
                                                </div>
                                            </div>
                                            <div class="details">
                                                <span class="price">$60</span>
                                                <p class="status"><i class="fa fa-signal"></i> Beginner</p>
                                                <div class="details-inner">
                                                    <h5><a href="course-single.html">Skills development People Management</a></h5>
                                                    <div class="author media">
                                                        <div class="media-left">
                                                            <img src="{{ asset('front/img/team/CONSULTANT.jpg') }}" alt="img">
                                                        </div>
                                                        <div class="media-body align-self-center">
                                                            <p>Fonix Fedry</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="bottom-area">
                                                    <div class="row">
                                                        <div class="col-6 align-self-center">
                                                            <div class="rating-inner">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-6 align-self-center text-right">
                                                            <a class="readmore-text" href="course-single.html">Read More</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-course-inner">
                                            <div class="thumb">
                                                <img src="{{ asset('front/img/course/CONSULTANT.jpg') }}" alt="img">
                                                <div class="cat-area">
                                                    <a class="cat bg-purple" href="course.html">Data</a>
                                                    <a class="cat bg-blue" href="course.html">Business</a>
                                                </div>
                                            </div>
                                            <div class="details">
                                                <span class="price">$90</span>
                                                <p class="status"><i class="fa fa-signal"></i> Expart</p>
                                                <div class="details-inner">
                                                    <h5><a href="course-single.html">Business Management Skills development</a></h5>
                                                    <div class="author media">
                                                        <div class="media-left">
                                                            <img src="{{ asset('front/img/team/1.png') }}" alt="img">
                                                        </div>
                                                        <div class="media-body align-self-center">
                                                            <p>Sofia Jong</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="bottom-area">
                                                    <div class="row">
                                                        <div class="col-6 align-self-center">
                                                            <div class="rating-inner">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-6 align-self-center text-right">
                                                            <a class="readmore-text" href="course-single.html">Read More</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-course-inner">
                                            <div class="thumb">
                                                <img src="{{ asset('front/img/course/CONSULTANT.jpg') }}" alt="img">
                                                <div class="cat-area">
                                                    <a class="cat bg-base" href="course.html">Agency</a>
                                                    <a class="cat bg-yellow" href="course.html">Creative</a>
                                                </div>
                                            </div>
                                            <div class="details">
                                                <span class="price">$40</span>
                                                <p class="status"><i class="fa fa-signal"></i> Intermediate</p>
                                                <div class="details-inner">
                                                    <h5><a href="course-single.html">Design Management Skills development</a></h5>
                                                    <div class="author media">
                                                        <div class="media-left">
                                                            <img src="{{ asset('front/img/course/CONSULTANT.jpg') }}" alt="img">
                                                        </div>
                                                        <div class="media-body align-self-center">
                                                            <p>Carle Jofe</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="bottom-area">
                                                    <div class="row">
                                                        <div class="col-6 align-self-center">
                                                            <div class="rating-inner">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-6 align-self-center text-right">
                                                            <a class="readmore-text" href="course-single.html">Read More</a>
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
    </div>
    <!-- single blog page end -->

    <!-- include footer -->
    @include('includes.footer')

    <!-- back to top area start -->
    <div class="back-to-top">
        <span class="back-top"><i class="fa fa-angle-up"></i></span>
    </div>
    <!-- back to top area end -->


    <!-- all plugins here -->
    <script src="{{ asset('front/js/vendor_main.js') }}"></script>
    <!-- main js  -->
    <script src="{{ asset('front/js/main_main.js') }}"></script>
</body>

</html>