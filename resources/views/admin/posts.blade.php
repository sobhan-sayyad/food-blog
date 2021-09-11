@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>پست‌ها</b></h4>
                <br>
                <button type="button" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5"data-toggle="modal" data-target="#add">ایجاد پست
                    جدید</button>
                <br><br>
                @if (Session::has('message'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria_hidden="true">×</button>
                        {{Session::get('message')}}
                    </div>
                @endif
                @if (Session::has('deleteMessage'))
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ Session::get('deleteMessage') }}
                </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria_hidden="true">×</button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="table-responsive">
                    <table id="mainTable" class="table table-striped m-b-0">
                        <thead>
                            <tr>
                                <th>عکس</th>
                                <th>عنوان</th>
                                <th>دستبندی</th>
                                <th>تاریخ انتشار</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td><img src="{{Storage::url($post->image)}}" alt="category image" width="100"></td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->category_title}}</td>
                                    <td>{{$post->created_at}}</td>
                                    <td>
                                        <a href="#" class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#delete{{$post->id}}"><span class="fa fa-trash"></span></a> 
                                        <a href="#" class="btn btn-warning btn-rounded" data-toggle="modal" data-target="#edit{{$post->id}}"><span class="fa fa-edit"></span></a>
                                    </td>
                                </tr>    
                            @endforeach
                        </tbody>
                    </table>
                    {{$posts->render()}}
                </div>
            </div>
        </div>
    </div>
    {{-- modal add --}}
    <div id="add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">پست جدید</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form action="{{route('admin.addPost')}}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="col-sm-12">
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30">عکس</h4>

                                <div class="dropify-message"><input type="file" class="dropify" name="image" required>
                                    <div class="dropify-preview"><span class="dropify-render"></span></div>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <div class="form-row mb-3">
                            <input type="text" class="form-control" placeholder="عنوان" name='title'>
                        </div>
                        <div class="form-row mb-3">
                            <select class="form-control" name="category_id" id="">
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                            </div>
                        <div class="form-row mb-3">
                            <textarea class="form-control" name="short_content" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-row mb-3">
                            <textarea id="elm1" name="content"></textarea></div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-rounded w-md waves-effect waves-light m-b-5"
                            data-dismiss="modal">بستن</button>
                        <button type="submit"
                            class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5">ایجاد</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    @foreach ($posts as $post)
      
    {{-- modal edit --}}

    <div id="edit{{$post->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">ویرایش پست {{$post->title}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form action="{{route('admin.editPost', $post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-sm-12">
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30">عکس</h4>

                            <div class="dropify-message"><input type="file" class="dropify" name="image" data-default-file="{{Storage::url($post->image)}}">
                                <div class="dropify-preview"><span class="dropify-render"></span></div>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <div class="modal-body">
                        <div class="form-row mb-3">
                            <input type="text" class="form-control" placeholder="عنوان" name='title' value="{{$post->title}}" required>
                        </div>
                        <div class="form-row mb-3">
                            <select class="form-control" name="category_id" id="" required>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}"   >{{$category->title}}</option>
                                @endforeach
                            </select>
                            </div>
                        <div class="form-row mb-3">
                            <textarea class="form-control" name="short_content" id="" cols="30" rows="10" placeholder="Short Content" required>{{$post->short_content}}</textarea>
                        </div>
                        <div class="form-row mb-3">
                            <textarea id="elm1" name="content" required>{{$post->content}}</textarea></div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-rounded w-md waves-effect waves-light m-b-5"
                            data-dismiss="modal">بستن</button>
                        <button type="submit"
                            class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5">ویرایش</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    {{-- modal delete --}}

    <div id="delete{{$post->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">حذف پست{{$post->title}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                    <div class="modal-body">
                        <p>پست حذف شود؟</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-rounded w-md waves-effect waves-light m-b-5"
                            data-dismiss="modal">بستن</button>
                        <a href="{{ route('admin.deletePost', $post->id) }}" class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5">حذف</a>
                    </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
      
    @endforeach
@endsection
