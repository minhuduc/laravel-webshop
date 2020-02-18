@extends('admin.layouts.master')

@section('title')
    Add Categpry
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add Item Category</h6>
    </div>
<div class="py-3">
<div class="col-lg-12">
<form action="{{ route(category.store) }}" method="post">
  @csrf
  <div class="form-group">
    <label for="Name">Name</label>
    <input type="text" class="form-control" id="Name" placeholder="Enter category name">
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