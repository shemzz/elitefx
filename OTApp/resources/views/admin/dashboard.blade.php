<?php
if (Auth('admin')->User()->dashboard_style == "light") {
    $bg="light";
    $text = "dark";
} else {
    $bg="light";
    $text = "dark";
}

?>
@extends('layouts.app')
    @section('content')
        @include('admin.topmenu')
        @include('admin.sidebar')
        <div class="main-panel">
        <div class="content bg-{{$bg}}">
                <div class="page-inner">
                    <div class="mt-2 mb-4">
                        <h2 class="text-{{$text}} pb-2">Welcome, {{ Auth('admin')->User()->firstName }} {{ Auth('admin')->User()->lastName }}!</h2>
                        <h5 id="ann" class="text-{{$text}} op-7 mb-4">{{$settings->update}}</h5>
                        
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
                    <!-- Beginning of  Dashboard Stats  -->
                    <div class="row margin_top_10"> 
    <div class="col-sm-3 btn_prepend" onclick="load_Stat()">        
        <div class="card card-stats card-primary card-round">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="flaticon-users"></i>
                        </div>
                    </div>
                    <div class="col-7 col-stats">
                        <div class="numbers">
                            <p class="card-category">Users</p>
                            <h4 id="uCount" class="card-title">{{$user_count}} <span>({{$activeusers}} active)</span></h4>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-3 btn_prepend" onclick="load_iStat()">                            
                <div class="card card-stats card-success card-round">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <div class="icon-big text-center">
                            <i class="flaticon-users"></i>
                        </div>
                    </div>
                    <div class="col-9 col-stats">
                        <div class="numbers">
                            <p class="card-category">Investment</p>
                            <h4 id="iCount" class="card-title">$ 0.00 <span>({{$plans}} Plans)</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <div class="col-sm-3 btn_prepend" onclick="load_dStat()">                   
                <div class="card card-stats card-secondary  card-round">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <div class="icon-big text-center">
                            <i class="flaticon-users"></i>
                        </div>
                    </div>
                    <div class="col-9 col-stats">
                        <div class="numbers">
                            <p class="card-category">Deposits</p>
                            <h4 id="dCount" class="card-title">
                            @foreach($total_deposited as $deposited)
                                                @if(!empty($deposited->count))
                                                {{$settings->currency}}{{$deposited->count}}
                                                @else
                                                {{$settings->currency}}0.00
                                                @endif
                                                @endforeach

                                                (@foreach($pending_deposited as $deposited)
                                                @if(!empty($deposited->count))
                                                {{$settings->currency}}{{$deposited->count}}
                                                @else
                                                {{$settings->currency}}0.00
                                                @endif
                                                @endforeach pending)
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>

    <div class="col-sm-3 btn_prepend" onclick="load_wStat()">        
                                                
                                    
                <div class="card card-stats card-warning card-round">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <div class="icon-big text-center">
                            <i class="flaticon-users"></i>
                        </div>
                    </div>
                    <div class="col-9 col-stats">
                        <div class="numbers">
                            <p class="card-category">Withdrawal</p>
                            <h4 id="wCount" class="card-title">
                            @foreach($total_withdrawn as $deposited)
                                                @if(!empty($deposited->count))
                                                {{$settings->currency}}{{$deposited->count}}
                                                @else
                                                {{$settings->currency}}0.00
                                                @endif
                                                @endforeach

                                                (@foreach($pending_withdrawn as $deposited)
                                                @if(!empty($deposited->count))
                                                {{$settings->currency}}{{$deposited->count}}
                                                @else
                                                {{$settings->currency}}0.00
                                                @endif
                                                @endforeach pending)
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
        
    </div>

</div>
                    <!-- Beginning of chart -->
                {{-- <div class="row">
                    <div class="col-12">
                        <div id="chart-page">
                            @include('admin.includes.chart')
                        </div>
                    </div>
                </div> --}}
                <!-- end of chart -->
            </div>
        </div>
    @endsection


    