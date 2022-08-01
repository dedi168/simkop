
<?= $this->extend('template/index');?>
<?= $this->section('content');?>
<div class="row show-on-large hide-on-small-only">
	<div class="col s12 ">
		<div class="card">
			<div class="card-content margin" style="margin: 12px;">
				<div class="row">
					<div class="col s6 m6 l6">
						<h4 class="cardbox-text light left margin">LAPORAN ANGGOTA</h4>
					</div>
				</div>
			</div>
			<br>
            <div class="col-sm-11">
                <form action="<?= base_url('anggota/laporan') ?>" method="post">
                    <div class="form-group row"> 
                        <div class="col-sm-4 mb-3 mb-sm-0"> 
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rekening</div>
                                </div>
                                <input type="text" disabled name="" id="" onkeyup="myFunction()" value="<?= ($status != null ? $status:null); ?>">
                                <input type="text" hidden name="status" id="status" onkeyup="myFunction()" value="<?= ($status != null ? $status:null); ?>">
                            </div>
                        </div>  
                        <div class="col-sm-4 mb-3 mb-sm-0"> 
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Dari Tanggal</div>
                                </div>
                                <input type="date" disabled name="" id="" onkeyup="myFunction()" value="<?= ($awal != null ? $awal:null); ?>">
                                <input type="date" hidden name="awal" id="awal" onkeyup="myFunction()" value="<?= ($awal != null ? $awal:null); ?>">
                            </div>
                        </div>  
                        <div class="col-sm-4 mb-3 mb-sm-0"> 
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Hingga Tanggal</div>
                                </div>
                                <input type="date" disabled name="" id="" value="<?= ($akhir != null ? $akhir:date('Y-m-d')); ?>">
                                <input type="date" hidden name="akhir" id="akhir" value="<?= ($akhir != null ? $akhir:date('Y-m-d')); ?>">
                            </div>
                        </div>  
                    </div>
                    <div class="form-group row">  
                        <div class="col-sm-2 mb-3 mb-sm-0"> 
                            <div class="input-group mb-2 mr-sm-2">   
                            <button type="" class="btn btn-primary btn-user btn-block"><i class="fa fa-print" aria-hidden="true"></i> Cetak </button>
                            </div>
                        </div>   
                    </div>
                </form>
            </div>
			<div class="divider"></div>
			    <?php if (!empty(session()->getFlashdata('message'))) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo session()->getFlashdata('message'); ?>
                        <button type="button" class="close" data-dismiss="alert"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div> 
                <?php endif; ?> 
                <?php if ($judul!="") {?>
                    <div class="col-lg-8"> 
                        <table class="table table-bordered" > 
                            <tr>
                                <th><center><h4><?= $kalimat=strtoupper($judul); ?></h4></center> </th>
                            </tr>
                            
                        </table>
                    </div>
                    
                <?php } else {?>
                    <div class="col-lg-8"> 
                        <table class="table table-bordered" id ="myTable">
                        <thead>
				<tr>
					<th width="10%">No</th>
					<th width="20%">No Anggota</th> 
					<th width="30%">Nama</th>  
                    <th width="30%">Alamat</th>
					<th width="10%">Status Keanggotaan</th>  
				</tr>
				</thead>
				<tbody>
				<?php
					$no = 1;
					foreach ($anggota as $row) {
				?>
					<tr> 
						<td class="grey-text text-darken-1"><?= $no ?></td>
                        <td class="grey-text text-darken-1"><?= $row->no_anggota; ?></td> 
						<td class="grey-text text-darken-1"><?= $row->nama; ?></td>
						<td class="grey-text text-darken-1"><?= $row->alamat; ?></td> 
						<td class="grey-text text-darken-1"><?= $row->st; ?></td>  		
					</tr>
					<?php
						$no++;	}
					?>
                </tbody>
                        </table> 
                    </div>
                <?php } ?>
		    </div>
	</div>
</div>  
<?= $this->endSection();?>