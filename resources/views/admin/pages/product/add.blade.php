@extends('admin.layouts.master')

@section('title')
    Add Poroduct Type
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add Item Poroduct Type</h6>
    </div>
<div class="py-3">
<div class="col-lg-12">
<form role="form" action="{{ route('producttype.store') }}" method="post">
  @csrf
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="Enter category name">
  </div>
  <div class="form-group">
    <label for="cate">Category</label>
    <select name="cate" id="cate">
    @foreach($category as $key => $value)
      <option value="{{ $value->id }}">{{ $value->name }}</option>
    @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="status">Status</label>
    <select name="status" id="status">
        <option value="1">Display</option>
        <option value="0">Not Display</option>
    </select>
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
  <button type="reset" class="btn btn-primary">Reset</button>
</form>
</div>

@endsection