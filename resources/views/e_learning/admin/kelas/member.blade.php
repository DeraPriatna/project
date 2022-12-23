@extends('e_learning.admin.layouts.master')

@section('content')
<div class="content">

    <!-- Form inputs -->    
    <div class="card col-md-10">
        <div class="card-header">
            <h4 class="card-title">{{$item->matkul->matkul}}</h4>
        </div>

        <div class="card-body">

            <form action="/admin/kelas/member/add/{{$item->id}}" method="POST">
                <fieldset class="mb-3">
                    @csrf
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Semester</label>
                        <div class="col-lg-9">
                            <div class="form-control-plaintext">{{$item->matkul->semester}}</div>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-top: -25px">
                        <label class="col-lg-3 col-form-label">Dosen Pengajar</label>
                        <div class="col-lg-9">
                            <div class="form-control-plaintext">{{$item->dosen->nm_dsn}}</div>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-top: -25px">
                        <label class="col-lg-3 col-form-label">SKS</label>
                        <div class="col-lg-9">
                            <div class="form-control-plaintext">{{$item->matkul->sks}}</div>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-top: -25px">
                        <label class="col-lg-3 col-form-label">Hari / Waktu</label>
                        <div class="col-lg-9">
                            <div class="form-control-plaintext">{{$item->hari.' ('.$item->waktu}})</div>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-top: -25px">
                        <label class="col-lg-3 col-form-label">Tahun Akademik</label>
                        <div class="col-lg-9">
                            <div class="form-control-plaintext">{{$item->thn_akademik}}</div>
                        </div>
                    </div>
                    
                    <hr>

                    @if(Session::has('success'))
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                        <span class="font-weight-semibold"></span>{{Session::get('success')}}
                    </div>
                    @endif
                    @if(Session::has('remove'))
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                        <span class="font-weight-semibold"></span>{{Session::get('remove')}}
                    </div>
                    @endif

                    <h5>Anggota :</h5>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Mahasiswa</label>
                        <div class="col-lg-7">
                            <div class="col-md-12 btn-group" style="margin-left: -10px">
                                <select data-placeholder="Pilih Mahasiswa..." class="form-control select-search" name="mahasiswa_id" data-fouc>
                                    <option></option>
                                    @foreach($mhs as $mhs)
                                        <option value="{{$mhs->id}}">[{{$mhs->nim}}] {{$mhs->nm_mhs}}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary"><i class="icon-user-plus"></i></button>
                            </div>
                            @error('mahasiswa_id')
                                <label id="with_icon-error" class="validation-invalid-label" for="with_icon">{{$message}}</label>
                            @enderror
                        </div>
                    </div>                    
                </fieldset>
            </form>

            <table class="table table-hover datatable-responsive-control-right6">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>NIM</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th class="text-center">Aksi</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach($member as $member)
                    <tr>
                        <td class="text-center">{{$no++}}</td>
                        <td>{{$member->mahasiswa->nim}}</td>
                        <td>{{$member->mahasiswa->nm_mhs}}</td>
                        <td>{{$member->mahasiswa->jk}}</td>
                        <td class="text-center">
                            <div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="/admin/kelas/member/remove/{{$member->id}}" class="dropdown-item" onclick="return confirm('Mahasiswa akan dihapus?')"><i class="icon-user-cancel"></i> Batalkan Anggota</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /form inputs -->

</div>
@endsection