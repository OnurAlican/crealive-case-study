<!-- header code start-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>CREALIVE</title>
    <!-- Fav Icon!-->
    <link rel="icon" href="{{asset('images/logo/favicon.png')}}" type="image/x-icon">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <!-- Stylesheets -->
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome-all.css')}}" rel="stylesheet">
    <link href="{{asset('css/flaticon.css')}}" rel="stylesheet">
    <link href="{{asset('css/owl.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/jquery.fancybox.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/nice-select.css')}}" rel="stylesheet">
    <link href="{{asset('css/color.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/cdb7a8c9fa.js" crossorigin="anonymous"></script>
</head>

<!-- page wrapper -->
<body>


<!-- Page Title -->
<section class="page-title">
    <div class="auto-container">
        <div class="content-box">
            <div class="title centred">
                <h1>CREALIVE Backend Developer
                    Case Study</h1>
            </div>
        </div>
    </div>
</section>
<!-- End Page Title -->

<!-- event-details -->
<section class="event-details bg-color-white">
    <div class="auto-container mt--40">

        <div class="overview-box">
            <div class="row clearfix">
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 text-column"></div>
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 text-column">
                    <div class="text">
                        <div class="group-title">
                            <h3>Category</h3>
                        </div>
                        <p>{{$content->category->categoryName}}</p>
                        <div class="group-title">
                            <h3>Details</h3>
                        </div>
                        <p>{{$content->content}}</p>
                    </div>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 text-column"></div>


            </div>
        </div>
    </div>
</section>
<!-- event-details end -->
