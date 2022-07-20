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
                                    <h1 class="h4 text-gray-900 mb-4">PENARIKAN SIMPANAN</h1>
                                </div> 
                                <?= view('Myth\Auth\Views\_message_block') ?>
                                <form action="<?= base_url('tariksimpanan/store') ?>" method="post" class="user"  name="autoSumForm">
                                <?= csrf_field() ?>  
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="tgl">Tanggal</label>
                                        <input type="text" name="tgl" id="tgl" class="form-control" readonly value="<?= date('Y-m-d'); ?>">

                                        <input type="hidden" name="created_at" id="tgl" class="form-control" value="<?= date('Y-m-d h:i'); ?>">
                                        <input type="hidden" name="updated_at" id="tgl" class="form-control" value="<?= date('Y-m-d h:i'); ?>">                                         </div>
                                        <div class="col-sm-6">
                                            <label for="opr">Operator</label>
                                            <input type="text" id="opr" name="opr" class="form-control" readonly value="<?= user()->username;?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="bunga">NO Tabungan</label>
                                            <select class="form-control" id="no_tabungan" name="no_tabungan">
                                                <option value="">
                                                    <--Pilih no tabungan -->
                                                </option>
                                                <?php foreach($simpanan as $key):?> 
                                                    <option  value="<?php echo  $key->no_tabungan ?>">
                                                        <?php echo  $key->no_tabungan ?>  
                                                    </option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-6"> 

                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                        <label for="nama">Nama</label>
                                            <input type="text" class="form-control " name="nama" id="nama" placeholder="nama" readonly>
                                        </div>  
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control " name="alamat" id="alamat" placeholder="alamat" readonly>
                                        </div>
                                    </div>  
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="pekerjaan">Pekejaan</label>
                                            <input type="text" class="form-control " name="pekerjaan" id="pekerjaan" placeholder="pekerjaan" readonly>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="telp">Telepon</label>
                                        <input type="text" class="form-control " name="telp" id="telp" 
                                        placeholder="no simpanan"readonly> 
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="alamat">No Anggota</label>
                                        <input type="text" class="form-control " name="no_anggota" id="no_anggota"
                                        placeholder="no_anggota" readonly>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="telp">Saldo</label>
                                        <input type="text" class="form-control " name="saldo" id="saldo" onFocus="startCalc();" onBlur="stopCalc();"
                                        placeholder="saldo" value="0" readonly>
                                        </div>
                                    </div>
                                    <hr> 
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="jenis_simpanan">Jenis Simpanan</label> 
                                        <input type="text" id="jenis_simpanan" name="jenis_simpanan" class="form-control "readonly autocomplete="off" value="DEBET">

                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="alamat">Kode Transaksi</label>
                                            <select name="kode" id="kode" onchange="trns(this.value)" class="form-control ">
                                                <option value="">Pilih Kode Transaksi</option>
                                                <option value="500">500</option>
                                                <option value="507">507</option>
                                                <option value="510">510</option>
                                                <option value="513">513</option>
                                                <option value="515">515</option>
                                                <option value="523">523</option>
                                                <option value="525">525</option>
                                                <option value="580">580</option>
                                                <option value="584">584</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="telp">transaksi</label>
                                        <input type="text" class="form-control " readonly name="transaksi" id="transaksi"
                                         value="-">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="jumlah">Jumlah</label>   
                                        <input type="number" id="jumlah" name="jumlah" class="form-control " autocomplete="off" value="" onFocus="startCalc();" onBlur="stopCalc();">
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                        <label for="jumlah">Jumlah Simpanan</label>   
                                        <input type="number" id="jumlahS" name="jumlahS" class="form-control " autocomplete="off" value="0">
                                        </div>
                                    </div> 
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
<!-- perhitungan -->
   <script type="text/javascript">
    function startCalc(){
        interval=setInterval("calc()",1)
    }
    function calc(){
        one=document.autoSumForm.saldo.value;
        two=document.autoSumForm.jumlah.value;
        document.autoSumForm.jumlahS.value=(one*1)-(two*1)
    }
    function stopCalc(){
        clearInterval(interval)
    } 
         
        function trns(str) {  
            console.log(str);
            if (str == "500") {
                $('#transaksi').val("Penarikan Tunai")
            }else if (str == "507") {
                $('#transaksi').val("Penarikan Pemindah Buku")
            }else if (str == "510") {
                $('#transaksi').val("Tolakan Masuk")
            }else if (str == "513") {
                $('#transaksi').val("Tolakan Masuk")
            }else if (str == "515") {
                $('#transaksi').val("Nota Debet")
            }else if (str == "523") {
                $('#transaksi').val("Biaya Penutupan Rekening")
            }else if (str == "525") {
                $('#transaksi').val("Biaya Transfer")
            }else if (str == "580") {
                $('#transaksi').val("Biaya Administrasi")
            }else if (str == "584") {
                $('#transaksi').val("Pajak Bunga")
            }  
        }
 
            
        $('#no_tabungan').on('change',function(){
            let id = $(this).val() 
            $.ajax({
                url: "http://localhost:8080/detailsimpanan/getDataSimpanan/" + id,
                type: 'get', 
                success: function(data) { 
                    var tab=JSON.parse(data) 
                    console.log(tab);
                    if (tab.jumlah_simpanan==null) {
                        $('#nama').val(tab.nama)
                        $('#alamat').val(tab.alamat)
                        $('#pekerjaan').val(tab.pekerjaan)
                        $('#telp').val(tab.telp)
                        $('#no_anggota').val(tab.no_anggota) 
                        $('#saldo').val(0) 
                    } else {
                        $('#nama').val(tab.nama)
                        $('#alamat').val(tab.alamat)
                        $('#pekerjaan').val(tab.pekerjaan)
                        $('#telp').val(tab.telp)
                        $('#no_anggota').val(tab.no_anggota) 
                        $('#saldo').val(tab.jumlah_simpanan) 
                    }
                    

                }
            })
        })
    </script> 
    <?= $this->endSection();?>