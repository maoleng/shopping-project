<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>{{$config[2]->value}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <link rel="shortcut icon" href="{{$config[0]->value}}">

    <link href="{{asset('css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/app.min.css')}}" rel="stylesheet" type="text/css" id="light-style" />
    <link href="{{asset('css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style" />
</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
<div class="wrapper">
    @include('layout.sidebar')
    <div class="content-page">
        <div class="content">
            @include('layout.header')

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active">CRM</li>
                                </ol>
                            </div>
                            <h4 class="page-title">CRM</h4>
                        </div>
                    </div>
                </div>
                <!-- START CONTENT -->
                @yield('content')
                <!-- END CONTENT -->
            </div>
        </div>

        @include('layout.footer')

    </div>

</div>

@include('layout.rightsidebar')

<script src="{{asset('js/vendor.min.js')}}"></script>
<script src="{{asset('js/app.min.js')}}"></script>
<script src="{{asset('js/apexcharts.min.js')}}"></script>
<script src="{{asset('js/component.todo.js')}}"></script>
<script src="{{asset('js/demo.dashboard-crm.js')}}"></script>

</body>
</html>
