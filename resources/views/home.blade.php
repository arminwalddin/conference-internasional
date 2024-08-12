@extends('layouts.main')

@section('content')
@include('sections.intro')

<main id="main">
  @include('sections.about')

  

 
 <!-- <section id="publication" class="wow fadeInUp">
  <div class="container">
    <div class="section-header">
      <div class="d-flex justify-content-center">
        <h2>CONFERENCE PUBLICATION</h2>
      </div>
    </div>

    <div class="container-fluid">
      <div class="d-flex justify-content-center">
        <div class="row">
          <div class="col-lg">
            <p>{{ $settings['publication'] ?? '' }}</p>
          </div>
          <div class="col-lg">
          </div>
        </div>
      </div
  </div>
</section> -->
  

  @include('sections.speakers')

  @include('sections.honorary')

  @include('sections.schedule')

  @include('sections.venues')

  <!-- @include('sections.hotels') -->

  @include('sections.gallery')

  @include('sections.sponsors')

  <!-- @include('sections.faq') -->

  <!-- @include('sections.subscribe') -->

  @include('sections.buy_ticket')

  @include('sections.contact')
</main>
@endsection