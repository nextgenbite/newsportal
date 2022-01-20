@extends('layouts.admin')
@section('content')

<div class="container-fluid">
  <div class="row">
    
    <div class="col-sm-12 title">
      <h1><i class="fa fa-bars"></i> All Advertisement <a href="{{ URL::to('admin/advertisement/create') }}" class="btn btn-sm btn-default">Add New</a></h1>
    
    </div>
  

  

    <div class="filter-div">
      <form method="post">
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
    
    
    </div>  
    <div class="col-md-6">
      @if (Session::has('message'))
      <div class="alert alert-success alert-dismissble fade in">
          {{ Session('message') }}
          <a href="" class="close" data-dismis="alert">&times;</a>
      </div>
          
      @endif
     </div>
    <div class="col-sm-12">
      <div class="content">
        <table class="table table-striped" id="myTable">
          <thead>
            <tr>
              <th ><input type="checkbox" id="select-all"> Title</th>
              <th >Image</th>
              <th >Url</th>
              <th >Location</th>
              <th >Status</th>
              <th >Date</th>
            </tr>
          </thead>
          <tbody>
              @if(count($adv) > 0)
              
              @foreach ( $adv as $ad)
                  
              <tr>
                <td>
                  <input type="checkbox" name="select-cat"> 
                  <a href="{{ URL::to('admin/advertisement/'.$ad->id.'/edit') }}">{{ $ad->title }}</a>
                </td>
                <td><img width="200px" src="{{ $ad->image }}" alt=""></td>
                <td>{{ $ad->url }}</td>
                <td>{{ $ad->location }}</td>
                <td>{{ $ad->status }}</td>
                <td>{{ $ad->created_at->diffForhumans() }}</td>              
              </tr>
              @endforeach
              @else
                 <tr>
                     <td colspan="4">No Data Found</td>
                 </tr> 
              @endif
            
          </tbody>
        </table>
      </div>
    </div>

    <div class="clearfix"></div>
    
      
      

  </div>
</div>

@endsection