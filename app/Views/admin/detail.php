<?= $this->extend('template/index');?>
<?= $this->section('content');?>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Daftar Operator</h1>  
<div class="row">
    <div class="col-lg-8">  
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('/img/' . $user->user_image); ?>" class="card-img" alt="<?= $user->username; ?>">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?= $user->username; ?></li>
                    <li class="list-group-item"><?= $user->email; ?></li>
                    <li class="list-group-item">
                        <span class="badge badge-<?= ($user->name == 'nasabah' ? 'warning':'success'); ?>"><?= $user->name; ?></span>
                    </li>
                    <li class="list-group-item">
                        <small><a href="<?= base_url('admin'); ?>">&laquo; Kembali ke daftar operator</a></small>
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