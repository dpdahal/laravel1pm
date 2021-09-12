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
                            <h2><i class="fa fa-edit"></i> Update Category</h2>
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
                                <div class="col-md-12">

                                    <form action="{{route('admin-category.update',$categoryData->id)}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group">
                                            <label for="title">Title
                                                <a style="color: red;">{{$errors->first('title')}}</a>
                                            </label>
                                            <input type="text" value="{{$categoryData->title}}" name="title" id="title"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="slug">Slug
                                                <a style="color: red;">{{$errors->first('slug')}}</a>
                                            </label>
                                            <input type="text" name="slug" value="{{$categoryData->slug}}" id="slug"
                                                   class="form-control">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="myDatepicker">Date
                                                        <a style="color: red;">{{$errors->first('date')}}</a>
                                                    </label>
                                                    <input type="text" name="date" id="myDatepicker"
                                                           value="{{$categoryData->date}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="status">Status
                                                        <a style="color: red;">{{$errors->first('status')}}</a>
                                                    </label>
                                                    <select name="status" id="status" class="form-control">
                                                        <option value="" readonly>---Select Status ---</option>
                                                        <option
                                                            value="1" {{$categoryData->status=='1' ? 'selected' : ''}}>
                                                            Public
                                                        </option>
                                                        <option
                                                            value="0" {{$categoryData->status=='0' ? 'selected' : ''}}>
                                                            Draft
                                                        </option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="meta_keywords">Meta Keywords</label> <br>
                                            <input type="text" class="form-control"
                                                  name="meta_keywords" value="{{$categoryData->meta_keywords}}"
                                                   data-role="tagsinput" id="meta_keywords">
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_description">Meta Description</label> <br>
                                            <textarea name="meta_description" id="meta_description"
                                                      class="form-control">
                                               {{$categoryData->meta_description}}
                                           </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="summary">summary</label> <br>
                                            <textarea name="summary" id="summary"
                                                      class="form-control">
                                                 {{$categoryData->summary}}
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">description</label> <br>
                                            <textarea name="description" id="description"
                                                      class="form-control">
                                                 {{$categoryData->description}}
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Image:
                                                <a style="color: red;">{{$errors->first('image')}}</a>
                                            </label> <br>
                                            <input type="file" name="image" class="btn btn-default">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success"> Update Record</button>
                                        </div>


                                    </form>
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
