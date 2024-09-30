
{{-- {{ \App\Models\Setting::first()->address }} --}}
{{-- App\Filament\Resources\PaymentResource\Pages\ListPayments --}}

{{-- <footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2"><a href="#" class="logo">Car<span>book</span></a></h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
              <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4 ml-md-5">
            <h2 class="ftco-heading-2">Information</h2>
            <ul class="list-unstyled">
              <li><a href="{{ route('about') }}" class="py-2 d-block">About</a></li>
              <li><a href="{{ route('services') }}" class="py-2 d-block">Services</a></li>
              <li><a href="" class="py-2 d-block">Term and Conditions</a></li>
              <li><a href="" class="py-2 d-block">Best Price Guarantee</a></li>
              <li><a href="" class="py-2 d-block">Privacy &amp; Cookies Policy</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
           <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Customer Support</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">FAQ</a></li>
              <li><a href="#" class="py-2 d-block">Payment Option</a></li>
              <li><a href="#" class="py-2 d-block">Booking Tips</a></li>
              <li><a href="#" class="py-2 d-block">How it works</a></li>
              <li><a href="#" class="py-2 d-block">Contact Us</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Have a Questions?</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                  <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                  <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
                </ul>
              </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">

          <p>
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved  <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="" target="_blank">{{ \App\Models\Setting::first()->name }}</a>
</p>
        </div>
      </div>
    </div>
  </footer>  --}}
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2"><a href="#" class="logo">Car<span>book</span></a></h2>
                    <p>{!! \App\Models\Setting::first()->about_us ?? 'About us text.' !!}</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="{{ \App\Models\Setting::first()->twitter_link }}"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="{{ \App\Models\Setting::first()->facebook_link }}"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="{{ \App\Models\Setting::first()->instagram_link }}"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Information</h2>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('about') }}" class="py-2 d-block">About</a></li>
                        <li><a href="{{ route('services') }}" class="py-2 d-block">Services</a></li>
                        <li><a href="#" class="py-2 d-block">Term and Conditions</a></li>
                        <li><a href="#" class="py-2 d-block">Best Price Guarantee</a></li>
                        <li><a href="#" class="py-2 d-block" data-toggle="modal" data-target="#privacyPolicyModal">Privacy &amp; Cookies Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Customer Support</h2>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/about') }}" class="py-2 d-block">FAQ</a></li>
                        <li><a href="{{ url('/pricing') }}" class="py-2 d-block">Payment Option</a></li>
                        {{-- <li><a href="{{ url('/') }}" class="py-2 d-block">Booking Tips</a></li> --}}
                        <li><a href="{{ url('/') }}" class="py-2 d-block">How it works</a></li>
                        <li><a href="{{ url('/contact') }}" class="py-2 d-block">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">{{ \App\Models\Setting::first()->address ?? 'Default address' }}</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">{!! \App\Models\Setting::first()->phone_number ?? 'Default phone number' !!}</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">{{ \App\Models\Setting::first()->email ?? 'info@yourdomain.com' }}</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>&copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This website is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="{{ url('/') }}" target="_blank">{{ \App\Models\Setting::first()->name }}</a></p>
            </div>
        </div>
    </div>
</footer>

<!-- Modal for Privacy & Cookies Policy -->
<div class="modal fade" id="privacyPolicyModal" tabindex="-1" role="dialog" aria-labelledby="privacyPolicyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="privacyPolicyModalLabel">Privacy & Cookies Policy</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              {{ \App\Models\Setting::first()->about_us }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
