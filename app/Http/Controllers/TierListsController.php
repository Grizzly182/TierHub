<?php

namespace App\Http\Controllers;

use App\Models\TierList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TierListsController extends Controller
{
    public function show(TierList $tierlist)
    {
        if ($tierlist->template()->approved == false) abort(404);

        $comments = $tierlist->comments();
        return view('tierlists.index', compact('tierlist', 'comments'));
    }

    public function destroy(TierList $tierlist)
    {
        if ($tierlist->user_id == Auth::user()->id || Auth::user()->hasRole('Moderator')) {
            $tierlist->delete();
            return redirect()->route('home');
        }
        abort(403);
    }
}
