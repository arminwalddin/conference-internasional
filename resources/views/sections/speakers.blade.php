<section id="speakers" class="wow fadeInUp">
  <div class="container">
    <div class="section-header">
      <h2>Keynote Speakers</h2>
      <p>Here are some of our keynote speakers</p>
    </div>

    <div class="row">
      @foreach($speakers as $speaker)
        <div width="640" height="480" allignment="center" class="col-lg-4 col-md-6">
          <div class="speaker">
            <img src="{{ $speaker->photo->getUrl() }}" alt="{{ $speaker->name }}" class="img-fluid">
            <div class="details">
              <h3><a href="{{ route('speaker', $speaker->id) }}">{{ $speaker->name }}</a></h3>
              <p>{{ $speaker->description }}</p>
              <div class="social">
                @if($speaker->twitter)
                  <a href="{{ $speaker->twitter }}"><i class="fa fa-twitter"></i></a>
                @endif
                @if($speaker->facebook)
                  <a href="{{ $speaker->facebook }}"><i class="fa fa-facebook"></i></a>
                @endif
                @if($speaker->linkedin)
                  <a href="{{ $speaker->linkedin }}"><i class="fa fa-linkedin"></i></a>
                @endif
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

</section>
