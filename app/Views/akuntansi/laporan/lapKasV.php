
<?= $this->extend('template/index');?>
<?= $this->section('content');?>
<div class="row show-on-large hide-on-small-only">
	<div class="col s12 ">
		<div class="card">
			<div class="card-content margin" style="margin: 12px;">
				<div class="row">
					<div class="col s6 m6 l6">
						<h4 class="cardbox-text light left margin">KAS KELUAR</h4>
					</div>
				</div>
			</div>
			<br>
            <div class="col-sm-11">
                <form action="<?= base_url('kas/cetak') ?>" method="post">
                    <div class="form-group row"> 
                        <div class="col-sm-4 mb-3 mb-sm-0"> 
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rekening</div>
                                </div>
                                <input type="text" disabled name="" id="" onkeyup="myFunction()" value="<?= $rekening ?>">
                                <input type="text" hidden name="awal" id="awal" onkeyup="myFunction()" value="<?= ($awal != null ? $awal:null); ?>">
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
                                <th><center><h2><?= strtoupper($judul); ?></h2></center> </th>
                            </tr>
                            
                        </table>
                    </div>
                    
                <?php } else {?>
                    <div class="col-lg-8"> 
                        <table class="table table-bordered" id ="myTable">
                            <thead class="thead-light ">
                            <tr>
                                <th>No</th>
                                <th>NO Jurnal</th>
                                <th>Rekening</th>
                                <th>Tanggal</th>
                                <th>Kredit</th> 
                                <th>Debet</th>    
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($kas as $row) {
                                ?>
                                <tr>
                                    <td class="grey-text text-darken-1"><?= $no ?></td>
                                    <td class="grey-text text-darken-1"><?= $row->no_jurnal; ?> </td>
                                    <td class="grey-text text-darken-1"><?= $row->nama_akun; ?> </td>
                                    <td class="grey-text text-darken-1"><?= substr($row->created_at,0,10) ;?></td> 
                                    <td class="grey-text text-darken-1"><?= $row->kredit;?></td>  
                                    <td class="grey-text text-darken-1"><?= $row->debet;?></td>    
                                </tr>
                                <?php
                                $no++;	
                                }
                                    
                                ?>
                                <tr>
                                    <td class="grey-text text-darken-1" colspan="4">jumlah</td> 
                                    <td class="grey-text text-darken-1"><?= $kredit->kredit;?></td>
                                    <td class="grey-text text-darken-1"><?= $debet->debet;?></td>    
                
                                </tr> 
                            </tbody>
                        </table> 
                    </div>
                <?php } ?>
		    </div>
	</div>
</div>  
<?= $this->endSection();?>