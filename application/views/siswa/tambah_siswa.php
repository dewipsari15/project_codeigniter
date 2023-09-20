<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Siswa</title>
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

    .row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }
    
    .mb-3 {
        margin-bottom: 1rem;
    }

    .col-6 {
        flex-basis: 48%;
        max-width: 48%;
        margin: 5px;
        padding: 5px;
    }

    .form-label {
        font-weight: bold;
    }

    .form-control {
        width: 100%;
        padding: 0.375rem 0.75rem;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
    }

    .form-select {
        width: 100%;
        padding: 0.375rem 0.75rem;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
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
                    <h3>Tambah Siswa</h3>
                </div>
                <div class="card-body">
                    <form class="row" action="<?php echo base_url('siswa/aksi_tambah_siswa'); ?>" enctype="multipart/form-data" method="post">
                        <div class="mb-3 col-6">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="nisn" class="form-label">NISN</label>
                            <input type="text" class="form-control" id="nisn" name="nisn">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" aria-label="Default select example" name="gender">
                                <option selected>Pilih Gender</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="kelas" class="form-label">Kelas</label>
                            <select name="id_kelas" class="form-select">
                                <option selected>Pilih Kelas</option>
                                <?php foreach($kelas as $row): ?>
                                <option value="<?php echo $row->id ?>">
                                    <?php echo $row->tingkat_kelas.' '.$row->jurusan_kelas ?>
                                </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        
    </script>
</body>
</html>