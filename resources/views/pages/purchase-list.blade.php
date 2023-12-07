@php
    use App\Http\Controllers\ProductsController;
    $productsController = new ProductsController;
@endphp

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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- DataTables CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                <li><a class="nav-link   scrollto" href="{{ route('purchase-list') }}">Purchases</a></li>
                <li class="dropdown"><a href="#"><span>{{ Auth::user()->name }}</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                    <li><a href="{{ route('user-profile') }}">Profile</a></li>
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
            <div class="card shadow">
                <div class="card-header"><h5>Purchases</h5></div>
                <div class="card-body row">

                    <table id="myDataTable" class="display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Product Category</th>
                                <th>Product Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Payment</th>
                                <th>Change</th>
                                <th>Purchase Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($boughts as $item)
                                <tr> 
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ ucwords($item->product_name) }}</td>
                                    <td>{{ $productsController->showProductTypes()[$item->category - 1] }}</td>
                                    <td>₱ {{ number_format($item->price, 2, '.', ',')  }}</td>
                                    <td>{{ $item->quantity }} pcs</td>
                                    <td>₱ {{ number_format($item->total_price, 2, '.', ',')  }}</td>
                                    <td>₱ {{ number_format($item->payment, 2, '.', ',')  }}</td>
                                    <td>₱ {{ number_format($item->change, 2, '.', ',')  }}</td>
                                    <td>{{ date('F d, Y', strtotime($item->created_at)) }}</td>
                                    <td class="text-center">
                                        <a href="#" id="delete-purchase" data-id="{{ $item->id }}"><i class='bx bx-trash text-danger text-center'></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
         $(document).ready(function() {
            $('#myDataTable').DataTable();

            
        });

        $(document).on('click', '#delete-purchase', function(e) {
            e.preventDefault();
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {

                    $.ajax({
                        type: "GET",
                        url: "{{ route('delete-purchase') }}",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Laravel CSRF token
                        }, data: {
                            'id' : $(this).data('id')
                        },
                        success: function (response) {
                            if (response.status == 200) {
                                swal(`${response.message}`, {
                                        icon: "success",
                                    }).then(function () {
                                        // Reload the page when the OK button is clicked
                                        location.reload();
                                });
                            }
                           
                        },
                        error: function (xhr, status, error) {
                            // Handle any errors that occur during the request
                            toastr.error('Cannot fetch attendance (Error: 500)');
                        }
                    });

                }
            });
        });
    </script>
</body>

</html>