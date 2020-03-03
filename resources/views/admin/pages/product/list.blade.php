@extends('admin.layouts.master')

@section('title')
Product
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Product</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Promotional</th>
                        <th>Category</th>
                        <th>ProductType</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tfoot>
                  <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Promotional</th>
                        <th>Category</th>
                        <th>ProductType</th>
                        <th>Status</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($product as $key => $value)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->slug }}</td>
                        <td>{{ $value->description }}</td>
                        <td>{{ $value->quantity }}</td>
                        <td>{{ $value->price }}</td>
                        <td>{{ $value->promotional }}</td>
                        <td>{{ $value->Category['name'] }}</td>
                        <td>{{ $value->ProductType['name'] }}</td>
                        <td>
                            @if($value->status==1) 
                                {{"Display"}}
                            @else
                                {{"Not Display"}}
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-primary editProduct" data-id="{{ $value->id }}" title="{{ 'edit '. $value->name }}"  data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-danger deleteProduct" data-id="{{ $value->id }}" title="{{ 'delete '. $value->name }}" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="float-right">{{ $product->links() }}</div>
        </div>
    </div>
</div>


<!-- Modal -->
<div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Product <span class="title"></span></h4>
      </div>
      <div class="modal-body">
      <div class="error"></div>
      <form role="form">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control name" name="name" id="name" placeholder="Enter product name">
            <p class="error" style="font-size: 1rem; color: red; padding: 5px 0; width: 100%"></p>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control description" name="description" id="description" placeholder="Enter description">
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
          @foreach($category as $key => $value)
            <option value="{{ $value->id }}">{{ $value->name }}</option>
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
        
        </form>
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-success updateProduct">Update</button>
        <button type="reset" class="btn btn-primary">Reset</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->
<div id="deleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Product</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure.</p>
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-danger delProduct">Delete</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


@endsection