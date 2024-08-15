<section id="supporters" class="section-with-bg wow fadeInUp">

    <div class="container">
      <div class="section-header">
        <h2>Conference Organizer</h2>
      </div>
  
      <div class="row no-gutters clearfix" style="display: flex;
  justify-content: center;
  align-items: center; ">
        {{-- @foreach($sponsors as $sponsor) --}}
          <div class="col-lg-3 col-md-4 col-xs-8" style="border: none;
  border-radius: 5px;
  transition: all 0.3s ease-in-out;
  box-shadow: 0 10px 50px 0 rgba(6, 12, 34, 0.1);">
            <div class="supporter-logo">
              {{-- <img src="{{ $sponsor->logo->getUrl() }}" class="img-fluid" alt="{{ $sponsor->name }}"> --}}
            <img src="{{url('/img/Logo Unsultra.png')}}" class="img-fluid" alt="icaahi">
            </div>
          </div>
        {{-- @endforeach --}}
      </div>
  
    </div>
  
  </section>