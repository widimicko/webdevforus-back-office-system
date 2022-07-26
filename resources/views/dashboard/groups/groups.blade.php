@push('dashboard-head')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css"/>
@endpush

@extends('dashboard.layouts.main')

@section('main')
  <div class="container-fluid">
    <div class="pagetitle">
      <h1>Groups Page</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Dashboard</li>
          <li class="breadcrumb-item active">Groups</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title">Groups Data</h5>
                <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#createModal">
                  <i class="bi bi-plus"></i> Create
                </button>
              </div>
              @include('components.notification')
              <div class="overflow-auto">
                <table class="table table-responsive table-hover" id="dataTable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">City</th>
                      <th scope="col">Last Updated</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($groups as $group)
                     <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $group->namagroup }}</td>
                      <td>{{ $group->kota ?? 'Unavailable' }}</td>
                      <td>{{ \Carbon\Carbon::parse($group->updated_at)->diffForHumans() }}</td>
                      <td>
                        <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-groupid="{{ $group->groupid }}" data-bs-namagroup="{{ $group->namagroup }}" data-bs-kota="{{ $group->kota }}">
                          <i class="bi bi-pencil"></i> Edit
                        </button>
                        <form action="{{ route('groups.destroy', $group->groupid) }}" method="POST" class="d-inline">
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

  <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="editForm" action="{{ route('groups.store') }}" method="POST">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="createModalLabel">Create Form</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" id="namagroup" name="namagroup" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">City</label>
              <input type="text" id="kota" name="kota" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Form</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="idUpdate" name="id">
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" id="namagroupUpdate" name="namagroup" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">City</label>
            <input type="text" id="kotaUpdate" name="kota" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary" id="confirmUpdate">Confirm</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('dashboard-script')
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
  <script>
    const editModal = document.getElementById('editModal')

    editModal.addEventListener('show.bs.modal', function (event) {
      const button = event.relatedTarget

      editModal.querySelector('#idUpdate').value = button.getAttribute('data-bs-groupid')
      editModal.querySelector('#namagroupUpdate').value = button.getAttribute('data-bs-namagroup')
      editModal.querySelector('#kotaUpdate').value = button.getAttribute('data-bs-kota')
    })

    $('#confirmUpdate').click(() => {
      $.ajax({
        type: 'PUT',
        url: `${window.location.origin}/groups/${$('#idUpdate').val()}`,
        data: {
          _token: '{{ csrf_token()  }}',
          namagroup: editModal.querySelector('#namagroupUpdate').value,
          kota: editModal.querySelector('#kotaUpdate').value
        },
        success() {
          location.reload()
        },
        error(response) {
          Toastify({
            text: `Failed to update group : ${JSON.stringify(response.responseJSON.errors)}`,
            duration: 10000,
            close: true,
            gravity: "top",
            position: "right", 
            stopOnFocus: true,
            style: {
              background: "red",
            },
          }).showToast();
        },
      });

      $('#editModal').modal('hide')
    })
  </script>
@endpush