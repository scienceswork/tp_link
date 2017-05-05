@extends('TpLink.layouts.master')

@section('title', 'Edit User')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-person"></i>
        Edit User
    </h1>
@endsection

@section('content')
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Edit User
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{ route('tp.storeUser', $user->id) }}"
                          role="form"
                          method="post"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="panel-body">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <!-- Name -->
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Name" id="name" value="{{ $user->name }}">
                            </div>
                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email" id="Email" value="{{ $user->email }}">
                            </div>
                            <!-- Password -->
                            <div class="form-group">
                                <label for="password">Password</label>
                                <br>
                                <small>Leave empty to keep the same</small>
                                <input type="password" class="form-control" name="password" placeholder="Password" id="password">
                            </div>
                        </div>
                        <!-- panel footer -->
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection