<section id="ispeaker" class="wow fadeInUp">
    <div class="container">
      <div class="section-header">
        <h2>Invited Speaker</h2>
        <p>Here are some of our Invited Speaker</p>
      </div>
  
      <div class="row">
        @foreach($ispeaker as $ispeaker)
          <div width="640" height="480" allignment="center" class="col-lg-4 col-md-6">
            <div class="ispeaker">
              <img src="{{ $ispeaker->photo->getUrl() }}" alt="{{ $ispeaker->name }}" class="img-fluid">
              <div class="details">
                <h3><a href="{{ route('ispeaker', $ispeaker->id) }}">{{ $ispeaker->name }}</a></h3>
                <p>{{ $ispeaker->description }}</p>
                <div class="social">
                  @if($ispeaker->twitter)
                    <a href="{{ $ispeaker->twitter }}"><i class="fa fa-twitter"></i></a>
                  @endif
                  @if($ispeaker->facebook)
                    <a href="{{ $ispeaker->facebook }}"><i class="fa fa-facebook"></i></a>
                  @endif
                  @if($ispeaker->linkedin)
                    <a href="{{ $ispeaker->linkedin }}"><i class="fa fa-linkedin"></i></a>
                  @endif
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  
  </section>
  