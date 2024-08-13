<header id="header"@if(Route::current()->getName() != 'home') class="header-fixed"@endif>
  <div class="container">

    <div id="logo" class="pull-left">
      <h1>
        <a href="{{ route('home') }}#intro">
          <img class="img" src="{{url('/img/ICAAHI-BIG.png')}}" alt="icaahi"/>
          <span><i class="" aria-hidden="true"></i></span>
          {{ env('APP_NAME', 'ICAAHI') }}          
        </a>
      </h1>
    </div>

    <nav id="nav-menu-container">
      <ul class="nav-menu">
        <li class="menu-active"><a href="{{ Route::current()->getName() != 'home' ? route('home') : '' }}#intro">Home</a></li>
        <li><a href="{{ Route::current()->getName() != 'home' ? route('home') : '' }}#about">About</a></li>
        <li><a href="{{ Route::current()->getName() != 'home' ? route('home') : '' }}#speakers">Speakers</a></li>
        <li><a href="{{ Route::current()->getName() != 'home' ? route('home') : '' }}#honorary">Commite</a></li>
        <li><a href="{{ Route::current()->getName() != 'home' ? route('home') : '' }}#schedule">Schedule</a></li>
        <li><a href="{{ Route::current()->getName() != 'home' ? route('home') : '' }}#venue">Venue</a></li>
        <!-- <li><a href="{{ Route::current()->getName() != 'home' ? route('home') : '' }}#hotels">Hotels</a></li> -->
        {{-- <li><a href="{{ Route::current()->getName() != 'home' ? route('home') : '' }}#gallery">Gallery</a></li> --}}
        {{-- <li><a href="{{ Route::current()->getName() != 'home' ? route('home') : '' }}#supporters">Conference Partners</a></li> --}}
        <li><a href="{{ Route::current()->getName() != 'home' ? route('home') : '' }}#contact">Contact</a></li>
        <li><a href="{{ Route::current()->getName() != 'home' ? route('home') : '' }}#buy-tickets">Buy Tickets</a></li>
        {{-- <li class="buy-tickets"><a href="{{ Route::current()->getName() != 'home' ? route('home') : '' }}#buy-tickets">Buy Tickets</a></li> --}}
        <li class="buy-tickets"><a href="{{ $settings['link_submit_paper'] }}">Submit Paper</a></li>
      </ul>
    </nav>
  </div>
</header>
