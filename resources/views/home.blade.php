<html>
<head>
    <title>page search articles by author id</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <style>
        body{
            background:#dcdcdc;
            margin-top:20px;}

        .widget-26 {
            color: #3c4142;
            font-weight: 400;
        }

        .widget-26 tr:first-child td {
            border: 0;
        }

        .widget-26 .widget-26-job-emp-img img {
            width: 35px;
            height: 35px;
            border-radius: 50%;
        }

        .widget-26 .widget-26-job-title {
            min-width: 200px;
        }

        .widget-26 .widget-26-job-title a {
            font-weight: 400;
            font-size: 0.875rem;
            color: #3c4142;
            line-height: 1.5;
        }

        .widget-26 .widget-26-job-title a:hover {
            color: #68CBD7;
            text-decoration: none;
        }

        .widget-26 .widget-26-job-title .employer-name {
            margin: 0;
            line-height: 1.5;
            font-weight: 400;
            color: #3c4142;
            font-size: 0.8125rem;
            color: #3c4142;
        }

        .widget-26 .widget-26-job-title .employer-name:hover {
            color: #68CBD7;
            text-decoration: none;
        }

        .widget-26 .widget-26-job-title .time {
            font-size: 12px;
            font-weight: 400;
        }

        .widget-26 .widget-26-job-info {
            min-width: 100px;
            font-weight: 400;
        }

        .widget-26 .widget-26-job-info p {
            line-height: 1.5;
            color: #3c4142;
            font-size: 0.8125rem;
        }

        .widget-26 .widget-26-job-info .location {
            color: #3c4142;
        }

        .widget-26 .widget-26-job-salary {
            min-width: 70px;
            font-weight: 400;
            color: #3c4142;
            font-size: 0.8125rem;
        }

        .widget-26 .widget-26-job-category {
            padding: .5rem;
            display: inline-flex;
            white-space: nowrap;
            border-radius: 15px;
        }

        .widget-26 .widget-26-job-category .indicator {
            width: 13px;
            height: 13px;
            margin-right: .5rem;
            float: left;
            border-radius: 50%;
        }

        .widget-26 .widget-26-job-category span {
            font-size: 0.8125rem;
            color: #3c4142;
            font-weight: 600;
        }

        .widget-26 .widget-26-job-starred svg {
            width: 20px;
            height: 20px;
            color: #fd8b2c;
        }

        .widget-26 .widget-26-job-starred svg.starred {
            fill: #fd8b2c;
        }
        .bg-soft-base {
            background-color: #e1f5f7;
        }
        .bg-soft-warning {
            background-color: #fff4e1;
        }
        .bg-soft-success {
            background-color: #d1f6f2;
        }
        .bg-soft-danger {
            background-color: #fedce0;
        }
        .bg-soft-info {
            background-color: #d7efff;
        }


        .search-form {
            width: 80%;
            margin: 0 auto;
            margin-top: 1rem;
        }

        .search-form input {
            height: 100%;
            background: transparent;
            border: 0;
            display: block;
            width: 100%;
            padding: 1rem;
            height: 100%;
            font-size: 1rem;
        }

        .search-form select {
            background: transparent;
            border: 0;
            padding: 1rem;
            height: 100%;
            font-size: 1rem;
        }

        .search-form select:focus {
            border: 0;
        }

        .search-form button {
            height: 100%;
            width: 100%;
            font-size: 1rem;
        }

        .search-form button svg {
            width: 24px;
            height: 24px;
        }

        .search-body {
            margin-bottom: 1.5rem;
        }

        .search-body .search-filters .filter-list {
            margin-bottom: 1.3rem;
        }

        .search-body .search-filters .filter-list .title {
            color: #3c4142;
            margin-bottom: 1rem;
        }

        .search-body .search-filters .filter-list .filter-text {
            color: #727686;
        }

        .search-body .search-result .result-header {
            margin-bottom: 2rem;
        }

        .search-body .search-result .result-header .records {
            color: #3c4142;
        }

        .search-body .search-result .result-header .result-actions {
            text-align: right;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .search-body .search-result .result-header .result-actions .result-sorting {
            display: flex;
            align-items: center;
        }

        .search-body .search-result .result-header .result-actions .result-sorting span {
            flex-shrink: 0;
            font-size: 0.8125rem;
        }

        .search-body .search-result .result-header .result-actions .result-sorting select {
            color: #68CBD7;
        }

        .search-body .search-result .result-header .result-actions .result-sorting select option {
            color: #3c4142;
        }

        @media (min-width: 768px) and (max-width: 991.98px) {
            .search-body .search-filters {
                display: flex;
            }
            .search-body .search-filters .filter-list {
                margin-right: 1rem;
            }
        }

        .card-margin {
            margin-bottom: 1.875rem;
        }

        @media (min-width: 992px){
            .col-lg-2 {
                flex: 0 0 16.66667%;
                max-width: 16.66667%;
            }
        }

        .card-margin {
            margin-bottom: 1.875rem;
        }
        .card {
            border: 0;
            box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
            -webkit-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
            -moz-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
            -ms-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
        }
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #ffffff;
            background-clip: border-box;
            border: 1px solid #e6e4e9;
            border-radius: 8px;
        }
        .gsc_rsb_a {
            list-style: none;
            padding:0px;
        }
        .gsc_rsb_a>li {
            position: relative;
        }
        .gsc_rsb_a>li:first-child {
            margin-top: 8px;
        }
        .gsc_rsb_aa {
            display: block;
            padding: 8px;
            line-height: normal;
            cursor: pointer;
        }
        .gsc_rsb_a_pht {
            float: left;
            width: 32px;
            height: 32px;
        }
        .gsc_rsb_a_desc {
            margin: 0 33px 0 48px;
            min-height: 32px;
            display: block;
        }
        .gsc_rsb_a_desc a {
            color: #222;
        }
        .gsc_rsb_a_ext {
            display: block;
            color: #777;
            font-size: 13px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .gsc_rsb_a_ext2 {
            display: none;
        }
        .gsc_rsb_tap {
            display: block;
            position: absolute;
            right: 2px;
            top: 12px;
            opacity: .5;
            z-index: 1;
        }
        .gsc_rsb_aa {
            display: block;
            padding: 8px;
            line-height: normal;
            cursor: pointer;
        }
        .gs_btnPR .gs_ico {
            background-position: -21px -66px;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12 card-margin">
            <div class="card search-form">
                <div class="card-body p-0">
                    <form id="search-form">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-12">
                                <div class="row no-gutters">
                                    <div class="col-lg-8 col-md-6 col-sm-12 p-0">
                                        <input type="text" placeholder="Search..." class="form-control" id="search" name="search">
                                    </div>
                                    <div class="col-lg-1 col-md-3 col-sm-12 p-0">
                                        <button type="submit" class="btn btn-base">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12" id="result">

        </div>
    </div>
</div>
<script type="text/javascript">
    $('#search-form').submit(function (e) {
        var data = $('#search-form').serialize();
        $.ajax({
            type: "POST",
            url: "{{url('api/search')}}",
            data: data,
            success:function(response){
                if(response.status == 200){
                    $('#result').html(response.data);
                }else{
                    $('#result').html("<p>Khong tim thay ket qua<p>");
                }

            }
        });
        return false;
    });
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
</body>
</html>
