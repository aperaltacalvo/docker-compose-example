    <html>
        <head>
        <link rel="stylesheet" type="text/css" href="css/formulario.css"/>
        <meta http-equiv="refresh" content="3;index.php" />
        </head>
        <header>
            <!--img src="images/platano.jpg" style="float: left" height="130" width="180"/-->
            <!--img src="images/lobo.jpg" style="float: right" height="130" width="180"/-->
                        <title> Blog de viajes por el mundo </title>

        </header>
        <body>
        enviando comentario
           <?php

        $servername = "mysqlphp";
        $username = "admin";
        $password = "admin";
        $dbname = "mi_base_de_datos";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
         // Check connection
         if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
         }
           $resultCom2 = $conn->query("SELECT id FROM comentarios ORDER BY id DESC LIMIT 0,1");
           $rowCom2 = $resultCom2->fetch_assoc();
           $con =  intval($rowCom2["id"]);
           $con++;
           $idNoticia = intval($_POST['id']);
           $comentarioNoticia = $_POST['comentario'];
           $nickNuevo = $_POST['nick'];
           $queryInsert = "insert into comentarios(id,id_noticia,nick,comentario) VALUES(".$con.", ".$id.",'".$nickNuevo."','".$comentarioNoticia."')";
           echo $queryInsert
            mysqli_query($conn,$queryInsert) or die(mysqli_error($conn));

           echo "Comentario Enviado Con Exito. Espere Unos Segundos…";

            $conn-> close();
           $resultCom2 = null;

           ?>
        </body>
</html>
