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
                                    <h1 class="h4 text-gray-900 mb-4">ANGGOTA BARU</h1>
                                </div>
                                <?= view('Myth\Auth\Views\_message_block') ?>
                                <form action="<?= base_url('anggota/store') ?>" method="post" class="user">
                                <?= csrf_field() ?>   
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                            <?php  
                                                $no = 1;
                                                foreach ($anggota as $row) { 
                                                $no_ang = (int) substr($row->no_anggota, 4, 5); 
                                                $no_ang++; 
                                                $kode = "523";
                                                $no_anggot = $kode . sprintf("%05s", $no_ang);
                                                }
                                            ?>
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">No Anggota</div>
                                                </div>
                                                <input readonly type="text" class="form-control" name="no_anggota" value="<?= $no_anggot ?>">           
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Tanggal</div>
                                                </div>
                                                <input readonly type="text" class="form-control" name="tanggal" value="<?= date('d-M-Y'); ?>">
                                          </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Kolektor</div>
                                                </div>
                                                <input readonly type="text" class="form-control" name="opr" value="<?= user()->username;?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Status Keanggotaan</div>
                                                </div>
                                                <select name="st" class="form-control " id="status">
                                            <option value="AKTIF">AKTIF</option>
                                            <option value="MUNDUR">MUNDUR</option>
                                        </select>                                            </div>
                                        </div>
                                    </div>

                                    <hr> 

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Nama</div>
                                                </div>
                                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">No Identitas</div>
                                                </div>
                                                <input type="text" class="form-control" id="no_id"name="no_identitas" placeholder="Username">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Tempat Lahir</div>
                                                </div>
                                                <input type="text" class="form-control" id="tempat_lahir"name="tempat" placeholder="tempat lahir">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                <div class="input-group-text">TGL Lahir</div>
                                                </div>
                                                <input type="date" class="form-control" id="tanggal_lahir"name="tanggal_lahir">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Jenis Kelamin</div>
                                                </div> 
                                                <div class="radio-inline">  &nbsp;
                                                    <label><input type="radio" name="jk" value="Laki Laki"> Laki Laki</label>  &nbsp;
                                                    <label><input type="radio" name="jk" value="Perempuan"> Perempuan</label> 
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                        <div class="input-group mb-2 mr-sm-2 ">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Status</div>
                                                </div> 
                                                <div class="radio-inline">  &nbsp;
                                                   <select  name="status" id="">
                                                    <option value="BELUM KAWIN">BELUM KAWIN</option>
                                                    <option value="KAWIN">KAWIN</option>
                                                    <option value="JANDA">JANDA</option>
                                                    <option value="DUDA">DUDA</option>
                                                   </select>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Alamat/Banjar</div>
                                                </div>
                                                <input type="text" class="form-control" id="alamat" placeholder="alamat" name="alamat">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Desa</div>
                                                </div>
                                                <input type="text" class="form-control" id="desa"name="desa" placeholder="desa">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Kecamatan</div>
                                                </div>
                                                <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="kecamatan">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Telepon</div>
                                                </div> 
                                                <input type="text" class="form-control" name="telp" id="telp" placeholder="telp">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Pekerjaan</div>
                                                </div>
                                                <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="pekerjaan">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Username Terdaftar</div>
                                                </div>
                                                <select class="form-control" id="users" name="id_user">
                                                    <option value="">
                                                        <--Pilih Username -->
                                                    </option>
                                                    <?php foreach($users as $key):?>
                                                            
                                                         <option value="<?php echo  $key->id ?>">
                                                            <?php echo  $key->username ?> 
                                                        </option>
                                                    <?php endforeach ?>
                                                </select>                                            </div>
                                        </div>
                                    </div>
                                    <hr> 
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