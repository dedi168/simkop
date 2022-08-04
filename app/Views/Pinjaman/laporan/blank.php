<?= $this->extend('template/index');?>
<?= $this->section('content');?>
<div class="card-content margin" style="margin: 12px;">
				<div class="row">
					<div class="col s6 m6 l6">
						<h4 class="cardbox-text light left margin">PINJAMAN</h4>
					</div>
				</div>
			</div>
<button id="cari" hidden data-toggle="modal" data-target="#tambah" class="btn  btn-primary"><i class="fas fa-plus"></i>Tambah</button>


<!-- modal tambah data --> 
    <!-- Modal --> 
    <div onload="myFunction()" class="modal fade"  id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <?=form_open_multipart('pinjaman/cari')?>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">LAPORAN SIMPANAN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> 
                        <div class="form-group row">
							<div class="col-sm-6 mb-3 mb-sm-0"> 
								<label for="pokok" class="form-control-user ">Jenis Laporan</label>
                                <select onchange="tampil(this.value)" name="jenis" class="form-control " id="jenis">
                                    <option value="">--Pilih Jenis Laporan---</option>
                                    <option value="sp">Laporan Saldo Pinjaman</option>
                                    <option value="pk">Laporan Pembayaran Kredit</option> 
                                    <option value="bba">Laporan Belum Bayar Angsuran</option>
                                    <option value="ajt">Laporan Angsuran Jatuh Tempo</option>
                                </select>							
                            </div>  
                            <div class="col-sm-6 mb-3 mb-sm-0" id="batas" style="display: none;"> 
								<label for="pokok" class="form-control-user ">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="AKTIF">AKTIF</option> 
                                    <option value="TUTUP">TUTUP</option> 
                                 
                                </select>							
                            </div>  
						</div>  <br>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onClick="history.go(-1);">Close</button>
                    <button type="submit" class="btn btn-primary" >Cari</button>
                </div> 
            </div>
                    
        </div>
        <?= form_close(); ?>
    </div>
<!-- akhir modal tambah data -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script src="<?= base_url(); ?>/js/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url(); ?>/js/jquery-ui.min.js"></script>
<script>
 	window.onload=function(){
  document.getElementById("cari").click(); 
 }; 
 function tampil(str) {  
    console.log(str);
    if (str == "sp") {
        $("#batas").css('display', 'block'); 
        return;
    }else {
        $("#batas").css('display', 'none'); 
    }  
    }
</script> 
<?= $this->endSection();?> 