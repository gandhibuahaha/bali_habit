<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StoryPage extends Model
{
    // Nama tabel database
    protected $table = 'story_pages';

    // Primary key tabel
    protected $primaryKey = 'page_id';

    // page_id menggunakan auto increment
    public $incrementing = true;

    // Tipe primary key
    protected $keyType = 'int';

    // Kolom yang boleh diisi
    protected $fillable = [
        'story_id',
        'page_number',
        'illustration',
        'balinese_text',
        'balinese_audio',
        'indonesian_text',
        'indonesian_audio',
        'english_text',
        'english_audio',
    ];

    protected $casts = [
        'page_number' => 'integer',
    ];

    // Setiap halaman dimiliki oleh satu cerita
    public function story(): BelongsTo
    {
        return $this->belongsTo(
            Story::class,
            'story_id',
            'story_id'
        );
    }
}
