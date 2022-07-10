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
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <h4>Periksa Entrian Form</h4>
                                        </hr />
                                        <?php echo session()->getFlashdata('error'); ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php endif; ?>
                                <form action="<?= base_url('anggota/update/'.$anggota->no_anggota) ?>" method="post" class="user">
                                <?= csrf_field() ?>   
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2"> 
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">No Anggota</div>
                                                </div>
                                                <input Readonly type="text" id="notab" class="form-control" name="no_anggota" placeholder="no simpanan" value="<?= $anggota->no_anggota ?>">           
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Tanggal</div>
                                                </div>
                                                <input readonly type="text" class="form-control" name="tanggal" value="<?= $anggota->created_at; ?>">
                                          </div>
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Kolektor</div>
                                                </div>
                                                <input readonly type="text" class="form-control" name="opr" value="<?= $anggota->opr;?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Status Keanggotaan</div>
                                                </div>
                                                <select name="st" class="form-control " id="status">
                                                <option <?php if ($anggota->st == "AKTIF") { echo 'selected'; }?> value="AKTIF">AKTIF</option>
                                            <option <?php if ($anggota->st == "MUNDUR") { echo 'selected'; }?> value="MUNDUR">MUNDUR</option>
                                        </select>                                     </div>
                                        </div>
                                    </div>
                                    <hr> 

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Nama</div>
                                                </div>
                                                <input type="text" class="form-control"value="<?= $anggota->nama ?>" name="nama" id="nama" placeholder="Nama">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">No Identitas</div>
                                                </div>
                                                <input type="text" class="form-control" id="no_id" value="<?= $anggota->no_identitas ?>" name="no_identitas" placeholder="Username">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Tempat Lahir</div>
                                                </div>
                                                <input type="text" class="form-control" value="<?= $anggota->tempat ?>" id="tempat_lahir"name="tempat" placeholder="tempat lahir">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                <div class="input-group-text">TGL Lahir</div>
                                                </div>
                                                <input type="date" class="form-control" id="tanggal_lahir" value="<?= $anggota->tanggal_lahir ?>"name="tanggal_lahir">
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
                                                    <label><input <?php if ($anggota->jk == "Laki Laki") { echo 'checked'; }?> type="radio" name="jk" value="Laki Laki"> Laki Laki</label>  &nbsp;
                                                    <label><input <?php if ($anggota->jk == "Perempuan") { echo 'checked'; }?> type="radio" name="jk" value="Perempuan"> Perempuan</label> 
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                        <div class="input-group mb-2 mr-sm-2 ">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Status</div>
                                                </div>  
                                                   <select class="form-control" name="status" id="">
                                                    <option <?php if ($anggota->status == "BELUM KAWIN") { echo 'selected'; }?> value="BELUM KAWIN">BELUM KAWIN</option>
                                                    <option <?php if ($anggota->status == "KAWIN") { echo 'selected'; }?> value="KAWIN">KAWIN</option>
                                                    <option <?php if ($anggota->status == "JANDA") { echo 'selected'; }?> value="JANDA">JANDA</option>
                                                    <option <?php if ($anggota->status == "DUDA") { echo 'selected'; }?> value="DUDA">DUDA</option>
                                                   </select> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Alamat/Banjar</div>
                                                </div>
                                                <input type="text" value="<?= $anggota->alamat?>" class="form-control" id="alamat" placeholder="alamat" name="alamat">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Desa</div>
                                                </div>
                                                <input type="text" class="form-control" value="<?= $anggota->desa?>" id="desa"name="desa" placeholder="desa">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Kecamatan</div>
                                                </div>
                                                <input type="text" class="form-control" value="<?= $anggota->kecamatan?>" id="kecamatan" name="kecamatan" placeholder="kecamatan">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Telepon</div>
                                                </div> 
                                                <input type="text" class="form-control" value="<?= $anggota->telp ?>" name="telp" id="telp" placeholder="telp">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Pekerjaan</div>
                                                </div>
                                                <input type="text" class="form-control" value="<?= $anggota->pekerjaan ?>" name="pekerjaan" id="pekerjaan" placeholder="pekerjaan">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Username Terdaftar</div>
                                                </div>
                                                <select class="form-control" id="users" name="id_user">
                                                    <?php foreach($users as $key):?> 
                                                            <option <?php if ($anggota->id_user == $key->id) { echo 'selected'; }?>  value="<?php echo  $key->id ?>">
                                                               <?php echo  $key->username; ?> 
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
    <?= $this->endSection();?>


    