<?php

namespace App\Models\Documents;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VersionHistory extends Model
{
    use HasFactory;
    protected $table="version_history";
    protected $fillable = [
        'version_date',
        'path',
        'user_id',
        'name_user',
        'file_id',
        'tenan_id',
        'version',
        'version_anterior_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function version_anterior(): BelongsTo
    {
        return $this->belongsTo(VersionHistory::class);
    }
}
