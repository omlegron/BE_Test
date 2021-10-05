<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use App\Filters\Filterable;
use App\Traits\Utilities;
use Illuminate\Database\Eloquent\SoftDeletes;

class University extends Model
{
    use Filterable,Utilities;
    // use SoftDeletes;

    protected $table = 'university';
    protected $guarded = [];

    public $rules = [];

    protected $fillable = [
        'name',
        'score',
        'active',
        'recommendation_university_id'
    ];


}
