<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Laporan KIR</title>
    <style>
        tr .spaceUnder > td {
            padding-bottom: 5em;
        }

        table.border, th.border, td.border {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .page-break {
            page-break-before: always;
        }

        .text-td td{
            text-align: center;
            vertical-align: middle;
        }

        .center-table {
            margin-left: auto;
            margin-right: auto;
        }
        .kop-font {
            font-size:14px;
        }
        .judul-font {
            font-size:12px;
        }
        


    </style>
</head>
<body>
    <h4 class="table-font" style="text-align: center;">KARTU INVENTARIS RUANGAN</h4>

    <table class="judul-font">
        <tr>
            <td>PROVINSI</td>
            <td>:</td>
            <td>KALIMANTAN SELATAN</td>
        </tr>
        <tr>
            <td>UPB</td>
            <td>:</td>
            <td>UPPD PELAIHARI</td>
        </tr>
        <tr>
            <td>RUANGAN</td>
            <td>:</td>
            <td><?= strtoupper($ruangan->nama_ruangan) ?></td>
    </table>
    
    <table class="table table-bordered table-striped border text-td judul-font">
        <thead>
            <tr>
                <th class="border" scope="col" width="25px">No</th>
                <th class="border" scope="col" width="75px">Kode<br>Barang</th>
                <th class="border" scope="col" width="140px">Jenis Barang <br>/ Nama Barang</th>
                <th class="border" scope="col" width="220px">Merk / Type</th>
                <th class="border" scope="col" width="75px">Ukuran / CC </th>
                <th class="border" scope="col">Thn Beli</th>
                <th class="border" scope="col">Keterangan</th>
            </tr>
            <tr>
                <th class="border">1</th>
                <th class="border">2</th>
                <th class="border">3</th>
                <th class="border">4</th>
                <th class="border">5</th>
                <th class="border">6</th>
                <th class="border">7</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($laporanKir as $kir) { ?>
                <tr>
                    <td class="border"><?= $no++ ?></td>
                    <td class="border"><?= $kir['kode_barang'] ?></td>
                    <td class="border"><?= $kir['nama_barang'] ?></td>
                    <td class="border"><?= $kir['merk'] ?></td>
                    <td class="border"><?= $kir['ukuran'] ?></td>
                    <td class="border"><?= $kir['tahun_pembelian'] ?></td>
                    <td class="border"><?= $kir['keterangan'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <br><br><br>
    <table class="table center-table text-td judul-font" style="width: 100%;">
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td>Pelaihari, <?= format_indo(date('Y-m-d')); ?></td>
            </tr>
            <tr>
                <td>Mengetahui:</td>
                <td></td>
                <td></td>
            </tr>
            <tr class="spaceUnder">
                <td style="padding-bottom: 70px;"><b>KEPALA UPPD PELAIHARI</b></td>
                <td style="padding-bottom: 70px;"><br></td>
                <td style="padding-bottom: 70px;"><b>PEMANFAATAN BARANG <br> MILIK DAERAH</b></td>
            </tr>
            <tr>
                <td class="text-center"><b>FAJAR GEMILANG, M. Si</b></td>
                <td><br></td>
                <td class="text-center"><b>FARIDA ARIYANI</b></td>
            </tr>
            <tr>
                <td class="text-center">NIP. 19661126 199310 1 001</td>
                <td><br></td>
                <td class="text-center">NIP. 19760228 200701 2 012</td>
            </tr>
        </tbody>
    </table>
</body>
</html>