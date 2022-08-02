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
	<style>
		  
		span{
			font-weight: bold;
			margin-left: 170px;
		}
	</style>
</head>

<body > 	
	<table style="text-align:left"> 
        <tr>
        	<th rowspan="3"><img src="img/logo.jpg" width="100px" height="100px"alt=""></th> 
			<td>TANDA TERIMA UANG</td>
        </tr>
        <tr>
            <td>KSU BANJAR KEBON BLAHBATUH</td>
        </tr>
        <tr>
            <td>Jl.Serma Darya, Br Kebon Blahbatuh</td>
        </tr>  
        </table>  
		<hr>
        <table width="95%" id="nilai" style="text-align:left">   
			<tr>
				<td width="20%" >No Deposito</td>
				<td width="2%">:</td>
				<td width="28%" ><?= $deposito->no_deposito; ?></td> 

				<td width="20%">Tanggal</td>
				<td width="3px">:</td>
				<td width="28%" ><?= $deposito->tgl; ?></td> 
			</tr>
			<tr>
				<td width="20%">Nama</td>
				<td width="2%">:</td>
				<td width="28%"><?= $deposito->nama; ?></td> 
				
				<td width="20%">Alamat</td>
				<td width="2%">:</td>
				<td width="28%"><?= $deposito->alamat; ?></td>  
			</tr> 
			<tr>
				<td width="20%">Bunga</td>
				<td width="2%">:</td>
				<td width="28%"><?= $deposito->bunga; ?> % per tahun</td> 

				<td width="20%">Jatuh Tempo</td> 
				<td width="2%">:</td>
				<td width="30%" colspan="2" ><?= $deposito->jatuh_tempo; ?></td> 
			</tr>
			<tr>
				<td width="20%">Jumlah Deposito</td>
				<td width="2%">:</td>
				<td width="28%"><?= "Rp. ". number_format($deposito->jumlah,2,',','.') ; ?></td> 
  
			</tr>  
			<tr>
				<td width="20%">Terbilang</td>
				<td width="3px">:</td>
				<td width="45%" colspan="4" align="left"  ><?= ucfirst(terbilang($deposito->jumlah)); ?></td>
			</tr>
			   
		</table> 
		<table width="100%" style="text-align:center" >
			<tr> 
				<th colspan="3" width="40px">&nbsp;</th> 
				<td width="28%"><?= date('d/m/Y'); ?></td>
			</tr>
			<tr>
				<th colspan="3" width="40px">&nbsp;</th> 
				<td width="28%">Yang Menerima,</td>
			</tr>
			<br>
			<tr> 
				<th colspan="3" width="40px">&nbsp;</th>  
				<td width="28%" ><br><br><br><b><u><?= user()->username; ?></u></b></td>
			</tr>
    	</table>
    <br><br> 
	<hr style="border: 2px dotted #000; border-style: none none dotted; color: #fff; background-color: #fff;">

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
			$hasil = "minus ". trim(penyebut($nilai))." rupiah";
		} else {
			$hasil = trim(penyebut($nilai))." rupiah";
		}    
		return $hasil;
	}
 
	 ?>  
</body>

</html>  