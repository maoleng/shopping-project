<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{$config[1]->value}}</title>
    <link rel="shortcut icon" href="{{$config[10]->value}}">
    <link rel="stylesheet" href="{{asset('css/base.css')}}" />
    <link rel="stylesheet" href="{{asset('css/grid.css')}}" />
    @yield('link_css')
    <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
    />

    <!-- Reset CSS -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
        integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto:wght@300;400;500;700;900&display=swap"
        rel="stylesheet"
    />
    .
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
</head>
<body>


@include('layout-customer.header')

<!-- START CONTENT -->
@yield('content')
<!-- END CONTENT -->

@include('layout-customer.footer')


<script src="{{asset('js/layout-customer-script.js')}}"></script>

</body>
</html>
