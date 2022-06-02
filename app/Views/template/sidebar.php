<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(''); ?>">
        <div class="sidebar-brand-icon rotate-n-15"> 
                <img src="img/logokoprasi.png" height="56px" alt=""> 
        </div>
        <div class="sidebar-brand-text mx-3">KSU Kebon Blahbatuh</div>
    </a>

    <!-- menu master -->
    <?php if(in_groups('admin')||in_groups('kasir')): ?> 
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Master
        </div>

        <!-- Nav Item - master --> 
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('admin');?>" data-toggle="collapse" data-target="#datamaster"
                aria-expanded="true" aria-controls="datamaster">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Master</span>
            </a>
            <div id="datamaster" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Utilities:</h6>
                    <a class="collapse-item" href="<?= base_url('admin');?>">Data Operator</a>
                    <a class="collapse-item" href="<?= base_url('bungasimpanan');?>">Data Bunga Simpanan</a>
                    <a class="collapse-item" href="<?= base_url('masteriuran');?>">Data Jumlah Iuran</a>
                    <a class="collapse-item" href="utilities-other.html">Jenis Simpanan</a>
                    <a class="collapse-item" href="utilities-other.html">Golongan Kredit</a>
                    <a class="collapse-item" href="utilities-other.html">Jenis Kredit</a>
                    <a class="collapse-item" href="utilities-other.html">Data Bunga Deposito</a>
                </div>
            </div>
        </li>
    <?php endif ?>
    <!-- Akhir menu master -->


    <!-- Menu simpan pinjam --> 
    <?php if(in_groups('admin')||in_groups('kasir')||in_groups('kredit')): ?> 
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Olah Data
        </div>
        <?php endif ?>

            <!-- Nav Item - Pages simpanan -->
            <?php if(in_groups('admin')||in_groups('kasir')): ?> 
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Simpanan" aria-expanded="true" aria-controls="Simpanan">
                    <i class="far fa-money-bill-alt"></i>
                        <span>Simpanan</span>
                    </a>
                    <div id="Simpanan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Simpanan</h6>
                            <a class="collapse-item" href="buttons.html">Simpanan</a>
                            <a class="collapse-item" href="buttons.html">Penyertoran Simpanan</a>
                            <a class="collapse-item" href="cards.html">Penarikan Simpanan</a>
                        </div>
                    </div>
                </li> 
            <?php endif ?>

            <!-- Nav Item - pinjamaan -->
            <?php if(in_groups('admin')||in_groups('kasir')||in_groups('kredit')): ?> 
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Pinjaman" aria-expanded="true" aria-controls="Pinjaman">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Pinjaman</span>
                    </a>
                    <div id="Pinjaman" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Pinjaman</h6>
                            <a class="collapse-item" href="utilities-color.html">Pinjaman</a>
                            <a class="collapse-item" href="utilities-border.html">Entri Pinjaman</a> 
                        </div>
                    </div>
                </li>
            <?php endif ?>
                <!-- Nav Item - deposito -->
            <?php if(in_groups('admin')||in_groups('kasir')): ?>  
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Deposito"
                        aria-expanded="true" aria-controls="Deposito">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Deposito</span>
                    </a>
                    <div id="Deposito" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Deposito</h6>
                            <a class="collapse-item" href="utilities-color.html">Deposito</a>
                            <a class="collapse-item" href="utilities-border.html">Entri Deposito</a> 
                        </div>
                    </div>
                </li>
            <?php endif ?>
    <!-- akhir menu simpan pinjam -->
    

    <!-- menu Akunting -->
    <?php if(in_groups('admin')||in_groups('akunting')): ?>  
        <hr class="sidebar-divider"> 
        <!-- Heading -->
        <div class="sidebar-heading">
            Akunting
        </div>
        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#akunting" aria-expanded="true" aria-controls="akunting">
            <i class="far fa-money-bill-alt"></i>
                <span>Akunting</span>
            </a>
            <div id="akunting" class="collapse" aria-labelledby="headingUtilities" data-parent="#akunting">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header"> akunting </h6>
                    <a class="collapse-item" href="utilities-color.html">kas masuk</a>
                    <a class="collapse-item" href="utilities-border.html">kas keluar</a> 
                    <a class="collapse-item" href="utilities-border.html">Inventaris</a> 
                </div>
            </div>
        </li>
    <?php endif ?>
    <!-- akhir menu Akunting -->


    <!-- Laporan -->
    <?php if(in_groups('admin')): ?> 
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Laporan
        </div>
        <!-- Nav Item - laporan -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                    <span>Deposito</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Deposito</h6>
                    <a class="collapse-item" href="utilities-color.html">Deposito</a>
                    <a class="collapse-item" href="utilities-border.html">Entri Deposito</a> 
                </div>
            </div>
        </li> 
    <?php endif ?>
    <!-- Akhir laporan -->

    <!-- menu nasabah -->
        <!-- Divider -->
        <hr class="sidebar-divider"> 
        <!-- Heading -->
        <div class="sidebar-heading">
            Profil Pengguna
        </div> 
        <!-- Nav Item - profil -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('user/');?>">
                <i class="fas fa-user"></i>
                <span>Profil</span></a>
        </li>
    <!-- menu user -->
        <?php if(in_groups('nasabah')): ?> 
            <!-- Nav Item - riwyat -->
            <li class="nav-item">
            <a class="nav-link" href="<?= base_url('user/riwayat');?>">
                <i class="fas fa-history"></i>
                <span>Riwayat Transaksi</span></a>
            </li>
        <?php endif ?>

    <!-- logout -->
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - logout -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('logout');?>">
                <i class="fas fa-sign-out-alt"></i>
                <span>logout</span></a>
        </li>

    <!-- mini mize -->
    <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->