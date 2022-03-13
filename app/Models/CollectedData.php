<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CollectedData extends Model
{
    use HasFactory, softDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'values', 
        'notes',
        'collection_date',
        'file_name',
        'file_url',
        'disaggregation_values',
        'indicator_id',
    ];

    /**
     * Get the indicator that owns the CollectedData
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function indicator()
    {
        return $this->belongsTo(Indicator::class);
    }
}
