<?php
    $motor = $_GET["motor"];
    $chasis =$_GET["chasis"];
    $llantas = $_GET["llantas"];
    $adornos = $_GET["adornos"];
    $tipoCambio = 18.65;
    $coches = 0;

    function compraDolares($cantidad, $precio, $aplicarDescuento = false) {
        $precioTotal = $cantidad * $precio;
        if ($aplicarDescuento) {
            if ($cantidad >= 100 && $cantidad < 500) {
                $descuento = 0.05;
            } elseif ($cantidad >= 500) {
                $descuento = 0.1;
            } else {
                $descuento = 0;
            }
            $precioTotal *= (1 - $descuento);
        }
        return $precioTotal;
    }
    

    $motorUSD = compraDolares($motor,20.00);
    $chasisUSD = compraDolares($chasis,15.00);
    $llantasUSD = compraDolares($llantas,1.00);
    $adornosUSD = compraDolares($adornos,1.50);

    $motorMXN = $motorUSD * $tipoCambio;
    $chasisMXN = $chasisUSD * $tipoCambio;
    $llantasMXN = $llantasUSD * $tipoCambio;
    $adornosMXN = $adornosUSD * $tipoCambio;

    $coches = min($motor, $chasis, $llantas / 4, $adornos / 2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos pedidos</title>
    <style>
        table {
            width: 450px;
            height: 330px;
            margin-left: auto;
            margin-right: auto;
        }

        .contenedor {
            display: grid;
        }
    </style>
</head>
<body>
    <table border=2px>
        <tr class="contenedor">
            <td>
                <h1>Aqui esta tu pedido</h1> <br>
                Escoge el numero de piezas: <br>
                Motor: <?php echo $motor ?> <br>
                Chasis: <?php echo $chasis ?> <br>
                Llantas: <?php echo $llantas ?> <br>
                Adornos: <?php echo $adornos ?> <br> <br>
                <?php printf("Motor:            $%.2f  (USD)           $%.2f  (MXN)<br>",$motorUSD,$motorMXN)?>
                <?php printf("Chasis:           $%.2f  (USD)           $%.2f  (MXN)<br>",$chasisUSD,$chasisMXN)?>
                <?php printf("Llantas:          $%.2f  (USD)           $%.2f  (MXN)<br>",$llantasUSD,$llantasMXN)?>
                <?php printf("Adornos:          $%.2f  (USD)           $%.2f  (MXN)<br><br>",$adornosUSD,$adornosMXN)?>
                <?php printf("Se pueden armar %d coches!!!", $coches)?> <br> <br>
                <a href="teresa.html">Solicitar una nueva orden</a> <br>
            </td>
        </tr>
    </table>
</body>
</html>