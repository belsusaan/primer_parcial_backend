<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Prompts\Concerns\Fallback;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'isbn',
        'total_copies',
        'available_copies',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'total_copies' => 'integer',
        'available_copies' => 'integer',
    ];

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
