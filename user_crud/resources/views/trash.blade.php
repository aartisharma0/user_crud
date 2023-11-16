@extends('layout.main')

@push('title')
    <title>CRUD - Trashed Data</title>
@endpush

@section('main-section')
    <main>
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="mt-4">Trashed User</h1>
                        </div>
                        <div class="col-md-6 ">
                            <a class="btn btn-primary mt-4 " href="{{ route('users.index') }}">Go to Manage User</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    InActive User Data
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>D.O.B</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>D.O.B</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$user->first_name}} {{ $user->last_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->contact}}</td>
                                <td>{{$user->formatted_dob}}</td>
                                <td>{{$user->gender}}</td>
                                <td>{{$user->address}}</td>
                                <td>{{$user->status}}</td>
                                <td class="d-flex">
                                    <a href="{{route('delete',$user->id)}}"><i class="fas fa-trash" style="color: red"></i></a>
                                    <a  href="{{route('restore',$user->id)}}"><i class="fas fa-trash-restore"style="color: green"></i></a>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
