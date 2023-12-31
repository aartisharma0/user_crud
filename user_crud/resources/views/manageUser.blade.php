@extends('layout.main')

@push('title')
    <title>CRUD - Manage</title>
@endpush

@section('main-section')
    <main>
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="mt-4">Manage User</h1>
                        </div>
                        <div class="col-md-6 ">
                            <a class="btn btn-primary mt-4 " href="{{ route('users.create') }}">Create</a>
                            <a class="btn btn-danger mt-4 " href="{{ route('trash') }}">Trash</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Active User Data
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
                                    <form action="{{route('users.destroy',$user->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn "><i class="fas fa-trash-alt" style="color: red"></i></button>
                                        {{-- <a href="{{route('users.destroy',$user->id)}}"><i class="fas fa-trash" style="color: red"></i></a> --}}
                                        </form>
                                    <a  href="{{route('users.edit',$user->id)}}"><i class="fas fa-edit" style="color: green"></i></a>
                                    
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
