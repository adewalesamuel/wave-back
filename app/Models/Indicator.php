<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Indicator extends Model
{
    use HasFactory, softDeletes;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'type',
        'direction',
        'baseline',
        'target',
        'unit',
        'activity_id',
    ];

    /**
     * Get the activity that owns the Indicator
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
    
    /**
     * Get the disaggregation that owns the Indicator
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function disaggregations()
    {
        return $this->hasMany(Disaggregation::class);
    }
}
