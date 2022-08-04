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
                        if ($jenis=="pk") {  ?>
                            <div class="col-lg-11"> 
                                <table border="1" width="100%" style="text-align:center">
                                    <thead class="thead-light ">
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>No Pinjaman</th>
                                        <th>Nama</th>
                                        <th>Pokok</th>
                                        <th>Bunga</th>   
                                        <th>Denda</th> 
                                        <th>Angsuran</th>  
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $no = 1;
                                        foreach ($pinjaman as $row) {
                                    ?>
                                        <tr>
                                            <td class="grey-text text-darken-1"><?= $no ?></td> 
                                            <td class="grey-text text-darken-1"><?= $row->tanggal; ?></td>
                                            <td class="grey-text text-darken-1"><?= $row->no_pinjaman; ?></td>
                                            <td class="grey-text text-darken-1"><?= $row->nama1; ?></td> 
                                            <td class="grey-text text-darken-1"><?= "Rp. ". number_format($row->pokok,2,',','.') ;  ?></td>
                                            <td class="grey-text text-darken-1"><?= "Rp. ". number_format($row->bunga,2,',','.') ;  ?></td>   
                                            <td class="grey-text text-darken-1"><?="Rp. ". number_format($row->denda,2,',','.') ; ?></td>
                                            <td class="grey-text text-darken-1"><?=$row->bayar ; ?></td>
                                          			
                                        </tr>
                                        <?php
                                        $no++;	
                                        }
                                            
                                        ?>
                                    </tbody>
                                </table> 
                            </div>
                        <?php } else if ($jenis=="sp") {?>
                            <div class="col-lg-11"> 
                                <table border="1" width="100%" style="text-align:center">
                                    <thead class="thead-light ">
                                        <tr>
                                            <th>No</th>
                                            <th>No Pinjaman</th>
                                            <th>Nama</th>  
                                            <th>Jumlah</th>
                                            <th>Jangka Waktu</th>
                                            <th>Bunga</th> 
                                            <th>Sistem</th>  
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach ($pinjaman as $row) {
                                        ?>
                                            <tr> 
                                                <td class="grey-text text-darken-1"><?= $no ?></td>
                                                <td class="grey-text text-darken-1"><?= $row->no_pinjaman; ?></td>
                                                <td class="grey-text text-darken-1"><?= $row->nama1; ?></td>
                                                <td class="grey-text text-darken-1"><?= "Rp. ". number_format($row->jml_pinjaman,2,',','.'); ?></td>
                                                <td class="grey-text text-darken-1"><?= $row->jangka_waktu; ?></td> 
                                                <td class="grey-text text-darken-1"><?= $row->bunga; ?></td> 
                                                <td class="grey-text text-darken-1"><?= $row->sistem_bunga; ?></td>   			
                                            </tr>
                                            <?php
                                            $no++;	
                                            }
                                            ?>
                                    </tbody>
                                </table> 
                            </div>
                        <?php } else if ($jenis=="bba") {?>
                            <div class="col-lg-11"> 
                                <table border="1" width="100%" style="text-align:center">
                                    <thead class="thead-light ">
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>No Pinjaman</th>
                                            <th>Nama</th>  
                                            <th>Jumlah</th>
                                            <th>Sistem</th>
                                            <th>Sisa Angsuran</th>   
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach ($pinjaman as $row) {
                                        ?>
                                            <tr> 
                                                <td class="grey-text text-darken-1"><?= $no ?></td>
                                                <td class="grey-text text-darken-1"><?= $row->tanggal; ?></td>
                                                <td class="grey-text text-darken-1"><?= $row->no_pinjaman; ?></td>
                                                <td class="grey-text text-darken-1"><?= $row->nama1; ?></td>
                                                <td class="grey-text text-darken-1"><?= $row->jml_pinjaman; ?></td> 
                                                <td class="grey-text text-darken-1"><?= $row->sistem_bunga; ?></td> 
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
                                            <th>No Pinjaman</th>
                                            <th>Nama</th>  
                                            <th>Alamat</th>
                                            <th>Pekerjaan</th>
                                            <th>Jumlah Pinjaman</th> 
                                            <th>Jatuh Tempo</th>  
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach ($pinjaman as $row) {
                                        ?>
                                            <tr> 
                                                <td class="grey-text text-darken-1"><?= $no ?></td>
                                                <td class="grey-text text-darken-1"><?= $row->no_pinjaman; ?></td>
                                                <td class="grey-text text-darken-1"><?= $row->nama1; ?></td>
                                                <td class="grey-text text-darken-1"><?= $row->alamat; ?></td>
                                                <td class="grey-text text-darken-1"><?= $row->pekerjaan; ?></td> 
                                                <td class="grey-text text-darken-1"><?= $row->jml_pinjaman; ?></td> 
                                                <td class="grey-text text-darken-1"><?= $row->jatuh_tempo; ?></td>   			
                                            </tr>
                                            <?php
                                            $no++;	
                                            }
                                            ?>
                                    </tbody>
                                </table> 
                            </div>
                        <?php }     
                    ?> 
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