<?php
if (Auth::user()->dashboard_style == "dark") {
    $bg="light";
    $text = "dark";
} else {
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
                @if(Auth::user()->country === NULL)
                    <div class="text-center title"><span class="text-danger">You Must Set Your Country and Address!!! Update profile</span> <a href="{{ url('dashboard/profile') }}" class="text-secondary">HERE</a></div>
                @endif
                    <div class="mt-2 mb-4">
                        <h2 class="text-{{$text}} pb-2">Welcome, {{ Auth::user()->name }}!</h2>
                        <h5 id="ann" class="text-{{$text}}op-7 mb-4">{{$settings->update}}</h5>
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
     <div class="col-sm-6 btn_prepend" onclick="load_dStat()">                   
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
                             @foreach($deposited as $deposited)
                                                @if(!empty($deposited->count))
                                                {{$settings->currency}}{{$deposited->count}}
                                                @else
                                                {{$settings->currency}}0.00
                                                @endif
                                                @endforeach
                             </h4>
                         </div>
                     </div>
                 </div>
             </div>
         </div>        
     </div>
     <div class="col-sm-6 btn_prepend" onclick="load_iStat()">                            
                 <div class="card card-stats card-success card-round">
             <div class="card-body">
                 <div class="row">
                     <div class="col-3">
                         <div class="icon-big text-center">
                             <i class="flaticon-coins text-success"></i>
                         </div>
                     </div>
                     <div class="col-9 col-stats">
                         <div class="numbers">
                             <p class="card-category">Profit</p>
                             <h4 id="iCount" class="card-title">{{$settings->currency}}{{ number_format(Auth::user()->roi, 2, '.', ',')}}</h4>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         
     </div>
    <div class="col-sm-6 btn_prepend" onclick="load_Stat()">        
        <div class="card card-stats card-primary card-round">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <div class="icon-big text-center">
                            <i class="flaticon-coins text-primary"></i>
                        </div>
                    </div>
                    <div class="col-9 col-stats">
                        <div class="numbers">
                            <p class="card-category">Bonus</p>
                            <h4 id="uCount" class="card-title">{{$settings->currency}}{{ number_format(Auth::user()->ref_bonus, 2, '.', ',')}}</h4>   
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
                            <i class="flaticon-coins text-success"></i>
                        </div>
                    </div>
                    <div class="col-9 col-stats">
                        <div class="numbers">
                            <p class="card-category">Available Balance</p>
                            <h4 id="wCount" class="card-title">
                            {{$settings->currency}}{{ number_format(Auth::user()->account_bal, 2, '.', ',')}}
                            </h4>
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
                            @include('includes.chart')
                        </div>
                    </div>
                </div>
                <!-- end of chart -->
            </div>
    @endsection
   
    