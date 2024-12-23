<header class="header_section">
  <nav class="navbar navbar-expand-lg custom_nav-container">
      <a class="navbar-brand" href="{{ url('home.index') }}">
          <span>MJ</span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
      </button>
      <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
          <ul class="navbar-nav">
              <li class="nav-item active">
                  <a class="nav-link" href="{{ url('index') }}">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="shop.html">About Us</a>
              </li>
          </ul>
          <div class="ml-auto list-inline-item logout">
              <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <input type="submit" value="Logout">
              </form>
          </div>
      </div>
  </nav>
</header>
