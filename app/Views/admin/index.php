<?= $this->extend('template/index');?>
<?= $this->section('content');?>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Daftar Operator</h1> 

<div class="row">
    <div class="col-lg-8"> 
        <a href=" <?= base_url('Admin/tambah'); ?>" class="btn  btn-primary"><i class="fas fa-plus"></i><span>Tambah</span> </a>     
        <table class="table table-bordered" id ="myTable">
            <thead class="thead-light ">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1+(10*($currentPage-1));?>
                <?php foreach($users as $user) : ?>
                <tr>
                <td scope="row"><?= $no++; ?></td>
                <td><?= $user->username; ?></td>
                <td><?= $user->email; ?></td>
                <td><?= $user->name; ?></td>
                <td>
                    <a href="<?= base_url('admin/detail/'.$user->userid); ?>" class="btn btn-light  btn-icon-split btn-sm"><img src="img/detail.png" width="20px" height="20px"alt="Detail"> </a>
                    <a href="<?= base_url('admin/delete/'.$user->userid); ?>" onClick="return confirm('Hapus data user <?=$user->username?>?')" class="btn btn-light  btn-icon-split btn-sm"><img src="img/delete.png" width="20px" height="20px"alt="Delete"> </a>
                </td>
                </tr> 
                <?php endforeach; ?>
            </tbody>
        </table>
        <?= $pager->links('default','custom_pager') ?> 
    </div>
</div>

</div>
<?= $this->endSection();?>