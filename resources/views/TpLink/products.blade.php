@extends('TpLink.layouts.master')

@section('title', 'Viewing Products')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-tools"></i>
        Viewing Products
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
                                <th>Name</th>
                                <th>Price</th>
                                <th>Previous Price</th>
                                <th>Platform</th>
                                <th>Free</th>
                                <th>Update Time</th>
                                <th class="actions">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td><a href="{{ $product->product->url }}"
                                           target="_blank">{{ mb_substr($product->product->name, 0, 50) }}{{ mb_strlen($product->product->name) > 50 ? '...' : '' }}</a></td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td><a href="{{ $product->platform->url }}"
                                           target="_blank">{{ $product->platform->name }}</a></td>
                                    <td>{{ $product->free_shipping }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>
                                        <a href="{{ route('tp.showProduct', $product->product_id) }}"
                                           class="btn-sm btn-primary">
                                            view
                                        </a>&nbsp;
                                        <a href="{{ route('tp.exportProduct', $product->product_id) }}"
                                           class="btn-sm btn-success">
                                            down
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pull-right">
                            {{ $products->links() }}
                        </div>
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