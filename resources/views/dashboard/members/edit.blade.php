@push('dashboard-head')
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@extends('dashboard.layouts.main')

@section('main')
  <div class="container-fluid">
    <div class="pagetitle">
      <h1>Edit Member {{ $member->nama }}</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Dashboard</li>
          <li class="breadcrumb-item"><a href="{{ route('members.index') }}">Members</a></li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Member Form</h5>
              @include('components.notification')
              <form action="{{ route('members.update', $member->memberid) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-8">
                    <input autofocus required type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $member->nama) }}">
                    @error('nama')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Profile Picture</label>
                  <div class="col-sm-8 d-flex flex-column gap-3">
                    <input  @if (!$member->profile_pic) required @endif type="file" name="profile_pic" id="image" class="form-control @error('profile_pic') is-invalid @enderror" accept="image/*" onchange="previewImage()">
                    @error('profile_pic')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
                    <img src="{{ asset('storage/'. $member->profile_pic) }}" class="col-sm-4 img-preview img-fluid mb-3" alt="{{ $member->nama }}">
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Group</label>
                  <div class="col-sm-8">
                    <select name="groupid" class="form-select" id="select2">
                      @foreach ($groups as $group)
                        <option value="{{ $group->groupid }}" @selected($member->groupid == $group->groupid)>{{ $group->namagroup }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Address</label>
                  <div class="col-sm-8">
                    <input required type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat', $member->alamat) }}">
                    @error('alamat')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Phone</label>
                  <div class="col-sm-8">
                    <input required type="text" name="hp" class="form-control @error('hp') is-invalid @enderror" value="{{ old('hp', $member->hp) }}">
                    @error('hp')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-8">
                    <input required type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $member->email) }}">
                    @error('email')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
										@enderror
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    
  </div>
@endsection

@push('dashboard-script')
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    function previewImage() {
      const image = document.querySelector('#image')
      const imagePreview = document.querySelector('.img-preview')

      imagePreview.style.display = 'block'
      imagePreview.style.height = '150px'

      const oFReader = new FileReader()
      oFReader.readAsDataURL(image.files[0])

      oFReader.onload = function(oFREvent) {
        imagePreview.src = oFREvent.target.result
      }
    }
  </script>
@endpush