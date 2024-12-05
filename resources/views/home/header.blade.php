<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
      <a class="navbar-brand" href="index.html">
        <span>
          Giftos
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav  ">
          <li class="nav-item active">
            <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="shop.html">
              Shop
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="why.html">
              Why Us
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="testimonial.html">
              Testimonial
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact Us</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('cart') }}">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="badge badge-pill badge-danger">{{ $count ?? 0 }}</span>
                </a>
            </li>
        </ul>

        <div class="list-inline-item logout">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <input type='submit' value="Logout">
            </form>
          </div>
      </div>
    </nav>
  </header>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">