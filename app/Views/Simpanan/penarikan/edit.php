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
                                    <h1 class="h4 text-gray-900 mb-4">Ubah Data</h1>
                                </div>
                                <?= view('Myth\Auth\Views\_message_block') ?>
                                <form name="autoSumForm" action="<?= base_url('TarikSimpanan/update/'.$simpanan->id) ?>" method="post" class="user">
                                <?= csrf_field() ?>   
                                <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="tgl">Tanggal</label>
                                        <input type="text" name="tgl" id="tgl" class="form-control" readonly value="<?= $simpanan->tgl ?>">
                                        <input type="hidden" name="created_at" id="tgl" class="form-control" value="<?= $simpanan->updated_at ?>">
                                        <input type="hidden" name="updated_at" id="tgl" class="form-control" value="<?= date('Y-m-d h:i'); ?>">                                    </div>
                                        <div class="col-sm-6">
                                            <label for="opr">Operator</label>
                                            <input type="text" id="opr" name="opr" class="form-control" readonly value="<?= $simpanan->opr ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="bunga">NO Tabungan</label>
                                            <select class="form-control"  id="no_tabungan" name="no_tabungan"> 
                                                <?php foreach($simpananD as $key):?> 
                                                    <option <?php if ($simpanan->no_tabungan == $key->no_tabungan) { echo 'selected'; }?>   value="<?php echo  $key->no_tabungan ?>">
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
                                            <input type="text" class="form-control " name="nama" id="nama" placeholder="nama" readonly value="<?php echo  $simpanan->nama ?>" >
                                        </div>  
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control " name="alamat" id="alamat" placeholder="alamat" value="<?php echo  $simpanan->alamat ?>" readonly>
                                        </div>
                                    </div>  
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="pekerjaan">Pekejaan</label>
                                            <input type="text" class="form-control " name="pekerjaan" id="pekerjaan" placeholder="pekerjaan" value="<?php echo  $simpanan->pekerjaan ?>" readonly>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="telp">Telepon</label>
                                        <input type="text" class="form-control " name="telp" id="telp" value="<?php echo  $simpanan->telp ?>"placeholder="no simpanan"readonly>  
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="alamat">No Anggota</label>
                                        <input type="text" class="form-control " name="no_anggota" id="no_anggota" value="<?php echo  $simpanan->no_anggota ?>" placeholder="no_anggota" readonly>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="telp">Saldo</label>
                                        <input type="text" class="form-control " name="saldo" id="saldo" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo  $simpanan->jumlah_simpanan ?>"
                                        placeholder="saldo"  readonly>
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
                                                <option <?php if ($simpanan->kode == "500") { echo 'selected'; }?> value="500">500</option>
                                                <option <?php if ($simpanan->kode == "507") { echo 'selected'; }?> value="507">507</option>
                                                <option <?php if ($simpanan->kode == "510") { echo 'selected'; }?> value="510">510</option>
                                                <option <?php if ($simpanan->kode == "513") { echo 'selected'; }?> value="513">108</option>
                                                <option <?php if ($simpanan->kode == "515") { echo 'selected'; }?> value="515">515</option>
                                                <option <?php if ($simpanan->kode == "523") { echo 'selected'; }?> value="523">523</option>
                                                <option <?php if ($simpanan->kode == "525") { echo 'selected'; }?> value="525">525</option>
                                                <option <?php if ($simpanan->kode == "580") { echo 'selected'; }?> value="580">580</option>
                                                <option <?php if ($simpanan->kode == "584") { echo 'selected'; }?> value="584">584</option>
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
                                        <input type="number" id="jumlah" name="jumlah" class="form-control " autocomplete="off" value="<?= $simpanan->jumlah; ?>" onFocus="startCalc();" onBlur="stopCalc();">
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                        <label for="jumlah">Jumlah Simpanan</label>   
                                        <input type="number" id="jumlahS" name="jumlahS" class="form-control " autocomplete="off" value="<?= $simpanan->jumlah_simpanan; ?>">
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
                    if (tab.jumlah_simpanan=null) {
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
    <body onload="myFunction()"> 
<script>
function myFunction() {
            if (<?php echo  $simpanan->kode ?> == "500") {
                $('#transaksi').val("Penarikan Tunai")
            }else if (<?php echo  $simpanan->kode ?> == "507") {
                $('#transaksi').val("Penarikan Pemindah Buku")
            }else if (<?php echo  $simpanan->kode ?> == "510") {
                $('#transaksi').val("Tolakan Masuk")
            }else if (<?php echo  $simpanan->kode ?> == "513") {
                $('#transaksi').val("Tolakan Masuk")
            }else if (<?php echo  $simpanan->kode ?> == "515") {
                $('#transaksi').val("Nota Debet")
            }else if (<?php echo  $simpanan->kode ?> == "523") {
                $('#transaksi').val("Biaya Penutupan Rekening")
            }else if (<?php echo  $simpanan->kode ?> == "525") {
                $('#transaksi').val("Biaya Transfer")
            }else if (<?php echo  $simpanan->kode ?> == "580") {
                $('#transaksi').val("Biaya Administrasi")
            }else if (<?php echo  $simpanan->kode ?> == "584") {
                $('#transaksi').val("Pajak Bunga")
            }   
}
</script>

</body> 
    <?= $this->endSection();?>