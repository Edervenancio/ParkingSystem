@extends('vehicle.master')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>




<body class="bg-dark">

  <nav class="navbar navbar-dark bg-dark border-bottom border-danger">
    <div class="container-fluid">
      <h1 class="text-warning">REGISTRATION PAGE</h1>
      <form action="/search/motorcycle" method="GET" class="d-flex input-group w-auto">
        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" id="input_id" name="query" />
        <button type="submit" class="btn btn-dark mx-1">SEARCH</a>
      </form>
    </div>
  </nav>




  <div class="container bg-light my-5 p-2 form-control">
    <form action="<?= url('/register/motorcycle/store') ?>" method="post">

      <?= csrf_field(); ?>
      @if(session('error'))
      <div class="alert alert-danger">
        {{ session('error')}}
      </div>
      @endif

      <div class="row g-3">
        <div class="col-md-6">
          <label for="name" class="form-label fw-bold">Client Name</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="First Name" autocomplete>
        </div>

        <div class="col-md-6">
          <label for="vehicle" class="form-label fw-bold">Vehicle</label>
          <input type="text" class="form-control" name="vehicle" id="vehicle" placeholder="Last Name">
        </div>

        <div class="col-md-6">
          <label for="motorBoard" class="form-label fw-bold">Board</label>
          <input type="text" class="form-control" name="motorBoard" id="motorBoard" placeholder="mail">
        </div>

        <div class="col-md-6">
          <label for="phone" class="form-label fw-bold">Phone</label>
          <input type="text" class="form-control" name="phone" id="phone" placeholder="password">
        </div>

        <div class="col-md-6">
          <label for="rg" class="form-label fw-bold">RG</label>
          <input type="text" class="form-control" name="rg" id="rg" placeholder="password">
        </div>

        <div class="col-md-6">
          <label for="cpf" class="form-label fw-bold">CPF</label>
          <input type="text" class="form-control" name="cpf" id="cpf" placeholder="password">
        </div>

        <div class="col-md-6">
          <label for="timeAllowed" class="form-label fw-bold">Time Allowed</label>
          <input type="text" class="form-control" name="timeAllowed" id="timeAllowed" placeholder="password">
        </div>

        <div class="col-md-6">
          <label for="value" class="form-label fw-bold">Value</label>
          <input type="text" class="form-control" name="value" id="value" placeholder="password">
        </div>

        <div class="col-6">
          <button type="submit" class=" btn btn-primary padding-top">Submit</button>
        </div>
        <div class="col-6">
          <a href="/indexMotor" class=" btn btn-danger padding-top">CANCEL</a>
        </div>

      </div>
    </form>
  </div>
  <script type="text/javascript" src="{{ URL::asset('js/validations.js') }}"></script>

</body>