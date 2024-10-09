<?php
include 'log_in.php';
inicia_sesion();

// Verificar si se ha enviado un coche para agregar al carrito
if (isset($_POST['coche'])) {
    $cocheSeleccionado = $_POST['coche'];

    // Agregar el coche seleccionado al carrito de la sesión
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    $_SESSION['carrito'][] = $cocheSeleccionado;
}

// Obtener la marca seleccionada
$marca = $_GET['marca'] ?? '';

// Lista de coches disponibles
$coches = [
    'Seat' => ['Seat Ibiza', 'Seat Leon', 'Seat Ateca'],
    'Golf' => ['Golf GTI', 'Golf R', 'Golf Alltrack']
];

// Verificar si la marca existe en el array de coches
if (array_key_exists($marca, $coches)) {
    echo "<h2>$marca:</h2>";

    echo "<div>
        <fieldset>
            <table>
                <tbody>";
    foreach ($coches[$marca] as $coche) {
        echo " 
            <tr>
                <td><label>$coche</label></td>
                <td>
                    <form method='POST'>
                        <input type='hidden' name='coche' value='$coche'>
                        <input type='submit' value='Comprar'>
                    </form>
                </td>
            </tr>";
    }

// Botón para volver
echo "<tr>
        <td>
            <a href='marcas.html'>
            <button type='button'>Volver</button>
            </a>
        </td>";

// Botón para ver el carrito
echo "  <td>
            <form method='POST'>
                <input type='hidden' name='ver_carrito' value='1'>
                <input type='submit' value='Ver Carrito'>
            </form>
        </td>
    </tr>";

echo        "</tbody>
            </table> 
        </fieldset>
    </div>";
} else {
    echo "No hay coches disponibles";
}


if (isset($_POST['ver_carrito'])) {
    if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
        echo "<h3>Carrito de Compras:</h3>";
        echo "<ul>";
        foreach ($_SESSION['carrito'] as $item) {
            echo "<li>$item</li>";
        }
        echo "</ul>";
    } else {
        echo "El carrito está vacío";
    }
}

