<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    use HasFactory;

        protected $fillable = [
            'title',
            'category',
            'file_path',
            'status',
            'submission_date',
            'review_date',
            'user_id',
            'description',
            'cover',
            'nim',
            'year',
            'bab2',
            'bab3',
            'bab4',
        ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
