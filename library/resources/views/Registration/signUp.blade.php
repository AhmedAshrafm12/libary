@extends('layouts.registration');
@section('content')
<main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('{{ asset('img/illustrations/Hnet.com-image.jpg') }}'); background-size: cover;">
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header mt-7">
                  <h3 class="font-weight-bolder ">Sign Up</h4>
                    @if ($errors->any())
                    <div class="alert alert-danger text-light">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="card-body">
                  <form role="form" action="{{ url('register') }}" method="POST">
                    @csrf
                    <div class="input-group input-group-outline mb-3">
                      <input type="text" class="form-control" placeholder="User Name" name="userName">
                      @error('userName')
                  @enderror
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <input type="email" class="form-control" placeholder="Email" name="email">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <input type="text" class="form-control" placeholder="mobile" name="mobile">


                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="role" id="flexRadioDefault2" value="1" checked >
                      <label class="form-check-label" for="flexRadioDefault2">
                        Reader
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="role" id="flexRadioDefault1" value="2">
                      <label class="form-check-label" for="flexRadioDefault1">
                        Writer
                      </label>
                    </div>

                    <div class="form-check form-check-info text-start ps-0">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="terms">
                      <label class="form-check-label" for="flexCheckDefault">
                        I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                      </label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign Up</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    Already have an account?
                    <a href="../../pages/sign-in.html" class="text-primary text-gradient font-weight-bold">Sign in</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection
