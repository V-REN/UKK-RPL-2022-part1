<?php 
  if (isset($_POST['daftar'])) {
    //echo '<script>alert("berhasil");</script>';
    $nik = $_POST['nik'];
    $nama = $_POST['nama_lengkap'];
    $text = $nik .",". $nama ."\n";
    $fp = fopen('config.txt', 'a+');

    if (fwrite($fp, $text)) {
      echo '<script>alert("Anda berhasil Masuk!");</script>';
    }
  }
      else if (isset($_POST['masuk'])) {
        //echo '<script>alert("berhasil");</script>';
        $data = file_get_contents("config.txt");
        $contents = explode("\n", $data);

        foreach ($contents as $values) {
          $login = explode(",", $values);
          $nik = $login[0];
          $nama = $login[1];

          if ($nik == $_POST['nik'] && $nama == $_POST['nama_lengkap']) {
            session_start();
            $_SESSION['username'] = $nama;
            header('location: home.php');
          }else{
            echo '<script>alert("gagal");</script>';
          }
        }
      }

?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<h2>Login Form</h2>

<form action="" method="POST" >
  <table align="center">
    <tr>
      <td><input type="text" name="nik" placeholder="NIK"></td>
    </tr>
    <tr>
      <td><input type="text" name="nama_lengkap" placeholder="Nama Lengkap"></td>
    </tr>
    <tr>
      <td><input type="submit" name="daftar" value="Saya pengguna baru"></td>
      <td><input type="submit" name="masuk" value="masuk"></td>
    </tr>
</table>
</form>
</body>
</html>