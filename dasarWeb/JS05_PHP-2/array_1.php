<!DOCTYPE html>
<html>
  <head>
    <body>
      <h2>Array Terindeks</h2>
      <?php
      $Listdosen=["Elok Nur Hamdana", "Unggul Pemenang", "Bagas Nugraha"];

      //loop
      for ($i = 0; $i < count($Listdosen); $i++) {
        echo $Listdosen[$i] . "<br>";
      }
      ?>
    </body>
  </head>
</html>