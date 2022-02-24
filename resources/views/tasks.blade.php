@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ __('Tasks') }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">{{ __('Tasks') }}</li>
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


              <form action="" method="get">
              <div class="row">
                <div class="col-md-3" style="padding-top:32px;">
                  <a href="javascript:void(0)" data-toggle="modal" data-target="#addnewtask" class="btn btn-primary">{{ __('Add New Task') }}</a>

                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label>{{ __('Status') }}</label>
                    <select class="form-control" name="status_filter">
                      <option value=""> -- Select --</option>
                      @foreach($Statuses as $status)
                      <option value="{{ $status->id }}" {{ isset($status_filter) && $status_filter == $status->id ? 'selected':NULL }}>{{ $status->status_name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-2" style="padding-top:32px;">
                  <button class="btn btn-info" type="submit">{{ __('Filter') }}</button>
                </div>
              </div>
            </form>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Create Date</th>
                    <th style="width: 40px"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($Tasks as $task)
                  <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->task }}</td>
                    <td>{{ $task->status->status_name }}</td>

                    <td>
                      {{ $task->created_at }}
                    </td>
                    <td style="width:20%;">
                      <div class="row">
                       <a href="{{ route('tasks.show', $task->id) }}"   class="btn btn-sm btn-primary col-md-2"><i class="fas fa-edit"></i></a>
                       <div class="col-md-2">
                       <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="text-decoration:none;">
                        @csrf
                        {{ method_field('delete') }}
                        <button type="submit" class="btn  btn-sm btn-danger " ><i class="fas fa-trash"></i></button>

                      </form>
                      </div>
                    </div>
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
<div class="modal fade" id="addnewtask" tabindex="-1" role="dialog" aria-labelledby="addnewtask" aria-hidden="true">
  <form action="{{ route('tasks.store') }}" method="POST">
    @csrf
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Add New Task') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>{{ __('Task') }}</label>
          <input type="text" name="task" class="form-control">
        </div>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>{{ __('Task Description') }}</label>
          <textarea name="taskdetails" class="form-control" rows="3"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">{{ __('Add New Task') }}</button>
      </div>
    </div>
  </div>
  </form>
</div>



@endsection
