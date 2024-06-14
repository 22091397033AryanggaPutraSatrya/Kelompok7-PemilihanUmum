<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['dpd_submission_id', 'user_id', 'vote'];

    public function dpdSubmission()
    {
        return $this->belongsTo(DpdSubmission::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
