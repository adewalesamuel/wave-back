<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndicatorDisaggregation extends Model
{
    use HasFactory;

       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'indicator_id',
        'disaggregation_id'
    ];

    /**
     * The disaggregations that belong to the IndicatorDisaggregation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function disaggregation()
    {
        return $this->belongsTo(Disaggregation::class);
    }
}
