<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>{{$title}}</title>
</head>
<body>
    <div class="h-full min-w-full grid grid-cols-12 grid-rows-12 justify-center">
        @yield("view")
    </div>
</body>
</html>