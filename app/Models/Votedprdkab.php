<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votedprdkab extends Model
{
    protected $fillable = ['dprdkab_submission_id', 'user_id', 'vote'];

    public function dprdkabSubmission()
    {
        return $this->belongsTo(DprdkabSubmission::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
