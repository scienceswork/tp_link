@extends('TpLink.layouts.master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title', 'Edit Profile')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-person"></i> Edit Profile
    </h1>
@endsection

@section('content')
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Edit Profile
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="#"
                          class="form-edit-add"
                          method="post"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="panel-body">
                            <!-- 错误信息 -->
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <!-- 昵称 -->
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Name" id="name" value="{{ Auth::user()->name }}">
                            </div>
                            <!-- 密码 -->
                            <div class="form-group">
                                <label for="name">Password</label>
                                <br>
                                <small>Leave empty to keep the same</small>
                                <input type="text" class="form-control" name="password" placeholder="Password" id="password">
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary save">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection