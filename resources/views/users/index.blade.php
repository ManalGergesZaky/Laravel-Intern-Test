@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        {{ __('Users') }}
                        <form action="{{ route('users.export') }}" method="post" class="ml-auto">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-primary ">Export</button>
                            {{-- <a href="{{ route('products.import') }}" class="btn btn-sm btn-success">Import</a> --}}
                        </form>

                    </div>

                    <div class="card-body">
            
                    
                        

                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->full_name }}</td>
                                <td>{{ $user->phone_number }}</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No products found</td>
                                </tr>
                            @endforelse
                            </tbody>
                            <tfoot>
                            {{-- <tr>
                                <td colspan="5">{{ $products->links() }}</td>
                            </tr> --}}
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
