<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\models\User;
use App\models\Access;
use App\models\Books;
use App\models\Library;

class AccessController extends Controller
{
    function giveaccess($id, Request $request)
    {
        $user = User::where('name', '=', $request->name)->get();
        $get_user_id = $user[0]->id;
        $access = new Access();
        $access->library_id = $id;
        $access->user_id = $get_user_id;
        $access->save();
        return back();
    }

    function removeaccess($id)
    {
        $uid = session('LoggedUser');
        $find_del = Access::where('user_id', '=', $id)->get();
        $find_own_library = Library::where('owner_id', '=', $uid)->get();
        $remove = DB::table('accesses')
        ->join('libraries', 'accesses.library_id', '=', 'libraries.id')
        ->select('accesses.library_id', 'accesses.user_id', 'libraries.id', 'libraries.owner_id')
        ->where('user_id', '=', $id)
        ->where('owner_id', '=', $uid)
        ->delete();
        return back();
    }
}
