<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" class="d-block mx-auto" width="72" height="57">
      </a>

      @auth
        <ul class="nav nav-pills">
          <li class="nav-item"><a href="/courses" class="nav-link" aria-current="page">Dashboard</a></li>
          <li class="nav-item"><a href="/courses/create" class="nav-link">Courses</a></li>
          <li class="nav-item"><a href="/contents" class="nav-link">Contents</a></li>
          <li class="nav-item"><a href="/logout" class="nav-link">Logout</a></li>

        </ul>
      @endauth
    </header>
  </div>