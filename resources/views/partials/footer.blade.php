{{-- <footer id="footer"> --}}
  <footer class="footer-distributed">
    <div class="footer-left">
      <h3>University of<span> Sulawesi Tenggara</span></h3>
      <p class="footer-links">
        <a href="#" class="link-1">Home</a>
        <a href="#" class="link-1">Ticket</a>
        <a href="#" class="link-1">Sumit Paper</a>
        <a href="#" class="link-1">Contact Info</a>
      </p>
      <p class="footer-company-name">ICAAHI © 2024</p>
      <p class="footer-company-name">Designed By IT Team of Sulawesi Tenggara University</p>
    </div>
    <div class="footer-center">
      <div>
        <i class="fa fa-map-marker"></i>
        <p>{{ $settings['contact_address'] }}</p>
      </div>

      <div>
        <i class="fa fa-phone"></i>
        <p>{{ $settings['contact_phone'] }}</p>
      </div>

      <div>
        <i class="fa fa-envelope"></i>
        <p><a href="mailto:support@company.com">{{ $settings['contact_email'] ?? '' }}</a></p>
      </div>
    </div> 
    <div class="footer-right">

      <p class="footer-company-about">
        <span>About Unsultra</span>
        Unsultra is one of the best private University in Southeast Celebes.
      </p>

      <div class="footer-icons">

        <a href="{{ $settings['footer_facebook'] }}"><i class="fa fa-facebook"></i></a>
        <a href="{{ $settings['footer_youtube'] }}"><i class="fa fa-youtube"></i></a>
        <a href="{{ $settings['footer_instagram'] }}"><i class="fa fa-instagram"></i></a>
        {{-- <a href="#"><i class="fa fa-github"></i></a> --}}

      </div>

    </div>
  

  {{-- <div class="container">
    <div class="copyright">
      &copy; Copyright <strong>{{ env('APP_NAME', 'ICAAHI') }}</strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
       Designed by IT Team of Sulawesi Tenggara University
    </div>
  </div> --}}
</footer><!-- #footer -->
