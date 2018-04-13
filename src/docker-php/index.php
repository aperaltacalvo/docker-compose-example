<html>
<head>
<link rel="stylesheet" type="text/css" href="css/formulario.css"/>
</head>
        <header>
            <title> Blog de comentarios </title>
        </header>
    <body background="images/lobo.jpg" >
              <SPAN STYLE="font-size:21px;font-family:Tahoma;color:white;font-weight:bold">Comentarios De Los Usuarios</SPAN>
 <CENTER>
      <TABLE CELLSPACING=1 CELLPADDING=1 WIDTH=600 BORDER=0 STYLE="border:1px solid black">

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

          <p>
          <form class="form" NAME="form" ACTION="nuevoComentario.php" METHOD="POST">
          <font face="Comic Sans MS" size="3">
          <INPUT TYPE="hidden" NAME="id" VALUE="<?php echo $id; ?>">
          Nick : <INPUT TYPE="text" NAME="nick" SIZE=20 MAXLENGTH=20>
          <BR>
          Comentario:
                     <div class="form-group">
                                      <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                                      <div class="col-md-8">
                                          <textarea class="form-control" id="textboxid" name="comentario" placeholder="Escribe tu comentario" rows="4"></textarea>
                                      </div>
                     </div>
          </BR>
          </BR>
          <INPUT TYPE="submit" id="button" VALUE="EnviarComentario">
          </font>
          </form>


    </body>
</html>
