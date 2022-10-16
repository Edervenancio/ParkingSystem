@extends('vehicle.master')


<body class="bg-dark">
  <nav class="navbar navbar-dark bg-dark border-bottom border-danger">
    <div class="container-fluid">
      <h1 class="text-warning">SEARCH RESULTS</h1>
      <form action="/search/car" method="GET" class="d-flex input-group w-auto">
        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" id="input_id" name="query" />
        <button type="submit" class="btn btn-dark mx-1">SEARCH</a>
      </form>
    </div>
  </nav>

  <div class="container my-3">

    <form action="<?= url('/register/car') ?>">
      <a href="/indexCar/" class="btn btn-primary">HOME</a>
      <button type="submit" class="btn btn-success">CREATE NEW REGISTER</button>
    </form>
    <?php
    if (!empty($car)) {
      echo "<table class='table table-striped table-dark table-bordered table-hover'>";
      echo "<thead class='bg-dark text-white'>
    <td>Id</td>
    <td>Client name</td>
    <td>Vehicle</td>
    <td>Car Board</td>
    <td>Phone</td>
    <td>Min. Allowed</td>
    <td>Value</td>
    <td>Entered at</td>
    <td>Actions</td>
         </thead>";
      foreach ($car as $value) {
        $linkReadMode = url('/show/car/' . $value->id);
        // $linkEditItem = url('/imoveis/editar/' . $property->name_url);
        // $linkRemoveItem = url('/imoveis/remover/' . $property->name_url);
        echo "<tr>
                 <td> [ $value->id ] </td>
                 <td> [ $value->name ] </td>
                 <td> [ $value->vehicle ] </td>
                 <td> [ $value->carBoard ] </td>
                 <td> [ $value->phone ] </td>
                 <td> [ $value->timeAllowed  " . "minutos}" . "</td>
                 <td> [ R$" . number_format($value->value, 2, ',', '.') . "]</td>
                 <td> [ $value->entered_at ]</td>
                 <td> <a href='{$linkReadMode}' class='btn btn-danger btn-sm'> DETAILS</a> </td>
            </tr>";
      }
      echo "</table>";
    }
    ?>
  </div>
</body>