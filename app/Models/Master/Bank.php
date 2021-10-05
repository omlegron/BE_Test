<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use App\Filters\Filterable;
use App\Traits\Utilities;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends Model
{
    use Filterable,Utilities;
    // use SoftDeletes;

    protected $table = 'bank';
    protected $guarded = [];

    public $rules = [];

    protected $fillable = [
        'name',
        'active',
    ];


}
