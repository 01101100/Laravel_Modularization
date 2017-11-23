@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-offset-3 col-lg-6">
    @if($errors->any())
      <div class="alert alert-danger">
        @foreach($errors->all() as $error)
          <p>{{ $error }}</p>
        @endforeach()
      </div>
    @endif
    <div class="panel panel-default">
      <div class="panel-heading">
        Update Product details
      </div>
      <div class="panel-body">
        <form action="{{ route('Product.update', ['id' => $product->prod_id]) }}" method="POST" class="form-horizontal">
<!--           <input type="hidden" name="_method" value="PUT">
 -->            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="inputTitle">Category</label><br>
                        <select class="custom-select" name="category">
                            @foreach($categories as $category)
                              <option value="{{$category->category}}"> {{$category->category_name}}</option>
                            @endforeach
                        </select>
                      </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" value="{{ $product->title }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Actor</label>
                        <div class="col-sm-10">
                            <input type="text" name="actor" class="form-control" value="{{ $product->actor }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Price</label>
                        <div class="col-sm-10">
                            <input type="text" name="price" class="form-control" value="{{ $product->price }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <input type="submit" class="btn btn-default" value="Update Product" />
                        </div>
                    </div>
                </form>
      </div>
    </div>
  </div>
</div>
@endsection
