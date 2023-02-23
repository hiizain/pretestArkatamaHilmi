<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class KategoriModel extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kategori',
    ];

    public function blog()
    {
        return $this->hasMany(BlogModel::class, 'ID_KATEGORI', 'ID_KATEGORI');
    }

    
}
