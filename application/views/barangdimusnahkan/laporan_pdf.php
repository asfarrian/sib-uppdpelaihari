<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Berita Acara Pemusnahan Barang</title>
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
        .rangkasurat {
            width : 980px;
            margin : 0 auto;
            background-color: #fff;
            height : 200px;
            padding: 20px;
        }
        .tablekop {
            border-bottom: 5px solid #000;
            padding : 2px
        }
        .tengah {
            text-align: center;
            line-height: 5px;
        }


    </style>
</head>
<body>
    <div class="rangkasurat">
        <table class="tablekop" width="100%">
            <tr>
                <?php
                    $fileContent = file_get_contents(base_url('assets/img/Kalsel.png'));
                    $base64 = 'data:image/' . 'png' . ';base64,' . base64_encode($fileContent);
                ?>
                <td><img src="<?= $base64 ?>" width="155px" align="right"></td>
                <td class="tengah">
                    <h3>PEMERINTAH PROVINSI KALIMANTAN SELATAN</h3>
                    <h3>BADAN KEUANGAN DAERAH</h3>
                    <h3>UNIT PELAYANAN PENDAPATAN DAERAH</h3>
                    <h3>PELAIHARI</h3>
                    <p>Jl. A. Yani Km. 6 Desa Panggung No. 66 RT. 007 Pelaihari</b>
                    <p>Telp : (0512) 2021010, 2021011 Fax : (0512) 2021010</p>
                    <p>Email : e.uppd.pelaihari@gmail.com </p>
            </td>
    </tr>
    </table>

    </div>

    <h4 class="table-font" style="text-align: center;">BERITA ACARA PEMUSNAHAN INVENTARIS BARANG</h4>
    <h3 class="table-font" style="text-align: center;">Nomor : ...................................</h3>
    <p>Pada hari ini ................................. tanggal ................................................... 
        tahun .................... bertempat di ...................................................................
     telah melaksanakan pemusnahan barang berupa :</p>

    <table class="table table-bordered table-striped border text-td judul-font">
        <thead>
            <tr>
                <th class="border" scope="col" width="25px" height="70px">No< Urut/th>
                <th class="border" scope="col" width="90px">Kode<br>Barang</th>
                <th class="border" scope="col" width="150px">Jenis Barang <br>/ Nama Barang</th>
                <th class="border" scope="col">Nomor<br>Register</th>
                <th class="border" scope="col" width="140px">Merk / Type</th>
                <th class="border" scope="col" width="90px">Ukuran / CC </th>
                <th class="border" scope="col" width="90px">Bahan</th>
                <th class="border" scope="col">Tahun<br> Pembelian</th>
                <th class="border" scope="col" width="40px">Asal Usul<br>Cara</th>
                <th class="border" scope="col" width="90px">Kondisi</th>
                <th class="border" scope="col">Harga</th>
                <th class="border" scope="col" width="100px">Keterangan</th>
                <th class="border" scope="col" width="110px">Cara Pemusnahan</th>
            </tr>
            <tr>
                <th class="border">1</th>
                <th class="border">2</th>
                <th class="border">3</th>
                <th class="border">4</th>
                <th class="border">5</th>
                <th class="border">6</th>
                <th class="border">7</th>
                <th class="border">8</th>
                <th class="border">9</th>
                <th class="border">10</th>
                <th class="border">11</th>
                <th class="border">12</th>
                <th class="border">13</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($pemusnahan as $data) { ?>
                <tr>
                    <td class="border" height="30px"><?= $no++ ?></td>
                    <td class="border"><?= $data['kode_barang'] ?></td>
                    <td class="border"><?= $data['nama_barang'] ?></td>
                    <td class="border"><?= $data['nomor_registrasi'] ?></td>
                    <td class="border"><?= $data['merk'] ?></td>
                    <td class="border"><?= $data['ukuran'] ?></td>
                    <td class="border"><?= $data['bahan'] ?></td>
                    <td class="border"><?= $data['tahun_pembelian'] ?></td>
                    <td class="border"><?= $data['asal_usul'] ?></td>
                    <td class="border"><?= $data['kondisi'] ?></td>
                    <td class="border">Rp<?php echo number_format($data['harga'],2,",",".")?></td>
                    <td class="border"><?= $data['keterangan'] ?></td>
                    <td class="border"><?= $data['cara_pemusnahan'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <p>Barang tersebut telah diperiksa dan terdapat rusak/cacat produksi dan tidak memungkinkan untuk digunakan kembali.
        <br><br>
        Demikian Berita Acara ini kami buat berdasarkan keadaan yang sebenarnya. Atas perhatiannya dan kerja samanya kami
        ucapkan terima kasih.
    </p>

    <br><br><br>
    <table class="table center-table text-td judul-font" style="width: 100%;">
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Mengetahui:</td>
                <td></td>
                <td></td>
            </tr>
            <tr class="spaceUnder">
                <td style="padding-bottom: 70px;"><b>KEPALA UPPD PELAIHARI</b></td>
                <td style="padding-bottom: 70px;"><b>PELAKSANA</b></td>
            </tr>
            <tr>
                <td class="text-center"><b>FAJAR GEMILANG, M. Si</b></td>
                <td class="text-center"><b>FARIDA ARIYANI</b></td>
            </tr>
            <tr>
                <td class="text-center">NIP. 19661126 199310 1 001</td>
                <td class="text-center">NIP. 19760228 200701 2 012</td>
            </tr>
        </tbody>
    </table>
</body>
</html>