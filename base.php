<!DOCTYPE html>
<html>
<head>
    <title>Lista de Alumnos</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
        <link rel="icon" type="image/x-icon" href="http://3.bp.blogspot.com/-exnOYv1QVdA/VBw5iSzymvI/AAAAAAAAD3A/EfFMEr34zio/s1600/PUMAS%2BUNAM%2BLOGO-GOYO3.png">
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    <nav>
        <div class="nav-wrapper purple accent-3">
            <a href="index.html" class="brand-logo">FES Aragón</a>
        </div>
    </nav>
    <?php
    $host = "";
    $user = "";
    $pas = "";
    $db = "";

    $conn = new mysqli($host, $user, $pas, $db);

    $sql = "SELECT * FROM usuarios";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        echo '
        <form class="col s8 offset-s2" action="eliminar.php" method="post">
        <div class="form-field col s12">
        <label for="cuenta">Número de cuenta</label>
        <input placeholder="Número de cuenta" name="cuenta" type="text" class="validate" required>
    </div>
    <button type="submit" class="offset-s3 waves-effect waves-light btn yellow accent-3 col s6">Enviar</button>
    </form>';
        echo "<table>";
        echo "<tr><th>Número de Cuenta</th><th>Nombre Completo</th><th>Correo</th><th>Carrera</th><th>Fecha de Registro</th></tr>";
        
        while ($row = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['cuenta'] . "</td>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['correo'] . "</td>";
            echo "<td>" . $row['carrera'] . "</td>";
            echo "<td>" . $row['fecha'] . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "<h1>Tabla vacia. Como entraste?</h1>";
    }

    $conn->close();
    ?>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>