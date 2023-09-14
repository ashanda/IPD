<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from edumen.durbarit.com/gallery.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Oct 2021 06:44:45 GMT -->

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

    <!-- search popup start-->
    <div class="td-search-popup" id="td-search-popup">
        <form action="https://edumen.durbarit.com/index.html" class="search-form">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search.....">
            </div>
            <button type="submit" class="submit-btn"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <!-- search popup end-->
    <div class="body-overlay" id="body-overlay"></div>

    <!-- include header -->
    @include('includes.header')

    <!-- page title start -->
    <div class="page-title-area bg-overlay" style="background-image: url('{{ asset('front/img/bg/3.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-inner">
                        <h2 class="page-title">INSTITUTE FOR PROFESSINAL DEVELOPMENT</h2>
                        <ul class="page-list">
                            <li><a href="index.html">Home</a></li>
                            <li>Workshop</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page title end -->

    <!-- workshop area start -->
    <div class="course-area pd-top-20 my-5">
        <div class="container">
            <div class="text-center">
                <h3 class="sub-title mb-5">Work Shop</h3>
            </div>
            <div class="row justify-content-center">
                
                        <div class="col-lg-4 col-md-6">
                            <div class="single-course-inner ws-box">
                                <div class="thumb text-center p-4">
                                    <img src="admin/images/class/" alt="img">
                                </div>
                                <div class="details pt-0">
                                    <div class="details-inner text-center p-2 mb-4 text-light bg-pur">
                                        <h5 class="text-light"><a href=""></a></h5>
                                    </div>
                                    <div class="bottom-area">
                                        <div class="row d-flex align-items-center justify-content-center">
                                            <div class="text-center">
                                                <a href="register.php"><i class="fa fa-play-circle mr-2"></i>Register Class</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
             >





            </div>

        </div>
    </div>
    <!-- workshop area end-->

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