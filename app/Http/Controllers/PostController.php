<?php

namespace App\Http\Controllers;
use App\models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    function addpost(Request $request)
    {
        $request->validate
        ([
            'title'=>'required|min:20|max:100',
            'text'=>'required|min:20'
        ]);

        $post = new Post;
        $post->user_id = $request->user_id;
        $post->title = $request->title;
        $post->text = $request->text;
        $save = $post->save();

        if($save)
        {
            return back()->with('success', 'Пост успешно добавлен');
        }
        else
        {
            return back()->with('fail', 'Что-то пошло не так');
        }
    }

    function delpost($id)
    {
        $data = Post::find($id);
        $data->delete();
        return back();
    }
}
