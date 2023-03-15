@extends('admin.layouts.index')

@section('content')
<main id="main" class="main">
<div class="main-content container-fluid">
<div class="col-lg-10">

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Vertical Form</h5>

    <!-- Vertical Form -->
    <form class="row g-3">
      <div class="col-12">
        <label for="inputNanme4" class="form-label">Your Name</label>
        <input type="text" class="form-control" id="inputNanme4">
      </div>
      <div class="col-12">
        <label for="inputEmail4" class="form-label">Email</label>
        <input type="email" class="form-control" id="inputEmail4">
      </div>
      <div class="col-12">
        <label for="inputPassword4" class="form-label">Password</label>
        <input type="password" class="form-control" id="inputPassword4">
      </div>
      <div class="col-12">
        <label for="inputAddress" class="form-label">Message</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Type here">
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
        
      </div>
    </form><!-- Vertical Form -->

  </div>
</div>
</section>
</div>
</div>
            <div class="clearfix"></div>
</div>
              <!-- End Bordered Table -->
              @endsection