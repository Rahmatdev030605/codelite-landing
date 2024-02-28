<section class="testimonial-area">
    <div class="custom-container">
        <div class="testimonial-slider-wrap">
            <div class="testimonial-slider swiper">
                <div class="swiper-wrapper">
                    @php
                    $carouselData = $carouselData ?? [];

                    @endphp

                    @foreach($carouselData as $user)
                    <div class="swiper-slide testimonial-item">
                        <div class="testimonial-item-body">
                            <img class="animation-slide-right bg-shape" src="assets/imgs/bg-shape-3.svg" alt="Shape" />
                            <span class="platform-name">
                                <img src="assets/imgs/icon-linkedin.svg" alt="Icon" />
                            </span>
                            <h1>{{ $user['name'] }}</h1>
                            <p>{{ $user['email'] }}</p>
                            <div class="author-box d-flex align-items-center">
                                <img src="{{ $user['avatar'] }}" alt="Testimonial" />
                                <div class="author-box-content">
                                    <h4>{{ $user['name'] }}</h4>
                                    <p>Product Designer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- navigation buttons -->
            <div class="swiper-button-prev"><i class="iconoir-arrow-left"></i></div>
            <div class="swiper-button-next"><i class="iconoir-arrow-right"></i></div>
        </div>
    </div>
</section>

<!-- Inisialisasi SwiperJS di sini -->
<script>
    var swiper = new Swiper('.testimonial-slider', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>