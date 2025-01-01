@extends('auth.master')
@section('content')



{{--
  <div class="untree_co-hero inner-page " style="background-image: url('images/img-school-5-min.jpg');">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-12">
          <div class="row justify-content-center ">
            <div class="col-lg-6 text-center ">
              <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Register</h1>

            </div>
          </div>
        </div>
      </div> <!-- /.row -->
    </div> <!-- /.container -->

  </div> <!-- /.untree_co-hero --> --}}




  <div class="untree_co-section">
    <div class="container">

      <div class="row mb-5 justify-content-center">
          <div class="col-lg-5 mx-auto order-1" data-aos="fade-up" data-aos-delay="200">
              <form action="{{ route('registerAction') }}" method="POST" class="form-box">
                  @csrf
                  @if (session('error'))
                      <div class="alert alert-danger">
                          {{ session('error') }}
                      </div>
                  @endif
                <div class="row">
                    <div class="col-12 mb-3">
                        <input
                            type="text"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            placeholder="Full name"
                            value="{{ old('name') }}"
                            required
                        >
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-3">
                        <input
                            type="number"
                            name="phone_number"
                            class="form-control @error('phone_number') is-invalid @enderror"
                            placeholder="Phone Number"
                            value="{{ old('phone_number') }}"
                            required
                        >
                        @error('phone_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-3">
                        <input
                            type="email"
                            name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email"
                            value="{{ old('email') }}"
                            required
                        >
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-3">
                        <input
                            type="password"
                            name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Password"
                            required
                        >
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-3">
                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            placeholder="Re-type Password"
                            required
                        >
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 m-1">
                        <small class="psw">Already have an account? <a href="{{ route('showLogin') }}">Sign in</a></small>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                        <input type="submit" value="Register" class="btn btn-primary">
                    </div>
                </div>
            </form>


        </div>
      </div>


    </div>
  </div> <!-- /.untree_co-section -->

  @endsection
