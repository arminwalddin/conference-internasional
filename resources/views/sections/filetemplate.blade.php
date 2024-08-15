<section id="filetemplate" class="wow fadeInUp">

<div class="container">
    <div class="section-header">
        <h2>Template Proceeding</h2>
    </div>
    
    <div>
      @foreach($filetemplate as $ft)
        <span class="fa-solid fa-file"></span>
        <a href="{{$ft->path}}" download><span>Download</span><span>{{$ft->name}}</span></a>
    </div>
    @endforeach 
    {{-- @foreach($filetemplate as $ft)
    <div class="card">
      <div class="box">
        <div class="content">
          <h3>{{$ft->name}}</h3>
          <a href="{{$ft->path}}">Download</a>
        </div>
      </div>
    </div>
    @endforeach --}}
</div>
</section>