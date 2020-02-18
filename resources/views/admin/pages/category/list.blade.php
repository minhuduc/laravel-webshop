@extends('admin.layouts.master')

@section('title')
List categories
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Category</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Edit</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($category as $key => $value)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->slug }}</td>
                        <td>
                            @if($value->status==1) 
                                {{"Display"}}
                            @else
                                {{"Not Display"}}
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-primary edit" title="{{ 'edit '. $value->name }}"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-danger delete" title="{{ 'delete '. $value->name }}"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection