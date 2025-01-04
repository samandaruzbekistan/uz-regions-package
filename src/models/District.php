<?php

namespace Samandaruzbekistan\UzRegionsPackage\models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts'; // Jadval nomi

    protected $fillable = [
        'id', 'region_id', 'name_uz', 'name_oz', 'name_ru'
    ];

    /**
     * Get the villages associated with the district.
     */
    public function villages()
    {
        return $this->hasMany(Village::class, 'district_id', 'id');
    }

    /**
     * Get the region associated with the district.
     */
    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }
}