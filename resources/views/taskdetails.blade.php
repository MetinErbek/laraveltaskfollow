@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ __('Task Detail') }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">{{ __('Task Detail') }}</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <form action="{{ route('tasks.update', $Task->id) }}" method="POST">
          @csrf
          @method('PATCH')
          <div class="card">
            <div class="card-header">
              <div class="card-title"><h4>Edit Task</h4></div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <div class="container">
                <div class="form-group">
                  <label >{{ __('Task') }}</label><br>
                  <input type="text" name="task" class="form-control" value="{{ $Task->task }}">
                </div>
                <div class="form-group">
                  <label >{{ __('Task Details') }}</label><br>
                  <textarea class="form-control" name="taskdetails" rows="4">{{ $Task->taskdetails }}</textarea>
                </div>

              </div>

            </div>
            <div class="card-footer text-right">
              <button type="submit" class="btn btn-success">Save Task</button>
            </div>
          </div>
        </form>

        </div>
        <div class="col-md-6">
          <div class="card">
            <form action="{{ url('taskstatuschange?task_id='.$Task->id) }}" method="POST">
            @csrf
            <div class="card-header">
              <div class="card-title"><h4>Task Status</h4></div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="form-group">
                <label>{{ __('Status') }}</label><br>
                <select class="form-control" name="task_status_id">

                  @foreach($Statuses as $status)
                  <option value="{{ $status->id }}" {{  $Task->task_status_id == $status->id ? 'selected':NULL }}>{{ $status->status_name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="card-footer text-right">
              <button type="submit" class="btn btn-success">Save Status</button>
            </div>
            </form>


          </div>

        </div>

      </div>

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->






@endsection
