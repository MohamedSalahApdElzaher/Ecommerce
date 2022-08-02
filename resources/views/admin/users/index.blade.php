@extends('admin.admin_master')
@section('Admin')
            <div class="modal-body" style="margin: 20px">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">

                <div class="mt-4">
                    <button type="button" class="button x-small mb-3 btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        add new user
                    </button>
                </div>

        
                @include('admin.success')
                @include('admin.error')

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 40px">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">add new user</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('users.store')}}" method="POST">
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
                                            <div class="form-group">
                                                <label for="fname">email</label>
                                                <input required="required" name = "email" type="text" class="@error('name') is-invalid @enderror form-control" id="fname" aria-describedby="emailHelp">
                                                @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="fname">password</label>
                                                <input required="required" name = "password" type="text" class="@error('name') is-invalid @enderror form-control" id="fname" aria-describedby="emailHelp">
                                                @error('password')
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
                            <th width="5%">Email</th>                         
                            <th width="5%">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1 ?>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                              
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#edit{{ $user->id }}"
                                    title="Edit"><i class="fa fa-edit"></i></button>

                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#delete{{ $user->id }}"
                                    title="Delete"><i
                                    class="fa fa-trash"></i></button>

                                    
                                </td>
                            </tr>

                            <div class="modal fade" id="edit{{ $user->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 40px">
                               <div class="modal-dialog" role="document">
                                   <div class="modal-content">
                                       <div class="modal-header">
                                           <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                               id="exampleModalLabel">
                                               update
                                           </h5>
                                           <button type="button" class="close" data-dismiss="modal"
                                                   aria-label="Close">
                                               <span aria-hidden="true">&times;</span>
                                           </button>
                                       </div>
                                       <div class="modal-body">

                                           <!-- edit_form -->
                                           <form action="{{route('users.update','test')}}" method="post">
                                               {{ method_field('patch') }}
                                               @csrf
                                               <input type="hidden" name="user_id" value="{{ $user->id }}">
                                               <input type="hidden" name="old_password" value="{{$user->password}}">
                                               <div class="row">
                                                   <div class="col-6">
                                                       <div class="form-group">
                                                           <label for="fname">user name</label>
                                                           <input value="{{$user->name}}" autocomplete="off" required="required" name = "name" type="text" class="@error('name') is-invalid @enderror form-control" id="fname" aria-describedby="emailHelp">
                                                           @error('name')
                                                           <div class="alert alert-danger">{{ $message }}</div>
                                                           @enderror
                                                       </div>
                                                   </div>
               
                                                   <div class="col-6">
                                                       <div class="form-group">
                                                           <label for="fname">email</label>
                                                           <input value="{{$user->email}}" autocomplete="off" required="required" name = "email" type="text" class="@error('email') is-invalid @enderror form-control" id="fname" aria-describedby="emailHelp">
                                                           @error('email')
                                                           <div class="alert alert-danger">{{ $message }}</div>
                                                           @enderror
                                                       </div>
                                                   </div>
               
                                                   <div class="col-6">
                                                       <div class="form-group">
                                                           <label for="fname">password</label>
                                                           <input autocomplete="off" name = "password" type="password" class="@error('password') is-invalid @enderror form-control" id="fname" aria-describedby="emailHelp">
                                                           @error('password')
                                                               <div class="alert alert-danger">{{ $message }}</div>
                                                           @enderror
                                                       </div>
                                                   </div>
               
                                                
               
                                               </div>
                                               <div class="modal-footer">
                                                   <button type="button" class="btn btn-secondary"
                                                           data-dismiss="modal">close</button>
                                                   <button type="submit"
                                                           class="btn btn-success">update</button>
                                               </div>
                                           </form>
                                       </div>
                                   </div>
                               </div>
                           </div>

                            <div class="modal fade" id="delete{{ $user->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 40px">
                               <div class="modal-dialog" role="document">
                                   <div class="modal-content">
                                       <div class="modal-header">
                                           <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                               id="exampleModalLabel">
                                              Delete User <b>{{ $user->name }}</b>
                                           </h5>
                                           <button type="button" class="close" data-dismiss="modal"
                                                   aria-label="Close">
                                               <span aria-hidden="true">&times;</span>
                                           </button>
                                       </div>
                                       <div class="modal-body">
                                           <form action="{{route('users.destroy','test')}}"
                                                 method="post">
                                               {{ method_field('Delete') }}
                                               @csrf
                                               Are You Sure ?
                                               <input id="id" type="hidden" name="user_id" class="form-control"
                                                      value="{{ $user->id }}">
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
