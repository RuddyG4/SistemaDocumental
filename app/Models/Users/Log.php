<?php

namespace App\Models\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Log extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'activity',
        'created_at',
        'tenan_id',
        'user_id'
    ];

    public static function logActivity($user, $action)
    {
        $action .= ". Device IP: " . request()->ip();
        Log::create([
            'activity' => $action,
            'user_id' => $user->id,
            'created_at' => now(),
            'tenan_id' => $user->tenan_id
        ]);

        $logMessage = "[" . date('Y-m-d H:i:s') . "] $action";
        $filePath = 'logs/' . $user->customer->company_name . '/log.txt';

        if (!Storage::exists($filePath)) {
            Storage::put($filePath, 'Logs del sistema de ' . $user->customer->company_name); // Crea el archivo si no existe
        }

        Storage::disk('public')->append($filePath, $logMessage);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
