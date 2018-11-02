<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="{{ app()->getLocale() }}">
<![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang="{{ app()->getLocale() }}">
<![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang="{{ app()->getLocale() }}">
<![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="{{ app()->getLocale() }}">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/themify-icons.css">
    <link rel="stylesheet" href="/css/flag-icon.min.css">
    <link rel="stylesheet" href="/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="/scss/style.css">
    <link rel="stylesheet" href="/css/custom.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>

<!-- Left Menu -->
@include('components.left-menu')

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
    @include('components.header')
    <!-- Header-->

    <div class="breadcrumbs">
        <div class="col-md-7 col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>@yield('title')</h1>
                    <div class="pb-3 small hidden-sm">@yield('subtitle')</div>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-sm-8 small">
            <div class="page-header float-right">
                <div class="page-title">
                    @yield('breadcrumb')
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        @yield('content')
    </div>

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    </div>

    <!-- Alert modal -->
    <div class="modal fade show" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" data-backdrop="static" style="display: none;">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticModalLabel">Please confirm</h5>
                </div>
                <div class="modal-body">
                    <p>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondar cancelBtn">Cancel</button>
                    <button type="button" class="btn btn-primary confirmBtn">Confirm</button>
                </div>
            </div>
        </div>
    </div>
</div><!-- /#right-panel -->

<!-- Right Panel -->

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script> <!-- JavaScript -->
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="/js/plugins.js"></script>
<script src="/js/main.js"></script>
<script src="/js/global.js"></script>
@yield('scripts')

</body>
</html>