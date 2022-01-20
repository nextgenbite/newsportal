@extends('layouts.master')
@section('content')
<div class="wrapper">
	@if (count($featured) >0)
		
	<div class="row">
		@foreach ($featured as $key=> $f )
			@if ($key == 0)
				
			<div class="col-md-6">
				<div class="relative">
				<a href="{{ url('post') }}/{{ $f->slug }}"><img src="{{ $f->image }}" width="100%"  height="355"/>
					<span class="caption"> {{$f->title}} </span>
				</a>
			</div>
			</div>
			@endif
		@endforeach
	
    	<div class="col-md-6">
    		<div class="row">
				@foreach ($featured as $key=> $f )
				@if ($key> 0 && $key <3)
        		<div class="col-md-6">
					<div class="relative">
						<a href="{{ url('post/'.$f->slug) }}"><img src="{{ $f->image }}" width="100%" height="162" />
							<span class="caption">{{$f->title}}</span>
						</a>
					</div>
        		</div>
				@endif
				@endforeach
		</div>
        	   
        	<div class="row" style="margin-top:30px;">
				@foreach ($featured as $key=> $f )
				@if ($key> 3 && $key <6)
        		<div class="col-md-6">
					<div class="relative">
						<a href="{{ url('post/'.$f->slug) }}"><img src="{{ $f->image }}" width="100%" height="162" />
							<span class="caption">{{$f->title}}</span>
						</a>
					</div>
        	    </div>
				@endif
				@endforeach
			
        	    
        	</div>        
    	</div>
	</div>
    @endif
    <div class="row" style="margin-top:30px;">
    	<div class="col-md-8">
        <div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 0px;">
        	<div class="col-md-12">
        		<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">GENERAL NEWS</span></h3>
        	</div>
        	<div class="col-md-6">
				@foreach ($general as $key=>$gnews)
					@if ($key ==0)
						
					<img src="{{ $gnews->image }}" width="100%" style="margin-bottom:15px;" />
					<p align="justify">{!! substr($gnews->body,0,300) !!}</p> <a href="{{ URL::to('post',$gnews->slug) }}">Read more &raquo;</a>
					@endif
				@endforeach
            </div>
            <div class="col-md-6">
				@foreach ($general as $key=>$gnews)
					@if ($key >0 && $key <6)
            	<div class="row" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row">
    	            		<img src="{{ $gnews->image }}" width="100%" />
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row">
							<a href="{{ URL::to('post',$gnews->slug) }}"><h4>{{ $gnews->title }}</h4></a>
                			
                		</div>
                    </div>
                </div>
				@endif
				@endforeach

                   
            </div>
        </div>
        
	        <div class="col-md-12 image-gallery" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-top:30px; margin-bottom:30px;">
    	    	<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">BUSINESS</span></h3>
				<div class="flex">
					@foreach ($business->take(5) as $b)
					<div>
						
						<a href="{{ url('post/'.$b->slug) }}"><img src="{{ $b->image }}" /></a>
					</div>
					
						@endforeach
				</div>
	        </div>
			
        <div class="row">
        	<div class="col-md-6">
            <div class="col-md-12" style="border:1px solid #ccc; padding-bottom:30px;">
            	<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:20px 10px; margin-bottom:10px;">
                <h3 style="border-bottom:3px solid #b952c8; padding-bottom:5px;"><span style="padding:6px 12px; background:#b952c8;">SPORTS</span></h3>
				@foreach ($sports as $key=>$s)
					@if ($key ==0)
						
					<img src="{{ $s->image }}" width="100%" style="margin-bottom:15px;" />
					<p align="justify">{!! substr($s->body,0,300) !!}</p> <a href="{{ URL::to('post',$s->slug) }}">Read more &raquo;</a>
					@endif
				@endforeach
            	</div>
				@foreach  ($sports as $key=>$s)
				@if ($key> 0 && $key <5)
                <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row fashion">
    	            		<img src="{{ $s->image }}" width="100%" />
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row">
							<a href="{{ URL::to('post',$s->slug) }}"><h4>{{ $s->title }}</h4></a>
                		
                		</div>
                    </div>
                </div>
				@endif
				@endforeach


              

            </div></div>
        	<div class="col-md-6">
            <div class="col-md-12" style="border:1px solid #ccc; padding-bottom:30px;">
            	<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:20px 10px; margin-bottom:10px;">
                <h3 style="border-bottom:3px solid #d95757; padding-bottom:5px;"><span style="padding:6px 12px; background:#d95757;">TECHNOLOGY</span></h3>
				@foreach ($technology as $key=>$t)
					@if ($key ==0)
						
					<img src="{{ $t->image }}" width="100%" style="margin-bottom:15px;" />
					<p align="justify">{!! substr($t->body,0,300) !!}</p> <a href="{{ URL::to('post',$t->slug) }}">Read more &raquo;</a>
					@endif
				@endforeach
            	</div>
				@foreach ($technology as $key=>$t)
				@if ($key> 0 && $key <5)
                <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row fashion">
    	            		<img src="{{ $t->image }}" width="100%" />
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row">
							<a href="{{ URL::to('post',$t->slug) }}"><h4>{{ $t->title }}</h4></a>
                		
                		</div>
                    </div>
                </div>
				@endif
				@endforeach
				
              
            </div></div>
        
        <div class="col-md-12">
        	<div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 0px; margin-top:30px;">
			<div class="col-md-12">
            <h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">HEALTH</span></h3>
            </div>

			
        	<div class="col-md-6">
				@foreach ($health as $key=>$h)
				@if ($key ==0)
					
				<img src="{{ $h->image }}" width="100%" style="margin-bottom:15px;" />
				<p align="justify">{!! substr($h->body,0,300) !!}</p> <a href="{{ URL::to('post',$h->slug) }}">Read more &raquo;</a>
				@endif
			@endforeach
            </div>
            <div class="col-md-6">
            	@foreach ($health as $key=>$h)
					@if ($key >0 && $key <6)
            	<div class="row" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row">
    	            		<img src="{{ $h->image }}" width="100%" />
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row">
							<a href="{{ URL::to('post',$h->slug) }}"><h4>{{ $h->title }}</h4></a>
                			
                		</div>
                    </div>
                </div>
				@endif
				@endforeach
                   
            </div>
        </div>
		</div>
        
        <div class="col-md-12 image-gallery">
	        <div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 15px; margin-top:30px;">
    	    	<h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">Travel</span></h3>
				<div class="flex">
					@foreach ($travel->take(5) as $t)
					<div>
						
						<a href="{{ url('post/'.$t->slug) }}"><img src="{{ $t->image }}" /></a>
					</div>
					
						@endforeach
				</div>
	        </div>
        </div>
        
		<div class="col-md-12">
        	<div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 30px 0px; margin-top:30px;">
			<div class="col-md-12">
            <h3 style="border-bottom:3px solid #81d742; padding-bottom:5px;"><span style="padding:6px 12px; background:#81d742;">
			ENTERTAINMENT</span></h3>
            </div>

			
        	<div class="col-md-6">
				@foreach ($entertainment as $key=>$h)
				@if ($key ==0)
					
				<img src="{{ $h->image }}" width="100%" style="margin-bottom:15px;" />
				<p align="justify">{!! substr($h->body,0,300) !!}</p> <a href="{{ URL::to('post',$h->slug) }}">Read more &raquo;</a>
				@endif
			@endforeach
            </div>
            <div class="col-md-6">
            	@foreach ($entertainment as $key=>$h)
					@if ($key >0 && $key <6)
            	<div class="row" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row">
    	            		<img src="{{ $h->image }}" width="100%" />
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row">
							<a href="{{ URL::to('post',$h->slug) }}"><h4>{{ $h->title }}</h4></a>
                			
                		</div>
                    </div>
                </div>
				@endif
				@endforeach
                   
            </div>
		</div>
        </div>
        </div>
        </div>

        <div class="col-md-4">
			@if ($sidebartop)
				
			<p class="ad-sidebar"><a href="{{ $sidebartop->url }}"><img src="{{ $sidebartop->image }}" alt="{{ $sidebartop->title }}" width="100%" /></a></p>
			@endif
        <div class="col-md-12" style="border:1px solid #ccc; padding:15px;">
			<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">POLITICS</span></h3>
			@foreach ($politics->take(10) as $p)

        	<div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	           	<div class="col-md-4">
                   	<div class="row">
						   
    	           		<img src="{{ $p->image }}" width="100%" style="margin-left:-15px;" />
        	       	</div>
                </div>
            	<div class="col-md-8">
                   	<div class="row" style="padding-left:10px;">
						<a href="{{ URL::to('post',$p->slug) }}"><h5>{{ $p->title }}</h5></a>
                	</div>
                </div>
            </div>
            @endforeach
          </div>
          
          <div class="col-md-12" style="border:1px solid #ccc; padding:15px 15px 60px 15px; margin-top:30px;">
          	<div class="col-md-12" style="border-bottom:1px solid #ccc; padding:0px 10px 20px 10px; margin-bottom:10px;">
           		<h3 style="border-bottom:3px solid #2b99ca; padding-bottom:5px;"><span style="padding:6px 12px; background:#2b99ca;">STYLE</span></h3>
				   @foreach ($style as $key=>$s)
				   @if ($key ==0)
					   
				   <img src="{{ $s->image }}" width="100%" style="margin-bottom:15px;" />
				   <p align="justify">{!! substr($s->body,0,300) !!}</p> <a href="{{ URL::to('post',$s->slug) }}">Read more &raquo;</a>
				   @endif
			   @endforeach
            	</div>
				@foreach ($style as $key=>$s)
				@if ($key >0 && $key <6)
                <div class="col-md-12" style="border-bottom:1px solid #ccc; padding-bottom:10px; margin-bottom:10px;">
	            	<div class="col-md-4">
                    	<div class="row">
    	            		<img src="{{ $s->image }}" width="100%" style="margin-left:-15px;" />
        	        	</div>
                    </div>
            	    <div class="col-md-8">
                    	<div class="row" style="padding-left:0px;">
                			<a href="{{ URL::to('post',$s->slug) }}"><h4>{{ $s->title }}</h4></a>
                		</div>
                    </div>
                </div>
				@endif
				@endforeach
				
          </div>
          
		  @if ($sidebarbottom)
				
		  <div class="ad-sidebar"><a href="{{ $sidebarbottom->url }}"><img src="{{ $sidebarbottom->image }}" alt="{{ $sidebarbottom->title }}" width="100%" /></a></div>
		  @endif
          
        
    </div> 
</div>
</div>
@endsection
       