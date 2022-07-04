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
                                            <input type="text"id="no_anggota" class="form-control form-control-user" name="no_anggota"
                                            placeholder="no simpanan" value="<?= old('no') ?>" id="no_anggota">
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
                                        <input type="date" class="form-control form-control-user" name="tgl_lahir"
                                        placeholder="no simpanan" value="<?= old('no_tabungan') ?>">
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
                                            <div class="form-group row">
                                                <div class="col-sm-4"> <label for="jw">Jangka Waktu</label></div>
                                                <div class="col-sm"><select name="jk" class="form-control " id="jw">
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
                                                </select></div> 
                                            </div>  
                                            <div class="form-group row">
                                                <div class="col-sm-4"> <label for="jt">Jatuh Tempo</label></div>
                                                <div class="col-sm"> <input type="date" class="form-control " name="jt" id="jt"
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
<!-- <script>
function myFunction() {
	    var x = document.getElementById("mySelect").value;
	    document.getElementById("dumetschool").innerHTML = "Kamu memilih Kursus di Dumet School " + x;
	}
</script> -->

<!-- <article>
    <h1> Pilih Tempat Kursus </h1>
    
    <select id="mySelect" onchange="myFunction()">
    <option value="">--Pilih--</option>
    <option value="Gading">Dumet School Kelapa Gading
    <option value="Tebet">Dumet School Tebet
    <option value="Depok">Dumet School Depok
    <option value="Grogol">Dumet School Grogol
    <option value="Srengseng">Dumet School Srengseng
    </select>
    
    
    <p id="dumetschool"></p>
</article> -->
    <?= $this->endSection();?>
    