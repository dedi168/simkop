<?= $this->extend('template/index');?>
<?= $this->section('content');?>
    <div class="container-fluid">

    <!-- Page Heading --> 
        <div class="row justify-content-center">
            <div class="col-lg-6"> 
                <div class="text-center">
                    
                    <h1 class="h4 text-gray-900 mb-4"><?=lang('Auth.register')?></h1>
                    </div>
                        <?= view('Myth\Auth\Views\_message_block') ?>
                        <form action="<?= route_to('register') ?>" method="post" class="user">
                            <?= csrf_field() ?> 
            
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" name="email"
                                    placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>">

                                <small id="emailHelp" class="form-text text-muted"><?=lang('Auth.weNeverShare')?></small>
                            </div>
                            <div class="form-group"> 
                                <input type="text" class="form-control  form-control-user <?php if(session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?=lang('Auth.username')?>" value="<?= old('username') ?>"> 
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" name="password"
                                        autocomplete="off" placeholder="<?=lang('Auth.password')?>">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user <?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block"> <?=lang('Auth.register')?> </button>
                            <hr> 
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </div>
<?= $this->endSection();?>