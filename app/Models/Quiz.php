<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tutorial;


class Quiz extends Model
{
    use HasFactory;

    public function Tutorial()
    {
        return $this->belongsTo(Tutorial::class , 'tutorial_id' );
    }
}
