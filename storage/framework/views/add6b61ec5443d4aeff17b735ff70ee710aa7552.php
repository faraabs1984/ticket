<?php
    $logo = Utility::get_superadmin_logo();
?>



<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Login')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="auth-wrapper auth-v3">
        <div class="bg-auth-side bg-primary"></div>
        <div class="auth-content">
            <nav class="navbar navbar-expand-md navbar-light default">
                <div class="container-fluid pe-2">
                    <a class="navbar-brand" href="#">
                        <img src="<?php echo e(asset(Storage::url('logo/'.$logo))); ?>" alt="logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo01" style="flex-grow: 0;">
                        <ul class="navbar-nav align-items-center ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" href="<?php echo e(route('home')); ?>"><?php echo e(__('Create Ticket')); ?></a>
                            </li>
                            <li class="nav-item">
                                <?php if($setting['FAQ'] == 'on'): ?>
                                    <a class="nav-link" href="<?php echo e(route('faq')); ?>"><?php echo e(__('FAQ')); ?></a>
                                <?php endif; ?>
                            </li>
                            <li class="nav-item">
                                <?php if($setting['Knowlwdge_Base'] == 'on'): ?>
                                    <a href="<?php echo e(route('knowledge')); ?>" class="nav-link"><?php echo e(__('Knowledge')); ?></a>
                                <?php endif; ?>
                            </li>               
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('search')); ?>"><?php echo e(__('Search Ticket')); ?></a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">

                            </li>
                        </ul>
                    </div>
                </div>
            </nav>


            <div class="card">
                <div class="row align-items-center text-start">
                    <div class="col-xl-6">
                        <div class="card-body">
                            <div class="">
                                <h2 class="mb-3 f-w-600"><?php echo e(__('Login')); ?></h2>
                            </div>
                            <form method="POST" action="<?php echo e(route('login')); ?>" id="form_data">
                                <?php echo csrf_field(); ?>
                                <?php if(session()->has('info')): ?>
                                    <div class="alert alert-success">
                                        <?php echo e(session()->get('info')); ?>

                                    </div>
                                <?php endif; ?>
                                <?php if(session()->has('status')): ?>
                                    <div class="alert alert-info">
                                        <?php echo e(session()->get('status')); ?>

                                    </div>
                                <?php endif; ?>

                                <div class="">
                                    <div class="form-group mb-3">
                                        <label for="email" class="form-label"><?php echo e(__('Email')); ?></label>
                                        
                                        <input type="email" class="form-control <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>"
                                            id="email" name="email" placeholder="<?php echo e(__('Email address')); ?>" required=""
                                            value="<?php echo e(old('email')); ?>">
                                        <div class="invalid-feedback d-block">
                                            <?php echo e($errors->first('email')); ?>

                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label"><?php echo e(__('Password')); ?></label>
                                        <input type="password" class="form-control <?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" id="password" name="password" placeholder="<?php echo e(__('Enter Password')); ?>" required=""
                                        value="<?php echo e(old('password')); ?>">
                                        <div class="invalid-feedback d-block">
                                            <?php echo e($errors->first('password')); ?>

                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <a href="<?php echo e(route('password.request')); ?>" class="d-block mt-2"><small><?php echo e(__('Forgot password?')); ?></small>
                                        </a>
                                    </div>
                                    <div class="d-grid">
                                        <button class="btn btn-primary btn-block mt-2" id="login_button"><?php echo e(__('Login')); ?></button> 
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="col-xl-6 img-card-side">
                        <div class="auth-img-content">
                            <img src="<?php echo e(asset('assets/images/auth/img-auth-3.svg')); ?>" alt="" class="img-fluid">
                            <h3 class="text-white mb-4 mt-5">“Attention is the new currency”</h3>
                            <p class="text-white">The more effortless the writing looks, the more effort the writer
                                actually put into the process.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="auth-footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6">
                            <p class="text-muted"><?php echo e(env('FOOTER_TEXT')); ?></p>
                        </div>
                        <div class="col-6 text-end">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    
    <script>
    $(document).ready(function () {
        $("#form_data").submit(function (e) {
            $("#login_button").attr("disabled", true);
            return true;
        });
    });
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/ticket/resources/views/auth/login.blade.php ENDPATH**/ ?>