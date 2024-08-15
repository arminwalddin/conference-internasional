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

  @include('sections.commite')
  
  @include('sections.schedule')

  @include('sections.orgsup')
  
  @include('sections.sponsors')
  

  @include('sections.venues')

  {{-- @include('sections.hotels') --}}

  @include('sections.gallery')

  

@include('sections.faq') 

@include('sections.filetemplate')

    {{-- @include('sections.subscribe') --}}

  @include('sections.flyer')

  @include('sections.buy_ticket')

  @include('sections.contact')
</main>
@endsection