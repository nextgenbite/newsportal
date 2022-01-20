<!DOCTYPE html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
@yield('title')
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/bootstrap-theme.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>
<div class="col-md-12 top" id="top">
	<div class="col-md-9 top-left">
    	<div class="col-md-3">
    		<span class="day">{{ date('l, d M , Y') }}</span> 
        </div>
        <div class="col-md-9">
        	<span class="latest">Latest: </span> <a href="{{ url('post/'.$latest_news->slug) }}">{{ $latest_news->title }}</a>
        </div>
    </div>
    <div class="col-md-3">
	
    	<a href="{{ $setting->social  }}"><i class="fa fa-facebook"></i></a>
			
	
    	<a href="#"><img src="{{asset('images/icon-twitter.png')}}" /></a>
    	<a href="#"><img src="{{asset('images/icon-google.png')}}" /></a>
    	<a href="#"><img src="{{asset('images/icon-insta.png')}}" /></a>
    	<a href="#"><img src="{{asset('images/icon-pin.png')}}" /></a>
    	<a href="#"><img src="{{asset('images/icon-youtube.png')}}" /></a>
    </div>
</div>

<div class="col-md-12 brand">
	<div class="col-md-4 name">
		@if ($setting->image)
		<img width="100%" src="{{ $setting->image }}" alt="">	
		@else
			
    	<font color="#555555">THE DAILY</font><font color="#2ca0c9">NEWS</font>
		@endif
    </div>
    <div class="col-md-8">
		@if ($leaderboard)
			
    	<a href="{{ $leaderboard->url }}"><img class="img-rounded" src="{{ $leaderboard->image }}" alt="{{ $leaderboard->title }}" width="100%" /></a>
		@endif
    </div>
</div>

<div class="col-md-12 main-menu">
	<div class="col-md-10 menu">
		<nav class="navbar">
			<div class="navbar-header">
    			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar"> 
					<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
        		</button>
        		<span class="navbar-brand"><font color="#555555">COLOR</font><font color="#2ca0c9">MAG</font></span>
    		</div>
    		<div class="collapse navbar-collapse" id="mynavbar">
    			<ul class="nav nav-justified">
    				<li><a href="{{ '/' }}" class="active"><span class="glyphicon glyphicon-home"></span></a></li>
					@foreach ($categories as $cat)
				<li><a href="{{ url('category/'.$cat->slug) }}">{{ strtoupper($cat->title) }}</a></li>
					@endforeach
    				
    				
        		</ul> 
			</div>
		</nav>
	</div>
	<div class="col-md-2 ">
		<div class="search">
	
				<input type="search" id="search_content" class=" form-control">
				{{-- <input type="search" id="search_content" class="form-control" /> --}}
				<span class="glyphicon glyphicon-search search-btn"></span>
				<div id="search-output"></div>

		
		</div>
    </div>
</div> 
                            {{-- header --}}
@yield('content')
                            {{-- footer --}}

<div class="col-md-12 bottom">
<div class="col-md-4">
	<h3 style="border-bottom:2px solid #ccc;"><span style="border-bottom:2px solid #f00;">About Us</span></h3>
	<span class="name">@if ($setting->image)
		<img width="100%" src="{{ $setting->image }}" alt="">	
	@else
	<font color="#e03521">COLOR</font><font color="#fff">MAG</font>
	@endif</span>
	<p align="justify">{{ $setting->about }}}}</p>
</div>
<div class="col-md-4">
	<div class="col-md-12">
		<h3 style="border-bottom:2px solid #ccc;"><span style="border-bottom:2px solid #f00;">Quick Links</span></h3>
	
		<ul class="nav">
			@foreach ($quicklink as  $ql)
	
				
			<li><a href="{{url('page') }}/{{ $ql->slug }}">{{ $ql->title }}</a></li>
			
			
			@endforeach
			<li><a href="{{url('contact-us') }}">Contact Us</a></li>
	</ul>
	
	</div>    
 

	    
</div>							


<div class="col-md-4">
    <h3 style="border-bottom:2px solid #ccc;"><span style="border-bottom:2px solid #f00;">Contact Us</span></h3>
    <span class="name">@if ($setting->image)
		<img width="100%" src="{{ $setting->image }}" alt="">	
	@else
	<font color="#e03521">COLOR</font><font color="#fff">MAG</font>
	@endif</span><br />
    Follow us at:<br /><br />
    <a href="#"><img src="{{asset('images/icon-fb.png')}}" /></a>
    <a href="#"><img src="{{asset('images/icon-twitter.png')}}" /></a>
    <a href="#"><img src="{{asset('images/icon-google.png')}}" /></a>
    <a href="#"><img src="{{asset('images/icon-insta.png')}}" /></a>
    <a href="#"><img src="{{asset('images/icon-pin.png')}}" /></a>
    <a href="#"><img src="{{asset('images/icon-youtube.png')}}" /></a><br />
    <a href="#top" class="goto"><span class="glyphicon glyphicon-chevron-up"></span></a><br />
</div>
</div>

<div class="col-md-12 text-center copyright">
Copyright &copy; {{ date('Y') }} <a href="#">E Stars</a> Powered by: <a href="#">NextGenBytes</a>
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script>            
	$(document).ready(function() {
		var duration = 500;
		$(window).scroll(function() {
			if ($(this).scrollTop() > 200) {
				$('.goto').fadeIn(duration);
			} else {
				$('.goto').fadeOut(duration);
			}
		});

		$('.goto').click(function(event) {
			event.preventDefault();
			$('html').animate({scrollTop: 0}, duration);
			return false;
		})
		$('#search_content').keyup(function(){
			var text = $('#search_content').val();
			if(text.length < 1){
				$('#search-output').hide();
				return false;

			}else{
				$.ajax({
					type : "GET",
					url : "{{URL::to('search-content') }}",
					data : {text:text},
					success: function(res){
						  $('#search-output').show(res);
						$('#search-output').html(res);
					}
				})

			}
		})
	});
</script>


	
</body>
</html>

                    



