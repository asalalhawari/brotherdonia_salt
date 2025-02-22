<div class="footer">
    <div class="footer-container">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="info">
                        @php
                            $about = \App\Models\GeneralSetting::find(1);
                        @endphp
                        <img src="{{ asset('asset-files/imgs/logo-gold.png') }}" alt="Logo">
                        <p>
                            {{ $about->about}}
                        </p>
                        <div class="social-icons">
                            <a class="ms-3" href="{{ $about->instagram }}"><i class="fab fa-instagram"></i></a>
                            <a class="ms-3" href="{{ $about->linkedin }}"><i class="fab fa-linkedin-in"></i></a>
                            <a class="ms-3" href="{{ $about->facebook }}"><i class="fab fa-facebook"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <div class="contact">
                        <h3>للتواصل</h3>
                        <p>
                            {{ $about->address }}
                        </p>
                        <p>البريد الإلكتروني: {{ $about->email }}</p>
                        <p>الهاتف: {{ $about->phone_number }}</p>
                    </div>
                </div>

            </div>
        </div>


    </div>
    <div class="footer-bottom">
        Copyright@jolife
    </div>
</div><!--end footer-->
