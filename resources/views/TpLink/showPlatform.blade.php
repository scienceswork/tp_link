@extends('TpLink.layouts.master')

@section('title', 'Viewing Platform')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-tools"></i>
        Viewing Platform
    </h1>
@endsection

@section('content')
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <table id="dataTable" class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Url</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th class="actions">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($platforms as $platform)
                                <tr>
                                    <td>{{ $platform->id }}</td>
                                    <td>{{ $platform->name }}</td>
                                    <td><a href="{{ $platform->url }}" target="_blank">{{ $platform->url }}</a></td>
                                    <td>{{ $platform->created_at }}</td>
                                    <td>{{ $platform->updated_at }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('tp.showPlatform', $platform->id) }}"
                                           class="btn-sm btn-warning">
                                            View
                                        </a>&nbsp;
                                        <a href="{{ route('tp.exportPlatform', $platform->id) }}"
                                           class="btn-sm btn-success">
                                            Down
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <!-- DataTables -->
    {{--<script>--}}
        {{--$(document).ready(function () {--}}
            {{--$('#dataTable').DataTable({ "order": [] });--}}
        {{--});--}}
    {{--</script>--}}
@endsection