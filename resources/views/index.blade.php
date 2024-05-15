<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisata Kota Banjarmasin</title>
    @vite('resources/css/app.css')
</head>

<body>

    <main class="w-full">
        @include('komponen.header')

        @include('komponen.content1')
        @include('komponen.content2')
        
    </main>
</body>
@include('komponen.footer')

</html>
