@extends('layouts.site')
@section('content')
<div class="uk-width-2-3mc" dir="rtl">
    <div class="uk-width-2-3m">
        <div class="section-title burger wave">
        <h3 class="uk-h3">{{$logedUser->first_name}} {{$logedUser->last_name}}</h3>
        </div>
        <div class="section-content">
            <div class="">
                <h3 class="uk-h3">ایمیل: {{$logedUser->email}}</h3>
            </div>
                @if (Session::has('message'))
                    <div class="uk-alert-message">
                        {{ Session::get('message') }}
                    </div>
                @endif
            <form action="{{ route('site.userProfileEdit',$logedUser) }}" method="POST">
                @csrf
                <div class="uk-form">
                    <input class="uk-input-large" type="text" placeholder="نام" name="first_name" value="{{$logedUser->first_name}}" required>
                    <input class="uk-input-large" type="text" placeholder="نام خانوادگی" name="last_name" value="{{$logedUser->last_name}}" required>
                </div>
                <div class="uk-form-submit">
                <div class="uk-grid-margin uk-first-column"><input class="uk-button" type="submit" value="بروزرسانی"></div>
            </div>
            </form>
            @if (Session::has('errormessage'))
                <div class="uk-alert-message">
                    {{ Session::get('errormessage') }}
                </div>
            @endif
            @if (Session::has('successmessage'))
                <div class="uk-alert-message">
                    {{ Session::get('successmessage') }}
                </div>
            @endif
            <div class="uk-form-submit"><a href="#modal-password" class="uk-button" data-uk-toggle>تغییر گذرواژه</a></div>
        </div>
    </div>
</div>
{{-- modal change password --}}
<div class="uk-modal-full uk-modal" id="modal-password" data-uk-modal>
    <div class="uk-modal-dialog uk-flex uk-flex-center uk-flex-middle" data-uk-height-viewport dir="rtl"    ><button
            class="uk-modal-close-full" type="button" data-uk-close></button>
            <div class="modal-content">
              <div class="modal-header">
                  <h4 class="" id="myModalLabel" style="font-size: 2em;">تغییر گذرواژه</h4>
                    <form action="{{ route('site.userPasswordEdit',$logedUser) }}" method="POST">
                        @csrf
                        <div class="uk-form">
                            <input class="uk-input-large" type="password" placeholder="گذرواژه فعلی" name="old_password" required>
                            <input class="uk-input-large" type="password" placeholder="گذرواژه جدید" name="password" required>
                            <input class="uk-input-large" type="password" placeholder="تکرار گذرواژه جدید" name="password_confirmation" required>
                        </div>
                        <div class="uk-form-submit">
                        <div class="uk-grid-margin uk-first-column"><input class="uk-button" type="submit" value="تغییر"></div>
                        </div>
                    </form>
          </div><!-- /.modal-content -->
    </div>
</div>
@endsection('content')