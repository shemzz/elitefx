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
					<div class="row mb-5">
						<div class="col-12 text-center card bg-{{$bg}} p-3">
							<h1 class="title1 text-{{$text}}">{{$settings->site_name}} Support</h1>
							<div class="sign-up-row widget-shadow text-{{$text}}">
								<h4 class="text-{{$text}}">For inquiries, suggestions or complains. Mail us at</h4>
								<h5 class="text-{{$text}} mt-3">{{$settings->contact_email}}
							</div>
						</div>
						<div class="col-12">
						    <div class="form">

          @if(Session::has('message'))
          <div class="col-lg-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ Session::get('message') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
          @endif

          <form  action="{{action('UsersController@sendcontact')}}"  method="POST" role="form" class="contactForm">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="form3" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required/>
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="form2" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" required/>
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject"required />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" id="form8" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message" required></textarea>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="validation"></div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>
						</div>
					</div>
				</div>
			</div>
    @endsection