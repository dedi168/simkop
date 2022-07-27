<?= $this->extend('template/index');?>
<?= $this->section('content');?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Profil</h1>
    <div class="row">
        <div class="col-lg-9">  
            <div class="card mb-3" >
                <div class="row no-gutters">
                    <div class="col-md-12">
                        <?php if ($user!="") {?>
                            <center><h2><?= strtoupper($user->nama); ?></h2></center>
                        <?php } ?> 
                    
                    </div>
                    <div class="col-md-4">
                        <img src="<?= base_url('/img/' . user()->user_image); ?>" class="card-img" alt="<?= user()->username; ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                        <ul class="list-group list-group-flush">
                        <?php if ($user!="") {?>
                            <li class="list-group-item"><?= $user->username; ?></li>
                            <li class="list-group-item"><?= $user->email; ?></li> 
                            <li class="list-group-item"><?= $user->alamat; ?></li> 
                            <li class="list-group-item"><?= $user->telp; ?></li>  
                            <li class="list-group-item"><?= $user->status; ?></li> 
                            <li class="list-group-item"><?= $user->jk; ?></li> 
                            <li class="list-group-item"></li>
                        <?php } else{?>
                            <li class="list-group-item"><?= user()->username; ?></li>
                            <li class="list-group-item"><?= user()->email; ?></li>
                        <?php } ?>
                        </ul>
                        </div>
                    </div>   
                     
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection();?>