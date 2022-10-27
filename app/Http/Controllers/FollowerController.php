<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function store(Request $request, User $user){

        $user->followers()->attach( $request->user());

        return back();
    }

    public function destroy(Request $request, User $user){

        $user->followers()->detach( $request->user());

        return back();
    }
}
