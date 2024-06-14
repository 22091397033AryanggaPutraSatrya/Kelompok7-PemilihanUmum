<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votedpr extends Model
{
    protected $fillable = ['dpr_submission_id', 'user_id', 'vote'];

    public function dprSubmission()
    {
        return $this->belongsTo(DprSubmission::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
