<?php

namespace App\Models\Documents;

use App\Models\EstadoFile;
use App\Models\RevisorFile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_name',
        'file_path',
        'folder_id',
        'user_id',
        'file_ext',
        'file_size',
        'category_id',
        'tenan_id',
        'estado_file_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function tenan(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function estado_file(): BelongsTo
    {
        return $this->belongsTo(EstadoFile::class);
    }
    public function revisor_file(): HasMany
    {
        return $this->hasMany(RevisorFile::class);
    }
    public function version_history(): HasOne
    {
        return $this->HasOne(VersionHistory::class);
    }
}
