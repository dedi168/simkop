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
            <td>KAS KOPERASI</td>
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
        <table border="1" width="100%" style="text-align:center">
        <thead class="thead-light ">
        <tr>
                                <th>No</th>
                                <th>No Anggota</th>
                                <th>Tanggal Bayar</th>
                                <th>Jenis Simpanan</th>
                                <th>Jumlah Bulan</th> 
                                <th>Operator</th>  
                                <th>Pokok</th>
                                <th>Wajib</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $no = 1;
                                foreach ($iuran as $row) {
                            ?>
                                <tr>
                                    <td class="grey-text text-darken-1"><?= $no ?></td> 
                                    <td class="grey-text text-darken-1"><?= $row->no_anggota; ?></td>
                                    <td class="grey-text text-darken-1"><?= $row->tgl_bayar; ?></td>
                                    <td class="grey-text text-darken-1"><?= $row->jenis_simpanan; ?></td>
                                    <td class="grey-text text-darken-1"><?= $row->jumlah_bln; ?></td>  
                                    <td class="grey-text text-darken-1"><?= $row->opr; ?></td> 
                                    <td class="grey-text text-darken-1"><?= $row->pokok; ?></td>
                                    <td class="grey-text text-darken-1"><?= $row->wajib; ?></td>
                                </tr>
                                <tr>
                                    <td class="grey-text text-darken-1" colspan="6">jumlah</td> 
                                    <td class="grey-text text-darken-1"><?= $pokok->pokok;?></td>
                                    <td class="grey-text text-darken-1"><?= $wajib->wajib;?></td>    
                
                                </tr> 
                                <?php
                                $no++;	
                                }
                                    
                                ?>
                            </tbody>
                        </table> 
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
