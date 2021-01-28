<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="mt-2 mb-4">
				<h2 class="text-white pb-2">Welcome, <?php echo e(Auth::user()->name); ?>!</h2>
				<h5 id="ann" class="text-white op-7 mb-4"><?php echo e($settings->update); ?></h5>
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
			<div class="row row-card-no-pd">
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body ">
							<div class="row">
								<div class="col-5">
									<div class="icon-big text-center">
										<i class="fa fa-download text-warning"></i>
									</div>
								</div>
								<div class="col-7 col-stats">
									<div class="numbers">
										<p class="card-category">Deposited</p>
										<?php $__currentLoopData = $deposited; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deposited): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if(!empty($deposited->count)): ?>
										<?php echo e($settings->currency); ?><?php echo e($deposited->count); ?>

										<?php else: ?>
										<?php echo e($settings->currency); ?>0.00
										<?php endif; ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body ">
							<div class="row">
								<div class="col-5">
									<div class="icon-big text-center">
										<i class="flaticon-coins text-success"></i>
									</div>
								</div>
								<div class="col-7 col-stats">
									<div class="numbers">
										<p class="card-category">Profit</p>
										<h4 class="card-title"><?php echo e($settings->currency); ?><?php echo e(number_format(Auth::user()->roi, 2, '.', ',')); ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body">
							<div class="row">
								<div class="col-5">
									<div class="icon-big text-center">
										<i class="fa fa-gift text-danger"></i>
									</div>
								</div>
								<div class="col-7 col-stats">
									<div class="numbers">
										<p class="card-category">Bonus</p>
										<h4 class="card-title"><?php echo e($settings->currency); ?> <?php echo e(number_format($total_bonus->bonus, 2, '.', ',')); ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body">
							<div class="row">
								<div class="col-5">
									<div class="icon-big text-center">
										<i class="fa fa-retweet text-primary"></i>
									</div>
								</div>
								<div class="col-7 col-stats">
									<div class="numbers">
										<p class="card-category">Ref. Bonus</p>
										<h4 class="card-title"><?php echo e($settings->currency); ?><?php echo e(number_format(Auth::user()->ref_bonus, 2, '.', ',')); ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body ">
							<div class="row">
								<div class="col-5">
									<div class="icon-big text-center">
										<i class="flaticon-coins text-success"></i>
									</div>
								</div>
								<div class="col-7 col-stats">
									<div class="numbers">
										<p class="card-category">Balance</p>
										<h4 class="card-title"><?php echo e($settings->currency); ?><?php echo e(number_format(Auth::user()->account_bal, 2, '.', ',')); ?></h4> <br>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body">
							<div class="row">
								<div class="col-5">
									<div class="icon-big text-center">
										<i class="fa fa-envelope text-danger"></i>
									</div>
								</div>
								<div class="col-7 col-stats">
									<div class="numbers">
										<p class="card-category">Total Packages</p>
										<?php if(count($user_plan)>0): ?>
										<h4 class="card-title"><?php echo e($user_plan->count()); ?></h4>
										<?php else: ?>
										<h4 class="card-title">0</h4>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body">
							<div class="row">
								<div class="col-5">
									<div class="icon-big text-center">
										<i class="fa fa-envelope-open text-primary"></i>
									</div>
								</div>
								<div class="col-7 col-stats">
									<div class="numbers">
										<p class="card-category">Active Packages</p>
										
										<?php if(count($user_plan_active)>0): ?>
										<h4 class="card-title"><?php echo e($user_plan_active->count()); ?></h4>
										<?php else: ?>
										<h4 class="card-title">0</h4>
										<?php endif; ?>
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
		
	<?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
	