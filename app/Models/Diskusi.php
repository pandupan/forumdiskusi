<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Diskusi extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    protected $fillable = ['user_id', 'content', 'kategori', 'photo_path'];

    public function Comments()
    {
        return $this->hasMany(Comment::class);
    }
}
