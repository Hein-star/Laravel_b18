@extends('backendtemplate')

@section('content')

  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fas fa-code-branch"></i></i> Brand Page</h1>
        <p>Start a beautiful journey</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h2 class="d-inline-block">Brand List</h2>
          <a href="{{route('brand.create')}}" class="btn btn-info float-right">Add New</a>
          <table class="table mt-3 table-bordered dataTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @php 
                $i=1;
              @endphp
              @foreach($brands as $row)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$row->name}}</td>
                <td>
                  <a href="{{route('brand.edit',$row->id)}}" class="btn btn-warning">Edit</a>
                  <a href="{{route('brand.show',$row->id)}}" class="btn btn-info">Show</a>
                  <form method="post" action="{{route('brand.destroy',$row->id)}}" class="d-inline-block" onsubmit="return confirm('Are you Sure to Delete?')">
                    @csrf
                    @method('DELETE')
                    <input type="submit" name="btnsubmit" value="Delete" class="btn btn-danger">
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
@endsection

@section('script')
  <script type="text/javascript" src="{{asset('backend_asset/js/plugins/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('backend_asset/js/plugins/dataTables.bootstrap.min.js')}}"></script>
  <script type="text/javascript">
    $('.dataTable').DataTable();
  </script>
@endsection