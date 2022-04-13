@extends('backend.layouts.user')
@section('content')
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div class="col-6 d-lg-flex d-none h-100  pe-0 position-absolute top-0 start-0   flex-column">
                        <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column "
                            style="background-image: url('{{ asset('backend/assets/img/illustrations/illustration-signup.jpg') }}'); background-size: cover;">

                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                        <div class="card card-plain">

                            <div class="card-header">
                                <h4 class="font-weight-bolder">Sign Up</h4>
                                <p class="mb-0">Enter your email and password to register</p>
                            </div>
                            @include('layouts.error')

                            <div class="card-body">
                                <form role="form" action="{{ route('registeruser') }}" method="post">
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    @error('name')
                                        <span class="errors">{{ $errors->first('name') }}</span>
                                    @enderror
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                    @error('email')
                                        <span class="errors">{{ $errors->first('email') }}</span>
                                    @enderror
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Phone no</label>
                                        <input type="number" name="phone" class="form-control">
                                    </div>
                                    @error('phone')
                                        <span class="errors">{{ $errors->first('phone') }}</span>
                                    @enderror
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control">

                                    </div>
                                    @error('password')
                                        <span class="errors">{{ $errors->first('password') }}</span>
                                    @enderror

                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control">
                                    </div>
                                    @error('password_confirmation')
                                        <span class="errors">{{ $errors->first('password_confirmation') }}</span>
                                    @enderror
                                    @csrf
                                    <div class="form-check form-check-info text-start ps-0">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                            checked>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms
                                                and Conditions</a>
                                        </label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign Up</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-2 text-sm mx-auto">
                                    Already have an account?
                                    <a href="../pages/sign-in.html" class="text-primary text-gradient font-weight-bold">Sign
                                        in</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
