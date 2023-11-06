<?php

namespace App\Models;

use App\Models\Documents\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RevisorFile extends Model
{
    use HasFactory;
    protected $table = 'revisors_files';
    protected $fillable = [
        'file_id',
        'user_id',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function file(): BelongsTo
    {
        return $this->belongsTo(File::class);
    }
}
