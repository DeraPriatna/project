@extends('e_learning.dosen.layouts.master')

@section('content')
<div class="row">
    
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex py-0">
                <h6 class="card-title font-weight-semibold py-3">Data Absensi</h6>
            
                <div class="d-inline-flex align-items-center ml-auto">
                    <a href="/dosen/{{$kelas->id}}/materi/create" class="btn btn-primary btn-sm">
                        <i class="icon-file-plus mr-1"></i> Buat
                    </a>
                    <div class="dropdown ml-2 position-static">
                        <a href="#" class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill" data-toggle="dropdown" aria-expanded="false">
                            <i class="icon-more2"></i>
                        </a>
                
                        <div class="dropdown-menu dropdown-menu-right" style="">
                            <a href="#" class="dropdown-item"><i class="icon-file-eye"></i> View report</a>
                            <a href="#" class="dropdown-item"><i class="icon-printer"></i> Print report</a>
                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export report</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item"><i class="icon-cog3"></i> Configure</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive border-top-0">
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th>Pertemuan</th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>UTS</th>
                            <th>8</th>
                            <th>9</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                            <th>13</th>
                            <th>UAS</th>
                            <th>%</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <a href="#" class="text-body font-weight-semibold">Andi Efendi</a>
                                        <div class="text-muted font-size-sm">182101001</div>
                                    </div>
                                </div>
                            </td>
                            <td><i class="icon-checkmark4 text-success"></i></td>
                            <td class="text-danger"><b><i>S</i></b></td>
                            <td class="text-danger"><b>i</b></td>
                            <td><i class="icon-checkmark4 text-success"></i></td>
                            <td><i class="icon-checkmark4 text-success"></i></td>
                            <td><i class="icon-checkmark4 text-success"></i></td>
                            <td><i class="icon-checkmark4 text-success"></i></td>
                            <td><i class="icon-checkmark4 text-success"></i></td>
                            <td><i class="icon-checkmark4 text-success"></i></td>
                            <td><i class="icon-checkmark4 text-success"></i></td>
                            <td><i class="icon-checkmark4 text-success"></i></td>
                            <td><i class="icon-checkmark4 text-success"></i></td>
                            <td><i class="icon-checkmark4 text-success"></i></td>
                            <td><i class="icon-checkmark4 text-success"></i></td>
                            <td>100%</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <a href="#" class="text-body font-weight-semibold">Dera Priatna</a>
                                        <div class="text-muted font-size-sm">182101004</div>
                                    </div>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection