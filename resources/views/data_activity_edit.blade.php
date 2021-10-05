@extends('layout')
@section('content')
      <!-- partial -->
      <div class="main-panel">  
        <div class="content-wrapper">
          <div class="page-header">
              <p class="mb-1 text-black">Detail Data Kandidat Magang</p>
              <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">Daftar kandidat </a></li>
                      <li class="breadcrumb-item active" aria-current="page">Lowongan Magang</li>
                  </ol>
              </nav>
          </div>
      
          <!-- ---------------------------------------------------------------------- -->
          <div class="row">
              <div class="col-12 grid-margin">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="card-title"> Data Diri </h4>
                          <form action="{{ route($route.'.update',$record->id) }}" class="form-sample" method="POST" id="formData" enctype="multipart/form-data">
                          @method('PATCH')
                          @csrf
                          <input type="hidden" name="id" value="{{ $record->id }}">
                              <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="#">Nama Lengkap</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" id="#" name="name" placeholder="Ahmad Syaifullah" value="{{ $record->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Jenis Kelamin</label><span class="text-danger">*</span>
                                        <select class="form-control" name="gender">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="P" {{ ($record->gender == 'P') ? 'selected' : '' }}>Perempuan</option>
                                            <option value="L" {{ ($record->gender == 'L') ? 'selected' : '' }}>Laki - laki</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Tempat Lahir</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" id="#" name="city_of_birth" placeholder="Tempat Lahir" value="{{ $record->city_of_birth }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Tanggal Lahir</label><span class="text-danger">*</span>
                                        <input type="date" name="date_of_birth" class="flatpickr flatpickr-input form-control" id="checkin-date" value="{{ $record->date_of_birth }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Agama</label><span class="text-danger">*</span>
                                        <select class="form-control" name="religion_id">
                                            {!! App\Models\Master\Religion::options('name','id',['selected' => $record->religion_id],'( Pilih Agama )') !!}
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Email</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" id="#" name="email" placeholder=" Email" value="{{ $record->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Nomor HP</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" id="#" name="phone" placeholder="Nomor HP " value="{{ $record->phone }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Twitter</label><span class="text-danger"></span>
                                        <input type="text" class="form-control" id="#" name="twitter" placeholder="Twitter" value="{{ $record->twitter }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Facebook</label><span class="text-danger"></span>
                                        <input type="text" class="form-control" id="#" name="facebook" placeholder="Facebook " value="{{ $record->facebook }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="#">Nomor KTP </label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" id="#" name="identity_number" placeholder="Nomor KTP " value="{{ $record->identity_number }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="#"> File KTP</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" id="#" name="identity_file" placeholder=" KTP " value="{{ $record->identity_file }}" readonly="">

                                    </div>
                                     <div class="form-group">
                                        <label for="#">Bank</label><span class="text-danger">*</span>
                                        <select class="form-control" name="bank_id">
                                            {!! App\Models\Master\Bank::options('name','id',['selected' => $record->bank_id],'( Pilih Bank )') !!}
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Nama Bank </label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" id="#" name="bank_name" placeholder="Nama Bank " value="{{ $record->bank_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Nomor Bank Akun </label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" id="#" name="bank_account" placeholder="Nomor Bank Akun " value="{{ $record->bank_account }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Alamat Domisili </label><span class="text-danger">*</span>
                                        <textarea class="form-control" id="#" name="address" rows="5" placeholder="Alamat Domisili">{{ $record->address }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Instagram</label><span class="text-danger"></span>
                                        <input type="text" class="form-control" id="#" name="instagram" placeholder="Instagram" value="{{ $record->instagram }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Linked In</label><span class="text-danger"></span>
                                        <input type="text" class="form-control" id="#" name="linkedin" placeholder="Linked In " value="{{ $record->linkedin }}">
                                    </div>
                                </div>
                              </div><br>

                              <h4 class="card-title"> Data Pendidikan </h4>
                                  <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="#">Pendidikan</label><span class="text-danger">*</span>
                                            <select class="form-control" name="education_id">
                                                {!! App\Models\Master\Education::options('name','id',['selected' => $record->education_id],'( Pilih Pendidikan )') !!}
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="#">Universitas</label><span class="text-danger">*</span>
                                            <select class="form-control" name="university_id">
                                                {!! App\Models\Master\University::options('name','id',['selected' => $record->university_id],'( Pilih Universitas )') !!}
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="#"> Tahun Lulus</label><span class="text-danger">*</span>
                                            <div class="form-group">
                                                <div class="input-group" name="#">
                                                    <input type="text" class="form-control mr-2" id="#" name="graduation_year" placeholder="Tahun Lulus">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                        id="customCheck2" name="in_college" value="1" {{ ($record->in_college == 1) ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="customCheck2">Masih
                                                        Kuliah</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="#">Jurusan </label><span class="text-danger">*</span>
                                            <input type="text" class="form-control" id="#" name="major" placeholder="Jurusan" value="{{ $record->major }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="#"> Semester</label><span class="text-danger">*</span>
                                            <input type="text" class="form-control" id="#" name="semester" placeholder="Semester" value="{{ $record->semester }}">
                                        </div>
                                    </div><br>
                                  </div>


                                  <h4 class="card-title"> Pengalaman Organisai </h4>
                                  <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="#">Organisasi</label><span class="text-danger">*</span>
                                            <input type="text" class="form-control" id="#" name="org_name" placeholder="organisasi" value="{{ @$record->organize->org_name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="#">Tahun</label><span class="text-danger">*</span>
                                            <input type="text" class="form-control" id="#" name="year" placeholder="tahun" value="{{ @$record->organize->year }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="#">Jabatan</label><span class="text-danger">*</span>
                                            <input type="text" class="form-control" id="#" name="position" placeholder="jabatan" value="{{ @$record->organize->position }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="#">Deskripsi Kegiatan </label><span class="text-danger">*</span>
                                            <textarea class="form-control" id="exampleTextarea1" name="description" rows="6">{{ @$record->organize->description }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="#"> File</label>
                                            <input type="text" class="form-control" id="#" name="file" placeholder="" value="{{ @$record->organize->file }}" readonly="">
                                        </div>
                                    </div>
                                  </div><br>

                                  <h4 class="card-title"> Keahlian yang Dimiliki </h4>
                                  <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="#">Keahlian</label><span class="text-danger">*</span>
                                          <textarea class="form-control" id="exampleTextarea1" name="skill" rows="10">{{ $record->skill }}</textarea>
                                      </div>
                                  </div>
                                  </div><br>
                                  <h4 class="card-title">Lain - Lain </h4>
                                  <div class="row ">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="#">File CV</label><span class="text-danger">*</span>
                                            <input type="text" class="form-control" id="#" name="file_cv" value="{{ $record->file_cv }}" readonly="" placeholder="File CV.pdf">
                                        </div>
                                        <div class="form-group">
                                            <label for="#">Past Photo</label><span class="text-danger">*</span>
                                            <input type="text" class="form-control" id="#" name="file_photo" value="{{ $record->file_photo }}" readonly="" placeholder="Photo.jpg">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="#"> Portofolio</label>
                                            <input type="text" class="form-control" id="#" name="file_portofolio" value="{{ $record->file_portofolio }}" readonly="" placeholder="Portofolio.pdf">
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
                                                          class="custom-control-input" value="{{ $value->id }}" {{ ($record->source_information_id == $value->id) ? 'checked' : '' }}>
                                                          <label class="custom-control-label pt-1" for="customRadio1">{{ @$value->name }}</label>
                                                      </div>
                                                  </div>
                                                  @if((@$value->name) && ($value->name == 'Lain-lain'))
                                                      <input type="text" class="form-control" id="#" name="source_information_other" placeholder="" value="{{ $record->source_information_other }}">
                                                  @endif
                                              </div>
                                          </div>
                                      @endforeach
                                    @endif
                                  </div><br>
                                  <h4 class="card-title">Data Akun Magang </h4>
                                  <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="#">Lowongan</label><span class="text-danger">*</span>
                                          <input type="text" class="form-control" id="#" name="apprentice_vacancy" value="{{ $record->apprentice_vacancy }}" placeholder="Lowongan"  >
                                      </div>
                                      <div class="form-group">
                                          <label for="#">Tipe Magang </label><span class="text-danger">*</span>
                                          <input type="text" class="form-control" id="#" name="apprentice_type" value="{{ $record->apprentice_type }}" placeholder="Tipe Magang"  >
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="#"> Periode Magang</label>
                                          <input type="text" class="form-control" id="#" name="apprentice_periode" value="{{ $record->apprentice_periode }}" placeholder="Periode Magang"  >
                                      </div>
                                      <div class="form-group">
                                          <label for="#"> Lokasi Magang</label>
                                          <input type="text" class="form-control" id="#" name="apprentice_location" value="{{ $record->apprentice_location }}" placeholder="Lokasi Magang "  >
                                      </div>
                                  </div>
                                  </div><br>
                              
                              <h4 class="card-title">Proses Seleksi </h4>
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="#">Unit Kerja</label><span class="text-danger">*</span>
                                          <input type="text" class="form-control" id="#" name="work_unit" value="{{ $record->work_unit }}" placeholder=""  >
                                      </div>
                                      <div class="form-group">
                                          <label for="#">Hasil Assesmen </label><span class="text-danger">*</span>
                                          <input type="text" class="form-control" id="#" name="assessment_score" value="{{ $record->assessment_score }}" placeholder=""  >
                                      </div>
                                      <div class="form-group">
                                          <label for="#"> Rangkin</label><span class="text-danger">*</span>
                                          <input type="text" class="form-control" id="#" name="ranking" value="{{ $record->ranking }}" placeholder=""  >
                                      </div>
                                      <div class="form-group">
                                          <label for="#"> Hasil</label><span class="text-danger">*</span>
                                          <select class="form-control" name="candidate_status_id">
                                            {!! App\Models\Master\CandidateStatus::options('status','id',['selected' => $record->candidate_status_id],'( Pilih Hasil )') !!}
                                          </select>
                                      </div>
                                  </div>
                              </div><br>
                          </form>
                          <div class="float-right">
                              <a href="{{ url('magang') }}" type="button" class="btn btn-dark mb-2  mr-2">Kembali</a>
                              <a href="#" type="button" class="btn btn-primary mb-2 mr-2 save">Simpan Perubahan</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      
          <!-- ---------------------------------------------------------------------- -->
      
      </div>
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap Dash</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
@endsection