<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route($parentRoute) }}">{{ $page }}</a></li>
      @if ($subPage)
      <li class="breadcrumb-item active" aria-current="page">{{ $subPage }}</li>
      @endif
    </ol>
</nav>