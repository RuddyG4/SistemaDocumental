<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlanDetail extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'pd_name',
        'pd_value',
        'plan_id'
    ];

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }
}
