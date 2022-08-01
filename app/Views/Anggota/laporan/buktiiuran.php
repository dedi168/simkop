<!DOCTYPE html>
<html lang="en">
<?php 
$bulan = array(
	'01' => 'JANUARI',
	'02' => 'FEBRUARI',
	'03' => 'MARET',
	'04' => 'APRIL',
	'05' => 'MEI',
	'06' => 'JUNI',
	'07' => 'JULI',
	'08' => 'AGUSTUS',
	'09' => 'SEPTEMBER',
	'10' => 'OKTOBER',
	'11' => 'NOVEMBER',
	'12' => 'DESEMBER',
);   ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Bukti</title>
	<style>
		  
		span{
			font-weight: bold;
			margin-left: 170px;
		}
	</style>
</head>

<body> 
        <table style="text-align:left" > 
        <tr>
        	<th rowspan="3"><img src="img/logo.jpg" width="100px" height="100px"alt=""></th> 
            <td>BUKTI IURAN</td>
        </tr> 
        <tr>
            <td>KSU BANJAR KEBON BLAHBATUH</td>
        </tr>  
        <tr>
            <td>Jl.Serma Darya, Br Kebon Blahbatuh</td>
        </tr>  
        </table> 
		<hr>
        <table width="100%" id="nilai" style="text-align:left">   
			<tr>
				<td width="150px">NO Anggota</td>
				<td width="3px">:</td>
				<td><?= $iuran->no_anggota; ?></td> 
			</tr>
			<tr>
				<td>Jenis Iuran</td>
				<td width="3px">:</td>
				<td><?= $iuran->jenis_simpanan; ?></td> 
			</tr>
			<tr>
				<td>Jumlah Bulan</td>
				<td width="3px">:</td>
				<td><?= $iuran->jumlah_bln; ?></td> 
			</tr> 
			<tr>
				<td>Pokok</td>
				<td width="3px">:</td>
				<td><?= $iuran->pokok; ?></td> 
			</tr>
			<tr>
				<td>Wajib</td>
				<td width="3px">:</td>
				<td><?= $iuran->wajib; ?></td> 
			</tr>
            <tr>
				<td>Tunai</td>
				<td width="3px">:</td>
				<td><?= $iuran->jumlah; ?></td> 
			</tr>
            <tr>
				<td>Terbilang</td>
				<td width="3px">:</td>
				<td><?= ucfirst(terbilang($iuran->jumlah)); ?></td> 
			</tr>
			   
		</table>   
		<table width="100%" style="text-align:center" >
        <tr>
            <th >&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <td ><?= date('d ').$bulan[date('m')].date(' Y'); ?> :</td>
        </tr>
        <br>
        <tr> 
            <td><br><br><br>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><br><br><br><?= user()->username; ?></td>
        </tr>
    	</table>
    <br><br>
    <?php 
	 function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
		$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
		$temp = penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
		$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
		$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
		$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
		$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
		$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
		$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
		$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
		$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
		}    
		return $temp;
		}
	
		function terbilang($nilai) {
			if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai))." rupiah";
		}    
		return $hasil;
	}
 
	
	 ?>
</body>

</html>  