<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Story extends Model
{
    // Nama tabel database
    protected $table = 'stories';

    // Primary key menggunakan story_id
    protected $primaryKey = 'story_id';

    // ID tidak menggunakan auto increment
    public $incrementing = false;

    // Tipe primary key adalah string
    protected $keyType = 'string';

    // Kolom yang boleh diisi
    protected $fillable = [
        'story_id',
        'title',
        'description',
        'cover_image',
        'status',
        'story_order',
    ];

    // Konversi tipe data
    protected $casts = [
        'story_order' => 'integer',
    ];

    // Satu cerita memiliki banyak halaman
    public function pages(): HasMany
    {
        return $this->hasMany(
            StoryPage::class,
            'story_id',
            'story_id'
        )->orderBy('page_number');
    }
}
