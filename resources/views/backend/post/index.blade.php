@extends('layouts.admin')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 title">
      <h1><i class="fa fa-bars"></i> All Posts <a href="{{ URL::to('admin/posts/create') }}" class="btn btn-sm btn-default">Add New</a></h1>
    </div>
    <div class="search-div">
      <div class="col-sm-9">
        All({{ count($postCount) }}) | <a href="#">Published ({{ $published }})</a>
      </div>
      
      @if (Session::has('message'))
			<div class="alert alert-success alert-dismissble fade in">
				{{ Session('message') }}
				<a href="" class="close" data-dismis="alert">&times;</a>
			</div>
      @endif

      <div class="col-sm-3">
        <input type="text" id="search" class="form-control" placeholder="Search Posts">
      </div>
    </div>  

    <div class="clearfix"></div>

    <div class="filter-div">
      <form action="{{ url('adminPostsController@destroy') }}" method="post" >
        {{csrf_field()}}

        {{method_field('delete')}}
        <div class="col-sm-2">
          <select name="checkBoxArray" class="form-control">
            {{-- <option>Bulk Action</option> --}}
            <option value="">Move to Trash</option>
          </select>
        </div>

        <div class="col-sm-7">
          <div class="row">
            <button type="submit" name="delete_all" class="btn btn-default">Apply</button>
          </div>  
        </div>
      </form>
    
    
      <div class="col-sm-3 text-right">
        <ul class="pagination">
          {{ $posts->links() }}
        </ul>
      </div>
    </div>  
    
    <div class="col-sm-12">
      <div class="content">
        <table class="table table-striped" id="myTable">
          <thead>
            <tr>
              <th width="50%"><input type="checkbox" id="select-all"> Title</th>
              <th width="15%">Category</th>
              <th width="15%">Status</th>
              <th width="10%">Date</th>
            </tr>
          </thead>
          <tbody>
              @if(count($posts) > 0)
              
              @foreach ( $posts as $post)
                  
              <tr>
                <td>
                  <input type="checkbox" value="{{$post->id}}"  name="checkBoxArray[]"> 
                  <a href="{{ URL::to('admin/posts/'.$post->id.'/edit') }}">{{ $post->title }}</a>
                </td>
                <td>{{ $post->category->title }}</td>
                <td>{{ $post->status }}</td>
                <td>{{ $post->created_at->diffForhumans() }}</td>              
              </tr>
              @endforeach
              @else
                 <tr>
                     <td colspan="4">No Post Found</td>
                 </tr> 
              @endif
            
          </tbody>
        </table>
      </div>
    </div>

    <div class="clearfix"></div>
    
      
      <div class="col-sm-12 text-right">
        <div class="pagination">
           {{ $posts->links() }}
        </div>
      </div>

  </div>
</div>

@endsection