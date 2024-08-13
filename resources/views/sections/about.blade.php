<section id="about">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <h2>About The Conference</h2>
        <p>{{ $settings['about_description'] ?? '' }}</p>
      </div>
      <div class="col-lg-3">
        <h3>Where & When</h3>
          <p>{!! $settings['about_where'] ?? '' !!}</p>
          <p>{!! $settings['about_when'] ?? '' !!}</p>        
      </div>
      <div class="col-lg-3">
        <h3>Important Date</h3>
        <p>{!! $settings['important_date'] ?? '' !!}</p>
      </div>
    </div>
  </div>
</section>
