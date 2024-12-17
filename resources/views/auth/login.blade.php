@extends('auth.master')
@section('content')



  {{-- <div class="untree_co-hero inner-page overlay" style="background-image: url('images/img-school-5-min.jpg');">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-12">
          <div class="row justify-content-center ">
            <div class="col-lg-6 text-center ">
              <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Login</h1>

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
            <form action="{{ route('loginAction') }}" method="post" class="form-box">
                @csrf
                <div class="row">
                    <div class="col-12 mb-3">
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-3">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 m-1">
                        <small class="psw"> <a href="{{ route('forget.password.get') }}">Forgot your password?</a></small>
                    </div>

                    <div class="col-12 m-1">
                        <small class="psw">Don't have an account? <a href="{{ route('showRegister') }}"> Register</a></small>
                    </div>

                    <div class="col-12 mt-4 d-flex justify-content-end">
                        <input type="submit" value="Login" class="btn btn-primary">
                    </div>
                </div>
            </form>

        </div>
      </div>


    </div>
  </div> <!-- /.untree_co-section -->

  @endsection
