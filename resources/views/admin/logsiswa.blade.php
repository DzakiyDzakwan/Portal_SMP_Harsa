@extends('admin.main')

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
                    <li class="breadcrumb-item Aktif" aria-current="page">
                        Log-Siswa
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- Table --}}
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NISN</th>
                        <th>Kelas</th>
                        <th>Tanggal Masuk</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Status Keaktifan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>211402018</td>
                        <td>Graiden</td>
                        <td>6/7/2020</td>
                        <td>10/10/2022</td>
                        <td>05/11/2022</td>
                        <td>
                            <span class="badge bg-success">Aktif</span>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>211402018</td>
                        <td>Dale</td>
                        <td>6/7/2020</td>
                        <td>10/10/2022</td>
                        <td>05/11/2022</td>
                        <td>
                            <span class="badge bg-success">Aktif</span>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>211402018</td>
                        <td>Nathaniel</td>
                        <td>6/7/2020</td>
                        <td>10/10/2022</td>
                        <td>05/11/2022</td>
                        <td>
                            <span class="badge bg-danger">Tidak Aktif</span>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>211402018</td>
                        <td>Darius</td>
                        <td>6/7/2020</td>
                        <td>10/10/2022</td>
                        <td>05/11/2022</td>
                        <td>
                            <span class="badge bg-success">Aktif</span>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>211402018</td>
                        <td>Oleg</td>
                        <td>6/7/2020</td>
                        <td>10/10/2022</td>
                        <td>05/11/2022</td>
                        <td>
                            <span class="badge bg-success">Aktif</span>
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>211402018</td>
                        <td>Kermit</td>
                        <td>6/7/2020</td>
                        <td>10/10/2022</td>
                        <td>05/11/2022</td>
                        <td>
                            <span class="badge bg-success">Aktif</span>
                        </td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>211402018</td>
                        <td>Jermaine</td>
                        <td>6/7/2020</td>
                        <td>10/10/2022</td>
                        <td>05/11/2022</td>
                        <td>
                            <span class="badge bg-success">Aktif</span>
                        </td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>211402018</td>
                        <td>Ferdinand</td>
                        <td>6/7/2020</td>
                        <td>10/10/2022</td>
                        <td>05/11/2022</td>
                        <td>
                            <span class="badge bg-danger">Tidak Aktif</span>
                        </td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>211402018</td>
                        <td>Kuame</td>
                        <td>6/7/2020</td>
                        <td>10/10/2022</td>
                        <td>05/11/2022</td>
                        <td>
                            <span class="badge bg-success">Aktif</span>
                        </td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>211402018</td>
                        <td>Deacon</td>
                        <td>6/7/2020</td>
                        <td>10/10/2022</td>
                        <td>05/11/2022</td>
                        <td>
                            <span class="badge bg-success">Aktif</span>
                        </td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>211402018</td>
                        <td>Channing</td>
                        <td>6/7/2020</td>
                        <td>10/10/2022</td>
                        <td>05/11/2022</td>
                        <td>
                            <span class="badge bg-success">Aktif</span>
                        </td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>211402018</td>
                        <td>Aladdin</td>
                        <td>6/7/2020</td>
                        <td>10/10/2022</td>
                        <td>05/11/2022</td>
                        <td>
                            <span class="badge bg-success">Aktif</span>
                        </td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td>211402018</td>
                        <td>Cruz</td>
                        <td>6/7/2020</td>
                        <td>10/10/2022</td>
                        <td>05/11/2022</td>
                        <td>
                            <span class="badge bg-success">Aktif</span>
                        </td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <td>211402018</td>
                        <td>Keegan</td>
                        <td>6/7/2020</td>
                        <td>10/10/2022</td>
                        <td>05/11/2022</td>
                        <td>
                            <span class="badge bg-success">Aktif</span>
                        </td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <td>211402018</td>
                        <td>Ray</td>
                        <td>6/7/2020</td>
                        <td>10/10/2022</td>
                        <td>05/11/2022</td>
                        <td>
                            <span class="badge bg-success">Aktif</span>
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
