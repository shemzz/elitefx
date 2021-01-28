<?php echo $__env->make('home.assetss', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body class="d-flex flex-column h-100 auth-page">
    <!-- ======= Reset Password ======= -->
    <section class="auth">
        <div class="container">
            <div class="row justify-content-center user-auth">
                <div class="col-12 col-md-8 col-sm-10 col-xl-6 ">
                    <div class="text-center">
                        <?php if(Session::has('message')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo e(Session::get('message')); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <?php endif; ?>

                        <?php if(session('status')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo e(session('status')); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <?php endif; ?>   
                    </div>
                         
                    <div class="card ">
                        <h1 class="text-center mt-3">Create new password</h1>
                        <form method="POST" action="<?php echo e(route('password.request')); ?>" class="mt-5 card__form">
                            <?php echo e(csrf_field()); ?> 
                            
                            <div class="form-group <?php echo e($errors->has('email') ? ' has-error' : ''); ?> ">
                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                <label for="email">Email address</label>
                                <input type="hidden" name="token" value="<?php echo e($token); ?>" class="form-control">
                                <input type="email" class="form-control <?php echo e($errors->has('email') ? ' has-error' : ''); ?>" name ="email" value="<?php echo e(isset($email) ? $email : old('email')); ?>"  id="email" placeholder="name@example.com" required>
                            </div>
                            <div class="form-group <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                <?php if($errors->has('password')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                                <?php endif; ?>
                                <label for="password">Password</label>
                                <input type="password" class="form-control"name="password" id="password" placeholder="Enter Password" required>
                            </div>

                            <div class="form-group <?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
                                <?php if($errors->has('password_confirmation')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                                </span>
                                <?php endif; ?>
                                <label for="password-confirm">Password Confirmation</label>
                                <input type="password" class="form-control"name="password_confirmation" id="password-confirm" placeholder="Enter Password" required>
                            </div>
                            
                            <div class="form-group">
                                <button class="btn btn-primary mt-4" type="submit">Reset Password</button>
                            </div>
    
                            <div class="text-center">
                                <hr>
                                <small class=" text-center">&copy; Copyright  <?php echo e(date('Y')); ?> &nbsp; <?php echo e($settings->site_name); ?> &nbsp; All Rights Reserved.</small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
    </section>
</body>
</html>
