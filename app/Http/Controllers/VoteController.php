<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\DpdSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function vote(Request $request, $dpdSubmissionId)
    {
        $request->validate([
            'vote' => 'required|in:1,-1',
        ]);

        $dpdSubmission = DpdSubmission::findOrFail($dpdSubmissionId);

        $vote = Vote::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'dpd_submission_id' => $dpdSubmission->id,
            ],
            [
                'vote' => $request->vote,
            ]
        );

        return redirect()->back()->with('success', 'Voting successful!');
    }
}
