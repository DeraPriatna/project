@extends('e_learning.dosen.layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-3"></div>
    
    <div class="col-lg-6 pt-1">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Persentase Nilai</h5>
            </div>

            <div class="card-body">
            @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                {{Session::get('error')}}
            </div>
            @endif

                <form action="/dosen/{{$kelas->id}}/nilai/store" method="POST">
                    @csrf
                    <div class="form-group form-group-float">
                        <label class="form-group-float-label is-visible @error('nilai_absen') is-invalid @enderror">Persentase Nilai Absensi (%)</label>
                        <input type="text" name="nilai_absen" class="form-control" autocomplete="off" value="10">
                        @error('nilai_absen')
                            <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                        @enderror
                    </div>
                    <div class="form-group form-group-float">
                        <label class="form-group-float-label is-visible @error('nilai_tugas') is-invalid @enderror">Persentase Nilai Tugas (%)</label>
                        <input type="text" name="nilai_tugas" class="form-control" autocomplete="off" value="20">
                        @error('nilai_tugas')
                            <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                        @enderror
                    </div>
                    <div class="form-group form-group-float">
                        <label class="form-group-float-label is-visible @error('nilai_uts') is-invalid @enderror">Persentase Nilai UTS (%)</label>
                        <input type="text" name="nilai_uts" class="form-control" autocomplete="off" value="30">
                        @error('nilai_uts')
                            <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                        @enderror
                    </div>
                    <div class="form-group form-group-float">
                        <label class="form-group-float-label is-visible @error('nilai_uas') is-invalid @enderror">Persentase Nilai UAS (%)</label>
                        <input type="text" name="nilai_uas" class="form-control" autocomplete="off" value="40">
                        @error('nilai_uas')
                            <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                        @enderror
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-secondary">Simpan <i class="icon-floppy-disk ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>	
@endsection