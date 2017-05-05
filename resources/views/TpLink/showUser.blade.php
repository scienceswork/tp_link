@extends('TpLink.layouts.master')

@section('title', 'Show User')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-person"></i>
        Viewing User
    </h1>
@endsection

@section('content')
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <!-- name -->
                    <div class="panel-heading" style="border-bottom: 0;">
                        <h3 class="panel-title">
                            name
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top: 0;">
                        <p>{{ $user->name }}</p>
                    </div>
                    <hr style="margin: 0;">
                    <!-- email -->
                    <div class="panel-heading" style="border-bottom: 0;">
                        <h3 class="panel-title">
                            email
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top: 0;">
                        <p>{{ $user->email }}</p>
                    </div>
                    <hr style="margin: 0;">
                    <!-- avatar -->
                    <div class="panel-heading" style="border-bottom: 0;">
                        <h3 class="panel-title">
                            avatar
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top: 0;">
                        <img style="max-width:640px" src="http://tp.app/storage/users/default.png">
                    </div>
                    <hr style="margin: 0;">
                    <!-- created_at -->
                    <div class="panel-heading" style="border-bottom: 0;">
                        <h3 class="panel-title">
                            created_at
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top: 0;">
                        <p>{{ $user->created_at }}</p>
                    </div>
                    <hr style="margin: 0;">
                    <!-- updated_at -->
                    <div class="panel-heading" style="border-bottom: 0;">
                        <h3 class="panel-title">
                            updated_at
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top: 0;">
                        <p>{{ $user->updated_at }}</p>
                    </div>
                    <hr style="margin: 0;">
                </div>
            </div>
        </div>
    </div>
@endsection