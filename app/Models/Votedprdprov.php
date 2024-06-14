<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Votedprdprov extends Model
{
    protected $fillable = ['dprdprov_submission_id', 'user_id', 'vote'];

    public function dprdprovSubmission()
    {
        return $this->belongsTo(DprdprovSubmission::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
