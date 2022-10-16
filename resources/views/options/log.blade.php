@extends('vehicle.master')


<body class="bg-dark">
    <nav class="navbar navbar-dark bg-dark border-bottom border-danger">
        <div class="container-fluid">
            <h1 class="text-warning">LOG OF THE SYSTEM</h1>
        </div>
    </nav>

    <div class="container my-3">
        <a href="/index" class="btn btn-primary my-2 mx-2">BACK</a>



        <?php
        if (!empty($sql)) {
            echo "<table class='table table-striped table-dark table-bordered table-hover'>";
            echo "<thead class='bg-dark text-white'>
    <td>Id</td>
    <td>Action</td>
    <td>Table log</td>
    <td>Id Affected</td>
    <td>Realized at</td>
         </thead>";
            foreach ($sql as $value) {
                $linkReadMode = url('/show/car/' . $value->id);
                // $linkEditItem = url('/imoveis/editar/' . $property->name_url);
                // $linkRemoveItem = url('/imoveis/remover/' . $property->name_url);
                echo "<tr>
                 <td> [ <b>$value->id ]</b> </td>
                 <td> [ $value->action ] </td>
                 <td> [ $value->tableLog ]</td>
                 <td> [ $value->idAffected ] </td>
                 <td> [ $value->realized_at ] </td>
            </tr>";
            }
            echo "</table>";
        }
        ?>
        <div class="row">{{ $sql->links() }} </div>
    </div>
</body>