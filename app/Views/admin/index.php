<?= $this->extend('template/index');?>
<?= $this->section('content');?>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Daftar Operator</h1> 

<div class="row">
    <div class="col-lg-8"> 
        <a href=" <?= base_url('Admin/tambah'); ?>" class="btn  btn-primary"><i class="fas fa-plus"></i><span>Tambah</span> </a>     
        <table class="table" id="myTable">
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
                <?php $i=1; ?>
                <?php foreach($users as $user) : ?>
                <tr>
                <td scope="row"><?= $i++; ?></td>
                <td><?= $user->username; ?></td>
                <td><?= $user->email; ?></td>
                <td><?= $user->name; ?></td>
                <td>
                    <a href="<?= base_url('admin/detail/'.$user->userid); ?>" class="btn btn-info">Detail</a>
                </td>
                </tr> 
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</div>
<?= $this->endSection();?>