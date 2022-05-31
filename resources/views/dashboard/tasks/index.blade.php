@extends('dashboard.layouts.master')
@section('page_title')
    Tasks
@endsection
@section('page_content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>All Tasks</h3>
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
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Basic Tables <small>basic table subtitle</small></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>User Name (Assignee)</th>
                                <th>Admin Name (Reporter)</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($tasks as $task)
                                <tr>
                                    <th scope="row">{{$task->task_id}}</th>
                                    <td>{{$task->task_title}}</td>
                                    <td>{{$task->task_description}}</td>
                                    <td>{{$task->user_name}}</td>
                                    <td>{{$task->admin_name}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <div class="">
                            {{$tasks->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
