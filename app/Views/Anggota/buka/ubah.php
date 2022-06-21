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
                                <?php
                                    $no = 1;
                                    foreach ($anggota as $row) { 
                                ?> 
                                <?= view('Myth\Auth\Views\_message_block') ?>
                                <form action="<?= base_url('anggota/store') ?>" method="post" class="user">
                                <?= csrf_field() ?>   
                                
                                <div class="form-group row"> 
                                            <div class="input-group mb-2 mr-sm-2"> 
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">No Anggota</div>
                                                </div>
                                                <input Readonly type="text" id="notab" class="form-control" name="no_anggota" placeholder="no simpanan" value="<?= $row->no_anggota ?>">           
                                            </div>
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Tanggal</div>
                                                </div>
												<input Readonly type="text" class="form-control"  value="<?= $row->created_at ?>">                                             	</div> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Kolektor</div>
                                                </div>
												<input Readonly type="text" class="form-control"  value="<?= $row->opr ?>">                                               </div> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Status Keanggotaan</div>
                                                </div>
												<input Readonly type="text" class="form-control"  value="<?= $row->st ?>">   												</div>
                                        	 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Nama</div>
                                                </div>
												<input Readonly type="text" class="form-control"  value="<?= $row->nama ?>">                                               </div> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">No Identitas</div>
                                                </div>
												<input Readonly type="text" class="form-control"  value="<?= $row->no_identitas ?>">                                               </div> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Tempat Lahir</div>
                                                </div>
												<input Readonly type="text" class="form-control"  value="<?= $row->tempat ?>">                                               </div> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                <div class="input-group-text">TGL Lahir</div>
                                                </div>
												<input Readonly type="text" class="form-control"  value="<?= $row->tanggal_lahir ?>">                                               </div>  
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Jenis Kelamin</div>
                                                </div> 
                                                <div class="radio-inline"> 
												<input Readonly type="text" class="form-control"  value="<?= $row->jk ?>">                                                   </div> 
                                            </div>  
                                        	<div class="input-group mb-2 mr-sm-2 ">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Status</div>
                                                </div>  
												<input Readonly type="text" class="form-control"  value="<?= $row->status ?>">    
                                            </div>  
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Alamat/Banjar</div>
                                                </div>
												<input Readonly type="text" class="form-control"  value="<?= $row->alamat ?>">                                               </div> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Desa</div>
                                                </div>
												<input Readonly type="text" class="form-control"  value="<?= $row->desa ?>">                                               </div>  
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Kecamatan</div>
                                                </div>
												<input Readonly type="text" class="form-control"  value="<?= $row->kecamatan ?>">                                               </div> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Telepon</div>
                                                </div> 
												<input Readonly type="text" class="form-control"  value="<?= $row->telp ?>">                                               </div>   
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Pekerjaan</div>
                                                </div>
                                                <input Readonly type="text" class="form-control"  value="<?= $row->pekerjaan ?>">           
                                            </div> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Username Terdaftar</div>
                                                </div>
                                                <input Readonly type="text" id="notab" class="form-control" placeholder="no simpanan" value="<?= $row->username ?>">           
                                        	</div>
                                    </div>  
                                </form>  
                            </div>
                        </div>
                    </div><?php } ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?= $this->endSection();?>