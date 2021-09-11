@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>دستبندی‌ها</b></h4>
                <br>
                <button type="button" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5"
                    data-toggle="modal" data-target="#add">ایجاد دستبندی
                    جدید</button>
                <br><br>
                @if (Session::has('message'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ Session::get('message') }}
                    </div>
                @endif
                @if (Session::has('deleteMessage'))
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ Session::get('deleteMessage') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
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
                                <th>تاریخ ساخت</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td><img src="{{Storage::url($category->image)}}" alt="category image" width="100" style="background-color: black"></td>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>
                                        <a href="#" class="btn btn-danger btn-rounded" data-toggle="modal"
                                            data-target="#delete{{ $category->id }}"><span class="fa fa-trash"></span></a>
                                        <a href="#" class="btn btn-warning btn-rounded" data-toggle="modal"
                                            data-target="#edit{{ $category->id }}"><span class="fa fa-edit"></span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $categories->render() }}
                </div>
            </div>
        </div>
    </div>

    {{-- modal add --}}

    <div id="add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">دستبندی جدید</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form action="{{ route('admin.addCategory') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body col-12">
                        @csrf
                        <div class="col-sm-12">
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30">عکس</h4>

                                <div class="dropify-message"><input type="file" class="dropify" name="image" required>
                                    <div class="dropify-preview"><span class="dropify-render"></span></div>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <input type="text" class="form-control" placeholder="عنوان" name='title' required>
                    </div>
                        <hr>
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

    @foreach ($categories as $category)

        {{-- modal edit --}}

        <div id="edit{{ $category->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">ویرایش دستبندی {{ $category->title }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form action="{{ route('admin.editCategory', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-sm-12">
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30">عکس</h4>

                                <div class="dropify-message"><input type="file" class="dropify" name="image" data-default-file="{{Storage::url($category->image)}}">
                                    <div class="dropify-preview"><span class="dropify-render"></span></div>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <div class="modal-body">
                            <input type="text" class="form-control" placeholder="عنوان" name='title'
                                value="{{ $category->title }}" required>
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

        <div id="delete{{ $category->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">حذف دستبندی {{ $category->title }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <p>دستبندی حذف شود؟</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-rounded w-md waves-effect waves-light m-b-5"
                            data-dismiss="modal">بستن</button>
                        <a href="{{ route('admin.deleteCategory', $category->id) }}"
                            class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5">حذف</a>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @endforeach
@endsection
