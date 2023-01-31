<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <style>
        h1 {
            font-size: 30px;
            color: #fff;
            text-transform: uppercase;
            font-weight: 300;
            text-align: center;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            table-layout: fixed;
        }

        .tbl-header {
            background-color: rgba(255, 255, 255, 0.3);
        }

        .tbl-content {
            height: 600px;
            overflow-x: auto;
            margin-top: 0px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        th {
            padding: 20px 15px;
            text-align: left;
            font-weight: 500;
            font-size: 12px;
            color: #fff;
            text-transform: uppercase;
        }

        td {
            padding: 15px;
            text-align: left;
            vertical-align: middle;
            font-weight: 300;
            font-size: 12px;
            color: #fff;
            border-bottom: solid 1px rgba(255, 255, 255, 0.1);
        }


        /* demo styles */

        @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
        body {
            background: -webkit-linear-gradient(left, #25c481, #25b7c4);
            background: linear-gradient(to right, #25c481, #25b7c4);
            font-family: 'Roboto', sans-serif;
        }

        section {
            margin: 50px;
        }


        /* follow me template */
        .made-with-love {
            margin-top: 40px;
            padding: 10px;
            clear: left;
            text-align: center;
            font-size: 10px;
            font-family: arial;
            color: #fff;
        }

        .made-with-love i {
            font-style: normal;
            color: #F50057;
            font-size: 14px;
            position: relative;
            top: 2px;
        }

        .made-with-love a {
            color: #fff;
            text-decoration: none;
        }

        .made-with-love a:hover {
            text-decoration: underline;
        }


        /* for custom scrollbar for webkit browser*/

        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        }

        ::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>
<a style="color: white"
   href="{{route('admin.categories.create')}}"><button type="button" class="btn btn-success" style="float: right; margin-right: 3%">ADD
        NEW Category</button></a>

<section>
    <!--for demo wrap-->
    <h1>CREALIVE Management Panel</h1>
    <div class="tbl-header">
        <table id="editable" cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th class="font-weight-bold" style="font-size: 1em;">Id</th>
                <th class="font-weight-bold" style="font-size: 1em;">Category Name</th>
                <th class="font-weight-bold" style="font-size: 1em;">Actions</th>
            </tr>
            </thead>
        </table>

    </div>

    @if(session()->has('error'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <i class="fa fa-times"></i>
            </button>
            <div style="text-align: center;"><strong class="centred" style="text-align: center!important;">{{ session('error') }}!</strong></div>
        </div>
    @endif
    <div class="tbl-content">
        @csrf
        <table id="" cellpadding="0" cellspacing="0" border="0">
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td class="font-weight-bold" style="font-size: 1em;">{{$category->id}}</td>
                    <td class="font-weight-bold" style="font-size: 1em;"
                        id="categoryName">{{$category->categoryName}}</td>
                    <td>
                        @csrf
                        <a href="{{route('admin.categories.edit',$category->id)}}" style="color:white;">
                            <button type="button" id="editable" class="btn btn-info">Edit</button>
                        </a>
                        <a onclick="delete_user({{$category->id}})">
                            <button type="button" class="btn btn-danger">Delete</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</section>

<script>
    // '.tbl-content' consumed little space for vertical scrollbar, scrollbar width depend on browser/os/platfrom. Here calculate the scollbar width .
    $(window).on("load resize ", function () {
        var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
        $('.tbl-header').css({'padding-right': scrollWidth});
    }).resize();
</script>
<script>
    function delete_user(Id) {
        var result = confirm("Want to delete?");
        if (result) {
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var url = "{!! route("admin.categories.destroy",":id") !!}";
            url = url.replace(':id', Id)
            $.ajax({
                url: url,
                type: "Post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    '_method': 'delete'
                },
                success: function ($msg) {
                    location.reload()
                }
            });
        }
    }
</script>


</body>
