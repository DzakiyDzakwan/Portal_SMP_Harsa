@extends('master.main')

@section('style')
    <link rel="stylesheet" href="{{asset('assets/extensions/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pages/simple-datatables.css')}}">
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>History Log Siswa</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav
                aria-label="breadcrumb"
                class="breadcrumb-header float-start float-lg-end"
            >
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Log-Siswa
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- Table --}}
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NISN</th>
                        <th>Kelas</th>
                        <th>Status Keaktiifan</th>
                        <th>Tanggal Masuk</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>211402018</td>
                        <td>Graiden</td>
                        <td>Aktif</td>
                        <td>076 4820 8838</td>
                        <td>Offenburg</td>
                        <td>05/11/2022</td>
                        <td>
                            <span class="badge bg-success">Active</span>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>211402018</td>
                        <td>Dale</td>
                        <td>Aktif</td>
                        <td>0500 527693</td>
                        <td>New Quay</td>
                        <td>05/11/2022</td>
                        <td>
                            <span class="badge bg-success">Active</span>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>211402018</td>
                        <td>Nathaniel</td>
                        <td>Aktif</td>
                        <td>(012165) 76278</td>
                        <td>Grumo Appula</td>
                        <td>05/11/2022</td>
                        <td>
                            <span class="badge bg-danger">Inactive</span>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>211402018</td>
                        <td>Darius</td>
                        <td>Aktif</td>
                        <td>0309 690 7871</td>
                        <td>Ways</td>
                        <td>05/11/2022</td>
                        <td>
                            <span class="badge bg-success">Active</span>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>211402018</td>
                        <td>Oleg</td>
                        <td>Aktif</td>
                        <td>0500 441046</td>
                        <td>Rossignol</td>
                        <td>05/11/2022</td>
                        <td>
                            <span class="badge bg-success">Active</span>
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>211402018</td>
                        <td>Kermit</td>
                        <td>Aktif</td>
                        <td>(01653) 27844</td>
                        <td>Patna</td>
                        <td>05/11/2022</td>
                        <td>
                            <span class="badge bg-success">Active</span>
                        </td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>211402018</td>
                        <td>Jermaine</td>
                        <td>Aktif</td>
                        <td>0800 528324</td>
                        <td>Mold</td>
                        <td>05/11/2022</td>
                        <td>
                            <span class="badge bg-success">Active</span>
                        </td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>211402018</td>
                        <td>Ferdinand</td>
                        <td>Aktif</td>
                        <td>(016977) 4107</td>
                        <td>Marlborough</td>
                        <td>05/11/2022</td>
                        <td>
                            <span class="badge bg-danger">Inactive</span>
                        </td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>211402018</td>
                        <td>Kuame</td>
                        <td>Aktif</td>
                        <td>(0151) 561 8896</td>
                        <td>Tresigallo</td>
                        <td>05/11/2022</td>
                        <td>
                            <span class="badge bg-success">Active</span>
                        </td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>211402018</td>
                        <td>Deacon</td>
                        <td>Aktif</td>
                        <td>07740 599321</td>
                        <td>Karapınar</td>
                        <td>05/11/2022</td>
                        <td>
                            <span class="badge bg-success">Active</span>
                        </td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>211402018</td>
                        <td>Channing</td>
                        <td>Aktif</td>
                        <td>0845 46 49</td>
                        <td>Warrnambool</td>
                        <td>05/11/2022</td>
                        <td>
                            <span class="badge bg-success">Active</span>
                        </td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>211402018</td>
                        <td>Aladdin</td>
                        <td>Aktif</td>
                        <td>0800 1111</td>
                        <td>Bothey</td>
                        <td>05/11/2022</td>
                        <td>
                            <span class="badge bg-success">Active</span>
                        </td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td>211402018</td>
                        <td>Cruz</td>
                        <td>Aktif</td>
                        <td>07624 944915</td>
                        <td>Shikarpur</td>
                        <td>05/11/2022</td>
                        <td>
                            <span class="badge bg-success">Active</span>
                        </td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <td>211402018</td>
                        <td>Keegan</td>
                        <td>Aktif</td>
                        <td>0800 200103</td>
                        <td>Assen</td>
                        <td>05/11/2022</td>
                        <td>
                            <span class="badge bg-success">Active</span>
                        </td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <td>211402018</td>
                        <td>Ray</td>
                        <td>Aktif</td>
                        <td>(0112) 896 6829</td>
                        <td>Hofors</td>
                        <td>05/11/2022</td>
                        <td>
                            <span class="badge bg-success">Active</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('assets/extensions/simple-datatables/umd/simple-datatables.js')}}"></script>
    <script src="{{asset('assets/js/pages/simple-datatables.js')}}"></script>
@endsection
