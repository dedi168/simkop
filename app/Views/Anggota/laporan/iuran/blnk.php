<?= $this->extend('template/index');?>
<?= $this->section('content');?>
<div class="card-content margin" style="margin: 12px;">
				<div class="row">
					<div class="col s6 m6 l6">
						<h4 class="cardbox-text light left margin">IURAN ANGGOTA</h4>
					</div>
				</div>
			</div>
<button id="cari" hidden data-toggle="modal" data-target="#tambah" class="btn  btn-primary"><i class="fas fa-plus"></i>Tambah</button>


<!-- modal tambah data --> 
    <!-- Modal --> 
    <div onload="myFunction()" class="modal fade"  id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <?=form_open_multipart('iuran/cari')?>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">LAPORAN IURAN ANGGOTA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">   
                <div class="form-group row">  
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Jenis Laporan</div>
                            </div>
                            <select name="jenis" class="form-control " id="jenis">
                                <option value="di">Laporan Daftar Iuran</option>
                                <option value="bbi">Laporan Belum Bayar Iuran</option>
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