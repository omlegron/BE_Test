@extends('layout')
@section('content')


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
                          <input type="hidden" name="id" readonly value="{{ $record->id }}">
                              <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="#">Nama Lengkap</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" id="#" name="name" readonly placeholder="Ahmad Syaifullah" value="{{ $record->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Jenis Kelamin</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" readonly="" value="{{ ($record->gender == 'P') ? 'Perempuan' : 'Laki - laki' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Tempat Lahir</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" id="#" name="city_of_birth" readonly placeholder="Tempat Lahir" value="{{ $record->city_of_birth }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Tanggal Lahir</label><span class="text-danger">*</span>
                                        <input type="date" name="date_of_birth" readonly class="flatpickr flatpickr-input form-control" id="checkin-date" value="{{ $record->date_of_birth }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Agama</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" readonly="" value="{{ ($record->religion) ? $record->religion->name : '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Email</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" id="#" name="email" readonly placeholder=" Email" value="{{ $record->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Nomor HP</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" id="#" name="phone" readonly placeholder="Nomor HP " value="{{ $record->phone }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Twitter</label><span class="text-danger"></span>
                                        <input type="text" class="form-control" id="#" name="twitter" readonly placeholder="Twitter" value="{{ $record->twitter }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Facebook</label><span class="text-danger"></span>
                                        <input type="text" class="form-control" id="#" name="facebook" readonly placeholder="Facebook " value="{{ $record->facebook }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="#">Nomor KTP </label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" id="#" name="identity_number" readonly placeholder="Nomor KTP " value="{{ $record->identity_number }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="#"> File KTP</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" id="#" name="identity_file" readonly placeholder=" KTP " value="{{ $record->identity_file }}" readonly="">

                                    </div>
                                     <div class="form-group">
                                        <label for="#">Bank</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" readonly="" value="{{ ($record->bank) ? $record->bank->name : '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Nama Bank </label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" id="#" name="bank_name" readonly placeholder="Nama Bank " value="{{ $record->bank_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Nomor Bank Akun </label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" id="#" name="bank_account" readonly placeholder="Nomor Bank Akun " value="{{ $record->bank_account }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Alamat Domisili </label><span class="text-danger">*</span>
                                        <textarea class="form-control" id="#" name="address" readonly rows="5" placeholder="Alamat Domisili">{{ $record->address }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Instagram</label><span class="text-danger"></span>
                                        <input type="text" class="form-control" id="#" name="instagram" readonly placeholder="Instagram" value="{{ $record->instagram }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="#">Linked In</label><span class="text-danger"></span>
                                        <input type="text" class="form-control" id="#" name="linkedin" readonly placeholder="Linked In " value="{{ $record->linkedin }}">
                                    </div>
                                </div>
                              </div><br>

                              <h4 class="card-title"> Data Pendidikan </h4>
                                  <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="#">Pendidikan</label><span class="text-danger">*</span>
                                            <input type="text" class="form-control" readonly="" value="{{ ($record->education) ? $record->education->name : '' }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="#">Universitas</label><span class="text-danger">*</span>
                                            <input type="text" class="form-control" readonly="" value="{{ ($record->university) ? $record->university->name : '' }}">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="#"> Tahun Lulus</label><span class="text-danger">*</span>
                                            <div class="form-group">
                                                <div class="input-group" name="#">
                                                     <input type="text" class="form-control mr-2" id="#" name="graduation_year" readonly placeholder="Tahun Lulus">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                        id="customCheck2" name="in_college" disabled="" value="1" {{ ($record->in_college == 1) ? 'checked' : '' }}>
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
                                            <input type="text" class="form-control" id="#" name="major" readonly placeholder="Jurusan" value="{{ $record->major }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="#"> Semester</label><span class="text-danger">*</span>
                                            <input type="text" class="form-control" id="#" name="semester" readonly placeholder="Semester" value="{{ $record->semester }}">
                                        </div>
                                    </div><br>
                                  </div>


                                  <h4 class="card-title"> Pengalaman Organisai </h4>
                                  <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="#">Organisasi</label><span class="text-danger">*</span>
                                            <input type="text" class="form-control" id="#" name="org_name" readonly placeholder="organisasi" value="{{ @$record->organize->org_name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="#">Tahun</label><span class="text-danger">*</span>
                                            <input type="text" class="form-control" id="#" name="year" readonly placeholder="tahun" value="{{ @$record->organize->year }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="#">Jabatan</label><span class="text-danger">*</span>
                                            <input type="text" class="form-control" id="#" name="position" readonly placeholder="jabatan" value="{{ @$record->organize->position }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="#">Deskripsi Kegiatan </label><span class="text-danger">*</span>
                                            <textarea class="form-control" id="exampleTextarea1" name="description" readonly rows="6">{{ @$record->organize->description }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="#"> File</label>
                                            <input type="text" class="form-control" id="#" name="file" readonly placeholder="" value="{{ @$record->organize->file }}" readonly="">
                                        </div>
                                    </div>
                                  </div><br>

                                  <h4 class="card-title"> Keahlian yang Dimiliki </h4>
                                  <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="#">Keahlian</label><span class="text-danger">*</span>
                                          <textarea class="form-control" id="exampleTextarea1" name="skill" readonly rows="10">{{ $record->skill }}</textarea>
                                      </div>
                                  </div>
                                  </div><br>
                                  <h4 class="card-title">Lain - Lain </h4>
                                  <div class="row ">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="#">File CV</label><span class="text-danger">*</span>
                                            <input type="text" class="form-control" id="#" name="file_cv" readonly value="{{ $record->file_cv }}" readonly="" placeholder="File CV.pdf">
                                        </div>
                                        <div class="form-group">
                                            <label for="#">Past Photo</label><span class="text-danger">*</span>
                                            <input type="text" class="form-control" id="#" name="file_photo" readonly value="{{ $record->file_photo }}" readonly="" placeholder="Photo.jpg">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="#"> Portofolio</label>
                                            <input type="text" class="form-control" id="#" name="file_portofolio" readonly value="{{ $record->file_portofolio }}" readonly="" placeholder="Portofolio.pdf">
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
                                                          <input type="radio" id="customRadio1" name="source_information_id" readonly
                                                          class="custom-control-input" value="{{ $value->id }}" {{ ($record->source_information_id == $value->id) ? 'checked' : '' }}>
                                                          <label class="custom-control-label pt-1" for="customRadio1">{{ @$value->name }}</label>
                                                      </div>
                                                  </div>
                                                  @if((@$value->name) && ($value->name == 'Lain-lain'))
                                                      <input type="text" class="form-control" id="#" name="source_information_other" readonly placeholder="" value="{{ $record->source_information_other }}">
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
                                          <input type="text" class="form-control" id="#" name="apprentice_vacancy" readonly value="{{ $record->apprentice_vacancy }}" placeholder="Lowongan"  >
                                      </div>
                                      <div class="form-group">
                                          <label for="#">Tipe Magang </label><span class="text-danger">*</span>
                                          <input type="text" class="form-control" id="#" name="apprentice_type" readonly value="{{ $record->apprentice_type }}" placeholder="Tipe Magang"  >
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="#"> Periode Magang</label>
                                          <input type="text" class="form-control" id="#" name="apprentice_periode" readonly value="{{ $record->apprentice_periode }}" placeholder="Periode Magang"  >
                                      </div>
                                      <div class="form-group">
                                          <label for="#"> Lokasi Magang</label>
                                          <input type="text" class="form-control" id="#" name="apprentice_location" readonly value="{{ $record->apprentice_location }}" placeholder="Lokasi Magang "  >
                                      </div>
                                  </div>
                                  </div><br>
                              
                              <h4 class="card-title">Proses Seleksi </h4>
                              <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="#">Unit Kerja</label><span class="text-danger">*</span>
                                          <input type="text" class="form-control" id="#" name="work_unit" readonly value="{{ $record->work_unit }}" placeholder=""  >
                                      </div>
                                      <div class="form-group">
                                          <label for="#">Hasil Assesmen </label><span class="text-danger">*</span>
                                          <input type="text" class="form-control" id="#" name="assessment_score" readonly value="{{ $record->assessment_score }}" placeholder=""  >
                                      </div>
                                      <div class="form-group">
                                          <label for="#"> Rangkin</label><span class="text-danger">*</span>
                                          <input type="text" class="form-control" id="#" name="ranking" readonly value="{{ $record->ranking }}" placeholder=""  >
                                      </div>
                                      <div class="form-group">
                                          <label for="#"> Hasil</label><span class="text-danger">*</span>
                                          <input type="text" class="form-control" readonly="" value="{{ ($record->candidateStatus) ? $record->candidateStatus->status : '' }}">
                                      </div>
                                  </div>
                              </div><br>
                          </form>
                          <div class="float-right">
                              <a href="{{ url('data_activity') }}" type="button" class="btn btn-dark mb-2  mr-2">Kembali</a>
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

@endsection
