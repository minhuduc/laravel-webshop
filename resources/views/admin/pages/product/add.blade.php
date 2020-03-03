@extends('admin.layouts.master')

@section('title')
    Add Poroduct
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add Item Poroduct</h6>
    </div>
<div class="py-3">
<div class="col-lg-12">
<form role="form" action="{{ route('product.store') }}" method="post">
  @csrf
  <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control name" name="name" id="name" placeholder="Enter product name">
            <p class="error" style="font-size: 1rem; color: red; padding: 5px 0; width: 100%"></p>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description"></textarea>
        </div>
        <div class="form-group">
            <label for="quantity">Quantiy</label>
            <input type="text" class="form-control quantity" name="quantity" id="quantity" placeholder="Enter quantity">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control price" name="price" id="price" placeholder="Enter price">
        </div>
        <div class="form-group">
            <label for="promotional">Promotional</label>
            <input type="text" class="form-control promotional" name="promotional" id="promotional" placeholder="Enter promotional">
        </div>
        <div class="form-group">
          <label for="cate">Category</label>
          <select name="cate" id="cate">
          @foreach($category as $cate)
            <option value="{{ $cate->id }}">{{ $cate->name }}</option>
          @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="cate">Product Type</label>
          <select name="producttype" id="producttype">
          @foreach($producttype as $key => $value)
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