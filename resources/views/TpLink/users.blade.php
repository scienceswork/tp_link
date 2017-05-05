@extends('TpLink.layouts.master')

@section('title', 'Users')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-person"></i>
        Users
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
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th class="actions">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->updated_at }}</td>
                                    <td class="no-sort no-click">
                                        <div class="btn-sm btn-danger pull-right delete" data-id="{{ $user->id }}"
                                             id="delete-{{ $user->id }}">
                                            <i class="voyager-trash"></i> Delete
                                        </div>
                                        <a href="{{ route('tp.editUser', $user->id) }}"
                                           class="btn-sm btn-primary pull-right edit">
                                            <i class="voyager-edit"></i> Edit
                                        </a>
                                        <a href="{{ route('tp.showUser', $user->id) }}"
                                           class="btn-sm btn-warning pull-right">
                                            <i class="voyager-eye"></i> View
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pull-right">
                            {{ $users->links() }}
                        </div>
                    </div>
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
                        this User?</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('tp.delUser', $user->id) }}" id="delete_form" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                               value="Yes, Delete This User">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('javascript')
    <!-- DataTables -->
    <script>
            $(document).ready(function () {
            $('#dataTable').DataTable({ "order": [] });
        });

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