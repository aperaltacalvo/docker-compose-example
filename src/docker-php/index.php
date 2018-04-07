<html>
<head>
<link rel="stylesheet" type="text/css" href="css/formulario.css"/>
</head>
        <header>
            <!--img src="images/platano.jpg" style="float: left" height="130" width="180"/-->
            <!--img src="images/lobo.jpg" style="float: right" height="130" width="180"/-->
            <title> Blog de viajes por el mundo </title>
        </header>
    <body>
              <SPAN STYLE="font-size:11px;font-family:Tahoma;color:blue;font-weight:bold">Blog de viajes</SPAN>

    <CENTER>
          <SPAN STYLE="font-size:11px;font-family:Tahoma;color:black;font-weight:bold">Enviar Comentario</SPAN>
          </CENTER>
          <p>
          <form class="form" NAME="form" ACTION="nuevoComentario.php" METHOD="post">
          <font face="Comic Sans MS" size="3">
          <INPUT TYPE="hidden" NAME="id" VALUE="<?php echo $id; ?>">
          Nick : <INPUT TYPE="text" NAME="nick" SIZE=20 MAXLENGTH=20>
          <BR>
          Comentario: <INPUT id="textboxid" TYPE="text" NAME="comentario" SIZE=28 MAXLENGTH=250>
          </BR>
          </BR>
          <INPUT TYPE="submit" id="button" VALUE="EnviarComentario">
          </font>
          </form>
      <CENTER>
      <TABLE CELLSPACING=1 CELLPADDING=1 WIDTH=300 BORDER=0 STYLE="border:1px solid black">
      <TR>
      <TD BGCOLOR="#FAFAFA">
      <CENTER>
      <SPAN STYLE="font-size:11px;font-family:Tahoma;color:black;font-weight:bold">Comentarios De Los Usuarios</SPAN>
      </CENTER>
      </TD>
      </TR>

      <TR>
      <TD HEIGHT=1 BGCOLOR=black>
      </TD>
      </TR>

      <TR>
      <TD BGCOLOR="#FEFEFE">
      <SPAN STYLE="font-size:11px;font-family:Tahoma;color:black;">

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
         $query = "SELECT * FROM comentarios";
         $result = $conn->query($query);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"]. " - Name: " . $row["nick"]. " " . " - Comment: " . $row["comentario"]. "<br>";
            }
        } else {
            echo "0 results";
        }

            $resultComen = null;
            $conn -> close();
      ?>

      </SPAN>
      </TD>
      </TR>
      </TABLE>
      </CENTER>


    </body>
</html>
