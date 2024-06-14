<?php

namespace App\Http\Controllers;

use App\Models\Votedpr;
use App\Models\DprSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VotedprController extends Controller
{
    public function vote(Request $request, $dprSubmissionId)
    {
        $request->validate([
            'vote' => 'required|in:1,-1',
        ]);

        $dprSubmission = DprSubmission::findOrFail($dprSubmissionId);

        $vote = Votedpr::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'dpr_submission_id' => $dprSubmission->id,
            ],
            [
                'vote' => $request->vote,
            ]
        );

        return redirect()->back()->with('success', 'Voting successful!');
    }
}
