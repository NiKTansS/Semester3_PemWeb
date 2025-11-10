<?php
include 'koneksi.php'; 
?>
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>No Telp</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $query = "SELECT * FROM anggota ORDER BY id DESC";
        $result = pg_query($dbconn, $query);

        if (pg_num_rows($result) > 0) {
            while ($row = pg_fetch_assoc($result)) {
                $jenis_kelamin = ($row['jenis_kelamin'] == 'L') ? 'Laki-Laki' : 'Perempuan';
        ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($row['nama']); ?></td>
                    <td><?php echo $jenis_kelamin; ?></td>
                    <td><?php echo htmlspecialchars($row['alamat']); ?></td>
                    <td><?php echo htmlspecialchars($row['no_telp']); ?></td>
                    <td>
                        <button class="btn btn-success btn-sm edit_data" id="<?php echo $row['id']; ?>"> <i class="fa fa-edit"></i> Edit</button>
                        <button class="btn btn-danger btn-sm hapus_data" id="<?php echo $row['id']; ?>"> <i class="fa fa-trash"></i> Hapus</button>
                    </td>
                </tr>
        <?php
            }
        } else {
            echo '<tr><td colspan="6">Tidak ada data ditemukan</td></tr>';
        }
        pg_close($dbconn);
        ?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable(); 
        function reset(){
            document.getElementById("err_nama").innerHTML = "";
            document.getElementById("err_jenis_kelamin").innerHTML = "";
            document.getElementById("err_alamat").innerHTML = "";
            document.getElementById("err_no_telp").innerHTML = "";
        }

        $(document).on('click', '.edit_data', function() {
            $('html, body').animate({ scrollTop: 0 }, 'slow'); 
            var id = $(this).attr('id'); 

            $.ajax({
                type: 'POST',
                url: "get_data.php",
                data: {id: id},
                dataType: 'json', 
                success: function(response) {
                    reset();

                    document.getElementById("id").value = response.id;
                    document.getElementById("nama").value = response.nama;
                    document.getElementById("alamat").value = response.alamat;
                    document.getElementById("no_telp").value = response.no_telp;

                    if (response.jenis_kelamin == "L") {
                        document.getElementById("jenkel1").checked = true;
                    } else {
                        document.getElementById("jenkel2").checked = true;
                    }
                }, error: function(response) {
                    console.log(response.responseText);
                    alert("Gagal mengambil data untuk diedit.");
                }
            });
        });
        $(document).on('click', '.hapus_data', function(){
            var id = $(this).attr('id');
            $.ajax({
                type: 'POST',
                url: "hapus_data.php",
                data: {id: id},
                success: function() {
                    $('.data'). load('data.php');
                }, error: function(response) {
                    console.log(response.responseText);
                }
            })
        })

    }); 
</script>