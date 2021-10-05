<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use App\Filters\Filterable;
use App\Traits\Utilities;
use Illuminate\Database\Eloquent\SoftDeletes;

class SourceInformation extends Model
{
    use Filterable,Utilities;
    // use SoftDeletes;

    protected $table = 'source_information';
    protected $guarded = [];

    public $rules = [];

    protected $fillable = [
        'name',
        'active'
    ];


}
