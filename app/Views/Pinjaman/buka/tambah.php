<?= $this->extend('template/index');?>
<?= $this->section('content');?>
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card o-hidden border-0 shadow-lg my-1">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row"> 
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">BUKA PINJAMAN BARU</h1>
                                </div>
                                <?= view('Myth\Auth\Views\_message_block') ?>
                                <form action="<?= base_url('pinjaman/store') ?>" method="post" class="user">
                                <?= csrf_field() ?> 
 
                                <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                        <?php  
                                        $no = 1;
                                        foreach ($pinjaman as $row) { 
                                        $no_pinjam = (int) substr($row->no_pinjaman, 4, 5); 
                                        $no_pinjam++; 
                                        $kode = "525";
                                        $no_pinjaman = $kode . sprintf("%05s", $no_pinjam);
                                        }
                                        ?>
                                            <label for="notab">Nomor Pinjaman</label>
                                            <input type="text" readonly id="notab" class="form-control" name="no_pinjaman" placeholder="no pinjaman" value="<?= $no_pinjaman?>">                                        </select>
                                        </div>
                                        <div class="col-sm-6">
                                        <label for="tgl">Tanggal</label>
                                        <input type="text" class="form-control" readonly value="<?= date('d-M-Y'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="opr">kolektor</label>
                                            <input type="text" name="opr"class="form-control" readonly value="<?= user()->username;?>">
                                        </select>
                                        </div>
                                        <div class="col-sm-6">
                                        <label for="status">status</label>
                                        <select name="status" class="form-control " id="status">
                                            <option value="AKTIF">AKTIF</option>
                                            <option value="TUTUP">TUTUP</option>
                                        </select>
                                        </div>
                                    </div>

                                    <hr class="bg-gradient-dark"> 

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0 bg-gray-200">
                                            <center><h5>IDENTITAS PEMINJAM</h5></center>
                                            <label for="nama">No Anggota</label>
                                            <input type="text" class="form-control   " name="no_anggota"
                                            placeholder="no anggota" value="<?= old('no_anggota') ?>">
                                            
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control   " name="nama"
                                            placeholder="nama" value="<?= old('nama') ?>">
                                            
                                            <label for="nama">Alamat</label>
                                            <input type="text" class="form-control   " name="alamat"
                                            placeholder="alamat" value="<?= old('alamat') ?>">
                                            <label for="">Tempat Tanggal Lahir</label> 
                                            <div class="form-group row">
                                            
                                                <div class="col-sm-6"> 
                                                    <input type="text" id="tmp" name="tmp" placeholder="tempat" class="form-control  " > 
                                                </div>
                                                <div class="col-sm-6">   
                                                    <input type="date" id="tgl_lahir" name="tgl_lahir"class="form-control  " autocomplete="off">
                                                </div>  
                                            </div> 
                                            
                                            <label for="nama">Gaji</label>
                                            <input type="text" class="form-control   " name="gaji"
                                            placeholder="gaji" value="<?= old('gaji') ?>">
                                            
                                            <label for="noid">Identitas Diri</label>
                                            <input type="text" class="form-control   " name="noid"
                                            placeholder="no simpanan" value="<?= old('noid') ?>">
                                            
                                            <label for="pekerjaan">Pekerjaan</label>
                                            <input type="text" class="form-control   " name="pekerjaan"
                                            placeholder="pekerjaan" value="<?= old('pekerjaan') ?>"><br>
                                        </div>

                                        <div class="col-sm-6 mb-3 mb-sm-0 bg-gray-300">
                                        <center><h5>IDENTITAS PENANGGUNG</h5></center>
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control   " name="nama2"
                                            placeholder="nama" value="<?= old('nama2') ?>">
                                            
                                            <label for="alamat2">Alamat</label>
                                            <input type="text" class="form-control   " name="alamat2"
                                            placeholder="alamat" value="<?= old('alamat2') ?>">
                                            
                                            <label for="bunga">Pekerjaan</label>
                                            <input type="text" class="form-control   " name="pekerjaan2"
                                            placeholder="pekerjaan" value="<?= old('pekerjaan2') ?>">
                                            
                                            <label for="gaji2">Gaji</label>
                                            <input type="number" class="form-control   " name="gaji2"
                                            placeholder="penghasilan" value="<?= old('gaji2') ?>">
                                            
                                            <label for="hub">Hubungan</label>
                                            <select name="hub" id="hub" class="form-control  " >
                                                <option value="Ibu">Ibu</option>
                                                <option value="Ayah">Ayah</option>
                                                <option value="Anak">Anak</option>
                                                <option value="Adik">Adik</option>
                                                <option value="Kakak">Kakak</option>
                                                <option value="Paman">Paman</option>
                                                <option value="Bibi">Bibi</option>
                                                <option value="Saudara">Saudara</option>
                                            </select> 
                                            
                                            <label for="nsp">No Perjanjian</label>
                                            <input type="text" class="form-control   " name="nsp"
                                            placeholder="No Perjanjian" value="<?= old('nsp') ?>">
                                        </div>
                                    </div>
                                    
                                    <hr class="bg-gradient-dark"> 
                                    <div class="form-group row">
                                        <div class="col-sm-6 "> 
                                        <label for="jenis">Jenis Pinjaman</label> 
                                                <select class="form-control" id="jenis" name="jenis">
                                                    <option value="">
                                                        <--Pilih Jenis Pinjaman -->
                                                    </option>
                                                    <?php foreach($jenis as $key):?>
                                                            
                                                         <option value="<?php echo  $key->id ?>">
                                                            <?php echo  $key->nama ?> 
                                                        </option>
                                                    <?php endforeach ?>
                                                </select>          
                                                    
                                            <label for="bunga">Jumlah Pinjaman</label> 
                                            <input type="number" id="jml_pinjaman"  name="jml_pinjaman"class="form-control  " autocomplete="off">
                                            <div class="form-group row">
                                                <div class="col-sm-6 ">
                                                    <label for="bunga">Bunga</label> 
                                                    <input type="text" id="bunga" name="bunga"class="form-control  " autocomplete="off">
                                                </div>
                                                <div class="col-sm-6"> 
                                                <label for="sistem_bunga">Sistem</label> 
                                                <select name="sistem_bunga" Class="form-control " id="sistem_bunga">
                                                    <option value="NAIK">NAIK</option>
                                                    <option value="TETAP">TETAP</option>
                                                    <option value="MENURUN">MENURUN</option>
                                                </select>
                                                </div>  
                                            </div> 
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="bunga">Jangka Waktu</label> 
                                                    <div class="form-group row">
                                                        <div class="col-sm">
                                                            <input type="number" id="jangka_waktu" name="jangka_waktu"class="form-control  " > 
                                                    
                                                        </div>
                                                        <div class="col">
                                                           Bulan 
                                                        </div>
                                                    </div> 
                                                    <div class="form-group row">
                                                        <div class="col-sm">
                                                        <input type="number" id="jangka_harian" name="jangka_harian" class="form-control  " autocomplete="off">
                                                        </div>
                                                        <div class="col">
                                                           Hari 
                                                        </div>
                                                    </div>  
                                                </div>
                                                <div class="col-sm-6"> 
                                                <label for="tanggal">Jatuh Tempo</label> 
                                                    <input type="date" id="tanggal" name="tanggal" class="form-control  " autocomplete="off">
                                                </div>  
                                            </div> 
                                            
                                        </div>
                                        <div class="col-sm-6"> 
                                            <label for="bunga">Meterai</label> 
                                            <input type="number" id="meterai" name="meterai" class="form-control  " autocomplete="off">
                                                    
                                            <label for="provisi">Provisi</label> 
                                            <input type="number" id="provisi" name="provisi" class="form-control  " autocomplete="off">
                                            
                                            <label for="administrasi">Adm</label> 
                                            <input type="number" id="administrasi" name="administrasi" class="form-control  " autocomplete="off">
                                                    
                                            <label for="bunga">Premi</label> 
                                            <input type="number" id="premi" name="premi" class="form-control rp " autocomplete="off">
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
    <?= $this->endSection();?>