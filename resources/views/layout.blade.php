<!DOCTYPE html>
<html>
<head>
    <title>@section('title') @show</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="/favicon.png" rel="shortcut icon">
    <link href="/css/main.min.css?v1" rel="stylesheet">
</head>
<body class="auth-wrapper">
<div class="all-wrapper menu-side with-pattern">
    <div class="auth-box-w">
        <div class="logo-w">
            <a href="{{ route('home') }}"><img alt="" src="/img/logo-big.png"></a>
        </div>
        <h4 class="auth-header">
            @section('header') @show
        </h4>
        @section('content') @show
    </div>
</div>
</body>
</html>