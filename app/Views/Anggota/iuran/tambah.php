<?= $this->extend('template/index');?>
<?= $this->section('content');?>
<?php 
	$bulan = array(
		'01' => 'JANUARI',
		'02' => 'FEBRUARI',
		'03' => 'MARET',
		'04' => 'APRIL',
		'05' => 'MEI',
		'06' => 'JUNI',
		'07' => 'JULI',
		'08' => 'AGUSTUS',
		'09' => 'SEPTEMBER',
		'10' => 'OKTOBER',
		'11' => 'NOVEMBER',
		'12' => 'DESEMBER',
	); 
?>
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
                                    <h1 class="h4 text-gray-900 mb-4">Iuran Anggota</h1>
                                </div>
                                <?= view('Myth\Auth\Views\_message_block') ?>
                                <form name="autoSumForm" action="<?= base_url('iuran/store') ?>" method="post" class="user">
                                <?= csrf_field() ?>   
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2"> 
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Tanggal</div>
                                                </div>
                                                <input name="tgl_bayar" type="text" class="form-control" readonly value="<?= date('d-M-Y'); ?>">                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Operator</div>
                                                </div>
                                                <input type="text" name="opr"class="form-control" readonly value="<?= user()->username;?>">
                                          </div>
                                        </div>
                                    </div>
                                     
                                    <hr> 

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2" >
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">No Anggota</div>
                                                </div>
                                                <select class="form-control" id="no_anggota" name="no_anggota">
                                                    <option value="">
                                                        <--Pilih no_anggota -->
                                                    </option>
                                                    <?php foreach($anggota as $key):?> 
                                                         <option  value="<?php echo  $key->no_anggota ?>">
                                                            <?php echo  $key->no_anggota ?>  
                                                        </option>
                                                    <?php endforeach ?>
                                                </select>  
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Nama</div>
                                                </div> 
                                                <input type="text" id="nama" class="form-control form-control"placeholder="nama" value="<?= old('nama'); ?>" name="nama" >                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Jenis Simpanan</div>
                                                </div>
                                                <select name="jenis_simpanan" class="form-control" required> 
                                                    <option value="Pokok & Wajib">Pokok & Wajib</option>
                                                    <option value="Pokok">Pokok</option>
                                                    <option value="Wajib">Wajib</option> 
                                                </select>                                            
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Jumlah Bulan</div>
                                                </div>
                                                    <select name="jumlah_bln" class="bln form-control " id="jumlah_bln">
                                                        <option value="1 Bulan">1 Bulan</option>
                                                        <option value="2 Bulan">2 Bulan</option> 
                                                        <option value="3 Bulan">3 Bulan</option>
                                                        <option value="4 Bulan">4 Bulan</option> 
                                                        <option value="5 Bulan">5 Bulan</option>
                                                        <option value="6 Bulan">6 Bulan</option> 
                                                        <option value="7 Bulan">7 Bulan</option>
                                                        <option value="8 Bulan">8 Bulan</option> 
                                                        <option value="9 Bulan">9 Bulan</option>
                                                        <option value="10 Bulan">10 Bulan</option> 
                                                        <option value="11 Bulan">11 Bulan</option>
                                                        <option value="12 Bulan">12 Bulan</option> 
                                                    </select>                                            
                                                </div>
                                            </div>
                                        </div>
                                        
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Mulai Bulan</div>
                                                </div>  
                                                    <input name="bln_m" type="text" class="form-control" value="<?= (strtolower($bulan[date('m')])); ?>">                                                
                                                    <input name="thn_m" type="text" class="form-control" value="<?= date('Y'); ?>">   
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                                    <div class="input-group-text">Jumlah Bayar</div>
                                                </div>
                                                <input type='text' name="jumlah" class="form-control" value="1" onFocus="startCalc();" onBlur="stopCalc();"  /></div>
                                        </div> 
                                        </div> 
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                                    <div class="input-group-text">Pokok</div>
                                                </div>
                                                <?php foreach($miuran as $key):?>  
                                                <input value="<?=  $key->pokok ?>  " type='text' name='pokok' class="form-control"  onFocus="startCalc();" onBlur="stopCalc();" /> </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                                    <div class="input-group-text">Wajib</div>
                                                </div>
                                                <input type='text' value="<?=  $key->wajib ?>  " name="wajib" class="form-control"  onFocus="startCalc();" onBlur="stopCalc();"  /></div>
                                                <?php endforeach ?>
                                            </div>
                                    </div> 
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Sisa</div>
                                                </div>
                                                <input type="text" name="sisa" class="form-control"  value="0" readonly>     </div>                                   
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
    <script src="<?= base_url(); ?>/js/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url(); ?>/js/jquery-ui.min.js"></script>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> -->
   

<!-- menghitung iuran -->
    <script>

        function startCalc(){

        interval = setInterval("calc()",1);}

        function calc(){

        one = document.autoSumForm.jumlah.value;

        two = document.autoSumForm.pokok.value;

        three = document.autoSumForm.wajib.value;

        document.autoSumForm.sisa.value = (one * 1) - (two * 1) - (three * 1);}

        function stopCalc(){

        clearInterval(interval);}

    </script>   
  
    <script> 
            
        $('#no_anggota').on('change',function(){
            let id = $(this).val() 
            $.ajax({
                url: "http://localhost:8080/iuran/getAnggota/" + id,
                type: 'get', 
                success: function(data) {
                    var agt=JSON.parse(data) 
                    $('#nama').val(agt.nama)

                }
            })
        })
    </script> 
    <?= $this->endSection();?>