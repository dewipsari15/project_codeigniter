<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .text-center {
            text-align: center;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .col {
            flex: 1;
            padding: 5px;
            text-align: center;
            margin: 5px;
            border-radius: 5px;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 300px;
        }

        .card-header {
            padding: 10px 20px;
            background-color: #f8f9fa;
            font-weight: bold;
            border-bottom: 1px solid #ccc;
        }

        .card-body {
            padding: 20px;
        }

        .card-text {
            margin-top: 10px;
            font-size: 14px;
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
            <div class="container text-center">
                <div class="row">
                    <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <p>Jumlah Siswa</p>
                        </div>
                        <div class="card-body">
                            <b><?php echo $siswa ?></b>
                            <p>Siswa</p>
                        </div>
                    </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <p>Jumlah Guru</p>
                            </div>
                            <div class="card-body">
                                <b><?php echo $guru ?></b>
                                <p>Guru</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <p>Jumlah Kelas</p>
                            </div>
                            <div class="card-body">
                                <b><?php echo $kelas ?></b>
                                <p>Kelas</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>