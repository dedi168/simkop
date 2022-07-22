<?= $this->extend('template/index');?>
<?= $this->section('content');?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
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
                                    <h1 class="h4 text-gray-900 mb-4">Tutup / Perpanjang Deposito</h1>
                                </div> 
                                <?= view('Myth\Auth\Views\_message_block') ?>
                                <form action="<?= base_url('detaildeposito/store/') ?>" method="post" class="user" name="autoSumForm">
                                <?= csrf_field() ?>  
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
                                                    <div class="input-group-text">Tanggal</div>
                                                </div>
                                                <input readonly type="text" class="form-control" name="tgl" value="<?= date('Y-m-d'); ?>">
                                          </div>
                                        </div>
                                    </div> 

                                    <hr> 

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">No Deposito</div>
                                                </div>
                                                <select class="form-control" id="no_deposito" name="no_deposito">
                                                <!-- <select onmousedown="if(this.options.length>3){this.size=3;}" onchange="this.blur()"  onblur="this.size=0;" class="form-control" id="no_deposito" name="no_deposito"> -->
                                                    <option value="">
                                                        <--Pilih no deposito -->
                                                    </option>
                                                    <?php foreach($deposito as $key):?> 
                                                         <option  value="<?php echo  $key->no_deposito ?>">
                                                            <?php echo  $key->no_deposito ?>  
                                                        </option>
                                                    <?php endforeach ?>
                                                </select>                                              
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Jumlah</div>
                                                </div>
                                                <input type="text" class="form-control" id="jumlah"name="jumlah"  autocomplete="off" value="" onFocus="startCalc();" onBlur="stopCalc();"> 
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Nama</div>
                                                </div>
                                                <input type="text" class="form-control" name="nama" id="nama">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Jatuh Tempo</div>
                                                </div>
                                                <input type="text" class="form-control" id="jatuh_tempo"name="jatuh_tempo">
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Bunga</div>
                                                </div>
                                                <input type="text" class="form-control" name="bunga" id="bunga"  autocomplete="off" value="" onFocus="startCalc();" onBlur="stopCalc();">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">No Tabungan</div>
                                                </div>
                                                <input type="text" class="form-control" name="no_tabungan" id="no_tabungan" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Sistem</div>
                                                </div>
                                                <input type="text" class="form-control" name="sistem" id="sistem" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Jangka waktu</div>
                                                </div>
                                                <input type="text" class="form-control" name="jangka_waktu" id="jangka_waktu" placeholder="ahli_waris">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Tanggal Daftar</div>
                                                </div>
                                                <input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="ahli_waris">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                <div class="input-group-prepend">
                                                    <!-- <div class="input-group-text">Jangka waktu</div> -->
                                                </div>
                                                <!-- <input type="text" class="form-control" name="ahli_waris" id="ahli_waris" placeholder="ahli_waris"> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <hr>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">STATUS</div>
                                                </div>
                                                <select class="form-control" name="status" id="status" onchange="tampil(this.value)">
                                                    <option value="1">TUTUP</option>
                                                    <option value="0">PERPANJANG</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Saldo</div>
                                                </div>
                                                <input type="text" class="form-control" id="saldo"name="saldo" >
                                                <!-- simpanan -->
                                                <input type="hidden" class="form-control" id="saldoS" name="saldoS" >
                                                <?php
                                                    $no = 1;
                                                    foreach ($bungaS as $row) {
                                                        $bungaS=$row->bunga;
                                                    }
                                                ?> 
                                                <input type="hidden" id="bungaS" name="bungaS" class="form-control "readonly autocomplete="off" value="<?= $bungaS; ?>">
                                                <input type="hidden" id="simpan" name="simpan" class="form-control "readonly autocomplete="off" value="<?= $bungaS; ?>">
                                            
                                            </div>
                                        </div>
                                    </div>
                                     
                                    <div class="col" id="batas" style="display: none;">
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Jangka Waktu</div>
                                                </div>
                                                <select class="form-control" id="jangka_waktu1" name="jangka_waktu1">
                                                    <option value="">
                                                        <--Pilih Jangka Waktu-->
                                                    </option>
                                                    <?php foreach($bunga as $key):?> 
                                                         <option  value="<?php echo  $key->id ?>">
                                                            <?php echo  $key->jangka ?> &nbsp; Bunga
                                                        </option>
                                                    <?php endforeach ?>
                                                </select> 
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Jatuh Tempo</div>
                                                </div>
                                                <input readonly type="text" class="form-control " name="jatuh_tempo1" id="jt1"
                                            placeholder="jatuh tempo" value=" " v-model="jt">                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Bunga Baru</div>
                                                </div>
                                                <input type="text" readonly class="form-control" id="bunga1" name="bunga1">&nbsp;% Per Tahun

                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <!-- <div class="input-group-prepend">
                                                    <div class="input-group-text">Jumlah</div>
                                                </div>
                                                <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="jumlah"> -->
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <hr> 
                                    <button type="submit" class="btn btn-primary btn-user btn-block"> Simpan </button>
                                  
                                </form>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div> 
<!-- display sub jenis    -->
<script src="<?= base_url(); ?>/js/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url(); ?>/js/jquery-ui.min.js"></script>

    <script type="text/javascript">  

        $('#no_deposito').on('change',function(){
            let id = $(this).val() 
            
            console.log(id);
            $.ajax({
                url: "http://localhost:8080/detaildeposito/getNoDeposito/" + id,
                type: 'get', 
                success: function(data) {
                    var row=JSON.parse(data) 
                    console.log(row.nama);
                    bunga=((row.bunga*1)/12)*(row.jangka*1);
                    bung=(bunga*1)*(row.jumlah*1).toFixed(2);
                    nbunga=((bung*1)/100)+(row.jumlah*1); 
                    $('#nama').val(row.nama)
                    $('#tanggal').val(row.tgl) 
                    $('#jumlah').val(row.jumlah)
                    $('#bunga').val(row.bunga)
                    $('#no_tabungan').val(row.no_tabungan)
                    $('#sistem').val(row.sistem)
                    $('#jatuh_tempo').val(row.jatuh_tempo)
                    $('#jangka_waktu').val(row.jangka)
                    $('#saldo').val(nbunga)   
                    one=row.jumlah_simpanan; 
                    bungas=$('#bungaS').val();
                    bung=(bungas/12).toFixed(2); 
                    nbungas=(one*1)*((bung*1)/100);
                    simpan=(one*1)+(nbungas*1)+(nbunga*1); 
                    console.log(nbunga); 
                    $('#simpan').val(simpan)  
                    $('#saldoS').val(row.jumlah_simpanan) 
                   
                }
            })
        })

        $('#jangka_waktu1').on('change',function(){
            let id = $(this).val() 
            
            console.log(id);
            $.ajax({
                url: "http://localhost:8080/deposito/getBunga/" + id,
                type: 'get', 
                success: function(data) {
                    var bunga=JSON.parse(data) 
                    $('#bunga1').val(bunga.bunga)  

                    var jk = -1;
                    jk=bunga.jangka;
                    jk = parseInt(jk); 
                    var date = new Date(<?=date('Y')?>, <?=date('m')?>, <?=date('d')?>);
                
                    var jt_tempo = new Date(date.getFullYear(), date.getMonth()- 1 +jk, date.getDate(), 0, 0, 0, 0);
                    document.getElementById('jt1').value = jt_tempo.toDateString();

                }
            })
        })

        function tampil(str) {  
            if (str == "1") {
                $("#batas").css('display', 'none'); 
                return;
            }else {
                $("#batas").css('display', 'block'); 
            }  
        }
    </script> 
<?= $this->endSection();?>
    