<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Candidate;
use App\Models\Master\SourceInformation;
use DB;

class DashboardController extends Controller
{
  public $route = 'dashboard';

  public function index()
  {
    $data = [
      'title'     => 'Dashboard',
      'route'     => $this->route,
      'candidateL'     => Candidate::where('gender','L')->count(),
      'candidateP'     => Candidate::where('gender','P')->count(),
      'candidateCount'     => Candidate::count(),
    ];

    return view('dashboard', $data);
  }
}