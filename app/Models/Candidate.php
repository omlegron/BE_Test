<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Filters\Filterable;
use App\Traits\Utilities;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
    use Filterable,Utilities;
    // use SoftDeletes;

    protected $table = 'candidate';
    protected $guarded = [];

    public $rules = [

    ];

    protected $fillable = [
        'name',
        'gender',
        'city_of_birth',
        'date_of_birth',
        'religion_id',
        'email',
        'phone',
        'identity_number',
        'identity_file',
        'bank_id',
        'bank_account',
        'bank_name',
        'address',
        'education_id',
        'university_id',
        'university_other',
        'major',
        'graduation_year',
        'in_college',
        'semester',
        'skill',
        'file_cv',
        'file_photo',
        'file_portofolio',
        'source_information_id',
        'source_information_other',
        'ranking',
        'assessment_score',
        'mail_sent',
        'instagram',
        'twitter',
        'linkedin',
        'facebook',
        'candidate_status_id',
        'aggrement',
        'work_unit',
        'apprentice_vacancy',
        'apprentice_type',
        'apprentice_location',
        'apprentice_periode',
    ];

    public function setIdentityFileAttribute($value){
        $file = upload($value);
        if($file){
            $this->attributes['identity_file'] = $file;
        }
    }

    public function setFileCvAttribute($value){
        $file = upload($value);
        if($file){
            $this->attributes['file_cv'] = $file;
        }
    }

    public function setFilePhotoAttribute($value){
        $file = upload($value);
        if($file){
            $this->attributes['file_photo'] = $file;
        }
    }

    public function setFilePortofolioAttribute($value){
        $file = upload($value);
        if($file){
            $this->attributes['file_portofolio'] = $file;
        }
    }

    public function bank(){
        return $this->belongsTo('App\Models\Master\Bank','bank_id');
    }

    public function religion(){
        return $this->belongsTo('App\Models\Master\Religion','religion_id');
    }

    public function education(){
        return $this->belongsTo('App\Models\Master\Education','education_id');
    }

    public function university(){
        return $this->belongsTo('App\Models\Master\University','university_id');
    }

    public function source(){
        return $this->belongsTo('App\Models\Master\SourceInformation','source_information_id');
    }

    public function candidateStatus(){
        return $this->belongsTo('App\Models\Master\CandidateStatus','candidate_status_id');
    }

    public function organize(){
        return $this->hasOne('App\Models\CandidateOrganize','candidate_id');
    }

    public function getStatus(){
        $return = '<label class="badge badge-gradient-warning">Review </label>';
        if($this->candidateStatus){
            $return = $this->candidateStatus->code;
        }

        return $return;
    }


    
    
    
    

}
