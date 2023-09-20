<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guru</title>
  <style>
    .card {
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin: 20px;
        background-color: #fff;
        overflow: hidden;
    }

    .card-header {
        padding: 10px 20px;
        background-color: #f8f9fa;
        font-weight: bold;
        border-bottom: 1px solid #ccc;
    }

    .card-body {
        padding: 10px 20px;
        background-color: #f8f9fa;
        font-weight: bold;
        border-bottom: 1px solid #ccc;
    }

    .custom-table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
    }

    .custom-table th, .custom-table td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ccc;
    }

    .custom-table th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    .custom-table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .custom-table tbody tr:hover {
        background-color: #ddd;
    }

    .item-center {
        text-align: center;
    }

    .btn-sm {
        padding: 5px 10px;
        font-size: 12px;
    }

    .btn-danger {
        background-color: #d9534f;
        border-color: #d43f3a;
        color: #fff;
    }

    .btn-primary {
        background-color: #337ab7;
        color: #fff;
        border-color: #2e6da4;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        color: #fff;
        text-decoration: none;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-align: center;
        font-size: 14px;
    }

    .d-flex {
        display: flex;
    }

    .justify-content-between{
        justify-content: space-between;
    }
  </style>
</head>
<body>
  <div class="d-flex">
  <?php $this->load->view('components/sidebar') ?>
<div class="home-section">
<?php $this->load->view('components/navbar') ?>
<br>
<br>
<br>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3>Data Guru</h3>
                <a href="<?php echo base_url('guru/tambah_guru'); ?>" class="btn btn-sm btn-primary">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            <table class="custom-table"> 
                <thead> 
                    <tr> 
                        <th>No</th> 
                        <th>Nama</th> 
                        <th>NIK</th> 
                        <th>Gender</th> 
                        <th>Mapel</th> 
                        <th class="text-center">Aksi</th> 
                    </tr> 
                </thead> 
                <tbody> 
                <?php $no=0;foreach($guru as $row): $no++ ?> 
                        <tr> 
                            <td><?php echo $no ?></td> 
                            <td><?php echo $row->nama_guru ?></td> 
                            <td><?php echo $row->nik ?></td> 
                            <td><?php echo $row->gender ?></td> 
                            <td><?php echo tampil_mapel($row->id_mapel) ?></td>
                            <td class="text-center"> 
                                <a href="<?php echo base_url('guru/update_guru/'). $row->id; ?>" class="btn btn-sm btn-primary">Update</a> 
                                <button onclick="hapus(<?php echo $row->id; ?>)" class="btn btn-sm btn-danger">Delete</button> 
                            </td> 
                        </tr> 
                <?php endforeach ?> 
                </tbody> 
            </table>
        </div>
  </div>
  </div>
</div>
</div>
  <script>
        function hapus(id) {
            var yes = confirm('Yakin Di Hapus?');
            if (yes == true) {
                window.location.href = "<?php echo base_url('guru/hapus_guru/'); ?>" + id;
            }
        }
    </script>

</body>
</html>