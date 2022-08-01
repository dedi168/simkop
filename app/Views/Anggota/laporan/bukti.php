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
            <td>BUKTI KEANGGOTAAN</td>
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
				<td><?= $anggota->no_anggota; ?></td> 
			</tr>
			<tr>
				<td>Nama</td>
				<td width="3px">:</td>
				<td><?= $anggota->nama; ?></td> 
			</tr>
			<tr>
				<td>Alamat</td>
				<td width="3px">:</td>
				<td><?= $anggota->alamat; ?></td> 
			</tr>
			<tr>
				<td>No Telepon</td>
				<td width="3px">:</td>
				<td><?= $anggota->telp; ?></td> 
			</tr>
			<tr>
				<td>Tempat/Tanggal Lahir</td>
				<td width="3px">:</td>
				<td><?= $anggota->tempat."/".$anggota->tanggal_lahir; ?></td> 
			</tr>
			   
		</table>  
        <h4>Selamat anda telah terdaftar sebagai anggota koperasi !!! </h4>
        <p>Tertanggal <?= substr($anggota->created_at,0,10) ; ?> anda telah resmi terdaftar dan menjadi bagian dari anggota koperasi serba usaha blahbatuh</p>
        <p>
            Mengikuti aturan yang berlaku yakni setiap anggota koperasi diwajibkan membayar iuran
        </p>
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

</body>

</html>  