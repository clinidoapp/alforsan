<footer class="text-dark mt-4">
    <div class="container">
        <div class="row">

            <!-- 1. Logo & About (NO title / always visible) -->
            <div class="col-md-3 mb-3">
                <img src="{{asset('images/logo@3x.webp')}}" class="mb-2" style="max-width:140px;">
                <p class="small">
                    المركز الرائد والموثوق به في مجال طب وجراحة العيون، من خلال تقديم رعاية طبية استثنائية تضاهي المعايير العالمية، مع الحفاظ على القيم الإنسانية في التعامل مع مرضانا
                </p>
            </div>

            <!-- 2. Quick Links -->
            <div class="col-md-3 mb-3">
                <button class="footer-toggle" data-bs-toggle="collapse" data-bs-target="#footerLinks"> {{__('words.Quick links')}}</button>

                <ul id="footerLinks" class="list-unstyled collapse d-md-block">
                    <li><a href="#" class="text-dark text-decoration-none">{{__('words.home')}}</a></li>
                    <li><a href="#" class="text-dark text-decoration-none">{{__('words.about_us')}}</a></li>
                    <li><a href="#" class="text-dark text-decoration-none">{{__('words.doctors')}}</a></li>
                    <li><a href="#" class="text-dark text-decoration-none">{{__('words.Call us')}}</a></li>
                </ul>
            </div>

            <!-- 3. Services -->
            <div class="col-md-3 mb-3">
                <button class="footer-toggle" data-bs-toggle="collapse" data-bs-target="#footerServices"> {{__('words.Our medical services')}} </button>

                <ul id="footerServices" class="list-unstyled collapse d-md-block">
                    <li>Medical Consultation</li>
                    <li>Radiology Scans</li>
                    <li>Laboratory Tests</li>
                    <li>Home Care</li>
                </ul>
            </div>

            <!-- 4. Contact -->
            <div class="col-md-3 mb-3">
                <button class="footer-toggle" data-bs-toggle="collapse" data-bs-target="#footerContact"> {{__('words.Call us')}} </button>

                <div id="footerContact" class="collapse d-md-block">
                    <p class="mb-1"><i class="fa-solid fa-phone-volume"></i> {{env('site_phone')}}</p>
                    <p class="mb-1"><i class="fa-solid fa-envelope"></i> {{env('site_email')}}</p>
                </div>
                <div id="socialLinks">
                    <div class="d-flex">
                        <a href="#" class="text-dark"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="text-dark"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#" class="text-dark"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="text-dark"><i class="fa-brands fa-tiktok"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Copyright -->
    <div class="bg-primary-custome text-white text-center py-3 mt-3">
        <small>Al Forsan © Copyright {{ date('Y') }} </small>
    </div>
        @php
        $isArabic = app()->getLocale() === 'ar';
        $whatsappNumber = env('site_whatsapp');
        @endphp

        <a href="https://wa.me/{{ $whatsappNumber }}"target="_blank"class="whatsapp-float {{ $isArabic ? 'rtl' : 'ltr' }}"aria-label="WhatsApp Chat" title="{{ $isArabic ? 'تواصل معنا عبر واتساب' : 'Chat with us on WhatsApp' }}">
            <img src="{{ asset('images/whatsapp-icon@2x.webp') }}" height="60">
        </a>
</footer>
