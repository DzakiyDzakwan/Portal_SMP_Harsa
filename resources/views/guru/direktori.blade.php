@extends('guru.master.main')

@section('title')
    <title>Direktori</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('assets/extensions/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pages/simple-datatables.css')}}">
@endsection

@section('content')
<div class="row">
    <div class="text-center text-xl">
        <img src="{{asset('assets/images/logo/logo2.png')}}" alt="logoharsa">
        <h3>Direktori SMP Harapan Satu Medan </h3>
        
    </div>
</div>
<section id="multiple-inputs">
    <div class="row mt-2">
      <div class="col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <p class="text-center">
                Melakukan validasi data Siswa dan Guru dengan memasukkan Nama, NIS, NISN atau NIP yang bersangkutan.
              </p>
              <div class="row">
                <div class="col-12">
                  <fieldset>
                    <div class="input-group">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Choose User</option>
                            <option value="1">Guru</option>
                            <option value="2">Siswa</option>
                        </select>
                        <input
                            type="text"
                            aria-label="Nama/NIS/NISN/NIP"
                            class="form-control"
                            placeholder="Tuliskan Nama/NIS/NISN/NIP"/>
                        <button
                            class="btn btn-primary"
                            type="button"
                            id="button-addon1">
                            <i class="bi bi-search" href="#" ></i>search
                        </button>  
                    </div>
                  </fieldset>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<div class="card">
    <div class="card-header d-flex gap-2 align-items-center justify-content-between">
        <h5>Siswa / Guru SMP Harapan Satu Medan</h5>
    </div>
        <section class="list-group-navigation">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-12 col-sm-12 col-md-4">
                          <div class="list-group" role="tablist">
                            <a
                              class="list-group-item list-group-item-action active"
                              id="list-home-list"
                              data-bs-toggle="list"
                              href="#list-home"
                              role="tab"
                              >Foto</a
                            >
                            <a
                              class="list-group-item list-group-item-action"
                              id="list-profile-list"
                              data-bs-toggle="list"
                              href="#list-profile"
                              role="tab"
                              >Data Pribadi</a
                            >
                            <a
                              class="list-group-item list-group-item-action"
                              id="list-messages-list"
                              data-bs-toggle="list"
                              href="#list-messages"
                              role="tab"
                              >Prestasi</a
                            >
                            <a
                              class="list-group-item list-group-item-action"
                              id="list-settings-list"
                              data-bs-toggle="list"
                              href="#list-settings"
                              role="tab"
                              >Jadwal</a
                            >
                            <a
                              class="list-group-item list-group-item-action"
                              id="list-settings-list"
                              data-bs-toggle="list"
                              href="#list-absens"
                              role="tab"
                              >Absensi</a
                            >
                          </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-8 mt-1">
                          <div
                            class="tab-content text-justify"
                            id="nav-tabContent"
                          >
                            <div
                              class="tab-pane show active"
                              id="list-home"
                              role="tabpanel"
                              aria-labelledby="list-home-list"
                            >
                              Velit aute mollit ipsum ad dolor consectetur nulla
                              officia culpa adipisicing exercitation fugiat
                              tempor. Voluptate deserunt sit sunt nisi aliqua
                              fugiat proident ea ut. Mollit voluptate
                              reprehenderit occaecat nisi ad non minim tempor
                              sunt voluptate consectetur exercitation id ut
                              nulla. Ea et fugiat aliquip nostrud sunt
                              incididunt consectetur culpa aliquip eiusmod
                              dolor. Anim ad Lorem aliqua in cupidatat nisi enim
                              eu nostrud do aliquip veniam minim. Lorem ipsum
                              dolor sit amet consectetur, adipisicing elit.
                              Aliquam itaque nisi obcaecati doloremque et est ex
                              possimus quidem dolorem soluta.
                            </div>
                            <div
                              class="tab-pane"
                              id="list-profile"
                              role="tabpanel"
                              aria-labelledby="list-profile-list"
                            >
                              Cupidatat quis ad sint excepteur laborum in esse
                              qui. Et excepteur consectetur ex nisi eu do cillum
                              ad laborum. Mollit et eu officia dolore sunt Lorem
                              culpa qui commodo velit ex amet id ex. Officia
                              anim incididunt laboris deserunt anim aute dolor
                              incididunt veniam aute dolore do exercitation.
                              Dolor nisi culpa ex ad irure in elit eu dolore. Ad
                              laboris ipsum reprehenderit irure non commodo enim
                              culpa commodo veniam incididunt veniam ad.
                            </div>
                            <div
                              class="tab-pane"
                              id="list-messages"
                              role="tabpanel"
                              aria-labelledby="list-messages-list"
                            >
                              Ut ut do pariatur aliquip aliqua aliquip
                              exercitation do nostrud commodo reprehenderit aute
                              ipsum voluptate. Irure Lorem et laboris nostrud
                              amet cupidatat cupidatat anim do ut velit mollit
                              consequat enim tempor. Consectetur est minim
                              nostrud nostrud consectetur irure labore voluptate
                              irure. Ipsum id Lorem sit sint voluptate est
                              pariatur eu ad cupidatat et deserunt culpa sit
                              eiusmod deserunt. Consectetur et fugiat anim do
                              eiusmod aliquip nulla laborum elit adipisicing
                              pariatur cillum.
                            </div>
                            <div
                              class="tab-pane"
                              id="list-settings"
                              role="tabpanel"
                              aria-labelledby="list-settings-list"
                            >
                              Irure enim occaecat labore sit qui aliquip
                              reprehenderit amet velit. Deserunt ullamco ex elit
                              nostrud ut dolore nisi officia magna sit occaecat
                              laboris sunt dolor. Nisi eu minim cillum occaecat
                              aute est cupidatat aliqua labore aute occaecat ea
                              aliquip sunt amet. Aute mollit dolor ut
                              exercitation irure commodo non amet consectetur
                              quis amet culpa. Quis ullamco nisi amet qui aute
                              irure eu. Magna labore dolor quis ex labore id
                              nostrud deserunt dolor eiusmod eu pariatur culpa
                              mollit in irure
                            </div>
                            <div
                              class="tab-pane"
                              id="list-absens"
                              role="tabpanel"
                              aria-labelledby="list-settings-list"
                            >
                              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis natus dolores dolorum, officiis consectetur consequuntur at itaque optio aperiam beatae impedit alias exercitationem consequatur tempore dicta odit commodi animi aspernatur?
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

              

          </section>

