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
                                <th>#</th>
                                <th>User Name</th>
                                <th>Tasks Count</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($usersStatistics as $statistics)
                                <tr>
                                    <th scope="row">{{$statistics->id}}</th>
                                    <td>{{$statistics->user_name}}</td>
                                    <td>{{$statistics->tasks_count}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
@endsection
