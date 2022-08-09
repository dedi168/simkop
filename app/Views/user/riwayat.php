

<?= $this->extend('template/index');?>
<?= $this->section('content');?>
<div class="row">
  <?php if ($judulR=='') {?>
    <div class="card text-center">
        <div class="card-header">
        <div class="box-button">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item"> 
                    <button class="nav-link active" onclick="simpanan()" id="simpananB">Simpanan</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link " onclick="pinjaman()" id="pinjamanB">Pinjaman</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" onclick="deposito()" id="depositoB">Deposito</button>
                </li>
            </ul></div>
            <br>
            <div id="test1" class="col-sm-12" >
                <div class="card-content">
                    <div class="row">
                        <div class="">
                            <!-- <input type="text" class="" placeholder="cari riwayat peminjaman"> --> 
                        </div>
                        <div class="col-sm-12" id="simpanan" style="display: block;" > 
                            <!-- tabel simpanan -->
                            <table class="table bordered"  id="myTable">
                            <caption><?= $judul; ?></caption> 
                            <?php 
                            if ($judul=='') {?>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Tabungan</th>
                                        <th>Jenis Simpanan</th>
                                        <th>Kode</th>
                                        <th>Jumlah</th>  
                                        <th>Operator</th>
                                        <th>tanggal</th> 
                                        <th>Saldo</th>  
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $no = 1+(10*($page-1));
                                    foreach ($simpanan as $row) {
                                ?>
                                    <tr>
                                        <td class="grey-text text-darken-1"><?= $no ?></td> 
                                        <td class="grey-text text-darken-1"><?= $row->no_tabungan; ?></td> 
                                        <td class="grey-text text-darken-1"><?= $row->jenis_simpanan; ?></td>
                                        <td class="grey-text text-darken-1"><?= $row->kode; ?></td>
                                        <td class="grey-text text-darken-1"><?= "Rp. ". number_format($row->jumlah,2,',','.') ;  ?></td>  
                                        <td class="grey-text text-darken-1"><?= $row->opr; ?></td>
                                        <td class="grey-text text-darken-1"><?= $row->tgl; ?></td>
                                        <td class="grey-text text-darken-1"><?="Rp. ". number_format($row->jumlah_simpanan,2,',','.') ; ?></td>			
                                    </tr>
                                    <?php
                                    $no++;	
                                    }
                                        
                                    ?>
                                </tbody>
                                
                            </table>
                            <?= $pager->Links('default', 'custom_pager') ?>
                            <?php } else { ?>
                                </table>
                            <?php }
                            
                            ?>
                            
                        </div>
                            
                        
                    </div>
                </div>
            </div>
            <div id="test2" class="col-sm-12" >
                <div class="card-content">
                    <div class="row">
                        <div class="">
                            <!-- <input type="text" class="" placeholder="cari riwayat peminjaman"> --> 
                        </div>
                        <!-- tabel pinjaman -->                   
                        <div class="col-sm-12" id="pinjaman" style="display: none;" > 
                            <table class="table bordered"  id="myTable">
                            <caption><?= $judulP; ?></caption>  
                                <?php 
                                if ($judulP=='') {
                                ?>
                                <thead> 
                                <tr>
                                    <th>No</th>
                                    <th>No Pinjaman</th>
                                    <th>Nama</th>
                                    <th>Pinjaman Awal</th>
                                    <th>Angsuran</th>  
                                    <th>Pokok</th>
                                    <th>Bunga</th> 
                                    <th>Sisa Pinjaman</th> 
                                    <th>Angsuran Ke</th>  
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $no = 1+(10*($page-1));
                                    foreach ($pinjaman as $row) {
                                ?>
                                    <tr>
                                        <td class="grey-text text-darken-1"><?= $no ?></td> 
                                        <td class="grey-text text-darken-1"><?= $row->no_pinjaman; ?></td>
                                        <td class="grey-text text-darken-1"><?= $row->nama1; ?></td> 
                                        <td class="grey-text text-darken-1"><?= "Rp. ". number_format($row->jml_pinjaman,2,',','.') ;  ?></td>
                                        <td class="grey-text text-darken-1"><?= "Rp. ". number_format($row->bayar,2,',','.') ;  ?></td>  
                                        <td class="grey-text text-darken-1"><?= "Rp. ". number_format($row->pokok,2,',','.') ;  ?></td>
                                        <td class="grey-text text-darken-1"><?= "Rp. ". number_format($row->bunga,2,',','.') ;  ?></td>
                                        <td class="grey-text text-darken-1"><?="Rp. ". number_format($row->sisa,2,',','.') ; ?></td>
                                        <td class="grey-text text-darken-1"><?=$row->bayarke ; ?></td>
            
                                    </tr> 
                                    <?php
                                        }
                                    ?>
                                </tbody>
                                
                                </table>
                                    <?= $pager->Links('default', 'custom_pager') ?>

                                <?php
                                } else {
                                    ?> 
                                    
                                    <?php
                                }
                                
                                
                                ?>
                            
                                
                        </div>
                        
                    </div>
                </div>
            </div>
            <div id="test3" class="col-sm-12" >
                <div class="card-content">
                    <div class="row">
                        <div class="">
                            <!-- <input type="text" class="" placeholder="cari riwayat peminjaman"> --> 
                        </div>
                        <!-- tabel pinjaman -->                   
                        <div class="col-sm-12" id="deposito" style="display: none;" > 
                            <table class="table bordered"  id="myTable">
                            <caption><?= $judulD; ?></caption>  
                                <?php 
                                if ($judulP=='') {
                                ?>
                                <thead>  
                                <tr>
                                    <th>No</th>
                                    <th>No Tabungan</th>
                                    <th>Nama</th>  
                                    <th>Alamat</th>
                                    <th>Pekerjaan</th>
                                    <th>Telepon</th> 
                                    <th>Status</th>  
                                </tr> 
                                </thead>
                                <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($deposito as $row) {
                                ?>
                                    <tr> 
                                        <td class="grey-text text-darken-1"><?= $no ?></td>
                                        <td class="grey-text text-darken-1"><?= $row->no_deposito; ?></td>
                                        <td class="grey-text text-darken-1"><?= $row->nama; ?></td>
                                        <td class="grey-text text-darken-1"><?= $row->alamat; ?></td>
                                        <td class="grey-text text-darken-1"><?= $row->jangka_waktu; ?></td> 
                                        <td class="grey-text text-darken-1"><?= $row->telp; ?></td> 
                                        <td class="grey-text text-darken-1"><?= $row->status; ?></td>  
                                                        
                                    </tr>
                                                </table>
                                    <?= $pager->Links('default', 'custom_pager') ?>
                                    <?php
                                        }
                                    ?>
                                </tbody>

                                <?php
                                } else {
                                    ?>
                                    </table>
                                    <?php
                                }
                                
                                
                                ?>
                            
                                
                        </div>
                        
                    </div>
                </div>
            </div>

            
        </div> 
    </div>
  <?php } else { ?>
    <div class="card text-center">
        <div class="card-header">
            <?= $judulR; ?>
        </div>
    </div>
  <?php } ?> 
    
</div>
<script> 

function simpanan() {
    $("#simpanan").css('display', 'block'); 
    $("#pinjaman").css('display', 'none');
    $("#deposito").css('display', 'none');   
}
function pinjaman() {
    $("#simpanan").css('display', 'none');
    $("#pinjaman").css('display', 'block');
    $("#deposito").css('display', 'none'); 
}
function deposito() {
    $("#simpanan").css('display', 'none');
    $("#pinjaman").css('display', 'none');
    $("#deposito").css('display', 'block');
}
</script>
<?= $this->endSection();?>