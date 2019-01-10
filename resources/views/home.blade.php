@extends('layouts.app')

@section('content')
<form action="{{ url('customers') }}" method="POST">
    @csrf
    <div class="container">
     
        <div class="card ">
          <div class="card-header text-center">
            Add Customer
          </div>
          <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputName">Name </label>
                  <input type="text" class="form-control" name="name" id="inputName" placeholder="Name">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail">Email</label>
                  <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email">
                </div>
              </div>
              <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" id="inputAddress" name="address1" placeholder="Enter Address 1">
              </div>
              <div class="form-group">
                <label for="inputAddress2">Address 2</label>
                <input type="text" class="form-control" id="inputAddress2" name="address2" placeholder="Enter Address 2">
              </div>
              @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Customer</strong> {{ $error }}.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endforeach
            @endif
                
          </div>
          <div class="card-footer text-right">
              <button type="submit" class="btn btn-primary">Create Customer</button>
          </div>
        </div>
    </div>
</form>
<br><br>
<div class="container">
  <table class="table table-striped display" id="customers-data-table">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Address1</th>
        <th scope="col">Address2</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    
  </table>
</div>
@push('scripts')

<script>
        $(document).ready(function() {
            $('#customers-data-table').DataTable({
                serverSide: true,
                processing: true,
                responsive: true,
                ajax: "{{ url('customers-all') }}",
                columns: [
                    { name: 'name' },
                    { name: 'email' },
                    { name: 'address1' },
                    { name: 'address2' },
                    { name: 'action', orderable: false, searchable: false }
                ]
            });
        });
    </script>
@endpush('scripts')
@endsection
