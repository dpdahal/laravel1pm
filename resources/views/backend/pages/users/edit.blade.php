@extends('backend.master.master')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><i class="fa fa-edit"></i> Update User Record</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('backend.layouts.message')
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <form action="{{route('edit-user-action')}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <input type="hidden" name="criteria" value="{{$userData->id}}">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Name:
                                                        <a style="color: red;">{{$errors->first('name')}}</a>
                                                    </label>
                                                    <input type="text" name="name" id="name"
                                                           class="form-control" value="{{$userData->name}}">
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="username">Username:
                                                        <a style="color: red;">{{$errors->first('username')}}</a>
                                                    </label>
                                                    <input type="text" name="username" id="username"
                                                           class="form-control" value="{{$userData->username}}">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="email">Email:
                                                <a style="color: red;">{{$errors->first('email')}}</a>
                                            </label>
                                            <input type="text" name="email" id="email"
                                                   class="form-control" value="{{$userData->email}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="image">Image:
                                                <a style="color: red;">{{$errors->first('image')}}</a>
                                            </label> <br>
                                            <input type="file" name="image"
                                                   id="image"
                                                   class="btn btn-default">
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Gender:
                                                <a style="color: red;">{{$errors->first('gender')}}</a>
                                            </label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="male" {{$userData->gender==='male' ? 'selected' : ''}}>
                                                    Male
                                                </option>
                                                <option value="female" {{$userData->gender==='female' ? 'selected' : ''}}>
                                                    Female
                                                </option>
                                                <option value="others" {{$userData->gender==='others' ? 'selected' : ''}}>
                                                    Others
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="user_type">User Types:
                                                <a style="color: red;">{{$errors->first('user_type')}}</a>
                                            </label>
                                            <select name="user_type" id="user_type" class="form-control">
                                                <option value="admin" {{$userData->user_type=='admin' ? 'selected' : ''}}>
                                                    Admin
                                                </option>
                                                <option value="user" {{$userData->user_type=='user' ? 'selected' : ''}}>
                                                    User
                                                </option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success"> Update User</button>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-4">

                                    <img src="{{url('uploads/users/'.$userData->image)}}"
                                         class="img-fluid img-thumbnail" alt="">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
