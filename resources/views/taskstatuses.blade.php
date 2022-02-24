@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ __('Task Statuses') }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">{{ __('Task Statuses') }}</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <a href="javascript:void(0)" data-toggle="modal" data-target="#addnewtaskstatus" class="btn btn-primary">{{ __('Add New Task Status') }}</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Task Status Name</th>
                    <th>Date</th>
                    <th style="width: 40px"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($Statuses as $status)
                  <tr>
                    <td>{{ $status->id }}</td>
                    <td>{{ $status->status_name }}</td>
                    <td>
                      {{ $status->created_at }}
                    </td>
                    <td>
                      <form action="{{ route('taskstatuses.destroy', $status->id) }}" method="POST">
                        @csrf
                        {{ method_field('delete') }}
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                      </form>
                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
            <!-- /.card-body
            <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
              </ul>
            </div>
            -->
          </div>

        </div>

      </div>

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Modal -->
<div class="modal fade" id="addnewtaskstatus" tabindex="-1" role="dialog" aria-labelledby="addnewtaskstatus" aria-hidden="true">
  <form action="{{ route('taskstatuses.store') }}" method="POST">
    @csrf
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Add New Task Status') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>{{ __('Task Status Name') }}</label>
          <input type="text" name="status_name" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">{{ __('Add New Task Status') }}</button>
      </div>
    </div>
  </div>
  </form>
</div>



@endsection
