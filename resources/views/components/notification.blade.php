@if ($notification = Session::get('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ $notification }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

@if ($notification = Session::get('failed'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ $notification }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif