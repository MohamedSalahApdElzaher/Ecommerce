@extends('admin.admin_master')
@section('Admin')
            <div class="modal-body" style="margin: 20px">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">

                <div class="mt-4">
                    <button type="button" class="button x-small mb-3 btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        add new product
                    </button>
                </div>

                @include('admin.success')
                @include('admin.error')

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 40px">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">add new product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="fname">name</label>
                                                <input required="required" name = "name" type="text" class="@error('name') is-invalid @enderror form-control" id="fname" aria-describedby="emailHelp">
                                                @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="desc">description</label>
                                            <textarea name="description" id="desc" cols="30" rows="10" class="@error('description') is-invalid @enderror form-control"></textarea>
                                            @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="fname">image</label>
                                                <input required="required" name = "image"
                                                type="file" class="@error('image') is-invalid @enderror form-control"
                                                 id="fname" aria-describedby="emailHelp">
                                                @error('image')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="fname">price</label>
                                                <input required="required" name = "price" type="number" class="@error('price') is-invalid @enderror form-control" id="fname" aria-describedby="emailHelp">
                                                @error('price')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="fname">quantity</label>
                                                <input required="required" name = "qty" type="number" class="@error('qty') is-invalid @enderror form-control" id="fname" aria-describedby="emailHelp">
                                                @error('qty')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="">Category</label>
                                            <select required="required" name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="">
                                                <option value="">Choose</option>
                                                @foreach ($categories as $cat)
                                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
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
                                                    <option value="1">active</option>
                                                    <option value="0">inactive</option>
                                                </select>
                                                @error('status')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input is_offer " type="checkbox" value="0" id="defaultCheck1" name="is_offer">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                        offer
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-none new_price">
                                        <div class="form-group">
                                            <label for="fname">price after discount</label>
                                            <input name = "new_price" type="number" class="@error('new_price') is-invalid @enderror form-control" id="fname" aria-describedby="emailHelp">
                                            @error('new_price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                                        <button type="submit" class="btn btn-primary">add</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">

            <div class="panel_body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="5%">Name</th>
                            <th width="5%">Image</th>
                            <th width="5%">quantity</th>
                            <th width="5%">price</th>
                            <th width="5%">category</th>
                            <th width="5%">status</th>
                            <th width="5%">is_offer</th>
                            <th width="5%">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1 ?>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$product->name}}</td>
                                <td><img src="{{ asset($product->image) }}" style="width:50px;height:50px"></td>
                                <td>{{$product->qty}}</td>
                                <td>{{$product->price.'$'}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->status}}</td>
                                <td>{{$product->is_offer != '0' ? 'no' : $product->new_price.'$'}}</td>
                                <td>
                                    <a href="{{ route('products.show', $product->id) }}"><button type="button" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i></button></a>

                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#delete{{ $product->id }}"
                                    title="Delete"><i
                                    class="fa fa-trash"></i></button>


                                </td>
                            </tr>


                            <div class="modal fade" id="delete{{ $product->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 40px">
                               <div class="modal-dialog" role="document">
                                   <div class="modal-content">
                                       <div class="modal-header">
                                           <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                               id="exampleModalLabel">
                                              Delete product <b>{{ $product->name }}</b>
                                           </h5>
                                           <button type="button" class="close" data-dismiss="modal"
                                                   aria-label="Close">
                                               <span aria-hidden="true">&times;</span>
                                           </button>
                                       </div>
                                       <div class="modal-body">
                                           <form action="{{route('products.destroy','test')}}"
                                                 method="post">
                                               {{ method_field('Delete') }}
                                               @csrf
                                               Are You Sure ?
                                               <input id="id" type="hidden" name="product_id" class="form-control"
                                                      value="{{ $product->id }}">
                                               <div class="modal-footer">
                                                   <button type="button" class="btn btn-secondary"
                                                           data-dismiss="modal">close</button>
                                                   <button type="submit"
                                                           class="btn btn-danger">delete</button>
                                               </div>
                                           </form>
                                       </div>
                                   </div>
                               </div>
                           </div>

                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            </div> <!-- /table -->
            </div>


    </div>
</div>


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
