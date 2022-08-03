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
                                    <h1 class="h4 text-gray-900 mb-4">UBAH SIMPANAN</h1>
                                </div>  
                                <?= view('Myth\Auth\Views\_message_block') ?>
                                <form action="<?= base_url('simpanan/update/'.$simpanan->no_tabungan) ?>" method="post" class="user">
                                <?= csrf_field() ?>  
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <label for="no_tabungan">Nomor Tabungan</label>
                                            <input type="text" readonly id="no_tabungan" class="form-control" name="no_tabungan" value="<?= $simpanan->no_tabungan ?>"> 
                                        </div>
                                        <div class="col-sm-6">
                                        <label for="tgl">Tanggal</label>
                                        <input type="text" class="form-control" readonly value="<?= $simpanan->created_at; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="kolektor">kolektor</label>
                                            <input type="text" name="operator" class="form-control" readonly value="<?= $simpanan->operator;?>">
                                        </div>
                                        <div class="col-sm-6">
                                        <label for="status">status</label>
                                        <select name="status" class="form-control " id="status">
                                            <option <?php if ($simpanan->status == "AKTIF") { echo 'selected'; }?> value="AKTIF">AKTIF</option>
                                            <option <?php if ($simpanan->status == "TUTUP") { echo 'selected'; }?>value="TUTUP">TUTUP</option>
                                        </select>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <label for="bunga">NO Anggota</label>
                                            <input type="text"id="no_anggota" class="form-control form-control-user" name="no_anggota"
                                            placeholder="no anggota" value="<?= $simpanan->no_anggota ?>" id="no_anggota">
                                        </div>  
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control form-control-user" name="nama" id="nama" placeholder="nama" value="<?= $simpanan->nama ?>">
                                        </div>
                                    </div>  
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="pekerjaan">Pekejaan</label>
                                            <input type="text" class="form-control form-control-user" name="pekerjaan" id="pekerjaan" placeholder="pekerjaan" value="<?= $simpanan->pekerjaan ?>">
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="tgl_lahir">tgl lahir</label>
                                        <input type="date" class="form-control" id="tgl_lahir" value="<?= $simpanan->tgl_lahir ?>"name="tgl_lahir">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control form-control-user" name="alamat" id="alamat"
                                        placeholder="alamat" value="<?= $simpanan->alamat ?>">
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="telp">Telepon</label>
                                        <input type="text" class="form-control form-control-user" name="telp" id="telp"
                                        placeholder="telepon" value="<?= $simpanan->telp ?>">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row"> 
                                            <label for="bunga">Bunga</label>   
                                            <div class="col-md-4 mb-3"> 
                                            <input type="text" id="bunga" name="bunga" class="form-control "readonly autocomplete="off" value="<?= $simpanan->bunga; ?>"></div>% Per Tahun
                                    </div>  
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="jenis">Jenis Simpanan</label>
                                            <select onchange="tampil(this.value)" name="jenis" class="form-control " id="jenis" > 
                                                <option <?php if ($simpanan->jenis == "SUKARELA") { echo 'selected'; }?> value="SUKARELA">SUKARELA</option>
                                                <option <?php if ($simpanan->jenis == "TABERNA") { echo 'selected'; }?> value="TABERNA">TABERNA</option>
                                                <option <?php if ($simpanan->jenis == "TABSISWA") { echo 'selected'; }?> value="TABSISWA">TABSISWA</option>
                                            </select> 
                                        </div>
                                        
                                        <div class="col-sm-6 mb-3 mb-sm-0 bg-gray-300" id="batas" <?php if ($simpanan->jenis == "SUKARELA") { echo 'style="display: none;"'; }?> value="1">   
                                            <div class="form-group row">
                                                <div class="col-sm-4"> <label for="jw">Jangka Waktu</label></div>
                                                <div class="col-sm">
                                                    <select onchange="jatuh_tempo(this.value)" name="jk" class="form-control " id="jk">
                                                        <option <?php if ($simpanan->jk == "1") { echo 'selected'; }?> value="1">1 Bulan</option>
                                                        <option <?php if ($simpanan->jk == "2") { echo 'selected'; }?> value="2">2 Bulan</option> 
                                                        <option <?php if ($simpanan->jk == "3") { echo 'selected'; }?> value="3">3 Bulan</option>
                                                        <option <?php if ($simpanan->jk == "4") { echo 'selected'; }?> value="4">4 Bulan</option> 
                                                        <option <?php if ($simpanan->jk == "5") { echo 'selected'; }?> value="5">5 Bulan</option>
                                                        <option <?php if ($simpanan->jk == "6") { echo 'selected'; }?> value="6">6 Bulan</option>   
                                                        <option <?php if ($simpanan->jk == "7") { echo 'selected'; }?> value="7">7 Bulan</option>
                                                        <option <?php if ($simpanan->jk == "8") { echo 'selected'; }?> value="8">8 Bulan</option> 
                                                        <option <?php if ($simpanan->jk == "9") { echo 'selected'; }?> value="9">9 Bulan</option>
                                                        <option <?php if ($simpanan->jk == "10") { echo 'selected'; }?> value="10">10 Bulan</option> 
                                                        <option <?php if ($simpanan->jk == "11") { echo 'selected'; }?> value="11">11 Bulan</option>
                                                        <option <?php if ($simpanan->jk == "12") { echo 'selected'; }?> value="12">12 Bulan</option> 
                                                    </select>
                                                </div> 
                                            </div>  
                                            <div class="form-group row">
                                                <div class="col-sm-4"> <label for="jt">Jatuh Tempo</label></div>
                                                <div class="col-sm"> <input type="text" readonly class="form-control " name="jt" id="jt"
                                            placeholder="jatuh tempo" id="jt"value="<?= $simpanan->jt ?>"></div>
                                                
                                            </div> 
                                            <div class="form-group row">
                                                <div class="col-sm-4"> <label for="setoran">Setoran/Perbulan</label></div>
                                                <div class="col-sm"> <input type="number" class="form-control " name="setoran" id="setoran"
                                            placeholder="setoran/bulan" value="<?= $simpanan->setoran ?>" v-model="setoran"></div>
                                            
                                            </div> 
                                            <div class="form-group row">
                                                <div class="col-sm-4"> <label for="nilai">Nilai Akhir</label></div>
                                                <div class="col-sm"> <input type="number" class="form-control " name="nilai" id="nilai"
                                            placeholder="nilai akhir" value="<?= $simpanan->nilai ?>" v-model="nilai"></div>
                                                
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
<script>
    function tampil(str) {  
    if (str == "SUKARELA") {
        $("#batas").css('display', 'none'); 
        return;
    }else {
        $("#batas").css('display', 'block'); 
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
    <?= $this->endSection();?>
    