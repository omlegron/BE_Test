<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Candidate;
use App\Models\Master\SourceInformation;
use DB;

class MagangController extends Controller
{
  public $route = 'magang';

  public function index()
  {
    $data = [
      'title'     => 'Data Kandidat Magang',
      'route'     => $this->route,
      'record'     => Candidate::get(),
    ];

    return view('data_activity', $data);
  }

  public function create()
  {
    $data = [
      'title'     => 'Create Data',
      'route'     => $this->route,
      'source'     => SourceInformation::get(),
    ];

    return view('form_registrasi', $data);
  }

  public function store()
  {
    request()->validate([
      'org_name' => 'required|max:100',
      'position' => 'required|max:100',
      'year' => 'required|min:4|max:5',
      'file' => 'required|max:5000',
      'name' => 'required|min:1|max:100',
      'gender' => 'required',
      'city_of_birth' => 'required|min:1|max:50',
      'date_of_birth' => 'required|date',
      'religion_id' => 'required',
      'email' => 'required|email|min:1|max:100',
      'phone' => 'required|digits_between:10,15',
      'identity_number' => 'required|min:1',
      'bank_id' => 'required',
      'bank_account' => 'required|min:1|max:50',
      'bank_name' => 'required|min:1|max:100',
      'address' => 'required|min:1',
      'education_id' => 'required',
      'major' => 'required|min:1',
      'skill' => 'required|min:1',
      'identity_file' => 'required|max:5000',
      'file_cv' => 'required|max:5000',
      'file_photo' => 'required|max:5000',
      'file_portofolio' => 'required|max:5000',
    ]);

    $record = Candidate::saveData(request());
    if(request()->org_name){
      $record->organize()->create([
        'org_name' => request()->org_name,
        'position' => request()->position,
        'year' => request()->year,
        'description' => request()->description,
        'file' => request()->file,
      ]);
    }
    return response([
      'status' => true,
      'href' => 'magang'
    ]);
  }

  public function edit($id)
  {
    $data = [
      'title'     => 'Edit Data',
      'route'     => $this->route,
      'source'    => SourceInformation::get(),
      'record'    => Candidate::findOrFail($id)
    ];

    return view('data_activity_edit', $data);
  }

  public function show($id)
  {
    $data = [
      'title'     => 'Detail Data',
      'route'     => $this->route,
      'source'    => SourceInformation::get(),
      'record'    => Candidate::findOrFail($id)
    ];

    return view('data_activity_detail', $data);
  }

  public function update($id)
  {
    request()->validate([
      'org_name' => 'required|max:100',
      'position' => 'required|max:100',
      'year' => 'required|min:4|max:5',
      'name' => 'required|min:1|max:100',
      'gender' => 'required',
      'city_of_birth' => 'required|min:1|max:50',
      'date_of_birth' => 'required|date',
      'religion_id' => 'required',
      'email' => 'required|email|min:1|max:100',
      'phone' => 'required|digits_between:10,15',
      'identity_number' => 'required|min:1',
      'bank_id' => 'required',
      'bank_account' => 'required|min:1|max:50',
      'bank_name' => 'required|min:1|max:100',
      'address' => 'required|min:1',
      'education_id' => 'required',
      'major' => 'required|min:1',
      'skill' => 'required|min:1',
      'identity_file' => 'required|max:5000',
    ]);
    $record = Candidate::saveData(request());
    
    if($record->organize){
      $record->organize()->update([
        'org_name' => request()->org_name,
        'position' => request()->position,
        'year' => request()->year,
        'description' => request()->description,
        'file' => request()->file,
      ]);
    }else{
      $record->organize()->create([
        'org_name' => request()->org_name,
        'position' => request()->position,
        'year' => request()->year,
        'description' => request()->description,
        'file' => request()->file,
      ]);
    }
    return response([
      'status' => true,
      'href' => 'magang'
    ]);
  }

  public function destroy($id)
  {
    return $services->destroy($id);
  }
}
