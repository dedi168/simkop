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
                                    <h1 class="h4 text-gray-900 mb-4">INVENTARIS BARU</h1>
                                </div>
                                <?= view('Myth\Auth\Views\_message_block') ?>
                                <form action="<?= base_url('inventaris/store') ?>" method="post" class="user"  name="autoSumForm">
                                <?= csrf_field() ?>   
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                            <?php  
                                                $no = 1;
                                                foreach ($inventaris as $row) { 
                                                $kd = (int) substr($row->kode, 4, 5); 
                                                $kd++; 
                                                $kode1 = "523";
                                                $kode = $kode1 . sprintf("%05s", $kd);
                                                }
                                            ?>
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">No Anggota</div>
                                                </div>
                                                <input readonly type="text" class="form-control" name="kode" value="<?= $kode ?>">           
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Nama</div>
                                                </div>
                                                <input type="text" class="form-control" name="nama" id="nama" placeholder="nama">
                                          </div>
                                        </div>
                                    </div> 
                                    <hr> 

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Jumlah</div>
                                                </div>
                                                <input type="Number" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Tanggal Peroleh</div>
                                                </div>
                                                <input type="date" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" name="tgl_beli" id="tgl_beli" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Umur Eko</div>
                                                </div>
                                                <input type="number" maxlength="5" class="form-control" id="umur" name="umur" placeholder="umur" onFocus="startCalc();" onBlur="stopCalc();">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                <div class="input-group-text">TGL Nilai Habis</div>
                                                </div>
                                                <input type="date" class="form-control" id="tgl_habis" placeholder="nilai" name="tgl_habis">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Nilai</div>
                                                </div>  
                                                  <input class="form-control" type="number" placeholder="Nilai/Harga" name="nilai" id="nilai" >
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                        <div class="input-group mb-2 mr-sm-2 ">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Group</div>
                                                </div>  
                                                   <select class="form-control"  name="grup" id="">
                                                        <option value="">Pilih Grup</option>
                                                        <option value="Inventaris Kantor">Inventaris Kantor</option>
                                                        <option value="Kendaraan">Kendaraan</option>
                                                        <option value="Gedung">Gedung</option>
                                                        <option value="Tanah">Tanah</option>
                                                   </select> 
                                            </div>
                                        </div>
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
<!-- perhitungan -->
   <script type="text/javascript">  
    function startCalc(){
        interval=setInterval("calc()",1)
    }
    function calc(){
        tgl_beli = document.autoSumForm.tgl_beli.value;  
        umur = document.autoSumForm.umur.value;   
        thn_peroleh = tgl_beli.substr(0,4);
        bln_peroleh = tgl_beli.substr(5,2);
        tgl_beli = tgl_beli.substr(8,2); 
        tahun=(thn_peroleh*1)+(umur*1);

        tanggallengkap = tahun + "-" + bln_peroleh + "-" + tgl_beli;

        document.autoSumForm.tgl_habis.value=(tanggallengkap); 
    }
    function stopCalc(){
        clearInterval(interval)
    }   
    </script> 
 


    <?= $this->endSection();?>