<?php

namespace App\Http\Controllers;

use App\Models\Votedprdkab;
use App\Models\DprdkabSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VotedprdkabController extends Controller
{
    public function vote(Request $request, $dprdkabSubmissionId)
    {
        $request->validate([
            'vote' => 'required|in:1,-1',
        ]);

        $dprdkabSubmission = DprdkabSubmission::findOrFail($dprdkabSubmissionId);

        $vote = Votedprdkab::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'dprdkab_submission_id' => $dprdkabSubmission->id,
            ],
            [
                'vote' => $request->vote,
            ]
        );

        return redirect()->back()->with('success', 'Voting successful!');
    }
}
