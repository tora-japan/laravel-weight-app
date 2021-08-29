<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">{{ $title }}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        @foreach($menuInfo as $p)
        @if($p['title']!=$skip)
        <li class="nav-item">
          <a class="nav-link" href="{{ $p['link'] }}">{{ $p['title'] }}</a>
        </li>
        @endif
        @endforeach
      </ul>
    </div>
  </div>
</nav>
