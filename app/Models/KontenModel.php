<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class KontenModel extends Model
{
    use HasFactory;

    protected $table = 'konten';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_konten',
        'isi',
    ];

    // public function blog()
    // {
    //     return $this->belongsTo(BlogModel::class);
    // }
    public function blog()
    {
        return $this->hasOne(BlogModel::class, 'ID_KONTEN', 'ID_KONTEN');
    }

    
}
