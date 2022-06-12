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
                                <form action="<?= route_to('register') ?>" method="post" class="user">
                                <?= csrf_field() ?> 
 
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="no_tabungan"
                                        placeholder="no simpanan" value="<?= old('no_tabungan') ?>">
                                    </div> 
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="kolektor">kolektor</label>
                                            <select name="operator" class="form-control " id="kolektor">
                                            <option value="AKTIF">Administrator</option>
                                            <option value="TUTUP">Kasir</option>
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
                                            <input type="text" class="form-control form-control-user <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" name="email"
                                            placeholder="no simpanan" value="<?= old('no_tabungan') ?>">
                                            
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control form-control-user <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" name="email"
                                            placeholder="no simpanan" value="<?= old('no_tabungan') ?>">
                                            
                                            <label for="nama">Alamat</label>
                                            <input type="text" class="form-control form-control-user <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" name="email"
                                            placeholder="no simpanan" value="<?= old('no_tabungan') ?>">
                                            <label for="bunga">Tempat Tanggal Lahir</label> 
                                            <div class="form-group row">
                                            
                                                <div class="col-sm-6"> 
                                                    <input type="text" id="bunga" class="form-control form-control-user " > 
                                                </div>
                                                <div class="col-sm-6">   
                                                    <input type="date" id="bunga" class="form-control form-control-user " autocomplete="off">
                                                </div>  
                                            </div> 
                                            
                                            <label for="nama">Gaji</label>
                                            <input type="text" class="form-control form-control-user <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" name="email"
                                            placeholder="no simpanan" value="<?= old('no_tabungan') ?>">
                                            
                                            <label for="nama">Identitas Diri</label>
                                            <input type="text" class="form-control form-control-user <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" name="email"
                                            placeholder="no simpanan" value="<?= old('no_tabungan') ?>">
                                            
                                            <label for="nama">Pekerjaan</label>
                                            <input type="text" class="form-control form-control-user <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" name="email"
                                            placeholder="no simpanan" value="<?= old('no_tabungan') ?>"><br>
                                        </div>

                                        <div class="col-sm-6 mb-3 mb-sm-0 bg-gray-300">
                                        <center><h5>Penanggung</h5></center>
                                            <label for="bunga">Nama</label>
                                            <input type="text" class="form-control form-control-user <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" name="email"
                                            placeholder="no simpanan" value="<?= old('no_tabungan') ?>">
                                            
                                            <label for="bunga">Alamat</label>
                                            <input type="text" class="form-control form-control-user <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" name="email"
                                            placeholder="no simpanan" value="<?= old('no_tabungan') ?>">
                                            
                                            <label for="bunga">Pekerjaan</label>
                                            <input type="text" class="form-control form-control-user <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" name="email"
                                            placeholder="no simpanan" value="<?= old('no_tabungan') ?>">
                                            
                                            <label for="bunga">penghasilan</label>
                                            <input type="number" class="form-control form-control-user <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" name="email"
                                            placeholder="no simpanan" value="<?= old('no_tabungan') ?>">
                                            
                                            <label for="bunga">Identitas diri</label>
                                            <input type="text" class="form-control form-control-user <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" name="email"
                                            placeholder="no simpanan" value="<?= old('no_tabungan') ?>">
                                            
                                            <label for="bunga">No Perjanjian</label>
                                            <input type="text" class="form-control form-control-user <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" name="email"
                                            placeholder="no simpanan" value="<?= old('no_tabungan') ?>">
                                        </div>
                                    </div>
                                    
                                    <hr class="bg-gradient-dark"> 
                                    <div class="form-group row">
                                        <div class="col-sm-6 ">
                                        <label for="bunga">Jenis</label> 
                                            <input type="text" id="bunga" class="form-control form-control-user " autocomplete="off">
                                                    
                                            <label for="bunga">Jumlah Pinjaman</label> 
                                            <input type="text" id="bunga" class="form-control form-control-user " autocomplete="off">
                                            <div class="form-group row">
                                                <div class="col-sm-6 ">
                                                    <label for="bunga">Bunga</label> 
                                                    <input type="text" id="bunga" class="form-control form-control-user " autocomplete="off">
                                                </div>
                                                <div class="col-sm-6"> 
                                                <label for="bunga">jenis</label> 
                                                <select name="jenis" Class="form-control " id="">
                                                    <option value="NAIK">NAIK</option>
                                                    <option value="TETAP">TETAP</option>
                                                    <option value="MENURUN">MENURUN</option>
                                                </select>
                                                </div>  
                                            </div> 
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="bunga">Jangka Waktu</label> 
                                                    <input type="text" id="bunga" class="form-control form-control-user " > 
                                                </div>
                                                <div class="col-sm-6"> 
                                                <label for="bunga">Jatuh Tempo</label> 
                                                    <input type="text" id="bunga" class="form-control form-control-user " autocomplete="off">
                                                </div>  
                                            </div> 
                                            <label for="bunga">jangka hari</label>
                                            <input type="text" id="bunga" class="form-control form-control-user " autocomplete="off">
                                        </div>
                                        <div class="col-sm-6"> 
                                            <label for="bunga">Meterai</label> 
                                            <input type="text" id="bunga" class="form-control form-control-user " autocomplete="off">
                                                    
                                            <label for="bunga">Provisi</label> 
                                            <input type="text" id="bunga" class="form-control form-control-user " autocomplete="off">
                                            
                                            <label for="bunga">Adm</label> 
                                            <input type="text" id="bunga" class="form-control form-control-user " autocomplete="off">
                                                    
                                            <label for="bunga">Premi</label> 
                                            <input type="text" id="bunga" class="form-control form-control-user " autocomplete="off">
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