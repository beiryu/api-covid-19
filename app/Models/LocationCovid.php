<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use HoangPhi\VietnamMap\Models\Province;

class LocationCovid extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'today_case', 'total_case'];

    public function getFields()
    {
        return $this->fillable;
    }

    public function get($data, $name)
    {
        foreach($data as $value) {
            if ($value[0] == $name) {
                $gso_id = Province::where('name', 'like', "%$name")->select('gso_id')->first();
                $value[1] = (float)preg_replace(array('/\+/','/\./'), '', $value[1]); 
                $value[2] = (float)preg_replace(array('/\+/','/\./'), '', $value[2]); 
                return [$gso_id->gso_id, $value[1], $value[2]];
            }
        }
    }

}
