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
                                    <h1 class="h4 text-gray-900 mb-4">SETORAN PINJAMAN</h1>
                                </div> 
                                <?= view ('Myth\Auth\Views\_message_block') ?>
                                <form action="<?= base_url('detailpinjaman/store') ?>" method="post" class="user"  name="autoSumForm">
                                <?= csrf_field() ?>  
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="tanggal">Tanggal</label>
                                        <input type="text" name="tanggal" id="tanggal" class="form-control" readonly value="<?= date('Y-m-d'); ?>">                                   </div>
                                        <div class="col-sm-6">
                                            <label for="opr">Operator</label>
                                            <input type="text" id="opr" name="opr" class="form-control" readonly value="<?= user()->username;?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="bunga">NO Pinjaman</label>
                                            <select class="form-control" id="no_pinjaman" name="no_pinjaman">
                                                <option value="">
                                                    <--Pilih No Pinjaman -->
                                                </option>
                                                <?php foreach($pinjaman as $key):?> 
                                                    <option  value="<?php echo  $key->no_pinjaman ?>">
                                                        <?php echo  $key->no_pinjaman ?>  
                                                    </option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-6"> 
                                            <label for="bayarke">Bayar Ke</label> 
                                            <input type="text" id="bayarke" name="bayarke" class="form-control" readonly value="0">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0"> 
                                        <label for="nama">Nama</label>
                                            <input type="text" class="form-control " name="nama" id="nama" placeholder="nama" readonly>
                                        </div>  
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="jumlah_pinjaman">Jumlah Pinjaman</label>
                                            <input type="text" class="form-control " name="jumlah_pinjaman" id="jumlah_pinjaman" value="" readonly>
                                        </div>
                                    </div>  
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="bunga">Bunga</label>
                                            <div class="form-group row">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input type="text" class="form-control " name="bunga" id="bunga" value="" readonly>
                                                </div>
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    % / bulan
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="sistem">Sistem</label>
                                            <input type="text" class="form-control " name="sistem" id="sistem" value="" readonly> 
                                            <!-- <input type="text" class="form-control " name="sistem" id="sistem" onFocus="startCalc();" onBlur="stopCalc();" -->
                                        <!-- placeholder="sistem" value="1" readonly> -->
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="jangka_waktu">Jangka Waktu</label>
                                        <input type="text" class="form-control " name="jangka_waktu" id="jangka_waktu" value="" readonly>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                        <input type="text" class="form-control " name="tanggal_pinjam" id="tanggal_pinjam"  value="" readonly>
                                        </div>
                                    </div>
                                    <hr> 
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label for="telp">Miniman Angsuran</label>
                                            <input type="text" class="form-control " readonly name="Mangsuran" id="Mangsuran" value="">
                                        
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="jbunga">Bunga</label>
                                            <input type="text" class="form-control " name="jbunga" id="jbunga" value="">
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="sisa">Sisa</label>
                                            <input type="text" class="form-control " name="saldo" id="saldo" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <label for="angsuran">Angsuran</label>
                                            <input type="text" class="form-control"  onFocus="startCalc();" onBlur="stopCalc();" name="angsuran" id="angsuran" value="">
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="denda">Denda</label>
                                            <input type="text" class="form-control " name="denda" id="denda" value="">
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="pokok">Pokok</label>
                                            <input type="text" class="form-control " name="pokok" id="pokok" value="">
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                           
                                        </div>
                                        <div class="col-sm-4" id="set" style="display: block;">
                                           
                                        </div>
                                        <div class="col-sm-4" id="kembalian" style="display: none;">
                                            <label for="kembalian">Kembalian</label>
                                            <input type="text" class="form-control " name="kembalian" id="kembalian" value="">
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="telp">Saldo Akhir</label>
                                            <input type="text" class="form-control " name="jumlah" id="jumlah" value=""> 
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
        angsuran = document.autoSumForm.angsuran.value; 
        bunga = document.autoSumForm.jbunga.value;
        saldo = document.autoSumForm.saldo.value;
        pokok = (angsuran*1)-(bunga*1);
        sisa = (saldo*1)-(pokok*1);
        if (pokok>saldo) {
            document.autoSumForm.pokok.value=(saldo*1);
        } else {
            document.autoSumForm.pokok.value=(pokok*1);
        }
        if (sisa<0) {
            document.autoSumForm.jumlah.value=(0);
            $("#kembalian").css('display', 'block');
            $("#set").css('display', 'none');
            document.autoSumForm.kembalian.value=((angsuran*1)-(saldo*1));
        } else {
            $("#kembalian").css('display', 'none');
            $("#set").css('display', 'block');
            document.autoSumForm.jumlah.value=(sisa*1);
        }
        
    }
    function stopCalc(){
        clearInterval(interval)
    }  
            
        $('#no_pinjaman').on('change',function(){
            let id = $(this).val() 
            $.ajax({
                url: "http://localhost:8080/detailpinjaman/getDataPinjaman/" + id,
                type: 'get', 
                success: function(data) { 
                    var pinj=JSON.parse(data) 
                        console.log(pinj); 
                        $('#nama').val(pinj.nama1)
                        $('#jumlah_pinjaman').val(formatRupiah(pinj.jml_pinjaman) )
                        $('#bunga').val(pinj.bunga)
                        $('#sistem').val(pinj.sistem_bunga)
                        $('#jangka_waktu').val(pinj.jangka_waktu)  
                        $('#tanggal_pinjam').val(pinj.created_at) 
                        $('#denda').val('0') 
                        
                        // tanggalJT = pinj.created_at.substr(5,2);
                        // tgls= new Date().getDate();
                        // blns= new Date().getMonth();
                        // if (blns<=9) { bulan= "0"+blns; } else {  bulan=blns; }
                        // tg=tgls+"-"+bulan;  

                        Mangsuran=(pinj.jml_pinjaman*1)*(20/100) 

                        if (pinj.bayarke==null) {
                            $('#bayarke').val('1') 
                            if (pinj.sistem_bunga=="MENURUN") {
                                bunga=(((pinj.bunga*1)/100)*(pinj.jml_pinjaman*1)).toFixed(2)
                                console.log(bunga);
                                $('#Mangsuran').val(Mangsuran) 
                                $('#jbunga').val(bunga)
                            } else {
                                bunga=(((pinj.bunga*1)/100)*(pinj.jml_pinjaman*1)).toFixed(2)
                                $('#Mangsuran').val(Mangsuran) 
                                $('#jbunga').val(bunga)
                            }
                        }else{
                            $('#bayarke').val((pinj.bayarke*1)+1) 
                            if (pinj.sistem_bunga=="MENURUN") {
                                bunga=(((pinj.bunga*1)/100)*(pinj.sisa*1)).toFixed(2)  
                                console.log(bunga);
                                $('#Mangsuran').val(Mangsuran)
                                $('#jbunga').val(bunga)
                            } else {
                                bunga=(((pinj.bunga*1)/100)*(pinj.jml_pinjaman*1)).toFixed(2)
                                $('#Mangsuran').val(Mangsuran) 
                                $('#jbunga').val(bunga) 
                                console.log(bunga);
                            }
                        } 

                        if (pinj.sisa==null) {
                            $('#saldo').val(pinj.jml_pinjaman) 
                        }else{
                            $('#saldo').val(pinj.sisa) 
                        }   

                       
                }
            })
        })
        
        const formatRupiah = (money) => {
            return new Intl.NumberFormat('id-ID').format(money);
        } 
    </script> 
  


    <?= $this->endSection();?>