</div>

{{-- Modal Add --}}
<div
    class="modal fade text-left"
    id="add"
    tabindex="-1"
    role="dialog"
    aria-labelledby="myModalLabel130"
    aria-hidden="true"
>
    <div
        class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document"
    >
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title white" id="myModalLabel130">
                    Input Nilai
                </h5>
                <button
                    type="button"
                    class="close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                >
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="modal-body">
                        <label>Nilai: </label>
                        <div class="form-group">
                            <input type="text" class="form-control" readonly />
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-light-secondary"
                    data-bs-dismiss="modal"
                >
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Modal Update --}}
<div
    class="modal fade text-left"
    id="update"
    tabindex="-1"
    role="dialog"
    aria-labelledby="myModalLabel130"
    aria-hidden="true"
>
    <div
        class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document"
    >
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title white" id="myModalLabel130">
                    Ubah Nilai
                </h5>
                <button
                    type="button"
                    class="close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                >
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="modal-body">
                        <label>Nilai: </label>
                        <div class="form-group">
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-light-secondary"
                    data-bs-dismiss="modal"
                >
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <button
                    type="button"
                    class="btn btn-success ml-1"
                    data-bs-dismiss="modal"
                >
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Simpan</span>
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script src="{{asset('assets/extensions/simple-datatables/umd/simple-datatables.js')}}"></script>
    <script src="{{asset('assets/js/pages/simple-datatables.js')}}"></script>
@endsection
