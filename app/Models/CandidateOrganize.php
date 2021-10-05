<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Filters\Filterable;
use App\Traits\Utilities;
use Illuminate\Database\Eloquent\SoftDeletes;

class CandidateOrganize extends Model
{
    use Filterable,Utilities;
    // use SoftDeletes;

    protected $table = 'candidate_organization';
    protected $guarded = [];

    public $rules = [
        'org_name' => 'required|max:100',
        'position' => 'required|max:100',
        'year' => 'required|min:4|max:5',
        'file' => 'required|max:5000',
    ];

    protected $fillable = [
        'candidate_id',
        'org_name',
        'position',
        'year',
        'description',
        'file',
    ];

    public function setFileAttribute($value){
        $file = upload($value);
        if($file){
            $this->attributes['file'] = $file;
        }
    }
}
