<?php

namespace App\Http\Controllers;

use App\Models\Votedprdprov;
use App\Models\DprdprovSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VotedprdprovController extends Controller
{
    public function vote(Request $request, $dprdprovSubmissionId)
    {
        $request->validate([
            'vote' => 'required|in:1,-1',
        ]);

        $dprdprovSubmission = DprdprovSubmission::findOrFail($dprdprovSubmissionId);

        $vote = Votedprdprov::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'dprdprov_submission_id' => $dprdprovSubmission->id,
            ],
            [
                'vote' => $request->vote,
            ]
        );

        return redirect()->back()->with('success', 'Voting successful!');
    }
}
