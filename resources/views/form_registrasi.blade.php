@extends('layout')
@section('content')
<!-- partial -->
<div class="main-panel">        
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">
          Forms
      </h3>
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Forms</a></li>
            <li class="breadcrumb-item active" aria-current="page">Basic elements</li>
        </ol>
    </nav>
</div>
<div class="row">
    
        <div class="col-12 ">
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <form action="{{ route($route.'.store') }}" method="POST" id="formData" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="#">Nama Lengkap</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="#" name="name" placeholder="Ahmad Syaifullah">
                                </div>
                                <div class="form-group">
                                    <label for="#">Jenis Kelamin</label><span class="text-danger">*</span>
                                    <select class="form-control" name="gender">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="P">Perempuan</option>
                                        <option value="L">Laki - laki</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="#">Tempat Lahir</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="#" name="city_of_birth" placeholder="Tempat Lahir">
                                </div>
                                <div class="form-group">
                                    <label for="#">Tanggal Lahir</label><span class="text-danger">*</span>
                                    <input type="date" name="date_of_birth" class="flatpickr flatpickr-input form-control" id="checkin-date">
                                </div>
                                <div class="form-group">
                                    <label for="#">Agama</label><span class="text-danger">*</span>
                                    <select class="form-control" name="religion_id">
                                        {!! App\Models\Master\Religion::options('name','id',[],'( Pilih Agama )') !!}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="#">Email</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="#" name="email" placeholder=" Email">
                                </div>
                                <div class="form-group">
                                    <label for="#">Nomor HP</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="#" name="phone" placeholder="Nomor HP ">
                                </div>
                                <div class="form-group">
                                    <label for="#">Twitter</label><span class="text-danger"></span>
                                    <input type="text" class="form-control" id="#" name="twitter" placeholder="Twitter">
                                </div>
                                <div class="form-group">
                                    <label for="#">Facebook</label><span class="text-danger"></span>
                                    <input type="text" class="form-control" id="#" name="facebook" placeholder="Facebook ">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="#">Nomor KTP </label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="#" name="identity_number" placeholder="Nomor KTP ">
                                </div>
                                <div class="form-group">
                                    <label for="#"> File KTP</label><span class="text-danger">*</span>
                                    <input type="file" class="form-control" id="#" name="identity_file" placeholder=" KTP ">

                                </div>
                                 <div class="form-group">
                                    <label for="#">Bank</label><span class="text-danger">*</span>
                                    <select class="form-control" name="bank_id">
                                        {!! App\Models\Master\Bank::options('name','id',[],'( Pilih Bank )') !!}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="#">Nama Bank </label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="#" name="bank_name" placeholder="Nama Bank ">
                                </div>
                                <div class="form-group">
                                    <label for="#">Nomor Bank Akun </label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="#" name="bank_account" placeholder="Nomor Bank Akun ">
                                </div>
                                <div class="form-group">
                                    <label for="#">Alamat Domisili </label><span class="text-danger">*</span>
                                    <textarea class="form-control" id="#" name="address" rows="5" placeholder="Alamat Domisili"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="#">Instagram</label><span class="text-danger"></span>
                                    <input type="text" class="form-control" id="#" name="instagram" placeholder="Instagram">
                                </div>
                                <div class="form-group">
                                    <label for="#">Linked In</label><span class="text-danger"></span>
                                    <input type="text" class="form-control" id="#" name="linkedin" placeholder="Linked In ">
                                </div>
                            </div>
                        </div><br>
                        <h4 class="card-title"> Data Pendidikan </h4>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="#">Pendidikan</label><span class="text-danger">*</span>
                                    <select class="form-control" name="education_id">
                                        {!! App\Models\Master\Education::options('name','id',[],'( Pilih Pendidikan )') !!}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="#">Universitas</label><span class="text-danger">*</span>
                                    <select class="form-control" name="university_id">
                                        {!! App\Models\Master\University::options('name','id',[],'( Pilih Universitas )') !!}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="#"> Tahun Lulus</label><span class="text-danger">*</span>
                                    <div class="form-group">
                                        <div class="input-group" name="#">
                                            <input type="text" class="form-control mr-2" id="#" name="graduation_year" placeholder="Tahun Lulus">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                id="customCheck2" name="in_college" value="1">
                                                <label class="custom-control-label pt-1" for="customCheck2">Masih
                                                Kuliah</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="#">Jurusan </label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="#" name="major" placeholder="Jurusan">
                                </div>
                                <div class="form-group">
                                    <label for="#"> Semester</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="#" name="semester" placeholder="Semester">
                                </div>
                            </div><br>
                        </div>

                        <div class="controls mt-3"> 
                            <div class="entry ">
                                <h4 class="card-title mt-5"> Pengalaman Organisai </h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="#">Organisasi</label><span class="text-danger">*</span>
                                            <input type="text" class="form-control" id="#" name="org_name" placeholder="organisasi">
                                        </div>
                                        <div class="form-group">
                                            <label for="#">Tahun</label><span class="text-danger">*</span>
                                            <input type="text" class="form-control" id="#" name="year" placeholder="tahun">
                                        </div>
                                        <div class="form-group">
                                            <label for="#">Jabatan</label><span class="text-danger">*</span>
                                            <input type="text" class="form-control" id="#" name="position" placeholder="jabatan">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="#">Deskripsi Kegiatan </label><span class="text-danger">*</span>
                                            <textarea class="form-control" id="exampleTextarea1" name="description" rows="6"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="#"> File</label>
                                            <input type="file" class="form-control" id="#" name="file" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <!-- <span class="input-group-btn float-right">
                                    <button class="btn btn-success btn-sm btn-add" type="button"> Tambah Organisasi
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </button>
                                </span> -->
                            </div>
                        </div><br>
                        <h4 class="card-title"> Keahlian yang Dimiliki </h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="#">Keahlian</label><span class="text-danger">*</span>
                                    <textarea class="form-control" id="exampleTextarea1" name="skill" rows="10"></textarea>
                                </div>
                            </div>
                        </div><br>
                        <h4 class="card-title">Lain - Lain </h4>
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="#">File CV</label><span class="text-danger">*</span>
                                    <input type="file" class="form-control" id="#" name="file_cv" placeholder="File CV.pdf">
                                </div>
                                <div class="form-group">
                                    <label for="#">Past Photo</label><span class="text-danger">*</span>
                                    <input type="file" class="form-control" id="#" name="file_photo" placeholder="Photo.jpg">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="#"> Portofolio</label>
                                    <input type="file" class="form-control" id="#" name="file_portofolio" placeholder="Portofolio.pdf">
                                </div>
                            </div>
                        </div><br>
                        <h4 class="card-title">Mengenal Jasamarga dari ? </h4>
                        <div class="row">
                            @if($source->count() > 0)
                                @foreach($source as $k => $value)
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <div class="form-group mb-0">
                                                    <input type="radio" id="customRadio1" name="source_information_id"
                                                    class="custom-control-input" value="{{ $value->id }}">
                                                    <label class="custom-control-label pt-1" for="customRadio1">{{ @$value->name }}</label>
                                                </div>
                                            </div>
                                            @if((@$value->name) && ($value->name == 'Lain-lain'))
                                                <input type="text" class="form-control" id="#" name="source_information_other" placeholder="">
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div><br>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1" name="aggrement" value="1">
                                    <label class="custom-control-label pt-1" for="customCheck1" >I Accept <a href=""
                                        class="text-primary">Terms And Condition</a></label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="btn btn-outline-primary save">Kirim Lamaran <i class="mdi mdi-send"></i></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
<!-- content-wrapper ends -->
<!-- partial:../../partials/_footer.html -->
<footer class="footer">
  <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021 <a
          href="https://www.jasamarga.com/" target="_blank">© PT Jasa Marga (Persero)</a>. All
          rights
      reserved.</span>
      <span class="float-none float-sm-right d-block text-muted  text-center">Suported by Information
          Technology
      Group </span>
  </div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
@endsection
