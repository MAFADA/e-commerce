<html>
  <head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm sticky-top">
      <div class='container'>
      <a href="/customer" class="brand-link">
      <!-- <img src="{{asset('storage/images/GXShop.png')}}" alt="GXShop Logo" class="rounded-circle" width="40px" style="opacity: .8">      
      <span class="navbar-brand">GXShop</span>
      </a> -->
      <a class="navbar-brand" href="/customer">GXShop</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="/customer">Home</a>
          </li>
          <?php
            $pesanan_utama = \App\Models\Order::where('user_id', Auth::user()->id)->where('status',0)->first();
          ?>
          @if(empty($pesanan_utama) || $pesanan_utama->total_price == 0)
            <li class="nav-item">
              <a class="nav-link" href="/check-out">Keranjang</a>
            </li>
          @else
            <?php    
              $notif = \App\Models\OrderDetail::where('order_id', $pesanan_utama->id)->count();
            ?>
            <li class="nav-item">
              <a class="nav-link" href="/check-out">Keranjang <span class="badge badge-danger">{{ $notif }}</span></a>
            </li>
          @endif
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->username }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="/profile">Profile</a>
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
              <a class="dropdown-item" href="/akun/{{Auth::user()->id}}">Akun</a>
              @can('manage-users')
              <a class="dropdown-item" href="{{ route('admin.index') }}">{{ __('Dashboard') }}</a>                            
              @endcan
            </div>
          </li>
        </ul>
      </div>
    </nav>
    @yield('content')
  </body>
</html>
