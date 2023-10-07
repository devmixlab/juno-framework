
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{is_current_route('contact_us.index') ? 'active' : ''}}" href="{{ route('contact_us.index') }}">Contact Us</a>
        </li>
      </ul>

      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <form action="{{ route('dash.logout') }}" method="post">
                <button type="submit" class="">Logout</button>
            </form>
<!--          <a class="nav-link" href="{{ route('dash.logout') }}">Logout</a>-->
        </li>
      </ul>
    </div>
  </div>
</nav>