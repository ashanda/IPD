<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from theme-flix.com/edumen/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Aug 2021 05:07:51 GMT -->
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
                <div class="col-lg-12">
                    <div class="breadcrumb-inner">
                        <h2 class="page-title">INSTITUTE FOR PROFESSINAL DEVELOPMENT</h2>
                        <ul class="page-list">
                            <li><a href="index.php">Home</a></li>
                            <li>About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page title end -->

    <!-- counter start -->
    <div class="counter-area pd-bottom-90">
    </div>
    <!-- counter end -->

    <!-- about area start -->
    <div class="about-area about-right-bg-half bg-gray pd-top-120 pd-bottom-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 bg-gray">
                    <div class="section-title">
                        <h2 class="title">INTRODUCTION</h2>
                        <p class="content">Institute for professional development is an Educational 
                          Institute accredited by Federation of Chambers of Commerce and industry of Sri Lanka the 
                          largest and most  representative Apex body in Sri Lankan business .
                      </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about area end -->

    <!-- about area start -->
    <div class="about-area about-left-bg-half bg-gray pd-top-120 pd-bottom-90">
        <div class="container">
            <div class="row">
                <div class="offset-lg-7 col-lg-5 bg-gray">
                    <div class="section-title">
                        <h2 class="title"> WHAT WE DO </h2>
                        <p class="content">we are offering range of courses targeting children 
                          and working professionals and conducting corporate trainings targeting organisations worldwide
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about area end -->
  
  <!-- about area start -->
    <div class="about-area about-right-bg-half2 bg-gray pd-top-120 pd-bottom-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 bg-gray">
                    <div class="section-title">
                        <h2 class="title"> OUR STORY </h2>
                        <p class="content">our  intention is to provide meticulously planned training for 
                          all the students who are coming to IPD.we are constantly  identifying and anticipating
                          the skills gap of each students and provide them a proper solution to 
                      </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about area end -->
  
  <!-- about area start -->
    <div class="about-area about-left-bg-half2 bg-gray pd-top-120 pd-bottom-90">
        <div class="container">
            <div class="row">
                <div class="offset-lg-7 col-lg-5 bg-gray">
                    <div class="section-title">
                        <h2 class="title"> OUR CORE COMPETENCE</h2>
                        <p class="content">
                          <ul>
                            <li>wide experience and expertise in training and skill development</li>
                            <li>on-time time delivery of High Quality Services</li>
                            <li>availability of highly trained and experienced and compressed resource personnel</li>
                            <li>self motivated staff</li>
                            <li>individual attention given for each students</li>
                            <li>strong networking with government and private sector</li>
                            <li>utilising latest latest technology in order to improve the next generation </li>
                          </ul>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about area end -->

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