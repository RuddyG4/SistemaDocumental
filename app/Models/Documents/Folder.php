<?php

namespace App\Models\Documents;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'folder_name',
        'folder_description',
        'parent_id',
        'user_id',
        'created_at',
        'updated_at',
    ];
}
