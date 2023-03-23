@extends('admin.auth.index')

@section('content')
<main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                @include('admin.auth.errors')
              <div class="card mb-3">
                <div class="card-body">
                <div class="pt-4 text-center">
                    <img src="{{asset('images/gamify-logo-svg.svg')}}" alt="" width="150px">
                </div>
                  <div class="pt-3 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to admin account</h5>
                    <p class="text-center small">Enter your email & password</p>
                  </div>

                  <form class="row g-3 needs-validation" action="{{route('admin.login_process')}}" method="POST">
                    @csrf
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <input type="email" name="email" class="form-control" required>
                        <div class="invalid-feedback">Please enter your email.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main>

@endsection