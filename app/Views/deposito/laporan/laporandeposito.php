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
        <table border="1" width="100%" style="text-align:center">
        <thead class="thead-light ">
				<tr>
                    <th>No</th>
                    <th>No Deposito</th>
                    <th>Nama</th>  
                    <th>Ahli Waris</th>
                    <th>Alamat</th>
                    <th>Jatuh Tempo</th> 
                    <th>Status</th> 
                    <th>Jumlah</th> 
				</tr>
				</thead>
				<tbody>
				<?php
					$no = 1;
					foreach ($deposito as $row) {
				?>
					<tr> 
                        <td class="grey-text text-darken-1"><?= $no ?></td>
                        <td class="grey-text text-darken-1"><?= $row->no_deposito; ?></td>
                        <td class="grey-text text-darken-1"><?= $row->nama; ?></td>
                        <td class="grey-text text-darken-1"><?= $row->ahli_waris; ?></td>
                        <td class="grey-text text-darken-1"><?= $row->alamat; ?></td> 
                        <td class="grey-text text-darken-1"><?= $row->jatuh_tempo; ?></td> 
                        <td class="grey-text text-darken-1"><?= $row->status; ?></td>   
                        <td class="grey-text text-darken-1"><?= $row->deposit; ?></td>  
					</tr>
					<?php
					$no++;	
					}
					?>
                    <tr>
                        <td class="grey-text text-darken-1" colspan="7">jumlah</td> 
                        <td class="grey-text text-darken-1"><?= $total->jumlah;?></td>  
                    </tr> 
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
