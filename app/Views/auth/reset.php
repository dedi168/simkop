<?= $this->extend('template/index');?>
<?= $this->section('content');?>
    <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row"> 
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4"><?=lang('Auth.resetYourPassword')?></h1>
                                </div>                    
                                <?= view('Myth\Auth\Views\_message_block') ?>

                                <form action="<?= base_url('Reset/attemptReset') ?>" method="post" class="user">
                                <?= csrf_field() ?> 
 
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" name="email"
                                        placeholder="<?=lang('Auth.email')?>" value="<?= user()->email ?>">
                                    </div> 
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" name="password"
                                                 autocomplete="off" placeholder="<?=lang('Auth.password')?>">
                                                 <div class="invalid-feedback">
                                                    <?= session('errors.password') ?>
                                                </div>
                                                    
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user <?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
                                            <div class="invalid-feedback">
                                                <?= session('errors.pass_confirm') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block"> <?=lang('Auth.resetPassword')?> </button>
                                    
                                </form>
                                <hr>
                                 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?= $this->endSection();?>