<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Clothing Cart Online</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/img/favicon-1.png" rel="icon">
  <link href="/img/apple-touch-icon-1.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/vendor/aos/aos.css" rel="stylesheet">
  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/css/style.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <!-- =======================================================
  * Template Name: Arsha
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="/">Clothing Cart Online</a></h1>

      <nav id="navbar" class="navbar">
        <ul>
            <li><a class="nav-link scrollto active" href="/">Home</a></li>
            <li><a class="nav-link   scrollto" href="/">Products</a></li>
            @guest
                <li class="dropdown"><a href="#"><span>Get Started</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    </ul>
                </li>
            @else
                <li class="dropdown"><a href="#"><span>{{ Auth::user()->name }}</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>
            @endguest
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center p-2">

    <div class="container">
        <div class="row justify-content-center">
            <div class="card shadow col-10">
                <div class="card-header"><h5>Product Detail</h5></div>
                <div class="card-body row">
                    <div class="col-6 row justify-content-center">
                        <img src="{{ $product->img }}" class="col-8" alt="">
                    </div>
                    <div class="col-6">
                        <form class="p-1" action="{{ route('buy-now') }}" method="post"> @csrf
                            <input type="text" class="form-control d-none" hidden name="productId" value="{{ $product->id }}">
                            <input type="text" class="form-control d-none" name="quantity" hidden id="finalQuantity">
                            <input type="text" class="form-control" id="finalTotalPrice" hidden name="totalPrice" id="finalQuantity">
                            <p><strong>Product Name:</strong> {{ ucwords($product->product_name) }}</p>
                            <p data-price="{{ $product->price }}" id="price"><strong>Price:</strong> ₱ {{ number_format($product->price, 2, '.', ',')  }}</p>
                            <p><strong>Quantity: </strong><span id="quantity">0</span></p>
                            <p><strong>Total Price: </strong><span id="totalPrice">₱ 0.00</span></p>
                            <p><strong>Set Quantity</strong></p>
                            <div class="row justify-content-center">
                               <a href="#" id="addOne" class="col-5 mx-1 btn btn-secondary scrollto">+</a>
                               <a href="#" id="minusOne" class="col-5 mx-1 btn btn-secondary scrollto">-</a>
                            </div>
                            <div class="form-group">
                                <label for=""><strong>Payment</strong></label>
                                <input type="number" class="form-control" name="payment" id="payment">
                            </div>
                            <div class="form-group">
                                <label for=""><strong>Change</strong></label>
                                <p id="change">₱ 0.00</p>
                                <input type="number" class="form-control d-none" id="finalChange" name="change">
                            </div>
                            <div class="row justify-content-center" id="submitButton">
                                <button class="col-10 btn btn-get-started scrollto" type="submit">Buy now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

  </section><!-- End Hero -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Clothing Cart Online</span></strong>. All Rights Reserved | {{ date('Y') }}
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/vendor/aos/aos.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/js/main.js"></script>
  <script>
        var quantity = 0;
        var totalPrice = 0;
        updateSubmitButtonVisibility();

        $(document).on('click', '#addOne', function(e) {
            e.preventDefault();
            quantity += 1;
            $('#quantity').text(quantity);
            $('#finalQuantity').val(quantity);

            $('#finalTotalPrice').val(calculateTotalPrice());
            $('#totalPrice').text(calculateTotalPrice().toLocaleString('en-PH', {
                style: 'currency',
                currency: 'PHP'
            }));
        });

        $(document).on('click', '#minusOne', function(e) {
            e.preventDefault();
            quantity -= 1;
            
            $('#finalTotalPrice').val(calculateTotalPrice());
            $('#totalPrice').text(calculateTotalPrice().toLocaleString('en-PH', {
                style: 'currency',
                currency: 'PHP'
            }));

            if (quantity > 0) {
                $('#quantity').text(quantity);
                $('#finalQuantity').val(quantity);
            } else {
                quantity = 0;
                $('#quantity').text(quantity);
                $('#finalQuantity').val(quantity);
            }
        });

        $(document).on('input', '#payment', function() {
            updateSubmitButtonVisibility();

            $('#change').text(calculateChange().toLocaleString('en-PH', {
                style: 'currency',
                currency: 'PHP' 
            }));

            $('#finalChange').val(calculateChange());
        });


        function updateSubmitButtonVisibility() {
            var paymentAmount = parseFloat($("#payment").val());

            if (!isNaN(paymentAmount) && paymentAmount > calculateTotalPrice()) {
                $("#submitButton").show();
            } else {
                $("#submitButton").hide();
            }
        }

        function calculateTotalPrice() {
            // return  (parseFloat($('#price').data('price')) * quantity) > 0 ? parseFloat($('#price').data('price')) * quantity : 0;
            return parseFloat($('#price').data('price')) * quantity;
        }

        function calculateChange() {
            return  (calculateTotalPrice() > parseFloat($('#payment').val())) ? 'Insufficient Payment!' : parseFloat($('#payment').val()) - calculateTotalPrice();
        }
  </script>
</body>

</html>