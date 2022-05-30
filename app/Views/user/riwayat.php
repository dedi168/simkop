

<?= $this->extend('template/index');?>
<?= $this->section('content');?>
<div class="row">
    <!-- dokumen dan data pengguna -->
    <div class="col s12 m8 l8 card white" style="max-height: 550px;height: 550px;overflow: auto">
        <div class="row">
            <ul class="tabs">
                    <li class="tab col s3">
                        <a href="#test1" class="active">Riwayat Simpan</a>
                    </li>
                    <li class="tab col s3">
                        <a  href="#test2" >Riwayat pinjam</a>
                    </li>
                    <li class="tab col s3">
                        <a  href="#test3" >dokumen</a>
                    </li>
            </ul>
            <!-- tab content-->
            <div id="test1" class="col s14">
                <div class="card-content">
                    <div class="row">
                        <div class="col s12 m12">
                            <input type="text" class="" placeholder="cari riwayat simpan">
                        </div>
                        <div class="col s12 m12">
                            <ul class="collection"> 
                                <li class="collection-item">
                                    <div class="row">
                                        <div class="col s3 m3 grey-text">
                                            <i class="mdi-av-timer"></i>tanggal;
                                        </div>
                                        <div class="col s3 m3">
                                            <span class="orange-text">
                                                Rp.  
                                            </span>
                                        </div>
                                        <div class="col s6 m6">
                                            <span class="right green-text text-darken-3"><i class="mdi-action-account-balance-wallet"></i> Simpanan  </span>
                                        </div>
                                    </div>
                                </li> 
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div id="test2" class="col s14" >
                <div class="card-content">
                    <div class="row">
                        <div class="col s12 m12">
                            <input type="text" class="" placeholder="cari riwayat peminjaman">
                        </div>
                        <div class="col s12 m12">
                            <ul class="collection"> 
                                <li class="collection-item">
                                    <div class="row">
                                        <div class="col s3 m3 grey-text">
                                            <i class="mdi-av-timer"></i> tanggal pinjamn
                                        </div>
                                        <div class="col s3 m3">
                                            <span class="orange-text">
                                                Rp. 
                                            </span>
                                        </div>
                                        <div class="col s6 m6">
                                            <span class="right green-text text-darken-3"><i class="mdi-action-credit-card"></i>Pinjaman</span>
                                        </div>
                                    </div>
                                </li> 
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div id="test3" class="col s14" >
                <div class="card-content" >
                    <div class="row">
                        <div class="col s12 m12">
                            <input type="text" class="" placeholder="cari dokumen">
                        </div>
                        <div class="col s12 m12 ">
                            <ul class="collection">
                                <li class="collection-item avatar">
                                     
                                    <h5 class="no-margin">Fotocopy KTP</h5>
                                    <a href="<?= base_url('assets/images/gallary/1.jpg')?>" target="_blank" class="secondary-content blue-text"><i class="mdi-image-remove-red-eye"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>
<?= $this->endSection();?>