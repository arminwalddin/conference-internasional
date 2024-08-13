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

  @include('sections.ispeaker')

  @include('sections.honorary')
  
  @include('sections.schedule')

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
  @include('sections.sponsors')
  

  @include('sections.venues')

  <!-- @include('sections.hotels') -->

  @include('sections.gallery')

  

  <!-- @include('sections.faq') -->

  <!-- @include('sections.subscribe') -->

  @include('sections.buy_ticket')

  @include('sections.contact')
</main>
@endsection