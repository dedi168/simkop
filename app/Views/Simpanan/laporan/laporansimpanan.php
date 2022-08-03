<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Document</title>

</head>

<body> 
        <table style="text-align:left" >
        <tr>
        <th rowspan="3"><img src="img/logo.jpg" width="100px" height="100px"alt=""></th>
            <td><?= strtoupper($laporan); ?></td>
        </tr>
        <tr>
            <td>KSU BANJAR KEBON BLAHBATUH</td>
        </tr>
        <tr>
            <td>Jl.Serma Darya, Br Kebon Blahbatuh</td>
            <td><label for=""><?= date('d-M-Y'); ?></label></td>
        </tr> 
        </table><br>
        <hr ><br> 
        <?php 
            if ($jenis=="rk") {  ?>
                <div class="col-lg-8"> 
                    <table border="1" width="100%" style="text-align:center">
                    <thead class="thead-light ">
                                        <tr>
                                            <th>No</th>
                                            <th>Kolektor</th>
                                            <th>Nama</th>  
                                            <th>Tabungan Baru</th>
                                            <th>Saldo</th>  
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach ($simpanan as $row) {
                                        ?>
                                            <tr> 
                                                <td width="15%" class="grey-text text-darken-1"><?= $no ?></td>
                                                <td width="25%" class="grey-text text-darken-1"><?= $row->username; ?></td>
                                                <td width="25%" class="grey-text text-darken-1"><?= $row->nama; ?></td>
                                                <td width="20%" class="grey-text text-darken-1"><?= $tabungan_baru->no_tabungan; ?></td>
                                                <td width="20%" class="grey-text text-darken-1"><?= $jumlah->saldo_utama; ?></td>    			
                                            </tr>
                                            <?php
                                            $no++;	
                                            }
                                            ?>
                                            <tr> 
                                                <td class="grey-text text-darken-1" colspan="3">Jumlah</td> 
                                                <td class="grey-text text-darken-1"><?= $tabungan_baru->no_tabungan; ?></td>
                                                <td class="grey-text text-darken-1"><?= $jumlah->saldo_utama; ?></td>    			
                                            </tr>
                                    </tbody>
                    </table> 
                </div>
            <?php } else if ($jenis=="ls") {?>
                <div class="col-lg-8"> 
                                        <table border="1" width="100%" style="text-align:center">
                                            <thead class="thead-light ">
                                                <tr>
                                                    <th>No</th>
                                                    <th>No Tabungan</th>
                                                    <th>Nama</th>  
                                                    <th>Alamat</th>
                                                    <th>Pekerjaan</th>
                                                    <th>Telepon</th> 
                                                    <th>Status</th>  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $no = 1;
                                                    foreach ($simpanan as $row) {
                                                ?>
                                                    <tr> 
                                                        <td class="grey-text text-darken-1"><?= $no ?></td>
                                                        <td class="grey-text text-darken-1"><?= $row->no_tabungan; ?></td>
                                                        <td class="grey-text text-darken-1"><?= $row->nama; ?></td>
                                                        <td class="grey-text text-darken-1"><?= $row->alamat; ?></td>
                                                        <td class="grey-text text-darken-1"><?= $row->pekerjaan; ?></td> 
                                                        <td class="grey-text text-darken-1"><?= $row->telp; ?></td> 
                                                        <td class="grey-text text-darken-1"><?= $row->saldo_utama; ?></td>   			
                                                    </tr>
                                                    <?php
                                                    $no++;	
                                                    }
                                                    ?>
                                            </tbody>
                                        </table> 
                </div>
            <?php } else if ($jenis=="bbsp") {?>
                <div class="col-lg-8"> 
                <table border="1" width="100%" style="text-align:center">
                    <thead class="thead-light ">
                        <tr>
                            <th>No</th>
                            <th>No Tabungan</th>
                            <th>Nama</th>  
                            <th>Alamat</th>
                            <th>Jenis Simpanan</th>
                            <th>Jatuh Tempo</th> 
                            <th>Total Setoran</th>  
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($simpanan as $row) {
                        ?>
                        <tr> 
                            <td class="grey-text text-darken-1"><?= $no ?></td>
                            <td class="grey-text text-darken-1"><?= $row->no_tabungan; ?></td>
                            <td class="grey-text text-darken-1"><?= $row->nama; ?></td>
                            <td class="grey-text text-darken-1"><?= $row->alamat; ?></td>
                            <td class="grey-text text-darken-1"><?= $row->jenis; ?></td> 
                            <td class="grey-text text-darken-1"><?= $row->jt; ?></td> 
                            <td class="grey-text text-darken-1"><?= $row->saldo_utama; ?></td>   			
                        </tr>
                    <?php
                    $no++;	
                    }
                    ?>
                    </tbody>
                </table> 
                </div>
            <?php } else{?>
                <div class="col-lg-8"> 
                                        <table border="1" width="100%" style="text-align:center">
                                            <thead class="thead-light ">
                                                <tr>
                                                    <th>No</th>
                                                    <th>No Tabungan</th>
                                                    <th>Nama</th>  
                                                    <th>Alamat</th>
                                                    <th>Pekerjaan</th>
                                                    <th>Saldo</th> 
                                                    <th>Jatuh Tempo</th>  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $no = 1;
                                                    foreach ($simpanan as $row) {
                                                ?>
                                                    <tr> 
                                                        <td class="grey-text text-darken-1"><?= $no ?></td>
                                                        <td class="grey-text text-darken-1"><?= $row->no_tabungan; ?></td>
                                                        <td class="grey-text text-darken-1"><?= $row->nama; ?></td>
                                                        <td class="grey-text text-darken-1"><?= $row->alamat; ?></td>
                                                        <td class="grey-text text-darken-1"><?= $row->pekerjaan; ?></td> 
                                                        <td class="grey-text text-darken-1"><?= $row->saldo_utama; ?></td> 
                                                        <td class="grey-text text-darken-1"><?= $row->jt; ?></td>   			
                                                    </tr>
                                                    <?php
                                                    $no++;	
                                                    }
                                                    ?>
                                            </tbody>
                                        </table> 
                </div>
            <?php }?> 
 
    <br><br>
    <table width="100%" style="text-align:center" >
        <tr>
            <th >Disetujui :</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th >Disahkan :</th>
        </tr>
        <br>
        <tr> 
            <td><br><br><br><br>(..................................................)</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><br><br><br><br>(.................................................)</td>
        </tr>
    </table>
</body>

</html>