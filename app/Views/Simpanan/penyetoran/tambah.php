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
                                    <h1 class="h4 text-gray-900 mb-4">SETORAN SIMPANAN</h1>
                                </div> 
                                <?= view('Myth\Auth\Views\_message_block') ?>
                                <form action="<?= base_url('detailsimpanan/store') ?>" method="post" class="user"  name="autoSumForm">
                                <?= csrf_field() ?>  
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="tgl">Tanggal</label>
                                        <input type="text" name="tgl" id="tgl" class="form-control" readonly value="<?= date('d-M-Y'); ?>">
                                        <input type="hidden" name="created_at" id="tgl" class="form-control" value="<?= date('Y-m-d h:i'); ?>">
                                        <input type="hidden" name="updated_at" id="tgl" class="form-control" value="<?= date('Y-m-d h:i'); ?>">                                    </div>
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
                                        <input type="text" id="jenis_simpanan" name="jenis_simpanan" class="form-control "readonly autocomplete="off" value="KREDIT">

                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                        <label for="jenis_simpanan">Bunga</label> 
<?php
                                                $no = 1;
                                                foreach ($bunga as $row) {
                                                    $bunga=$row->bunga;
                                                }
                                            ?> 

                                            <div class="form-group row">
                                        <div class="col-sm-8 mb-3 mb-sm-0"> 
                                        <input type="text" id="bunga" name="bunga" class="form-control "readonly autocomplete="off" value="<?= $bunga; ?>">

                                        </div>
                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                        % Per Tahun
                                        </div>
                                    </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="alamat">Kode Transaksi</label>
                                            <select name="kode" id="kode" onchange="trns(this.value)" class="form-control ">
                                                <option value="">Pilih Kode Transaksi</option>
                                                <option value="100">100</option>
                                                <option value="107">107</option>
                                                <option value="108">108</option>
                                                <option value="110">110</option>
                                                <option value="114">114</option>
                                                <option value="181">181</option>
                                                <option value="201">201</option>
                                                <option value="205">205</option>
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
        bunga=document.autoSumForm.bunga.value;
        bung=(bunga/12).toFixed(2); 
        nbunga=(one*1)*(bung*1);
        console.log(nbunga);
        document.autoSumForm.jumlahS.value=(one*1)+(two*1)+(nbunga*1);
    }
    function stopCalc(){
        clearInterval(interval)
    } 
         
        function trns(str) {  
            console.log(str);
            if (str == "100") {
                $('#transaksi').val("Penyetoran Tunai")
            }else if (str == "107") {
                $('#transaksi').val("Setoran Pemindah Buku")
            }else if (str == "108") {
                $('#transaksi').val("Setoran Kriling")
            }else if (str == "110") {
                $('#transaksi').val("Pengkreditan Umum")
            }else if (str == "114") {
                $('#transaksi').val("K.U. masuk")
            }else if (str == "181") {
                $('#transaksi').val("Pembayaran Bunga")
            }else if (str == "201") {
                $('#transaksi').val("Pencairan Deposito")
            }else if (str == "205") {
                $('#transaksi').val("Pembayaran Bunga Deposito")
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