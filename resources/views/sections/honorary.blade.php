<section id="honorary" class="wow fadeInUp">
  <div class="container">
    <div class="section-header">
      <h2>Honorary Commite</h2>
      <p>Here are some of our Honorary Commite</p>
    </div>

    <div class="row">
      @foreach($honorary as $honorary)
        <div width="640" height="480" allignment="center" class="col-lg-4 col-md-6">
          <div class="honorary">
            <img src="{{ $honorary->photo->getUrl() }}" alt="{{ $honorary->name }}" class="img-fluid">
            <div class="details">
              <h3><a href="{{ route('honorary', $honorary->id) }}">{{ $honorary->name }}</a></h3>
              <p>{{ $honorary->description }}</p>
              <div class="social">
                @if($honorary->twitter)
                  <a href="{{ $honorary->twitter }}"><i class="fa fa-twitter"></i></a>
                @endif
                @if($honorary->facebook)
                  <a href="{{ $honorary->facebook }}"><i class="fa fa-facebook"></i></a>
                @endif
                @if($honorary->linkedin)
                  <a href="{{ $honorary->linkedin }}"><i class="fa fa-linkedin"></i></a>
                @endif
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

</section>
