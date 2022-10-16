@extends('vehicle.master')


<body class="bg-dark">
  <nav class="navbar navbar-dark bg-dark border-bottom border-danger">
    <div class="container-fluid">
      <h1 class="text-warning">CLIENT PAGE</h1>
      <form action="/search/motorcycle" method="GET" class="d-flex input-group w-auto">
        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" id="input_id" name="query" />
        <button type="submit" class="btn btn-dark mx-1">SEARCH</a>
      </form>
    </div>
  </nav>



  <div class="container my-3">
    <br>
    <?php
    if (!empty($sql)) {
      foreach ($sql as $value) {
    ?>

        <div class="container">
          <div class="main-body">
            <div class="row gutters-sm">
              <div class="col-md-4 mb-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                      <img src="{{URL::asset('/images/user.png')}}" alt="Admin" class="rounded-circle" width="150">
                      <div class="mt-3">
                        <h4><?= $value->name; ?></h4>
                        <p class="text-secondary mb-1">RG: <?= $value->rg; ?></p>
                        <p class="text-secondary mb-1">CPF: <?= $value->cpf; ?></p>

                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-md-8">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Full Name</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <?= $value->name; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Vehicle</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <?= $value->vehicle; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Vehicle Board</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <?= $value->motorBoard; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Phone</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <?= $value->phone; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Entered At</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <?= $value->entered_at; ?>
                      </div>
                    </div>
                    <hr>
                    <a href="/indexMotor" class="btn btn-danger mb-2 mx-2">HOME</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>





    <?php
      }
    }
    ?>
  </div>