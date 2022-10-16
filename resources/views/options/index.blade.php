@extends('vehicle.master')



<nav class="navbar navbar-dark bg-dark border-bottom border-danger">
  <div class="container-fluid">
    <h1 class="text-warning">SYSTEM OPTIONS</h1>
    <a href="/logout" class="btn btn-danger">LOGOUT</a>
  </div>
</nav>


<body class="bg-dark">
  <div class="container bg-dark d-flex justify-content-around b-bottom my-2">
    <div class="card bg-secondary" style="width: 15rem;">
      <div class="card bg-light">
        <div class="card-body">
          <img src="{{URL::asset('/images/carCicle.png')}}" class="img-fluid mx-3" width="170px" />
          <a href="/indexCar" class="btn btn-primary btn-sm my-3 mx-5">MANAGE CARS</a>
        </div>
      </div>
    </div>




    <div class="card bg-secondary" style="width: 15rem;">
      <div class="card bg-secondary">

        <div class="card-body bg-light">
          <img src="{{URL::asset('/images/motorcycle.png')}}" class="img-fluid mx-3" width="170px" />
          <a href="/indexMotor" class="btn btn-primary btn-sm my-3 mx-4">MANAGE MOTORCYCLE </a>
        </div>
      </div>
    </div>
  </div>

  <div class="container bg-dark d-flex justify-content-around my-4">


    <div class="card bg-secondary d-flex align-items-start" style="width: 15rem;">
      <div class="card bg-light">
        <div class="card-body bg-light">
          <img src="{{URL::asset('/images/log.png')}}" class="mx-3 img-fluid" width="170px" />
          <a href="/log" class="btn btn-primary btn-sm my-3 mx-5">ACCESS LOG </a>
        </div>
      </div>
    </div>

  </div>
</body>