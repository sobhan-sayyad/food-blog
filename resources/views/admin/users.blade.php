@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>کاربران</b></h4>
                @if (Session::has('deleteMessage'))
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ Session::get('deleteMessage') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table id="mainTable" class="table table-striped m-b-0">
                        <thead>
                            <tr>
                                <th>نام</th>
                                <th>نام خانوادگی</th>
                                <th>نوع کاربر</th>
                                <th>تاریخ ساخت اکانت</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->type }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <a href="#" class="btn btn-danger btn-rounded" data-toggle="modal"
                                            data-target="#delete{{ $user->id }}"><span class="fa fa-trash"></span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->render() }}
                </div>
            </div>
        </div>
    </div>
        {{-- modal delete --}}
    @foreach ($users as $user)
        <div id="delete{{ $user->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">حذف کاربر{{ $user->title }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <p>کاربر حذف شود؟</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-rounded w-md waves-effect waves-light m-b-5"
                            data-dismiss="modal">بستن</button>
                        <a href="{{ route('admin.deleteUser', $user->id) }}"
                            class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5">حذف</a>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @endforeach
@endsection
