@extends('admin.admin_master')
@section('Admin')

    <div class="content_wrapper" style="padding: 20px">
        <div class="row">
            <div class="col-lg-12 col-sm-12">

              @include('admin.success')
              @include('admin.error')


              <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <input type="hidden" name="pro_id" value="{{ $product->id }}">
                            <label for="fname">name</label>
                            <input required="required" value="{{ $product->name }}" name = "name" type="text" class="@error('name') is-invalid @enderror form-control" id="fname" aria-describedby="emailHelp">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="desc">description</label>
                        <textarea name="description" id="desc" cols="30" rows="10" class="@error('description') is-invalid @enderror form-control"> {{ $product->description }}</textarea>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="fname">image</label>
                            <input required="required" name = "image" type="file" class="@error('image') is-invalid @enderror form-control" id="fname" aria-describedby="emailHelp">
                            <input type="hidden" name="old_img" value="{{ $product->image }}">
                            <img src="{{ asset($product->image) }}" style="width:70px;height:70px">
                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="fname">price</label>
                            <input required="required" value="{{ $product->price }}" name = "price" type="number" class="@error('price') is-invalid @enderror form-control" id="fname" aria-describedby="emailHelp">
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="fname">quantity</label>
                            <input required="required" value="{{ $product->qty }}" name = "qty" type="number" class="@error('qty') is-invalid @enderror form-control" id="fname" aria-describedby="emailHelp">
                            @error('qty')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="">category</label>
                        <select required="required" name="category_id" class="form-control @error('productegory_id') is-invalid @enderror" id="">
                            <option value="">Choose</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="fname">status</label>
                            <select class="form-control @error('status') is-invalid @enderror" name="status">
                                <option value="1" {{ $product->status == '1' ? 'selected' : '' }}>active</option>
                                <option value="0" {{ $product->status == '0' ? 'selected' : '' }}>inactive</option>
                            </select>
                            @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input is_offer " type="checkbox" value="0" id="defaultCheck1" name="is_offer"
                                {{ $product->is_offer == '0' ? 'checked' : '' }} >
                                <label class="form-check-label" for="defaultCheck1">
                                    offer
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 d-none new_price">
                        <div class="form-group">
                            <label for="fname">new price</label>
                            <input value="{{ $product->new_price }}" name = "new_price" type="number" class="@error('new_price') is-invalid @enderror form-control" id="fname" aria-describedby="emailHelp">
                            @error('new_price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">update</button>
                </div>
            </form>


            </div>
        </div>

    </div><!--/ content wrapper -->

    <script src="{{ URL::asset('assets/Admin/js/jquery-3.3.1.min.js') }}"></script>
    <script>
        $(function (){
            if ($('.is_offer').is(':checked')) {
                $(".new_price").removeClass('d-none');
            }else{
                $(".new_price").addClass('d-none');
            }
            $(".is_offer").on('change',function(){
                if ($(this).is(':checked')) {
                    $(".new_price").removeClass('d-none');
                }else{
                    $(".new_price").addClass('d-none');
                }
            });
        });
    </script>

@endsection


