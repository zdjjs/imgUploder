<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{mix('css/app.css')}}"></link>
</head>
<body>
    <div id="app"></div>
    <script src="{{mix('js/app.js')}}"></script>
</body>
</html>