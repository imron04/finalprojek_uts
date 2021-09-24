<?php

include '../Controllers/Controller_kelas.php';
// Membuat Object dari Class kelas
$kelas = new Controller_kelas();
$GetKelas = $kelas->GetData_All();

// untuk mengecek di object $siswa ada berapa banyak Property
// echo var_dump($kelas);
?>
<div class="card border-dark">
    <div class="card-header bg-secondary text-white">OOP - Class, Object, Property, Method With <u>MVC</u></div>
    <div class="card-body text-dark">
        <h4 class="card-title">CRUD and CSRF</h4>
        <h5 class="card-title">Table Kelas</h5>
        <h5 class=" card-title"><a class="btn btn-primary" href="main.php?menu=<?php echo base64_encode('id_po_k') ?>">
                Add Data</a></h5>

        <p class="card-text">
        <table class="table table-striped table-bordered table-hover" style="height: auto; width: 100%;">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Kelas</th>
                    <th scope="col">Kompetensi Keahlian</th>
                    <th scope="col" class="text-center">Tools</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Decision validation variabel
                if (isset($GetKelas)) {
                    $no = 1;
                    foreach ($GetKelas as $Get) {
                ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $Get['nama_kelas']; ?></td>
                            <td><?php echo $Get['kompetensi_keahlian']; ?></td>
                            <td class="text-center">
                                <a class="btn btn-outline-primary" href="main.php?menu=<?php echo base64_encode('id_pu_k') ?>&id_kelas=<?php echo base64_encode($Get['id_kelas']) ?>"><i class="fa fa-eye" width="24"></i></a>

                                <button class="btn btn-outline-danger" onclick="konfirmasi('<?php echo base64_encode($Get['id_kelas']) ?>')"><i class="fa fa-trash" width="24"></i></button>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>

            </tbody>
        </table>
        </p>
    </div>
</div>
<script>
    function konfirmasi(id_kelas) {
        var a = id_kelas;
        if (window.confirm("Apakah anda ingin menghapus data ini?")) {
            window.location.href = '../Config/Routes.php?function=delete_kelas&id_kelas=' + a;
        }
    }
</script>