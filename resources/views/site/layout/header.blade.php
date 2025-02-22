<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-text">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('asset-files/imgs/logo.png') }}" alt="Company Logo" width="150" height="50" />

        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">الرئيسية</a>
                </li>


                <li class="nav-item ">
                    <a class="nav-link " href="{{ route('mainshop') }}" id="navbarDropdown" role="button">
                        المتجر
                    </a>
                    {{-- <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('products.index', ['rtype' => 'inside']) }}">داخل
                                الاردن</a></li>
                        <li><a class="dropdown-item" href="{{ route('products.index', ['rtype' => 'outside']) }}">خارج
                                الاردن</a></li>
                    </ul> --}}
                </li>


                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('about-us') }}">من نحن</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('our_branches.show') }}">الفروع</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('catalog') }}">كتالوج</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('videos') }}">فيديوهات خاصة</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('contact_us.show') }}">تواصل معنا</a>
                </li>

            </ul>


            @auth
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

                    <li>
                        <div class="search-icon">
                            <svg id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1"
                                viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                <path
                                    d="M344.5,298c15-23.6,23.8-51.6,23.8-81.7c0-84.1-68.1-152.3-152.1-152.3C132.1,64,64,132.2,64,216.3  c0,84.1,68.1,152.3,152.1,152.3c30.5,0,58.9-9,82.7-24.4l6.9-4.8L414.3,448l33.7-34.3L339.5,305.1L344.5,298z M301.4,131.2  c22.7,22.7,35.2,52.9,35.2,85c0,32.1-12.5,62.3-35.2,85c-22.7,22.7-52.9,35.2-85,35.2c-32.1,0-62.3-12.5-85-35.2  c-22.7-22.7-35.2-52.9-35.2-85c0-32.1,12.5-62.3,35.2-85c22.7-22.7,52.9-35.2,85-35.2C248.5,96,278.7,108.5,301.4,131.2z" />
                            </svg>
                            <form class="search" action="{{ route('products.index') }}">
                                @csrf
                                <input type="text"
                                    @if (isset($_GET['search'])) value="{{ $_GET['search'] }}" @endif name="search"
                                    class="form-control search-input @if (isset($_GET['search'])) open @endif"
                                    placeholder="ابحث عن منتجاتك...">
                            </form>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">

                            مرحبا يا
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('myprofile.index') }}">
                                    صفحتي الشخصيه

                                </a></li>

                        </ul>
                    </li>
                </ul>
            @else
                <div class="search-icon">
                    <svg id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512"
                        width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink">
                        <path
                            d="M344.5,298c15-23.6,23.8-51.6,23.8-81.7c0-84.1-68.1-152.3-152.1-152.3C132.1,64,64,132.2,64,216.3  c0,84.1,68.1,152.3,152.1,152.3c30.5,0,58.9-9,82.7-24.4l6.9-4.8L414.3,448l33.7-34.3L339.5,305.1L344.5,298z M301.4,131.2  c22.7,22.7,35.2,52.9,35.2,85c0,32.1-12.5,62.3-35.2,85c-22.7,22.7-52.9,35.2-85,35.2c-32.1,0-62.3-12.5-85-35.2  c-22.7-22.7-35.2-52.9-35.2-85c0-32.1,12.5-62.3,35.2-85c22.7-22.7,52.9-35.2,85-35.2C248.5,96,278.7,108.5,301.4,131.2z" />
                    </svg>
                    <form class="search" action="{{ route('products.index') }}">
                        @csrf
                        <input type="text" @if (isset($_GET['search'])) value="{{ $_GET['search'] }}" @endif
                            name="search" class="form-control search-input @if (isset($_GET['search'])) open @endif"
                            placeholder="ابحث عن منتجاتك...">
                    </form>
                </div>
                <a href="{{ route('login') }}" class="login-button">تسجيل الدخول</a>
            @endauth

        </div>
    </div>
</nav>
