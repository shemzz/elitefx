<?php
if (Auth('admin')->User()->dashboard_style == "light") {
    $text = "dark";
} else {
    $text = "light";
}
?>
@extends('layouts.app')
@section('content')
@include('admin.topmenu')
@include('admin.sidebar')
<div class="main-panel">
    <div class="content bg-{{Auth('admin')->User()->dashboard_style}}">
        <div class="page-inner">
            @if(Session::has('message'))
            <div class="row mt-2">
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
                    <div class="alert alert-danger alert-dismissable" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        @foreach ($errors->all() as $error)
                        <i class="fa fa-warning"></i> {{ $error }}
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col">
                    @if($settings->enable_kyc =="yes")
                    <a href="{{ url('admin/dashboard/kyc') }}" class="btn btn-warning btn-lg">KYC</a>
                    @endif

                </div>
            </div>
            <div class="card">
                <div class="card-header card_header_bg_blue">
                    <div class="card-head-row card-tools-still-right">
                        <h4 class="card-title"> {{$user->name}} {{$user->l_name}} </h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row pad_top_20">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                <h4>Email: {{$user->email}}</h4>
                            <h4><em>Phone:</em> {{$user->phone_number}}</h4>
                            <h4><em>Address:</em> {{$user->adress}}</h4>
                            <h4><em>Country:</em> {{$user->country}}</h4>
                            <h4><em>Joined:</em> {{\Carbon\Carbon::parse($user->created_at)->toDayDateTimeString()}}</h4>
                            <p>Referred By: {{$user->ref_by}}</p>
                            <p>Ref Link: {{$user->ref_link}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card full-height">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h2 class="text-success"> Account Summary </h2>
                                    </div>
                                    <hr>
                                    <div class="row py-3  position_relative">
                                        <div class="col-md-6 d-flex flex-column justify-content-around">
                                            <div class="border_btm_1">
                                                <h4 class="fw-bold  text-info op-8"> Wallet Balance </h4>
                                                <h3 class="fw-bold">$ {{$user->account_bal}}</h3>
                                                <div class="colhd margin_top_n10 font_10"> </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div>
                                                <h4 class="fw-bold text-info op-8"> Bonus </h4>
                                                <h3 class="fw-bold">$ {{$user->bonus}}</h3>
                                                <div class="colhd margin_top_n10 font_10 "> </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="border_btm_1">
                                                <h4 class="fw-bold text-info op-8"> Profit </h4>
                                                <h3 class="fw-bold">$ {{$user->roi}}</h3>
                                                <div class="colhd margin_top_n10 font_10"> </div>
                                                <br>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div>
                                                    @if($user->btc_address !== NULL)  
                                                <p>BTC: Wallet: {{$user->btc_address}}</p>
                                                @endif
                                                
                                                    @if($user->eth_address !== NULL)  
                                                <p>ETH: Wallet: {{$user->eth_address}}</p>
                                                @endif
                                                
                                                    @if($user->ltc_address !== NULL)  
                                                <p>LTC: Wallet: {{$user->ltc_address}}</p>
                                                @endif
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- Account Actions -->
                    <div class="accordion" id="userActions">
                        <div class="card">
                            <div class="card-header bg-danger" id="Block">
                                <h5 class="mb-0">
                                @if($user->status==NULL || $user->status=='blocked')
													<a class="btn text-white btn-link" href="{{ url('admin/dashboard/uunblock') }}/{{$user->id}}">Unblock</a> 
													@else
													<a class="btn btn-link text-white" href="{{ url('admin/dashboard/uublock') }}/{{$user->id}}">Block</a>
													@endif
                                </h5>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-secondary" id="Credit">
                                <h5 class="mb-0">
                                    <button class="btn text-white btn-link collapsed" type="button" data-toggle="collapse" data-target="#credit" aria-expanded="false" aria-controls="credit">
                                        Credit/Debit User
                                    </button>
                                </h5>
                            </div>
                            <div id="credit" class="collapse" aria-labelledby="Credit" data-parent="#userActions">
                                <div class="card-body">
                                    <form style="padding:3px;" role="form" method="post" action="{{route('topup')}}">
                                        <div class="form-group">
                                            <label for="amount">Amount</label>
                                            <input class="form-control" id="amount" placeholder="Enter amount" type="text" name="amount" required><br />
                                        </div>
                                        <div class="form-group">
                                            <label for="type">Select where to credit/debit</label>
                                            <select id="type" class="form-control" name="type" required>
                                                <option value="">Select Column</option>
                                                <option value="Bonus">Bonus</option>
                                                <option value="Profit">Profit</option>
                                                <option value="Ref_Bonus">Ref_Bonus</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="t_type">Select credit to add, debit to subtract.</label>
                                            <select id="t_type" class="form-control" name="t_type" required>
                                                <option value="">Select type</option>
                                                <option value="Credit">Credit</option>
                                                <option value="Debit">Debit</option>
                                            </select>
                                        </div>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="user_id" value="{{$user->id}}">
                                        <input type="submit" class="btn btn-{{$text}}" value="Save">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-warning" id="Reset">
                                <h5 class="mb-0">
                                    <button class="btn text-white btn-link collapsed" type="button" data-toggle="collapse" data-target="#reset" aria-expanded="false" aria-controls="reset">
                                        Reset Password
                                    </button>
                                </h5>
                            </div>
                            <div id="reset" class="collapse" aria-labelledby="Reset" data-parent="#userActions">
                                <div class="card-body">
                                <p class="text-{{$text}}">Are you sure you want to reset password for {{$user->name}} {{$user->l_name}} to <span class="text-primary font-weight-bolder">user01236</span></p>
												<a class="btn" href="{{ url('admin/dashboard/resetpswd') }}/{{$user->id}}">Reset Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-danger" id="Clear">
                                <h5 class="mb-0">
                                    <button class="btn text-white btn-link collapsed" type="button" data-toggle="collapse" data-target="#clear" aria-expanded="false" aria-controls="clear">
                                        Clear Account
                                    </button>
                                </h5>
                            </div>
                            <div id="clear" class="collapse" aria-labelledby="Clear" data-parent="#userActions">
                                <div class="card-body">
                                <h2>You are clearing account for {{$user->name}} {{$user->l_name}} to $0.00</h2>
												<a class="btn btn-{{$text}}" href="{{ url('admin/dashboard/clearacct') }}/{{$user->id}}">Proceed</a>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-danger" id="Delete">
                                <h5 class="mb-0">
                                    <button class="btn text-white btn-link collapsed" type="button" data-toggle="collapse" data-target="#delete" aria-expanded="false" aria-controls="delete">
                                        Delete
                                    </button>
                                </h5>
                            </div>
                            <div id="delete" class="collapse" aria-labelledby="Delete" data-parent="#userActions">
                                <div class="card-body">
                                <h2 class="text-{{$text}}">Are you sure you want to delete {{$user->name}} {{$user->l_name}}</h2>
                                                    <a class="btn btn-danger" href="{{ url('admin/dashboard/delsystemuser') }}/{{$user->id}}">Yes i'm sure</a>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-info" id="Edit">
                                <h5 class="mb-0">
                                    <button class="btn text-white btn-link collapsed" type="button" data-toggle="collapse" data-target="#edit" aria-expanded="false" aria-controls="edit">
                                        Edit
                                    </button>
                                </h5>
                            </div>
                            <div id="edit" class="collapse" aria-labelledby="Edit" data-parent="#userActions">
                                <div class="card-body">
                                    <form style="padding:3px;" role="form" method="post" action="{{route('edituser')}}">
                                        <input style="padding:5px;" class="form-control" value="{{$user->name}}" type="text" disabled>

                                        <div class="form-group">
                                            <label for="">First Name</label>
                                            <input style="padding:5px;" class="form-control" value="{{$user->name}}" type="text" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Last Name</label>
                                            <input style="padding:5px;" class="form-control" value="{{$user->l_name}}" type="text" name="l_name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input style="padding:5px;" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$user->email}}" type="text" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Phone</label>
                                            <input style="padding:5px;" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$user->phone_number}}" type="text" name="phone" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Referral Link</label>
                                            <input style="padding:5px;" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$user->ref_link}}" type="text" name="ref_link" required>
                                        </div>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="user_id" value="{{$user->id}}">
                                        <input type="submit" class="btn btn-{{$text}}" value="Update user">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-primary" id="Message">
                                <h5 class="mb-0">
                                    <button class="btn text-white btn-link collapsed" type="button" data-toggle="collapse" data-target="#message" aria-expanded="false" aria-controls="message">
                                        Send Message
                                    </button>
                                </h5>
                            </div>
                            <div id="message" class="collapse" aria-labelledby="Message" data-parent="#userActions">
                                <div class="card-body">
                                    <h2>This message will be sent to {{$user->name}} {{$user->l_name}} </h2>
                                    <form style="padding:3px;" role="form" method="post" action="{{action('Admin\LogicController@sendmailtooneuser')}}">
                                        <input type="hidden" name="user_id" value="{{$user->id}}">
                                        <textarea placeholder="Type your message here" class="form-control" name="message" row="3" placeholder="Type your message here" required></textarea><br />

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn" value="Send">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-success" id="Access">
                                <h5 class="mb-0">
                                    <button class="btn text-white btn-link collapsed" type="button" data-toggle="collapse" data-target="#access" aria-expanded="false" aria-controls="access">
                                        Access User Account
                                    </button>
                                </h5>
                            </div>
                            <div id="access" class="collapse" aria-labelledby="Access" data-parent="#userActions">
                                <div class="card-body">
                                    <h2>You are about to login as {{$user->name}} {{$user->l_name}}</h2>
                                    <a class="btn btn-{{$text}}" href="{{ url('admin/dashboard/switchuser') }}/{{$user->id}}">Proceed</a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('admin.includes.modals')
    @endsection