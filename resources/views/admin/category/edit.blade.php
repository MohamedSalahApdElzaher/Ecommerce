@extends('admin.admin_master')
@section('Admin')

    <div class="content_wrapper" style="padding: 20px">
        <div class="row">
            <div class="col-lg-12 col-sm-12">

              @include('admin.success')
              @include('admin.error')


    <form action="{{url('admin/category/update/'.$cat->id)}}" method="post">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputEmail4">Title</label>
                <input type="text" class="form-control" name="name" placeholder="Title" value="{{$cat->name}}">
            </div>

        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputEmail4">Description</label>
               <textarea class="form-control" name="desc" placeholder="Description">{{$cat->description}}</textarea>
            </div>

        </div>


        <div class="row d-none" id="cats_list" >
            <div class="col-12">
                <div class="form-group">
                    <label for="projectinput1"> Main Category selection
                    </label>
                    <select name="parent" class="select2 form-control">
                        <option value="">Select</option>
                        @foreach($categories as $cate)
                            <option value="{{$cate->id}}">{{$cate->name}}</option>
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
                <input type="radio" name="type" value="1" {{ $cat->parent == NULL ? 'checked' : '' }}  class="switchery"data-color="success"/>
            </div>
            <div class="col-md-4">
                <label> Sub category</label>
                <input type="radio" name="type" value="2" {{ $cat->parent != NULL ? 'checked' : '' }} class="switchery" data-color="success"/>
            </div>
        </div>



        <button type="submit" class="btn btn-primary">update</button>
    </form>
            </div>
        </div>

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
