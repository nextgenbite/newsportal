<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>ADMIN DASHBOARD |THE DAILY NEWS</title>
  
  
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/ionicons.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/menu.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/adminstyle.css')}}">
  <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/app.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/adminscript.js') }}"></script>	
</head>
<body>

<div class="sidebar">
	<ul class="sidebar-menu">
		<li><a href="{{ url('admin') }}" class="dashboard"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
		<li class="treeview">
            <a href="#">
              <i class="fa fa-bookmark-o"></i> <span>Posts</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ URL::to('admin/posts') }}"><i class="fa fa-eye"></i>All Posts</a></li>
              <li><a href="{{ URL::to('admin/posts/create') }}"><i class="fa fa-plus-circle"></i>Add Posts</a></li>
              <li><a href="{{ URL::to('admin/category') }}"><i class="fa fa-plus-circle"></i>Categories</a></li>
            </ul>
        </li>
        
        <li class="treeview">
            <a href="#">
              <i class="fa fa-file"></i> <span>Pages</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ URL::to('admin/pages') }}"><i class="fa fa-eye"></i>All Pages</a></li>
              <li><a href="{{ URL::to('admin/pages/create') }}"><i class="fa fa-plus-circle"></i>Add Pages</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
              <i class="fa fa-image"></i> <span>Advertisement</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ URL::to('admin/advertisement') }}"><i class="fa fa-eye"></i>All Adv.</a></li>
              <li><a href="{{ URL::to('admin/advertisement/create') }}"><i class="fa fa-plus-circle"></i>Add Adv.</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="{{ url::to('admin/message') }}">
              <i class="fa fa-envelope"></i> <span>Message</span>
              
            </a>            
        </li>
     
        
        <li class="treeview">
          <a href="{{  URL::to('admin/settings/1/edit') }}">
            <i class="fa fa-gear"></i> <span>Setting</span>
            
          </a>
      </li>
        <li class="treeview">
            <a href="#">
              <i class="fa fa-user-plus"></i> <span>Users</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-eye"></i>All Users</a></li>
              <li><a href="#"><i class="fa fa-plus-circle"></i>Add Users</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
              <i class="fa fa-address-book"></i> <span>{{ Auth::user()->name }}</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
            
              <li><a   href="{{ route('register') }}"><i class="fa fa-user"></i> {{ __('Add User') }}</a></li>
              <li><a   href="{{ route('logout') }}"><i class="fa fa-power-off"></i> {{ __('Logout') }}</a></li>
            </ul>
        </li>		
	</ul>
</div>
{{-- header --}}
@yield('content')

{{-- footer --}}

<footer>
	<div class="col-sm-6">
		Copyright &copy; {{ date('Y') }} <a href="#">NextGenBytes</a> All rights reserved. 
	</div>

</footer>


</body>
</html>