@extends('e_learning.admin.layouts.master')

@section('content')
<div class="content">

    <!-- Form inputs -->
    <div class="card col-md-9">
        <div class="card-header">
            <h5 class="card-title">Buat Kelas Baru</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.kelas.store') }}" method="POST">
                <fieldset class="mb-3">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Nama Kelas</label>
                        <div class="col-lg-9">
                            <select data-placeholder="Pilih Mata Kuliah..." class="form-control select-search" name="matkul_id" data-fouc>
                                <option></option>
                                @foreach($matkul as $matkul)
                                    <option value="{{$matkul->id}}">{{$matkul->matkul}}</option>
                                @endforeach
                            </select>
                            @error('matkul_id')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Dosen Pengajar</label>
                        <div class="col-lg-9">
                            <select data-placeholder="Pilih Dosen..." class="form-control select-search" name="dosen_id" data-fouc>
                                <option></option>
                                @foreach($dosen as $dosen)
                                    <option value="{{$dosen->id}}">{{$dosen->nm_dsn}}</option>
                                @endforeach
                            </select>
                            @error('dosen_id')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Hari</label>
                        <div class="col-lg-9">
                            <select data-placeholder="Pilih Hari..." class="form-control select-search" name="hari" data-fouc>
                                <option></option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                            </select>
                            @error('hari')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Waktu</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="waktu" data-mask="19.59-19.59" autocomplete="off" value="{{old('waktu')}}">
                            @error('waktu')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Tahun Akademik</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="thn_akademik" data-mask="2099/2099" autocomplete="off" value="{{old('thn_akademik')}}">
                            @error('thn_akademik')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                </fieldset>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /form inputs -->

</div>
@endsection