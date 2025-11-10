<?php include 'auth.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo $_SESSION['csrf_token']; ?>">
    <title>CRUD Dengan Ajax</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
</head>

<body>
    <nav class="navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php" style="color: #fff;">
            CRUD Dengan Ajax
        </a>
    </nav>

    <div class="container">
        <h2 class="text-center" style="margin: 30px;">Data Anggota</h2>

        <form method="post" id="form-data">
            <input type="hidden" name="id" id="id"> <div class="row"> <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" name="nama" id="nama" class="form-control" required="true">
                        <p class="text-danger" id="err_nama"></p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Jenis Kelamin:</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenkel1" value="L" required="true">
                            <label class="form-check-label" for="jenkel1">Laki-Laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenkel2" value="P" required="true">
                            <label class="form-check-label" for="jenkel2">Perempuan</label>
                        </div>
                        <p class="text-danger" id="err_jenis_kelamin"></p>
                    </div>
                </div>
            </div> <div class="row"> <div class="col-sm-12">
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea name="alamat" id="alamat" class="form-control" required="true"></textarea>
                        <p class="text-danger" id="err_alamat"></p>
                    </div>
                </div>
            </div> <div class="row"> <div class="col-sm-12">
                     <div class="form-group">
                        <label for="no_telp">No Telepon:</label>
                        <input type="number" name="no_telp" id="no_telp" class="form-control" required="true">
                        <p class="text-danger" id="err_no_telp"></p>
                    </div>
                </div>
            </div> <div class="row"> <div class="col-sm-12">
                    <div class="form-group">
                        <button type="button" name="simpan" id="simpan" class="btn btn-primary">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                    </div>
                </div>
            </div> </form>
        <hr>
        <div class="data"></div> </div>

    <div class="text-center py-3">
        &copy; <?php echo date('Y'); ?> Copyright:
        <a href="https://google.com/"> Desain Dan Pemrograman Web</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
             $.ajaxSetup({
                headers: {
                    'Csrf-Token': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.data').load('data.php');

            $("#simpan").click(function(){
                var data = $('#form-data').serialize();
                var jenkel1Checked = document.getElementById("jenkel1").checked;
                var jenkel2Checked = document.getElementById("jenkel2").checked;
                var nama = document.getElementById("nama").value;
                var alamat = document.getElementById("alamat").value;
                var no_telp = document.getElementById("no_telp").value;

                document.getElementById("err_nama").innerHTML = "";
                document.getElementById("err_alamat").innerHTML = "";
                document.getElementById("err_jenis_kelamin").innerHTML = "";
                document.getElementById("err_no_telp").innerHTML = "";

                var isValid = true;

                if (nama == "") {
                    document.getElementById("err_nama").innerHTML = "Nama Harus Diisi";
                    isValid = false;
                }
                if (alamat == "") {
                    document.getElementById("err_alamat").innerHTML = "Alamat Harus Diisi";
                    isValid = false;
                }
                if (!jenkel1Checked && !jenkel2Checked) {
                    document.getElementById("err_jenis_kelamin").innerHTML = "Jenis Kelamin Harus Dipilih";
                    isValid = false;
                }
                if (no_telp == "") {
                    document.getElementById("err_no_telp").innerHTML = "No Telepon Harus Diisi";
                    isValid = false;
                }

                if (isValid) {
                    $.ajax({
                        type: 'POST',
                        url: "form_action.php",
                        data: data,
                        success: function(response) {
                            $('.data').load("data.php");
                            document.getElementById("id").value = "";
                            document.getElementById("form-data").reset();
                        },
                        error: function(response){
                            console.log(response.responseText);
                            alert("Terjadi kesalahan saat menyimpan data.");
                        }
                    });
                }
            });

        });
    </script>
</body>
</html>