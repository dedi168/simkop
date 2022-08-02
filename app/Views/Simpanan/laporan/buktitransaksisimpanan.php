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
    <title>BUKTI TRANSAKSI SETORAN SIMPANAN</title>
	<style>
		  
		span{
			font-weight: bold;
			margin-left: 170px;
		}
	</style>
</head>

<body > 
        <table style="text-align:left" > 
        <tr>
        	<th rowspan="3"><img src="img/logo.jpg" width="100px" height="100px"alt=""></th> 
        </tr>
        <tr>
            <td>KSU BANJAR KEBON BLAHBATUH</td>
        </tr>
        <tr>
            <td>Jl.Serma Darya, Br Kebon Blahbatuh</td>
        </tr>  
        </table> <center><h3>BUKTI TRANSAKSI SETORAN SIMPANAN</h3></center> 
		<hr>
        <table width="100%" id="nilai" style="text-align:left">  
			<!-- <tr>
				<td width="35%">Nama</td>
				<td width="3px">:</td>
				<td>Nama Murid</td> 
			</tr> -->
			<tr>
				<td width="35%">Nama</td>
				<td width="3px">:</td>
				<td><?php echo  $simpanan->nama ?></td> 
			</tr>
			<tr>
				<td>Jumlah</td>
				<td width="3px">:</td>
				<td><?= "Rp. ". number_format($simpanan->jumlah_simpanan,2,',','.') ;?> </td> 
			</tr>
			<tr>
				<td>Terbilang</td>
				<td width="3px">:</td>
				<td><?= ucfirst(terbilang($simpanan->jumlah_simpanan)); ?> rupiah</td> 
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
     <hr>
	 <h6 style="color: red;">*Tunjukkan bukti transaksi ini jika terdapat kesalahan pada data yang dimasukkan</h6>

	 <hr style="border: 2px dotted #000; border-style: none none dotted; color: #fff; background-color: #fff;">
<!-- nota -->
	<table style="text-align:left" > 
        <tr>
        	<th rowspan="3"><img src="img/logo.jpg" width="100px" height="100px"alt=""></th> 
        </tr>
        <tr>
            <td>KSU BANJAR KEBON BLAHBATUH</td>
        </tr>
        <tr>
            <td>Jl.Serma Darya, Br Kebon Blahbatuh</td>
        </tr>  
        </table> <center><h3>BUKTI TRANSAKSI SETORAN SIMPANAN</h3></center> 
		<hr>
        <table width="100%" id="nilai" style="text-align:left">  
			<!-- <tr>
				<td width="35%">Nama</td>
				<td width="3px">:</td>
				<td>Nama Murid</td> 
			</tr> -->
			<tr>
				<td width="35%">Nama</td>
				<td width="3px">:</td>
				<td><?php echo  $simpanan->nama ?></td> 
			</tr>
			<tr>
				<td>Jumlah</td>
				<td width="3px">:</td>
				<td><?= "Rp. ". number_format($simpanan->jumlah_simpanan,2,',','.') ;?> </td> 
			</tr>
			<tr>
				<td>Terbilang</td>
				<td width="3px">:</td>
				<td><?= ucfirst(terbilang($simpanan->jumlah_simpanan)); ?> rupiah</td> 
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
     <hr>
	 <h6 style="color: red;">*Tunjukkan bukti transaksi ini jika terdapat kesalahan pada data yang dimasukkan</h6>
<!-- nota -->


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
			$hasil = trim(penyebut($nilai));
		}    
		return $hasil;
	}
 
	 ?> 
     <script>
        window.print(); 
     </script>
</body>

</html>  