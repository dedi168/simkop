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
				<td width="28%" >nlnln</td> 

				<td width="20%">Tanggal</td>
				<td width="3px">:</td>
				<td width="28%" >lkkll</td> 
			</tr>
			<tr>
				<td width="20%">Setoran Awal</td>
				<td width="2%">:</td>
				<td width="28%">jasklsask</td>  
			</tr>
			<tr>
				<td width="20%">Alamat</td>
				<td width="2%">:</td>
				<td width="28%">kajsak</td>  
			</tr>
			<tr>
				<td width="20%">Bunga</td>
				<td width="2%">:</td>
				<td width="28%">laskla</td> 

				<td width="20%">Jangka Waktu</td> 
				<td width="30%" colspan="2" align="right">bulan</td> 
			</tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="5"><hr></td>
            </tr>
			<tr>
                <td width="20%"></td>
				<td width="2%"></td>
				<td width="28%">Status Deoposito</td> 
                
				<td width="20%"></td>
				<td width="2%"></td>
				<td width="28%" align="right">perpanjang/tutup</td> 
                
			</tr>  
            <tr>
                <td width="20%"></td>
                <td width="2%"></td>
                <td width="28%">SALDO DEPOSITO</td> 
    
                <td width="20%"></td>
                <td width="2%"></td>
                <td width="28%" align="right">Jumlah Pinjaman</td> 
    
            </tr>  
            <tr>
                <td width="20%"></td>
                <td width="2%"></td>
                <td width="28%">TERBILANG</td> 
    
                <td width="20%"></td>
                <td width="2%"></td>
                <td width="28%" align="right"><?= terbilang('125903'); ?></td> 
    
            </tr>  
		</table> 
		<table width="100%" style="text-align:center" >
			<tr> 
				<th colspan="3" width="40px">&nbsp;</th> 
				<td width="28%"><?= date('d/m/Y'); ?></td>
			</tr>
			<tr>
				<td width="28%">Yang menerima,</td>
				<th colspan="2" width="40px">&nbsp;</th> 
				<td width="28%">Yang menyerahkan,</td>
			</tr>
			<br>
			<tr> 
				<td width="28%"><br><br><br><b><u> </u></b></td>
				<th colspan="2" width="40px">&nbsp;</th>  
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
        } else if ($nilai < 100) {
		$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
		$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
            $temp = penyebut($nilai - 10). " belas";
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