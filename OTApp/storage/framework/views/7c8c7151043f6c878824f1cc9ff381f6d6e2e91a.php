<?php
if (Auth::user()->dashboard_style == "dark") {
    $bg="light";
    $text = "dark";
} else {
    $bg="dark";
    $text = "light";
}

?>



    <?php $__env->startSection('content'); ?>
        <?php echo $__env->make('user.topmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('user.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="main-panel bg-<?php echo e($bg); ?>">
            <div class="content bg-<?php echo e($bg); ?>">
                <div class="page-inner">
                <?php if(Auth::user()->country === NULL): ?>
                    <div class="text-center title"><span class="text-danger">You Must Set Your Country and Address!!! Update profile</span> <a href="<?php echo e(url('dashboard/profile')); ?>" class="text-secondary">HERE</a></div>
                <?php endif; ?>
                    <div class="mt-2 mb-4">
                        <h2 class="text-<?php echo e($text); ?> pb-2">Welcome, <?php echo e(Auth::user()->name); ?>!</h2>
                        <h5 id="ann" class="text-<?php echo e($text); ?>op-7 mb-4"><?php echo e($settings->update); ?></h5>
                        <script type="text/javascript">
                            var announment = $("#ann").html();
                            console.log(announment);
                            swal({
                                title: "Annoucement!",
                                text: announment,
                                icon: "info",
                                buttons: {
                                    confirm: {
                                        text: "Okay",
                                        value: true,
                                        visible: true,
                                        className: "btn btn-info",
                                        closeModal: true
                                    }
                                }
                            });
                        </script>
                    </div>
                    <?php if(Session::has('message')): ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-info-circle"></i> <?php echo e(Session::get('message')); ?>

                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
        
                    <?php if(count($errors) > 0): ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-danger alert-dismissable" role="alert" >
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <i class="fa fa-warning"></i> <?php echo e($error); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                            <!-- Beginning of  Dashboard Stats  -->
                    <style>
                        .beegee {
                            background-color: #202940 !important;
                        }
                    </style>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="card card-stats card-round beegee">
                                <div class="card-body text-white">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="fa fa-download text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Total Deposit</p>
                                                <h4 class="card-title text-white"><?php $__currentLoopData = $deposited; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deposited): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(!empty($deposited->count)): ?>
                                                <?php echo e($settings->currency); ?><?php echo e($deposited->count); ?>

                                                <?php else: ?>
                                                <?php echo e($settings->currency); ?>0.00
                                                <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="card card-stats card-round beegee">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-coins text-success"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Profit</p>
                                                <h4 class="card-title text-white"><?php echo e($settings->currency); ?><?php echo e(number_format(Auth::user()->roi, 2, '.', ',')); ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="card card-stats card-round beegee">
                                <div class="card-body text-white">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="fa fa-retweet text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Ref. Bonus</p>
                                                <h4 class="card-title text-white"><?php echo e($settings->currency); ?><?php echo e(number_format(Auth::user()->ref_bonus, 2, '.', ',')); ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="card card-stats card-round beegee">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-coins text-success"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Balance</p>
                                                <h4 class="card-title text-white"><?php echo e($settings->currency); ?><?php echo e(number_format(Auth::user()->account_bal, 2, '.', ',')); ?></h4>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- Beginning of chart -->
                <div class="row">
                    <div class="col-12">
                        <div id="chart-page">
                            <?php echo $__env->make('includes.chart', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                    </div>
                </div>
                <!-- end of chart -->
            </div>
    <?php $__env->stopSection(); ?>
   
    
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>