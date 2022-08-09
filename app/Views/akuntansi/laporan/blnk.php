<?= $this->extend('template/index');?>
<?= $this->section('content');?>
<div class="card-content margin" style="margin: 12px;">
				<div class="row">
					<div class="col s6 m6 l6">
						<h4 class="cardbox-text light left margin">KAS KELUAR</h4>
					</div>
				</div>
			</div>
<button id="cari" hidden data-toggle="modal" data-target="#tambah" class="btn  btn-primary"><i class="fas fa-plus"></i>Tambah</button>


<!-- modal tambah data --> 
    <!-- Modal --> 
    <div onload="myFunction()" class="modal fade"  id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <?=form_open_multipart('kas/cari')?>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">LAPORAN KAS MASUK DAN KELUAR</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">  
                        <!-- <h6 class="modal-title text-danger" id="exampleModalLabel">*Cari Berdasar Rentang Waktu</h6><br><br>  -->

                        <div class="form-group row"> 
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rekening</div>
                                </div>
                                <select class="form-control" id="rekening" name="rekening">
                                        <option value="">---Pilih Akun---</option> 
                                        <?php foreach($rekening as $key):?> 
                                            <option value="<?php echo  $key->kode_akun ?>"> 
                                            <?= $key->nama_akun; ?>
                                            </option>
                                        <?php endforeach ?>  
                                    </select>                                            
                            </div>
                        </div> 
                    <div class="form-group row"> 
                        
                        <div class="form-group row">
							<div class="col-sm-6 mb-3 mb-sm-0"> 
								<label for="pokok" class="form-control-user ">Dari Tanggal</label>
                                <input class="form-control form-control-user " type="date" name="awal" id="awal" onkeyup="myFunction()" value="<?= ($awal != null ? $awal: date('Y-m-').'01'); ?>">                        
							</div>
							<div class="col-sm-6">
								<label for="wajib" class="form-control-user ">Hingga Tanggal</label> 
                                <input class="form-control form-control-user " type="date" name="akhir" id="akhir" value="<?= ($akhir != null ? $akhir:date('Y-m-d')); ?>">
							</div> 
						</div>
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >Cari</button>
                </div> 
            </div>
                    
        </div>
        <?= form_close(); ?>
    </div>
<!-- akhir modal tambah data -->
 
<script>
 	window.onload=function(){
  document.getElementById("cari").click();
};
</script> 
<?= $this->endSection();?>