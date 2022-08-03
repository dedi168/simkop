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
                                    <h1 class="h4 text-gray-900 mb-4">BUKA SIMPANAN BARU</h1>
                                </div> 
                                <?= view('Myth\Auth\Views\_message_block') ?>
                                <form action="<?= base_url('simpanan/store') ?>" method="post" class="user">
                                <?= csrf_field() ?>  
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <?php  
                                            $no = 1;
                                            foreach ($simpanan as $row) { 
                                            $no_tab = (int) substr($row->no_tabungan, 4, 5); 
                                            $no_tab++; 
                                            $kode = "524";
                                            $no_tabung = $kode . sprintf("%05s", $no_tab);
                                            }
                                            ?>
                                            <label for="no_tabungan">Nomor Tabungan</label>
                                            <input type="text" readonly id="no_tabungan" class="form-control" name="no_tabungan" value="<?= $no_tabung ?>"> 
                                        </div>
                                        <div class="col-sm-6">
                                        <label for="tgl">Tanggal</label>
                                        <input type="text" class="form-control" readonly value="<?= date('d-M-Y'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="kolektor">kolektor</label>
                                            <input type="text" name="operator" class="form-control" readonly value="<?= user()->username;?>">
                                        </div>
                                        <div class="col-sm-6">
                                        <label for="status">status</label>
                                        <select name="status" class="form-control " id="status">
                                            <option value="AKTIF">AKTIF</option>
                                            <option value="TUTUP">TUTUP</option>
                                        </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <label for="bunga">NO Anggota</label>
                                                <select class="form-control" id="no_anggota" name="no_anggota" onchange="angt(this.value)">
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
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control form-control-user" name="nama" id="nama" placeholder="nama" value="<?= old('nama') ?>">
                                        </div>
                                    </div>  
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="pekerjaan">Pekejaan</label>
                                            <input type="text" class="form-control form-control-user" name="pekerjaan" id="pekerjaan" placeholder="pekerjaan" value="<?= old('pekerjan') ?>">
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="bunga">tgl lahir</label>
                                        <input type="date" class="form-control form-control-user" name="tgl_lahir" id="tgl_lahir1" style="display: block;"
                                        placeholder="no simpanan" value="<?= old('no_tabungan') ?>">

                                        <input type="text"  class="form-control form-control-user" readonly id="tgl_lahir2" style="display: none;" name="tgl_lahir"
                                        placeholder="no simpanan" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control form-control-user" name="alamat" id="alamat"
                                        placeholder="alamat" value="<?= old('alamat') ?>">
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="telp">Telepon</label>
                                        <input type="text" class="form-control form-control-user" name="telp" id="telp"
                                        placeholder="telepon" value="<?= old('telp') ?>">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row"> 
                                            <label for="bunga">Bunga</label>   
                                            <div class="col-md-4 mb-3">
                                            <?php
                                                $no = 1;
                                                foreach ($bunga as $row) {
                                                    $bunga=$row->bunga;
                                                }
                                            ?>
                                            <input type="text" id="bunga" name="bunga" class="form-control "readonly autocomplete="off" value="<?= $bunga; ?>"></div>% Per Tahun
                                            
                                        
                                    </div>  
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="jenis">Jenis Simpanan</label>
                                            <select onchange="tampil(this.value)" name="jenis" class="form-control " id="jenis" > 
                                                <option value="SUKARELA">SUKARELA</option>
                                                <option value="TABERNA">TABERNA</option>
                                                <option value="TABSISWA">TABSISWA</option>
                                            </select> 
                                        </div>
                                        
                                        <div class="col-sm-6 mb-3 mb-sm-0 bg-gray-300" id="batas"style="display: none;" >  
                                        <br>
                                            <div class="form-group row">
                                                <div class="col-sm-4"> <label for="jk">Jangka Waktu</label></div>
                                                <div class="col-sm">
                                                    <select onchange="jatuh_tempo(this.value)" name="jk" class="form-control " id="jk">
                                                        <option value="">--Pilih Jangka Waktu--</option>    
                                                        <option value="1">1 Bulan</option>
                                                        <option value="2">2 Bulan</option> 
                                                        <option value="3">3 Bulan</option>
                                                        <option value="4">4 Bulan</option> 
                                                        <option value="5">5 Bulan</option>
                                                        <option value="6">6 Bulan</option> 
                                                        <option value="7">7 Bulan</option>
                                                        <option value="8">8 Bulan</option> 
                                                        <option value="9">9 Bulan</option>
                                                        <option value="10">10 Bulan</option> 
                                                        <option value="11">11 Bulan</option>
                                                        <option value="12">12 Bulan</option> 
                                                    </select>
                                                </div> 
                                            </div>  
                                            <div class="form-group row">
                                                <div class="col-sm-4"> <label for="jt">Jatuh Tempo</label></div>
                                                <div class="col-sm"> <input readonly type="text" class="form-control " name="jt" id="jt"
                                            placeholder="jatuh tempo" id="jt"value=" " v-model="jt"></div>
                                                
                                            </div> 
                                            <div class="form-group row">
                                                <div class="col-sm-4"> <label for="setoran">Setoran/Perbulan</label></div>
                                                <div class="col-sm"> <input type="number" class="form-control " name="setoran" id="setoran"
                                            placeholder="setoran/bulan" value="<?= old('setoran') ?>" v-model="setoran"></div>
                                            
                                            </div> 
                                            <div class="form-group row">
                                                <div class="col-sm-4"> <label for="nilai">Nilai Akhir</label></div>
                                                <div class="col-sm"> <input type="number" class="form-control " name="nilai" id="nilai"
                                            placeholder="nilai akhir" value="<?= old('nilai') ?>" v-model="nilai"></div>
                                                
                                            </div>  
                                            <br> 
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
<!-- display sub jenis    -->
<script src="<?= base_url(); ?>/js/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url(); ?>/js/jquery-ui.min.js"></script>
<script>
    function tampil(str) {  
    if (str == "SUKARELA") {
        $("#batas").css('display', 'none'); 
        return;
    }else {
        $("#batas").css('display', 'block'); 
    }  
    }

    function angt(str) {    
        if (str == "") {
            $("#tgl_lahir2").css('display', 'none');  
            $("#tgl_lahir1").css('display', 'block');
            $('#nama').val("") 
            $('#alamat').val("")
            $('#pekerjaan').val("")
            $('#telp').val("")
            return;
        }else {
            $("#tgl_lahir2").css('display', 'block');  
            $("#tgl_lahir1").css('display', 'none'); 
        }   
    }   
</script> 
<script type="text/javascript">
   function jatuh_tempo(str) { 
        var jk = -1;
        jk = parseInt(document.getElementById('jk').value); 
        var date = new Date(<?=date('Y')?>, <?=date('m')?>, <?=date('d')?>);
    
            var jt_tempo = new Date(date.getFullYear(), date.getMonth()- 1 +jk, date.getDate(), 0, 0, 0, 0);
            document.getElementById('jt').value = jt_tempo.toISOString().substr(0, 10);
    }
</script>
    <script> 
            
        $('#no_anggota').on('change',function(){
            let id = $(this).val() 
            
            console.log(id);
            $.ajax({
                url: "http://localhost:8080/simpanan/getAnggota/" + id,
                type: 'get', 
                success: function(data) {
                    var agt=JSON.parse(data) 
                    $('#nama').val(agt.nama)
                    $('#alamat').val(agt.alamat)
                    $('#pekerjaan').val(agt.pekerjaan)
                    $('#tgl_lahir2').val(agt.tanggal_lahir)
                    $('#telp').val(agt.telp)

                }
            })
        })
    </script> 
<?= $this->endSection();?>
    