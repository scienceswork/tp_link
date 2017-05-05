@extends('TpLink.layouts.master')

@section('title', 'Viewing Keywords')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-tools"></i>
        Viewing Keywords
        <a href="{{ Route('tp.exportKeyword') }}" class="btn btn-info" style="margin-left: 20px;margin-top: 2px;">
            Export
        </a>
    </h1>
@endsection

@section('content')
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-7">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <table id="dataTable" class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Keyword</th>
                                <th>Update Time</th>
                                <th class="actions text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($keywords as $keyword)
                                <tr>
                                    <td>{{ $keyword->id }}</td>
                                    <td>{{ $keyword->value }}</td>
                                    <td>{{ $keyword->updated_at }}</td>
                                    <td class="text-center">
                                        <div class="btn-sm btn-danger pull-right delete" data-id="{{ $keyword->id }}"
                                             id="delete-{{ $keyword->id }}">
                                            <i class="voyager-trash"></i> Delete
                                        </div>
                                        <a href="#"
                                           class="btn-sm btn-primary pull-right edit">
                                            <i class="voyager-edit"></i> Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pull-right">
                            {{ $keywords->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <div class="panel-title">
                            Add New Keyword
                        </div>
                    </div>
                    <form action="{{ route('tp.storeKeyword') }}" method="post">
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
                            <!-- Keyword -->
                            <div class="form-group">
                                <label for="value">Keyword</label>
                                <input type="text" class="form-control" name="value" placeholder="Keyword" id="value"
                                       value="">
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- delete modal -->
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> Are you sure you want to delete
                        this Keyword?</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('tp.delKeyword', $keyword->id) }}" id="delete_form" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                               value="Yes, Delete This Keyword">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('javascript')
    <!-- DataTables -->
    {{--<script>--}}
    {{--$(document).ready(function () {--}}
    {{--$('#dataTable').DataTable({ "order": [] });--}}
    {{--});--}}
    {{--</script>--}}
    <script>
        $('td').on('click', '.delete', function (e) {
            var form = $('#delete_form')[0];

            form.action = parseActionUrl(form.action, $(this).data('id'));

            $('#delete_modal').modal('show');
        });

        function parseActionUrl(action, id) {
            return action.match(/\/[0-9]+$/)
                ? action.replace(/([0-9]+$)/, id)
                : action + '/' + id;
        }
    </script>
@endsection