<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link rel="stylesheet" href="./estilos.css">
</head>
<body>

<?php

echo "<h1>Ok</h1>";
include_once "Cliente.php";

//CREATE
// $cliente= new Cliente();
// $cliente->id_tabla=null;
// $cliente->nombre_tabla="Otra tabla mas y mas";
// $cliente->create();

//READ
$clientes=Cliente::all();
echo "muestra los clientes que estan <br>";
var_dump($clientes);
?>
<p>tabla listado</p>
<table>
    <thead>
        <tr>
            <th>id tabla</th>
            <th>nombre tabla</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($clientes as $cliente){ ?>

            <tr>
                <td>
                     <?php echo $cliente->id_tabla;?>
                </td>
                <td>
                     <?php echo $cliente->nombre_tabla;?>
                </td>
                
            
       
        </tr>
        <?php }?>

    </tbody>
</table>

<?php


//UPDATE NO FUNCIONA AUN PERO NO TIRA ERRORES
/*
$cliente=Cliente::getById(2);
echo "hacemos un vardump del cliente <br>";
var_dump($cliente);
$cliente->nombre_tabla="Tabla modificada hardcod con el id2";
$cliente->update(); 
*/




//DELETE
$cliente= Cliente::getById(1);
// $cliente->delete();




?>


<div class="mastergrid"><p>Crud base para trastear con bootstrap</p></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>