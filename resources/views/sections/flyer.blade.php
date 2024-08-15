<section id="venue" class="wow fadeInUp">
    <div class="container">
        <div class="section-header">
          <h2>International Advisory Board</h2>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row no-gutters">
            @foreach($hotels as $flyer)
              {{-- <div class="col-lg-3 col-md-4"> --}}
                <div class=" ">
                  <a href="{{ $flyer->photo->getUrl() }}" class="venobox"  data-gall="venue-gallery">
                    <img src="{{ $flyer->photo->getUrl() }}" alt="" class="img-fluid rounded mx-auto d-block" style="height: 80%; " >
                  </a>
                </div>
              {{-- </div> --}}
            @endforeach
        </div>
    </div>
</section>