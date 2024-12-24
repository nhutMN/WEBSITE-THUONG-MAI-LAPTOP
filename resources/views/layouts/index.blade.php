<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/">
    <title>NMN SHOP Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/templatemo.css">
    <link rel="stylesheet" href="css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="css/fontawesome.min.css">
<!--
    
TemplateMo 559 NMN SHOP Shop

https://templatemo.com/tm-559-NMN SHOP-shop

-->
</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="{{ route('layouts.home') }}">
                NMN SHOP
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-around mx-lg-auto">
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('layouts.home') }}">Home</a>
                        </li> --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="shopDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Shop
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="shopDropdown">
                                <a class="dropdown-item" href="{{ route('layouts.home') }}">Tất cả</a>
                                @foreach ($cate as $item)
                                    <a class="dropdown-item" href="{{ route('shop', $item->id) }}">{{ $item->name }}</a>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
                
                <div class="navbar align-self-center d-flex">
                    @if (Auth::check())
                        <a class="nav-icon position-relative text-decoration-none" href="">
                            <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                        </a>
                        <a class="nav-icon position-relative text-decoration-none ms-3" href="{{ route('admin.logout') }}">
                            Logout
                        </a>
                    @else
                        <a class="nav-icon position-relative text-decoration-none" href="{{ route('login') }}">
                            Đăng nhập
                        </a> /
                        <a class="nav-icon position-relative text-decoration-none" href="{{ route('layouts.register') }}">
                            Đăng ký
                        </a>
                    @endif
                
                    <!-- Thêm icon giỏ hàng ở đây -->
                    <a href="{{ route('cart.view') }}" class="nav-icon position-relative text-decoration-none ms-3">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ count(session('cart') ?? []) }}
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </a>
                </div>
                
            </div>

        </div>
    </nav>
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <!-- Start Content -->
    @yield('content')
    <!-- End Content -->

    <!-- End Footer -->

    <!-- Start Script -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/templatemo.js"></script>
    <script src="js/custom.js"></script>
    <!-- End Script -->
</body>

</html>