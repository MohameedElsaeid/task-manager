<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('page_title')</title>
    @include('dashboard.layouts.head')
    @yield('style')
</head>


<body class="nav-md">
<div class="container body">
    <div class="main_container">
        @include('dashboard.layouts.side')

        @yield('page_content')

        @include('dashboard.layouts.footer')
    </div>
</div>
@include('dashboard.layouts.scripts')
@yield('scripts')
</body>
</html>
