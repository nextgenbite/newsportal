@extends('layouts.admin')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-10 title">
			<h1><i class="fa fa-bars"></i> DASHBOARD</h1>
		</div>

		<div class="col-sm-12">
			<div class="content">
				<h2>Welcome to Dashboard</h2>
				<p class="welcome-text">We,ve assembled some links for you to get started.</p>
				<div class="row">
					
					<div class="col-sm-4 quick-links">
						<h4>View Records</h4>
						<p><a href="#"><i class="fa fa-bookmark-o"></i> View All Posts</a></p>
						<p><a href="#"><i class="fa fa-image"></i> View All Images</a></p>
						<p><a href="#"><i class="fa fa-video-camera"></i> View All Videos</a></p>
						<p><a href="#"><i class="fa fa-file"></i> View All Pages</a></p>
						<p><a href="#"><i class="fa fa-bar-chart"></i> View All Reports</a></p>
						<p><a href="#"><i class="fa fa-users"></i> View All Users</a></p>
					</div>
					<div class="col-sm-4 quick-links">
						<h4>Add Records</h4>
						<p><a href="#"><i class="fa fa-bookmark-o"></i> Add Posts</a></p>
						<p><a href="#"><i class="fa fa-image"></i> Add Images</a></p>
						<p><a href="#"><i class="fa fa-video-camera"></i> Add Videos</a></p>
						<p><a href="#"><i class="fa fa-file"></i> Add Pages</a></p>
						<p><a href="#"><i class="fa fa-bar-chart"></i> Add Reports</a></p>
						<p><a href="#"><i class="fa fa-users"></i> Add Users</a></p>
					</div>
				</div>
			</div>

			
		</div>
	</div>
</div>
@endsection

