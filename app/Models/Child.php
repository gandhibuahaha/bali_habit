<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * A child profile owned by a parent account.
 * parent_id is not fillable: it is always set from the logged-in parent.
 */
#[Fillable(['name', 'birth_date', 'gender', 'profile_picture'])]
class Child extends Model
{
    protected $table = 'children';

    protected $primaryKey = 'child_id';

    protected function casts(): array
    {
        return [
            'birth_date' => 'date',
        ];
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(User::class, 'parent_id', 'user_id');
    }
}
