@extends('admin.admin_master')
@section('Admin')

    <div class="content_wrapper" style="padding: 20px">
        <div class="row">
            <div class="col-lg-12 col-sm-12">

              <div class="mt-4">
                <button type="button" class="button x-small btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Add new category
                </button>
            </div><br><br>

                @include('admin.success')
            @include('admin.error')

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 40px">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add new category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="fname">Category name</label>
                                            <input required="required" name = "name" type="text" class="@error('name') is-invalid @enderror form-control" id="fname" aria-describedby="emailHelp">
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="desc">Category description</label>
                                        <textarea required="required" name="description" id="desc" cols="30" rows="10" class="@error('description') is-invalid @enderror form-control"></textarea>
                                        @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row d-none" id="cats_list" >
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="projectinput1"> Main Category selection
                                            </label>
                                            <select name="parent" class="select2 form-control">
                                                <option value="">Select</option>
                                                @foreach($categories as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('parent')
                                                <span class="text-danger"> {{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label> Main category </label>
                                        <input type="radio" name="type" value="1" checked class="switchery"data-color="success"/>
                                    </div>
                                    <div class="col-md-4">
                                        <label> Sub category</label>
                                        <input type="radio" name="type" value="2" class="switchery" data-color="success"/>
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

        <section class="table_area" >
            <div class="panel">
                <div class="panel_header">
                    <div class="panel_title">
                        <span>All Categories  {{\App\Models\Category::count()}}</span></div>
                </div>
                <div class="panel_body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th width="20%">Description</th>
                                <th>Parent</th>
                                <th>Actions</th>
                                <th>updated_At</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1 ?>
                            @foreach($categories as $cat)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$cat->name}}</td>
                                <td>{{$cat->description}}</td>
                                <td>{{$cat->_parent ? $cat->_parent->name : 'No'}}</td>
                                <td>
                                   <a href="{{url('admin/category/edit/'.$cat->id)}}"><button type="button" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i></button></a>
                                    <a href="{{url('admin/category/delete/'.$cat->id)}}"><button type="button" class="btn btn-info btn-sm" title="Delete"><i class="fa fa-trash"></i></button></a>
                                </td>
                                <td>{{$cat->updated_at}}</td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- /table -->

        </section>


    </div><!--/ content wrapper -->

    <script src="{{ URL::asset('assets/Admin/js/jquery-3.3.1.min.js') }}"></script>
    <script>
        $('input:radio[name="type"]').change(
            function(){
                if (this.checked && this.value == '2') {  // 1 if main cat - 2 if sub cat
                    $('#cats_list').removeClass('d-none');
                }else{
                    $('#cats_list').addClass('d-none');
                }
            });
    </script>

@endsection
