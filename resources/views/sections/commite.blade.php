<section id="commite" class="wow fadeInUp">
    <div class="container">
        <div class="section-header">
            <h2>Committee</h2>
            <p>Here are Scientific and Orginizing Commite</p>
        </div>

        <div class="col-lg-12">
            <div class="row">
            <div class="col-sm-12 col-lg-6 col-md-12">
            <div class="list">
                <h2>Scientific Committee</h2>
                <br/>
            @foreach($commite_s as $commites)
            <ul class="ul">
                <li>{{ $commites->name }}</li>
            </ul>
            @endforeach
            </div>
        </div>
        <div class="col-sm-12 col-lg-6 col-md-12">
            <div class="list">
            <h2>Organizing committee</h2>
            <br/>
            @foreach($commite_o as $commiteo)
            <ul class="ul">
                <li>{{ $commiteo ->name }}</li>
            </ul>
            @endforeach
            </div>
        </div>        
        </div>

    </div>


</section>