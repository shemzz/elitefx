<?php
if (Auth('admin')->User()->dashboard_style == "light") {
    $bgmenu="blue";
    $bg="light";
    $text = "dark";
} else {
    $bgmenu="dark";
    $bg="dark";
    $text = "light";
}

?>
<div class="main-header">
    <!-- Logo Header -->
<div class="logo-header" data-background-color="{{$bgmenu}}">
        <a href="/" class="logo" style="font-size: 27px; color:#fff;">
            {{$settings->site_name}}
        </a>
    <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="icon-menu "></i>
            </span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical "></i></button>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="icon-menu "></i>
            </button>
        </div>
        
    </div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="{{$bgmenu}}">
        
        <div class="container-fluid">
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                <li class="nav-item dropdown hidden-caret">
                    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fas fa-user text-white"></i>
                    </a>
                   
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <a class="dropdown-item" href="{{ url('admin/dashboard/adminchangepassword') }}">Change Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('adminlogout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logoutform').submit();">
                                Logout
                                </a>
                                <form id="logoutform" action="{{ route('adminlogout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>


<script type="text/javascript">
    //create investment
        $("#styleform").on('change',function(){
        $.ajax({
            url: "{{url('admin/dashboard/changestyle')}}",
            type: 'POST',
            data:$("#styleform").serialize(),
            success: function (data) {
				location.reload(true);
            },
            error: function (data) {
                console.log('Something went wrong');
            },

        });
    });
</script>