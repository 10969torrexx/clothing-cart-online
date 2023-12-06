@php
    use App\Http\Controllers\ProductsController;
    $productsController = new ProductsController;
@endphp
<!-- ======= Portfolio Section ======= -->
<section id="products" class="portfolio">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
        <h2>Products</h2>
        </div>

        <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
        <li data-filter="*" class="filter-active">All</li>
        {{-- <li data-filter=".filter-app">App</li>
        <li data-filter=".filter-card">Card</li>
        <li data-filter=".filter-web">Web</li> --}}
            @foreach ($productsController->showProductTypes() as $item)
                <li data-filter=".filter-{{ $loop->iteration }}">{{ $item }}</li>
            @endforeach
        </ul>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            @if (count($productsController->index()) > 0)
                @foreach ($productsController->index() as $item)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $item->category }}">
                        <div class="shadow border-rounded portfolio-img"><img src="{{ $item->img }}" class="img-fluid" alt=""></div>
                        <div class="portfolio-info">
                        <h4>{{ ucwords($item->product_name) }}</h4>
                        <p>₱ {{ number_format($item->price, 2, '.', ',')  }}</p>
                        <a href="{{ $item->img }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="{{ ucwords($item->product_name) }} | ₱ {{ number_format($item->price, 2, '.', ',')  }}"><i class="bx bx-plus"></i></a>
                        <a href="{{ route('product-detail', ['id' => $item->id ]) }}" class="details-link" title="More Details"><i class='bx bx-message-square-detail'></i></a>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-lg-4 col-md-6 portfolio-item">
                    <h1>No products to show</h1>
                </div>
            @endif
        </div>

    </div>
</section>
  <!-- End Portfolio Section -->