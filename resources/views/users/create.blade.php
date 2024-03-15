@extends('layouts.app')

@section('content')


    <div class="container mt-3 ">
      <div class="row justify-content-center ">
        <div class="col-lg-8 col-md-6 d-flex flex-column align-items-center justify-content-center">
  
          <div class="card mb-3">
  
            <div class="card-body">
              <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Add New Users</h5>
              </div>
  
              <form method="post" action="{{ route('users.import') }}" class="row g-3 needs-validation " enctype="multipart/form-data" novalidate>
                @csrf
                <div class="col-12">
                  <label  class="form-label">Insert Excel File</label>
                  <div class="input-group has-validation">
                    <input type="file" name="users" class="form-control ">
                    {{-- @error('attachment')<div class="text-danger">{{ $message }}</div>@enderror --}}
                  </div>
                </div>
              
                <div class="col-12">
                  <button name="insert" class="btn btn-success w-100" type="submit">Add</button>
                </div>
                
              </form>
  
            </div>
  
        </div>
      </div>
    </div>
  
  

@endsection
