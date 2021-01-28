<?php
	if (Auth::user()->dashboard_style == "light") {
		$bgmenu="blue";
    $bg="light";
    $text = "dark";
} else {
	$bgmenu="blue";
    $bg="light";
    $text = "dark";

}
?>
@extends('layouts.app')
    @section('content')
        @include('user.topmenu')
        @include('user.sidebar')
        <div class="main-panel bg-{{$bg}}">
			<div class="content bg-{{$bg}}">
				<div class="page-inner">
					<div class="mt-2 mb-4">
					<h1 class="title1 text-{{$text}}">Transactions on your account</h1>
					</div>
					@if(Session::has('message'))
					<div class="row">
						<div class="col-lg-12">
							<div class="alert alert-info alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<i class="fa fa-info-circle"></i> {{ Session::get('message') }}
							</div>
						</div>
					</div>
					@endif
		
					@if(count($errors) > 0)
					<div class="row">
						<div class="col-lg-12">
							<div class="alert alert-danger alert-dismissable" role="alert" >
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								@foreach ($errors->all() as $error)
								<i class="fa fa-warning"></i> {{ $error }}
								@endforeach
							</div>
						</div>
					</div>
					@endif
					<div class="row mb-5">
					<div class="col text-center card p-4 bg-{{$bg}}">
					<?php
					$withdraws = App\withdrawal::where('user_id', $user->id)->orderby('created_at', 'desc')->get();

					$deposits = App\deposits::where('user_id', $user->id)->orderby('created_at', 'desc')->paginate(10);
                         $transactions = $deposits->merge($activities, $withdrawals, $t_history);
                                                ?>
					    
					        <ul>
								@foreach($transactions as tx)
								<li>{{$tx->amount}}</li>

							</ul>
						</div>
					</div>
				</div>
			</div>
			@include('user.modals')	
	@endsection
	