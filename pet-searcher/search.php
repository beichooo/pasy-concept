<?php
    if(isset($_POST)){
    $specie = $_POST['pet-species'];
    $gender = $_POST['pet-gender'];
    $age = $_POST['pet-age'];
    $size = $_POST['pet-size'];
    
    }
    require "../conexion.php";
    $sql = "SELECT * FROM mascotas WHERE gender='$gender' and age='$age' AND size='$specie' ORDER BY id DESC";
    $query = $pdo->prepare($sql);
    $query->execute();
    $datos=$query->fetchAll();
    echo "{$specie}";
    echo "";
    echo "{$gender}";
    echo "{$age}";
    echo "{$size}";
    $tabla=
    '<table class="suggest-box">
    <thead class="text-uppercase">
                    <TR>
                    <TD>ID</TD>
                    <TD>gender</TD>
                    <TD>age</TD>
                    <TD>size</TD>
                    </TR>
    </thead>
    <tbody class="">';
  $datosTabla = "";

  foreach($datos as $key => $value){
      $datosTabla=$datosTabla.'<tr>
                                <td>'.$value['id'].'</td>
                                <td>'.$value['gender'].'</td>
                                <td>'.$value['age'].'</td>
                                <td>'.$value['size'].'</td>
                                <td>'.$value['specie'].'</td>
                            </tr>';
  }

  echo $tabla.$datosTabla.'</tbody></table>';
?>