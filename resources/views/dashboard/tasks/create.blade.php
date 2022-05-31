@extends('dashboard.layouts.master')
@section('page_title')
    Create Task
@endsection
@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endsection
@section('page_content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Create New Task </h3>
                </div>
            </div>

            <div class="clearfix"></div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row" style="display: block;">
                <form id="create-task" name="createTaskForm" method="POST" action="{{route('task.post.create')}}" class="form-horizontal form-label-left">
                    @csrf
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="task-title">Task Title<span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="taskTitle" id="task-title" required="required"
                                   class="form-control">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="task-description">Task
                            Description<span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea id="task-description" required="required" class="form-control"
                                      name="taskDescription"></textarea>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="assignee">Assignee
                            <small class="text-navy">Users</small>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select id="assignee" name="assigneeUserId" class="form-control">
                                <option>Choose User To assign</option>
                                @foreach($users as $user)
                                    <option value="{{$user['user_id']}}">{{$user['user_name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="reporter">Reporter
                            <small class="text-navy">Admins</small>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select id="reporter" name="reporterAdminId" class="form-control">
                                <option>Choose Reporter</option>
                                @foreach($admins as $admin)
                                    <option value="{{$admin->admin_id}}">{{$admin->admin_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#assignee').select2();
            $('#reporter').select2();
        });
    </script>
@endsection
