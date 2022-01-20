@extends('layouts.admin')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 title">
      <h1><i class="fa fa-bars"></i> All Pages <a href="{{ URL::to('admin/pages/create') }}" class="btn btn-sm btn-default">Add New</a></h1>
    </div>
    <div class="col-sm-12">
      @if (Session::has('message'))
			<div class="alert alert-success alert-dismissble fade in">
				{{ Session('message') }}
				<a href="" class="close" data-dismis="alert">&times;</a>
			</div>
				
			@endif
    </div>
    <div class="search-div">
      <div class="col-sm-9">
        All({{ count($pages) }}) | <a href="#">Published ({{ $published }})</a>
      </div>

      <div class="col-sm-3">
        <input type="text" id="search" class="form-control" placeholder="Search pages">
      </div>
    </div>  

    <div class="clearfix"></div>

    <div class="filter-div">
      <form method="page">
        <div class="col-sm-2">
          <select name="action" class="form-control">
            <option>Bulk Action</option>
            <option>Move to Trash</option>
          </select>
        </div>

        <div class="col-sm-7">
          <div class="row">
            <button class="btn btn-default">Apply</button>
          </div>  
        </div>
      </form>
    
    
      {{-- <div class="col-sm-3 text-right">
        <ul class="pagination">
          {{ $pages->links() }}
        </ul>
      </div> --}}
    </div>  
    
    <div class="col-sm-12">
      <div class="content">
        <table class="table table-striped" id="myTable">
          <thead>
            <tr>
              <th width="50%"><input type="checkbox" id="select-all"> Title</th>
 
              <th width="15%">Status</th>
              <th width="10%">Date</th>
            </tr>
          </thead>
          <tbody>
              @if(count($pages) > 0)
              
              @foreach ( $pages as $page)
                  
              <tr>
                <td>
                  <input type="checkbox" name="select-cat"> 
                  <a href="{{ URL::to('admin/pages/'.$page->id.'/edit') }}">{{ $page->title }}</a>
                </td>

                <td>{{ $page->status }}</td>
                <td>{{ $page->created_at->diffForhumans() }}</td>              
              </tr>
              @endforeach
              @else
                 <tr>
                     <td colspan="4">No page Found</td>
                 </tr> 
              @endif
            
          </tbody>
        </table>
      </div>
    </div>

    <div class="clearfix"></div>
    
      
      {{-- <div class="col-sm-12 text-right">
        <div class="pagination">
           {{ $pages->links() }}
        </div>
      </div> --}}

  </div>
</div>

@endsection