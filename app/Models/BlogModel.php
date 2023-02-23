<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BlogModel extends Model
{
    use HasFactory;

    protected $table = 'blog';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'judul',
        'id_user',
        'id_kategori',
        'slug',
    ];

    // public function user(): BelongsTo
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function kategori()
    {
        return $this->belongsTo(KategoriModel::class, 'ID_KATEGORI', 'ID_KATEGORI');
    }

    public function konten()
    {
        return $this->belongsTo(KontenModel::class, 'ID_KONTEN', 'ID_KONTEN');
    }

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'ID_USER', 'ID_USER');
    }
}
