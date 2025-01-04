<?php

namespace Samandaruzbekistan\UzRegionsPackage\models;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $table = 'villages';

    protected $fillable = [
        'id', 'district_id', 'name_uz', 'name_oz', 'name_ru'
    ];

    /**
     * Qishloq bilan bog'liq tumanni olish.
     */
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    /**
     * Qishloq bilan bog'liq regionni olish.
     */
    public function region()
    {
        return $this->belongsToThrough(Region::class, District::class);
    }
}