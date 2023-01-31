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
                <br>
                <h3 style="color: white;">
                    Arama Sonuçları
                </h3>
            </div>
        </div>
    </div>
</section>
<!-- End Page Title -->


<section class="events-list sec-pad-2 bg-color-white">
    <div class="auto-container mt--40">
        <div class="event-list-content">


            @foreach($contents as $content)
                <div class="schedule-block-three">
                    <div class="inner-box">
                        <div class="inner">
                            <div class="schedule-date">
                                <h2>{{$content->category->categoryName}}</h2>
                                <ul class="list clearfix">
                                    <li>{{date("d/m/Y",strtotime($content->created_at))}}</li>
                                </ul>
                            </div>
                            <div class="text">
                                <h3><a href="event-details">{{$content->title}}</a></h3>
                                <p>{{substr($content->content,0,50)}}...</p>
                                <div class="link"><a href="/{{$content->id}}">Content Detail</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            </div>
        </div>

    </div>
</section>
<!-- events-grid end -->


<!-- main-footer -->
<footer class="main-footer">
    <div class="footer-bottom">
        <div class="auto-container">
        </div>
    </div>
</footer>
<!-- main-footer end -->


<!--Scroll to top-->
<button class="scroll-top scroll-to-target" data-target="html">
    <span class="fas fa-angle-up"></span>
</button>
</div>


<!-- jequery plugins -->
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/owl.js')}}"></script>
<script src="{{asset('js/wow.js')}}"></script>
<script src="{{asset('js/validation.js')}}"></script>
<script src="{{asset('js/jquery.fancybox.js')}}"></script>
<script src="{{asset('js/appear.js')}}"></script>
<script src="{{asset('js/scrollbar.js')}}"></script>
<script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('js/nav-tool.js')}}"></script>

<!-- main-js -->
<script src="{{asset('js/script.js')}}"></script>
<script>
    /* ===== Logic for creating fake Select Boxes ===== */
    $('.sel').each(function() {
        $(this).children('select').css('display', 'none');

        var $current = $(this);

        $(this).find('option').each(function(i) {
            if (i == 0) {
                $current.prepend($('<div>', {
                    class: $current.attr('class').replace(/sel/g, 'sel__box')
                }));

                var placeholder = $(this).text();
                $current.prepend($('<span>', {
                    class: $current.attr('class').replace(/sel/g, 'sel__placeholder'),
                    text: placeholder,
                    'data-placeholder': placeholder
                }));

                return;
            }

            $current.children('div').append($('<span>', {
                class: $current.attr('class').replace(/sel/g, 'sel__box__options'),
                text: $(this).text()
            }));
        });
    });

    // Toggling the `.active` state on the `.sel`.
    $('.sel').click(function() {
        $(this).toggleClass('active');
    });

    // Toggling the `.selected` state on the options.
    $('.sel__box__options').click(function() {
        var txt = $(this).text();
        var index = $(this).index();

        $(this).siblings('.sel__box__options').removeClass('selected');
        $(this).addClass('selected');

        var $currentSel = $(this).closest('.sel');
        $currentSel.children('.sel__placeholder').text(txt);
        $currentSel.children('select').prop('selectedIndex', index + 1);
    });

</script>

</body><!-- End of .page_wrapper -->
</html>
