<?php

namespace Samandaruzbekistan\UzRegionsPackage\models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'regions';

    protected $fillable = [
        'id', 'name_uz', 'name_oz', 'name_ru'
    ];

    /**
     * Get the districts associated with the region.
     */
    public function districts()
    {
        return $this->hasMany(District::class, 'region_id', 'id');
    }

    /**
     * Get the villages associated with the region.
     */
    public function villages()
    {
        return $this->hasManyThrough(Village::class, District::class, 'region_id', 'district_id', 'id', 'id');
    }
}