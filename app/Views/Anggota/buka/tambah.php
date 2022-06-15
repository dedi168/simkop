<?= $this->extend('template/index');?>
<?= $this->section('content');?>
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
                                    <h1 class="h4 text-gray-900 mb-4">BUKA SIMPANAN BARU</h1>
                                </div>
                                <?= view('Myth\Auth\Views\_message_block') ?>
                                <form action="<?= route_to('register') ?>" method="post" class="user">
                                <?= csrf_field() ?>  
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                        <?php  
                                        $no = 1;
                                        foreach ($simpanan as $row) { 
                                        $no_tab = (int) substr($row->no_tabungan, 4, 5); 
                                        $no_tab++; 
                                        $kode = "523-";
                                        $no_tabung = $kode . sprintf("%05s", $no_tab);
                                        }
                                        ?>
                                            <label for="notab">Nomor Tabungan</label>
                                            <input type="text" readonly id="notab" class="form-control" name="no_tabungan" placeholder="no simpanan" value="<?= $no_tabung ?>">                                        </select>
                                        </div>
                                        <div class="col-sm-6">
                                        <label for="tgl">Tanggal</label>
                                        <input type="text" class="form-control" readonly value="<?= date('d-M-Y'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="kolektor">kolektor</label>
                                            <input type="text" class="form-control" readonly value="<?= user()->username;?>">
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
                                    <hr>
                                    <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0"> 
                                        <label for="bunga">NO Anggota</label>
                                        <input type="text" class="form-control form-control-user" name="email"
                                        placeholder="no simpanan" value="<?= old('no') ?>">
                                    </div>  
                                    </div>  
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control form-control-user <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" name="email"
                                        placeholder="no simpanan" value="<?= old('no_tabungan') ?>">
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="bunga">tgl lahir</label>
                                        <input type="date" class="form-control form-control-user <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" name="email"
                                        placeholder="no simpanan" value="<?= old('no_tabungan') ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="bunga">Alamat</label>
                                            <input type="text" class="form-control form-control-user <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" name="email"
                                            placeholder="no simpanan" value="<?= old('no_tabungan') ?>">
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="kolektor">Pekerjaan</label>
                                            <input type="invisible" class="form-control form-control-user <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" name="password"
                                                 autocomplete="off" placeholder="<?=lang('Auth.password')?>">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row"> 
                                            <label for="bunga">Bunga</label>   
                                            <div class="col-md-4 mb-3">
                                            <?php
                                                $no = 1;
                                                foreach ($bunga as $row) {
                                                    $bunga=$row->bunga;
                                                }
                                            ?>
                                            <input type="text" id="bunga" class="form-control "readonly autocomplete="off" value="<?= $bunga; ?>"></div>% Per Tahun
                                         
                                        
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