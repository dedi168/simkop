<?= $this->extend('template/index');?>
<?= $this->section('content');?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
   <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row"> 
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">UBAH SIMPANAN</h1>
                                </div>  
                                <?= view('Myth\Auth\Views\_message_block') ?>
                                <form action="<?= base_url('pinjaman/update/'.$pinjaman->no_pinjaman) ?>" method="post" class="user">
                                <?= csrf_field() ?>  
                                <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <label for="notab">Nomor Pinjaman</label>
                                            <input type="text" readonly id="notab" class="form-control" name="no_pinjaman" placeholder="no pinjaman" value="<?= $pinjaman->no_pinjaman?>">                                        </select>
                                        </div>
                                        <div class="col-sm-6">
                                        <label for="tgl">Tanggal</label>
                                        <input type="text" class="form-control" readonly value="<?= $pinjaman->created_at?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="opr">kolektor</label>
                                            <input type="text" name="opr"class="form-control" readonly value="<?= $pinjaman->opr;?>">
                                        </select>
                                        </div>
                                        <div class="col-sm-6">
                                        <label for="status">status</label>
                                        <select name="status" class="form-control " id="status">
                                            <option <?php if ($pinjaman->status == "AKTIF") { echo 'selected'; }?> value="AKTIF">AKTIF</option>
                                            <option <?php if ($pinjaman->status == "TUTUP") { echo 'selected'; }?> value="TUTUP">TUTUP</option>
                                        </select>
                                        </div>
                                    </div>

                                    <hr class="bg-gradient-dark"> 

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0 bg-gray-200">
                                            <center><h5>IDENTITAS PEMINJAM</h5></center>
                                            <label for="nama">No Anggota</label>
                                            <input type="text" class="form-control   " name="no_anggota"
                                            placeholder="no anggota" value="<?= $pinjaman->no_anggota ?>">
                                            
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control   " name="nama"
                                            placeholder="nama" value="<?= $pinjaman->nama1 ?>">
                                            
                                            <label for="nama">Alamat</label>
                                            <input type="text" class="form-control   " name="alamat"
                                            placeholder="alamat" value="<?= $pinjaman->alamat ?>">

                                            <label for="">Tempat Tanggal Lahir</label> 
                                            <div class="form-group row"> 
                                                <div class="col-sm-6"> 
                                                    <input type="text" id="tmp" name="tmp" placeholder="tempat" class="form-control" value="<?= $pinjaman->tmp ?>" > 
                                                </div>
                                                <div class="col-sm-6">   
                                                    <input type="date" id="tgl_lahir" name="tgl_lahir"class="form-control  " autocomplete="off" value="<?= $pinjaman->tgl_lahir ?>">
                                                </div>  
                                            </div> 
                                            
                                            <label for="nama">Gaji</label>
                                            <input type="text" class="form-control   " name="gaji"
                                            placeholder="gaji" value="<?= $pinjaman->gaji ?>">
                                            
                                            <label for="noid">Identitas Diri</label>
                                            <input type="text" class="form-control   " name="noid"
                                            placeholder="no simpanan" value="<?= $pinjaman->noid ?>">
                                            
                                            <label for="pekerjaan">Pekerjaan</label>
                                            <input type="text" class="form-control   " name="pekerjaan"
                                            placeholder="pekerjaan" value="<?= $pinjaman->pekerjaan  ?>"><br>
                                        </div>

                                        <div class="col-sm-6 mb-3 mb-sm-0 bg-gray-300">
                                        <center><h5>IDENTITAS PENANGGUNG</h5></center>
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control   " name="nama2"
                                            placeholder="nama" value="<?=$pinjaman->nama2 ?>">
                                            
                                            <label for="alamat2">Alamat</label>
                                            <input type="text" class="form-control   " name="alamat2"
                                            placeholder="alamat" value="<?= $pinjaman->alamat2 ?>">
                                            
                                            <label for="bunga">Pekerjaan</label>
                                            <input type="text" class="form-control   " name="pekerjaan2"
                                            placeholder="pekerjaan" value="<?= $pinjaman->pekerjaan2 ?>">
                                            
                                            <label for="gaji2">Gaji</label>
                                            <input type="number" class="form-control   " name="gaji2"
                                            placeholder="penghasilan" value="<?= $pinjaman->gaji2 ?>">
                                            
                                            <label for="hub">Hubungan</label>
                                            <select name="hub" id="hub" class="form-control  " >
                                                <option <?php if ($pinjaman->hub == "Ibu") { echo 'selected'; }?> value="Ibu">Ibu</option>
                                                <option  <?php if ($pinjaman->hub == "Ayah") { echo 'selected'; }?> value="Ayah">Ayah</option>
                                                <option  <?php if ($pinjaman->hub == "Anak") { echo 'selected'; }?> value="Anak">Anak</option>
                                                <option <?php if ($pinjaman->hub == "Adik") { echo 'selected'; }?> value="Adik">Adik</option>
                                                <option <?php if ($pinjaman->hub == "Kakak") { echo 'selected'; }?> value="Kakak">Kakak</option>
                                                <option <?php if ($pinjaman->hub == "Paman") { echo 'selected'; }?> value="Paman">Paman</option>
                                                <option <?php if ($pinjaman->hub == "Bibi") { echo 'selected'; }?> value="Bibi">Bibi</option>
                                                <option <?php if ($pinjaman->hub == "Saudara") { echo 'selected'; }?> value="Saudara">Saudara</option>
                                            </select> 
                                            
                                            <label for="nsp">No Perjanjian</label>
                                            <input type="text" class="form-control   " name="nsp"
                                            placeholder="No Perjanjian" value="<?= $pinjaman->nsp ?>">
                                        </div>
                                    </div>
                                    
                                    <hr class="bg-gradient-dark"> 
                                    <div class="form-group row">
                                        <div class="col-sm-6 "> 
                                        <label for="jenis">Jenis Pinjaman</label> 
                                                <select class="form-control" id="jenis" name="jenis"> 
                                                    <?php foreach($jenis as $key):?> 
                                                         <option  <?php if ($pinjaman->jenis == $key->id) { echo 'selected'; }?> value="<?php echo  $key->id ?>">
                                                            <?php echo  $key->nama ?> 
                                                        </option>
                                                    <?php endforeach ?>
                                                </select>          
                                                    
                                            <label for="bunga">Jumlah Pinjaman</label> 
                                            <input type="number" id="jml_pinjaman"  name="jml_pinjaman" value="<?php echo  $pinjaman->jml_pinjaman ?>" class="form-control  " autocomplete="off">
                                            <div class="form-group row">
                                                <div class="col-sm-6 ">
                                                    <label for="bunga">Bunga</label> 
                                                    <input type="text" id="bunga" name="bunga"class="form-control "  value="<?php echo  $pinjaman->bunga ?>" autocomplete="off">
                                                </div>
                                                <div class="col-sm-6"> 
                                                <label for="sistem_bunga">Sistem</label> 
                                                <select name="sistem_bunga" Class="form-control " id="sistem_bunga">
                                                    <option <?php if ($pinjaman->sistem_bunga == "NAIK") { echo 'selected'; }?> value="NAIK">NAIK</option>
                                                    <option <?php if ($pinjaman->sistem_bunga == "TETAP") { echo 'selected'; }?> value="TETAP">TETAP</option>
                                                    <option <?php if ($pinjaman->sistem_bunga == "MENURUN") { echo 'selected'; }?> value="MENURUN">MENURUN</option>
                                                </select>
                                                </div>  
                                            </div> 
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="bunga">Jangka Waktu</label> 
                                                    <div class="form-group row">
                                                        <div class="col-sm">
                                                            <input type="number" id="jangka_waktu" name="jangka_waktu"class="form-control  "onkeyup="jatuh_tempo()" value="<?php echo  $pinjaman->jangka_waktu ?>">  
                                                        </div>
                                                        <div class="col">
                                                           Bulan 
                                                        </div>
                                                    </div> 
                                                    <div class="form-group row">
                                                        <div class="col-sm">
                                                        <input type="number" id="jangka_harian" name="jangka_harian" class="form-control  "onkeyup="jatuh_tempo()" autocomplete="off" value="<?php echo  $pinjaman->jangka_harian ?>">
                                                        </div>
                                                        <div class="col">
                                                           Hari 
                                                        </div>
                                                    </div>  
                                                </div>
                                                <div class="col-sm-6"> 
                                                <label for="tanggal">Jatuh Tempo</label> 
                                                    <input type="text" id="tanggal" name="tanggal" class="form-control  " autocomplete="off" value="<?php echo  $pinjaman->tanggal ?>">
                                                </div>  
                                            </div> 
                                            
                                        </div>
                                        <div class="col-sm-6"> 
                                            <label for="bunga">Meterai</label> 
                                            <input type="number" id="meterai" name="meterai" class="form-control  " autocomplete="off" value="<?php echo  $pinjaman->meterai ?>">
                                                    
                                            <label for="provisi">Provisi</label> 
                                            <input type="number" id="provisi" name="provisi" class="form-control  " autocomplete="off" value="<?php echo  $pinjaman->provisi ?>">
                                            
                                            <label for="administrasi">Adm</label> 
                                            <input type="number" id="administrasi" name="administrasi" class="form-control  " autocomplete="off" value="<?php echo  $pinjaman->administrasi ?>">
                                                    
                                            <label for="bunga">Premi</label> 
                                            <input type="number" id="premi" name="premi" class="form-control rp " autocomplete="off" value="<?php echo  $pinjaman->premi ?>">
                                        </div>  
                                    </div> 
                                    <button type="submit" class="btn btn-primary btn-user btn-block"> Simpan </button>
                                    <hr> 
                                </form>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div> 
<!-- display sub jenis    -->
<script>
    function tampil(str) {  
    if (str == "SUKARELA") {
        $("#batas").css('display', 'none'); 
        return;
    }else {
        $("#batas").css('display', 'block'); 
    }  
    } 
</script>
<script type="text/javascript">
   function jatuh_tempo() { 
        var jangka_waktu = -1;
        jangka_waktu = parseInt(document.getElementById('jangka_waktu').value);
        var jangka_harian = 0; 
        jangka_harian = parseInt(document.getElementById('jangka_harian').value); 
        var date = new Date(<?=date('Y')?>, <?=date('m')?>, <?=date('d')?>);
    
            var jt_tempo = new Date(date.getFullYear(), date.getMonth()- 1 +jangka_waktu, date.getDate() + jangka_harian, 0, 0, 0, 0);
            document.getElementById('tanggal').value = jt_tempo.toDateString();
    }
</script>
    <?= $this->endSection();?>
    