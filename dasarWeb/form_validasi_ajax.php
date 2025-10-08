<!DOCTYPE html>
<html>
<head>
    <title>Form Validasi dengan AJAX</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <h1>Form Validasi dengan AJAX</h1>

    <form id="myForm">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama">
        <span id="nama-error" style="color: red;"></span><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email">
        <span id="email-error" style="color: red;"></span><br>

        <input type="submit" value="Submit">
    </form>

    <div id="hasil"></div>

<script>
$(document).ready(function() {
    $("#myForm").submit(function(event) {
        event.preventDefault();

        var nama = $("#nama").val();
        var email = $("#email").val();
        var valid = true;

        if (nama === "") {
            $("#nama-error").text("Nama harus diisi.");
            valid = false;
        } else {
            $("#nama-error").text("");
        }

        if (email === "") {
            $("#email-error").text("Email harus diisi.");
            valid = false;
        } else {
            $("#email-error").text("");
        }

        if (valid) {
            $.ajax({
                url: "proses_validasi.php",
                type: "POST",
                data: { nama: nama, email: email },
                success: function(response) {
                    $("#hasil").html(response);
                }
            });
        }
    });
});
</script>
</body>
</html>
