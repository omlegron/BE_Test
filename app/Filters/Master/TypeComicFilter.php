<?php
namespace App\Filters\Master;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Filters\QueryFilters;

class TypeComicFilter extends QueryFilters
{
    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }
    
    public function title($term) {
        return $this->builder->where('title', 'LIKE', '%'.$term.'%');
    }

    public function menuID($term) {
        return $this->builder->where('menuID',$term);
    }

    public function orderNumber($term) {
        return $this->builder->where('orderNumber',$term);
    }

    public function statusActive($term) {
        return $this->builder->where('statusActive',$term);
    }

    public function status($term) {
        return $this->builder->where('status',$term);
    }


    public function sort($array) {
        $myArray = explode(',', $array);
        foreach ($myArray as $value) {
              $this->builder->orderBy($value,'desc');
        }
    }

    public function sort_date($type = null) {
        return $this->builder->orderBy('created_at', (!$type || $type == 'asc') ? 'desc' : 'desc');
    }

    public function sort_name($type = null) {
        return $this->builder->orderBy('title', (!$type || $type == 'asc') ? 'asc' : 'desc');
    }
}
