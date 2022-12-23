@extends('e_learning.admin.layouts.master')

@section('content')
<div class="content">

    <!-- Form inputs -->
    @if(Session::has('success'))
    <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible col-md-9">
        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        <span class="font-weight-semibold">Berhasil!</span> {{Session::get('success')}}
    </div>
    @endif
    
    @if(Session::has('error'))
    <div class="alert alert-danger alert-styled-left alert-arrow-left alert-dismissible col-md-9">
        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        <span class="font-weight-semibold">Gagal!</span> {{Session::get('error')}}
    </div>
    @endif
    
    <div class="card col-md-9">
        <div class="card-header">
            <h5 class="card-title">Edit Password</h5>
        </div>

        <div class="card-body">

            <form action="/admin/password/update" method="POST">
                <fieldset class="mb-3">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-lg-4">Password Lama</label>
                        <div class="col-lg-8">
                            <input type="password" class="form-control" name="opassword" autocomplete="off">
                            @error('opassword')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-4">Password Baru</label>
                        <div class="col-lg-8">
                            <input type="password" class="form-control" name="npassword" autocomplete="off">
                            @error('npassword')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-4">Konfirmasi Password</label>
                        <div class="col-lg-8">
                            <input type="password" class="form-control" name="cpassword" autocomplete="off">
                            @error('cpassword')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                </fieldset>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Update Password</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /form inputs -->

</div>
@endsection