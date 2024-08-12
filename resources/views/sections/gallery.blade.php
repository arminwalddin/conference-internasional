<section id="gallery" class="wow fadeInUp">

  <div class="container">
    <div class="section-header">
      <h2>About City Of Kendari</h2>
      <p>Kendari is the capital city of the Indonesian province of Southeast Sulawesi. It had a population of 289,966 at the 2010 Census and 345,107 at the 2020 census, making it the most populous city in the province, and the fourth most on Sulawesi. The official estimate as at mid 2023 was 351,085 - comprising 176,279 males and 174,806 females. The city covers an area of 270.14 square kilometers (104.30 sq mi), or about 0.7 percent of Southeast Sulawesi's land area. Located on Kendari Bay, it continues to be an important trade center, with the province's main port and airport. It is the economic and educational center of the province, home to various universities and colleges. Kendari has the highest Human Development Index (HDI) in Sulawesi.</p>
    </div>
  </div>
  @foreach($galleries as $gallery)
    <div class="owl-carousel gallery-carousel">
      @foreach($gallery->photos as $photo)
        <a href="{{ $photo->getUrl() }}" class="venobox" data-gall="gallery-carousel"><img src="{{ $photo->getUrl() }}" alt="{{ $gallery->name }}" title="{{ $gallery->name }}"></a>
      @endforeach
    </div>
  @endforeach
</section>
