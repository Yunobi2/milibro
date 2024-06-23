
<link href="{{asset('css/style.css')}}" rel="stylesheet"/>
   <link
   href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
   rel="stylesheet"
   />
   <!-- Font Awesome CSS -->
   <link
   href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
   rel="stylesheet"
   />

   <header>
       <div class="container">
           <div class="logo">MILIBRO</div>

                @if (Route::has('login'))
                    @include('layouts.navbar')
                @endif
       </div>
   </header>

