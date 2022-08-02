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
                                    <h1 class="h4 text-gray-900 mb-4">BUKA DEPOSITO BARU</h1>
                                </div> 
                                <?= view('Myth\Auth\Views\_message_block') ?>
                                <form action="<?= base_url('deposito/store') ?>" method="post" class="user">
                                <?= csrf_field() ?>  
                                <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                            <?php  
                                                $no = 1;
                                                foreach ($deposito as $row) { 
                                                $no_deposit = (int) substr($row->no_deposito, 4, 5); 
                                                $no_deposit++; 
                                                $kode = "753";
                                                $no_deposito = $kode . sprintf("%05s", $no_deposit);
                                                }
                                            ?>
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">No Deposito</div>
                                                </div>
                                                <input readonly type="text" class="form-control" name="no_deposito" value="<?= $no_deposito ?>">           
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
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Kolektor</div>
                                                </div>
                                                <input readonly type="text" class="form-control" name="operator" value="<?= user()->username;?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Status Keanggotaan</div>
                                                </div>
                                                <select name="status" class="form-control " id="status">
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
                                                    <div class="input-group-text">Alamat</div>
                                                </div>
                                                <input type="text" class="form-control" id="alamat"name="alamat" placeholder="alamat">
                                            </div>
                                        </div>
                                    </div> 
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
                                                    <div class="input-group-text">Telepon</div>
                                                </div>
                                                <input type="text" class="form-control" id="telp"name="telp" placeholder="telp">
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Ahli Waris</div>
                                                </div>
                                                <input type="text" class="form-control" name="ahli_waris" id="ahli_waris" placeholder="ahli_waris">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <hr>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Jenis Deposito</div>
                                                </div>
                                                <select class="form-control" name="jenis" id="jenis">
                                                    <option value="UMUM">UMUM</option>
                                                    <option value="JANGKA PANJANG">JANGKA PANJANG</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Mulai</div>
                                                </div>
                                                <input type="date" class="form-control" id="mulai"name="mulai" placeholder="mulai" value="<?= date("Y-m-d");?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Jangka Waktu</div>
                                                </div>
                                                <select class="form-control" id="jangka_waktu" name="jangka_waktu">
                                                    <option value="">
                                                        <--Pilih Jangka Waktu-->
                                                    </option>
                                                    <?php foreach($bunga as $key):?> 
                                                         <option  value="<?php echo  $key->id ?>">
                                                            <?php echo  $key->jangka ?> &nbsp; Bulan
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
                                                <input readonly type="text" class="form-control " name="jatuh_tempo" id="jt"
                                            placeholder="jatuh tempo" id="jt"value=" " v-model="jt">                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Bunga</div>
                                                </div>
                                                <input type="text" readonly class="form-control" id="bunga" name="bunga">&nbsp;% Per Tahun

                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Jumlah</div>
                                                </div>
                                                <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="jumlah">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Tipe</div>
                                                </div>
                                            <select name="sistem" class="form-control" id="sistem">
                                                <option value="AMBIL">AMBIL</option>
                                                <option value="TABUNG">TABUNG</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Perpanjangan</div>
                                                </div>
                                                <input type="text" readonly class="form-control" id="perpanjangan"name="perpanjangan" placeholder="perpanjangan" value="MANUAL">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">No Simpanan</div>
                                                </div>
                                                <select class="form-control" id="no_tabungan" name="no_tabungan" >
                                                    <option value="">
                                                        <--Pilih no Tabungan -->
                                                    </option>
                                                    <?php foreach($simpanan as $key):?> 
                                                         <option  value="<?php echo  $key->no_tabungan ?>">
                                                            <?php echo  $key->no_tabungan ?>  
                                                        </option>
                                                    <?php endforeach ?>
                                                </select>   
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2"> 
                                                <input type="text" class="form-control" readonly id="atsnm"name="atsnm" placeholder="Atas Nama">
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
        $('#no_anggota').on('change',function(){
            let id = $(this).val() 
            
            console.log(id);
            $.ajax({
                url: "http://localhost:8080/deposito/getAnggota/" + id,
                type: 'get', 
                success: function(data) {
                    var agt=JSON.parse(data) 
                    $('#nama').val(agt.nama)
                    $('#alamat').val(agt.alamat) 
                    $('#telp').val(agt.telp)

                }
            })
        })

        $('#no_tabungan').on('change',function(){
            let id = $(this).val() 
            
            console.log(id);
            $.ajax({
                url: "http://localhost:8080/deposito/getSimpanan/" + id,
                type: 'get', 
                success: function(data) {
                    var agt=JSON.parse(data) 
                    $('#atsnm').val(agt.nama) 

                }
            })
        })
        $('#jangka_waktu').on('change',function(){
            let id = $(this).val() 
            
            console.log(id);
            $.ajax({
                url: "http://localhost:8080/deposito/getBunga/" + id,
                type: 'get', 
                success: function(data) {
                    var bunga=JSON.parse(data) 
                    $('#bunga').val(bunga.bunga)  

                    var jk = -1;
                    jk=bunga.jangka;
                    jk = parseInt(jk); 
                    var date = new Date(<?=date('Y')?>, <?=date('m')?>, <?=date('d')?>);
                
                    var jt_tempo = new Date(date.getFullYear(), date.getMonth()- 1 +jk, date.getDate(), 0, 0, 0, 0);
                    document.getElementById('jt').value = jt_tempo.toISOString().substr(0,10);

                }
            })
        })
    </script> 
<?= $this->endSection();?>
    