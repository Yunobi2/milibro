<!DOCTYPE html>

<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="{{asset('css/style.css')}}" rel="stylesheet"/>
   <script src="https://cdn.tailwindcss.com"></script>
   <!-- Font Awesome CSS -->
   <link
   href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
   rel="stylesheet"
   />
   <title>MILIBRO - Libro Virtual</title>
</head>
<header>
    @if (Route::has('login'))
        @include('layouts.navbar')
    @endif
</header>
<body>
    @yield('content')
</body>
