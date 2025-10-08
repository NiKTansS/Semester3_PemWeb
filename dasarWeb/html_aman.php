<!DOCTYPE html>
<html>
<head>
  <title>HTML Aman</title>
</head>
<body>
  <form method="post" action="">
    <label for="input">Masukkan Teks:</label>
    <input type="text" name="input" id="input">
    <input type="submit" value="Kirim">
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $input = $_POST['input'];
      $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
      echo "Hasil input: " . $input;
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email valid: " . htmlspecialchars($email);
    } else {
        echo "Format email tidak valid.";
    }
  }
  ?>
</body>
</html>
