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
                            <li>Gallery</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page title end -->

    <!-- gallery area start -->
    <div class="gallery-area pd-top-120 pd-bottom-120">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-gallery">
                        <img src="{{ asset('front/img/gallery/45.jpg') }}" alt="img">
                    </div>
                    <div class="single-gallery mb-md-0">
                        <img src="{{ asset('front/img/gallery/75.jpg') }}" alt="img">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-gallery mb-md-0">
                        <img src="{{ asset('front/img/gallery/about1.jpg') }}" alt="img">
                    </div>
                  <div class="single-gallery mt-2">
                        <img src="{{ asset('front/img/gallery/about2.jpg') }}" alt="img">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-gallery">
                        <img src="{{ asset('front/img/gallery/about3.jpg') }}" alt="img">
                    </div>
                    <div class="single-gallery mb-0">
                        <img src="{{ asset('front/img/gallery/about4.jpg') }}" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- gallery area end-->

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