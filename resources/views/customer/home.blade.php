
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- 
    - primary meta tags
  -->
  <title>Shoppie - Man summer collection</title>
  <meta name="title" content="Shoppie - Man summer collection">
  <meta name="description" content="This is an eCommerce html template made by codewithsadee">

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./assets/fonts/font.css">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- 
    - preload images
  -->
  <link rel="preload" as="image" href="./assets/images/hero-banner.png">

</head>

<body>

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <a href="#" class="logo">
        <h2>komsteer skate</h2>
      </a>

      <nav class="navbar" data-navbar>
        <ul class="navbar-list">

          <li>
            <a href="#" class="navbar-link">Home</a>
          </li>

        </ul>

        <button class="cart-btn">
        </button>

        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
          @csrf
          <button type="submit" class="btn">Log Out</button>
      </form>

      </nav>

      <button class="nav-open-btn" aria-label="toggle menu" data-nav-toggler>
        <ion-icon name="menu-outline" aria-hidden="true"></ion-icon>
      </button>

    </div>
  </header>





  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <div class="hero">
        <div class="container">

          <div class="hero-content">

            <h1 class="h1 hero-title title">komsteer <br> skate</h1>

            <p class="hero-text">
              Lo ga skating bukan karena udah tua. Tapi Lo jadi tua karena udah ga skating!
            </p>

            <a href="#" class="btn btn-primary">
              <span class="span">Shop Now</span>

              <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
            </a>

          </div>

          <div class="hero-banner">
            <figure class="img-holder" style="--width: 704; --height: 700;">
              <img src="./assets/images/huhu.jpg" width="704" height="700" alt="hero banner" class="img-cover">
            </figure>

            <img src="./assets/images/hero-shape-1.png" width="255" height="249" alt="shape" class="shape shape-1">
          </div>

          <img src="./assets/images/hero-shape-2.png" width="360" height="133" alt="shape" class="shape shape-2">

        </div>
      </div>





      <!-- 
        - #PRODUCT
      -->

      <section class="section product">
        <div class="container">
            <h2 class="h2 section-title title text-center">Ini produk dari kita Bro!</h2>
            <ul class="product-list has-scrollbar">
                @foreach ($product as $products)
                    <li class="scrollbar-item">
                        <div class="product-card text-center">
                            <div class="card-banner">
                                <figure class="product-banner img-holder" style="--width: 448px; --height: 470px;">
                                    <img src="{{ asset('products/' . $products->image) }}" width="448" height="470" loading="lazy" class="img-cover">
                                </figure>
                                
                                <a href="{{ route('checkout') }}" class="btn product-btn">
                                    <ion-icon name="bag" aria-hidden="true"></ion-icon>
                                    <span class="span">Beli Sekarang</span>
                                </a>
                            </div>
                            <div class="card-content">
                                <h3 class="h4 title">
                                    <a href="#" class="card-title">{{ $products->title }}</a>
                                </h3>
                                <span class="price">Rp.{{ $products->price }}</span>
                            </div>
                        </div>
                    </li>
                @endforeach
                
            </ul>
        </div>
    </section>



      <!-- 
        - #OFFER
      -->

      <section class="offer has-bg-image" style="background-image: url('./assets/images/hehe.jpg')">
        <div class="container">

          <div class="offer-card">

            <h2 class="title card-title">Produk Unggulan Kita</h2>
            <br>
            <a href="#" class="btn btn-secondary">
              <span class="span">Beli sekarang!</span>

              <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
            </a>

          </div>

        </div>
      </section>

    </article>
  </main>





  <!-- 
    - #FOOTER
  -->

  <footer class="footer">
    <div class="container">

      <div class="footer-top">

        <div class="footer-brand">

          <p class="footer-list-title title">komsteer skate</p>

          <p class="footer-text">
            Brand Skate dari Puertorico yang telah ada sejak tahun 2024, merek kita ini terkenal dengan produk-produknya kuat dan tahan lama!
          </p>

          <ul class="social-list">

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-twitter"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-linkedin"></ion-icon>
              </a>
            </li>

          </ul>

        </div>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title title">Info kita bro</p>

            <address class="footer-text">
              Purtorico sebelah kiri dikit <br>
              Indonesia
            </address>
          </li>

          <li>
            <a href="mailto:info.shoppie@support.com" class="email">komsteer.skate@support.com</a>
          </li>

          <li>
            <a href="tel:+62 8912 6969 666" class="call">+62 8912 6969 666</a>
          </li>

        </ul>

        <div class="footer-list">

          <p class="footer-list-title title">Ikutin Info dari kita bro</p>

          <input type="email" name="email_address" placeholder="Taruh email lo disini!" required autocomplete="off"
            class="input-field">

          <button class="btn btn-secondary">klik disini!</button>

        </div>

      </div>

      <div class="footer-bottom">

        <div class="wrapper">
          <div class="link-wrapper">

            <a href="#" class="footer-bottom-link">Info Kita yang lebih lengkap bro</a>
           

          </div>

          <div class="link-wrapper">
            <a href="#" class="footer-bottom-link">Terms & Conditions</a>

            <a href="#" class="footer-bottom-link">Privacy Policy</a>
          </div>
        </div>

      </div>

      <img src="./assets/images/footer-shape-1.png" width="245" height="165" loading="lazy" alt="shape"
        class="shape shape-1">

      <img src="./assets/images/footer-shape-2.png" width="138" height="316" loading="lazy" alt="shape"
        class="shape shape-2">

      <img src="./assets/images/footer-shape-3.png" width="346" height="92" loading="lazy" alt="shape"
        class="shape shape-3">

    </div>
  </footer>





  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>