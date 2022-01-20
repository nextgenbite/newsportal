@extends('layouts.admin')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 title">
      <h1><i class="fa fa-bars"></i> All Messages </h1>
    </div>
    <div class="search-div">
      <div class="col-sm-9">
        All({{ count($msg) }}) </a>
      </div>

      <div class="col-sm-3">
        <input type="text" id="search" class="form-control" placeholder="Search Message">
      </div>
    </div>  

    <div class="clearfix"></div>

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
    
    
      <div class="col-sm-3 text-right">
        <ul class="pagination">
          {{ $msg->links() }}
        </ul>
      </div>
    </div>  
    
    <div class="col-sm-12">
      <div class="content">
        <table class="table table-striped" id="myTable">
          <thead>
            <tr>
              <th><input type="checkbox" id="select-all"> Sender</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Message</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
              @if(count($msg) > 0)
              
              @foreach ( $msg as $m)
                  
              <tr>
                <td>
                  <input type="checkbox" name="select-cat"> 
                  {{ $m->name }}
                </td>
                <td>{{ $m->email }}</td>
                <td>{{ $m->phone }}</td>
                
                <td>{{ Str::substr($m->body, 0, 100)  }}
                    <!-- Button trigger modal -->
                     <a data-toggle="modal" class="btn btn-small btn-success" data-target="#expand{{ $m->id }}" href="#expand{{ $m->id }}">Expand</a></td>
                <td>{{ $m->created_at->diffForhumans() }}</td> 
                <div class="modal" id="expand{{ $m->id }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header"><a class="close" data-dismiss="modal" href="#">&times;</a>
                        <h4 class="modal-title">Send by: {{ $m->name }}</h4>
                    </div>
                    <div class="modal-body">
                        {{ $m->body }}
                    </div>
                    <div class="modal-footer">
                        <p>Sent On: {{ $m->created_at->diffForhumans() }}</p>
                        <p>Phone : {{ $m->phone }}</p>
                        <p>Email : {{ $m->email }}</p>
                    </div>
                </div>
                </div>
                </div>             
              </tr>
              @endforeach
              @else
                 <tr>
                     <td colspan="4">No Message Found</td>
                 </tr> 
              @endif
            
          </tbody>
        </table>
      </div>
    </div>

    <div class="clearfix"></div>
    
      
      <div class="col-sm-12 text-right">
        <div class="pagination">
           {{ $msg->links() }}
        </div>
      </div>

  </div>
</div>

@endsection