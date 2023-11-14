@extends('layout.main')

@push('title')
    <title>CRUD - Create</title>
@endpush

@section('main-section')
    <main>
        <div class="container-fluid px-4 mb-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header bg-primary text-white">
                                <h3 class="text-center font-weight-light my-4">Create Account</h3>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputFirstName" name="first_name" type="text"
                                                    placeholder="Enter your first name" />
                                                <label for="inputFirstName">First name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input class="form-control" id="inputLastName" name="last_name" type="text"
                                                    placeholder="Enter your last name" />
                                                <label for="inputLastName">Last name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputEmail" name="email" type="email"
                                            placeholder="name@example.com" />
                                        <label for="inputEmail">Email address</label>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputPassword" name="password" type="password"
                                                    placeholder="Create a password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputPasswordConfirm" name="confirm_password" type="password"
                                                    placeholder="Confirm password" />
                                                <label for="inputPasswordConfirm">Confirm Password</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputContact" name="contact" type="number"
                                                    placeholder="Contact" />
                                                <label for="inputContact">Contact</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputDateOfBirth" name="dob" type="date"
                                                    placeholder="Date Of Birth" />
                                                <label for="inputDateOfBirth">Date Of Birth</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-floating mb-3 mt-3 mb-md-0">
                                                <div class="d-flex align-items-center">
                                                    <label for="inputGender" class="mr-2">Gender</label>
                                                    <div class="form-check form-check-inline">
                                                        <input id="inputGender" name="gender" value="M" type="radio" class="form-check-input ms-2" />
                                                        <label class="form-check-label" for="inputGender">M</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input id="inputGender" name="gender" value="F" type="radio" class="form-check-input" />
                                                        <label class="form-check-label" for="inputGender">F</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input id="inputGender" name="gender" value="O" type="radio" class="form-check-input" />
                                                        <label class="form-check-label" for="inputGender">O</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" id="inputAddress" name="address" placeholder="Address"></textarea>
                                        <label for="inputAddress">Address</label>
                                    </div>
                                    <div class="mt-4 mb-0">
                                        <div class="d-grid">
                                            <button class="btn btn-primary btn-block" type="button">Create Account</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small"><a href="login.html">Have an account? Go to login</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
