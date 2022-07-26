@push('dashboard-head')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css"/>
@endpush

@extends('dashboard.layouts.main')

@section('main')
  <div class="container-fluid">
    <div class="pagetitle">
      <h1>Members Page</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Dashboard</li>
          <li class="breadcrumb-item active">Members</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">Members Data</h5>
                <a href="{{ route('members.create') }}" class="btn btn-primary my-3"><i class="bi bi-plus"></i> Create</a>
              </div>
              @include('components.notification')
              <div class="overflow-auto">
                <table class="table table-responsive table-hover" id="dataTable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Picture</th>
                      <th scope="col">Group</th>
                      <th scope="col">Address</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Email</th>
                      <th scope="col">Last Updated</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($members as $member)
                     <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $member->nama }}</td>
                      <td>
                        @if ($member->profile_pic)
                          <img src="{{ asset('storage/'. $member->profile_pic) }}" width="120px" alt="{{ $member->nama }}">
                        @endif
                      </td>
                      <td>{{ $member->group->namagroup }}</td>
                      <td>{{ $member->alamat }}</td>
                      <td>{{ $member->hp }}</td>
                      <td>{{ $member->email }}</td>
                      <td>{{ \Carbon\Carbon::parse($member->updated_at)->diffForHumans() }}</td>
                      <td>
                        <a href="{{ route('members.edit', $member->memberid) }}" class="btn btn-warning text-white"><i class="bi bi-pencil"></i> Edit</a>
                        <form action="{{ route('members.destroy', $member->memberid) }}" method="POST" class="d-inline">
                          @method('delete') @csrf
                          <button class="btn btn-danger border-0" onclick="return confirm('Are you sure to delete data?')"><i class="bi bi-trash"></i> Delete</button>
                        </form>
                      </td>
                     </tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection

@push('dashboard-script')
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
@endpush