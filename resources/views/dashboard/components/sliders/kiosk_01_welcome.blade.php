
<div class="carousel-item active" data-interval="90000" id="kiosk_01_welcome">
  <div class="d-flex align-items-center justify-content-center">

      <div class="card text-center min-vh-100 min-vw-100" >
        <div class="card-body " style="padding:0px;margin:0px;height: 93%">
            <div class="d-flex justify-content-between bd-highlight mb-3">
              <div class="hero-banner-wrapper">
                <video class="brick-banner-motion-graphic" autoplay="autoplay" loop="loop" muted="muted" poster="{{ asset('images/bak.jpg') }}">
                  <source src="{{ asset('video/ZR-hero-banner-1920-700_CLIPCHAMP_keep.mp4') }}" type="video/mp4">
                 </video>
              </div>
            </div>
            
        </div>
          @include('dashboard.components.sliders.common.slider_footer')
      </div>

  </div>
</div>