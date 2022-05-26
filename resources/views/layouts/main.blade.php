<!DOCTYPE html>
<html>
    <head>
        <title>Title</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset("assets/uikit/css/")}}/uikit.min.css" />
        <script src="{{asset("assets/uikit/css/")}}/uikit.min.js"></script>
        <script src="{{asset("assets/uikit/js/")}}/uikit-icons.min.js"></script>
    </head>
    <body>
        <div class="uk-container">
            @include('partials.navbar')
                @yield('container')
        </div>
    </body>
</html>