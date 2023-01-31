<!-- header code start-->

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>CREALIVE</title>
    <!-- Fav Icon!-->
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


<section class="events-list sec-pad-2 bg-color-white">
    <div class="auto-container mt--40">
        <div class="event-list-content">
            <div class="sel sel--black-panther">
                <select name="select-profession" class="willDirect" id="social-select">
                    <option value="" disabled>Choose Category</option>
                    @foreach($mainCategories as $category)
                        <option value="/search/{{$category->id}}">{{$category->categoryName}}</option>
                    @endforeach
                    @foreach($subCategories as $category)
                        <option href="/search/{{$category->id}}"
                                value="/search/{{$category->id}}">{{$category->categoryName}}</option>
                    @endforeach
                </select>

            </div>

            <a href="/admin/categories">
                <button class="btn btn-success" style="float:right;">Edit Categories</button>
            </a>
            <a href="/admin/contents">
                <button class="btn btn-success  mr-10" style="float:right;">Edit Contents</button>
            </a>


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
                                <h3><a href="/{{$content->id}}">{{$content->title}}</a></h3>
                                <p>{{substr($content->content,0,50)}}...</p>
                                <div class="link"><a href="/{{$content->id}}">Content Detail</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <div class="pagination-wrapper centred mt-30">
        <ul class="pagination clearfix">
            <li><a href="{{$prevPage}}">Prev</a></li>
            @php
                $max_pages=5;
            @endphp

            @foreach ($currentPage > intval($max_pages/2)+1 ? range(($pageCount-$currentPage<intval($max_pages/2)+1)?$currentPage-($max_pages-($pageCount-$currentPage))+1:$currentPage-2,min($pageCount+1,$currentPage+3)-1):range(1,min($pageCount+1,$max_pages+1)-1) as $i)

                @if($i==$currentPage)
                    <li><a href="/?page={{$i}}" class="current">{{$i}}</a></li>
                @else
                    <li><a href="/?page={{$i}}">{{$i}}</a></li>
                @endif

            @endforeach
            <li><a href="{{$nextPage}}">Next</a></li>
        </ul>
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
    $('.sel').each(function () {
        $(this).children('select').css('display', 'none');

        var $current = $(this);

        $(this).find('option').each(function (i) {
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
    $('.sel').click(function () {
        $(this).toggleClass('active');
    });

    // Toggling the `.selected` state on the options.
    $('.sel__box__options').click(function () {
        var txt = $(this).text();
        var index = $(this).index();

        $(this).siblings('.sel__box__options').removeClass('selected');
        $(this).addClass('selected');
        var $currentSel = $(this).closest('.sel');
        $currentSel.children('.sel__placeholder').text(txt);
        $currentSel.children('select').prop('selectedIndex', index + 1);
        let select = document.getElementById("social-select");
        window.open(select.options[select.selectedIndex].value)

    });

</script>


</body><!-- End of .page_wrapper -->
</html>
