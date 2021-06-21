<?php

namespace App\Http\Controllers;
use App\models\Post;
use App\models\User;
use App\models\Comment;
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
        // $data = Post::find($id);
        // $data->delete('');
        $post = DB::table('posts')->where('id', '=', $id)->get();
        $post_info = $post[0];

        if($post_info->user_id == session('LoggedUser'))
        {
            $post = DB::table('posts')->where('id', '=', $id)->delete();
        }
        return back();
    }

    function postinfo($id)
    {
        $uid = session('LoggedUser');
        $postinfo = DB::table('posts')->join('users', 'posts.user_id', '=', 'users.id')->select('posts.id', 'users.name', 'posts.user_id', 'posts.title', 'posts.text', 'posts.created_at')->where('posts.id', '=', $id)->get();
        $comments = DB::table('comments')->join('users', 'comments.author_id', '=', 'users.id')->select('comments.id', 'comments.post_id', 'comments.author_id', 'comments.reply_id', 'comments.created_at', 'comments.text', 'users.name' )->where('post_id', '=', $id)->orderBy('id', 'desc')->get();
        $data
        =
        [
            'LoggedUserInfo'=>User::where('id', '=', session('LoggedUser'))->first(),
            'postinfo' => $postinfo[0],
            'comments' => $comments
        ];
        // dd($postinfo[0]);
        return view('post', $data);
    }

    function addcomment($pid, Request $request)
    {
        $request->validate
        ([
            'text'=>'required|min:5|max:300'
        ]);

        $comment = new Comment;
        $comment->post_id = $pid;
        $comment->author_id = session('LoggedUser');
        $comment->text = $request->text;
        $save = $comment->save();
    
        return back();
    }

    function addreply($cid, Request $request)
    {
        $request->validate
        ([
            'text'=>'required|min:5|max:300'
        ]);

        $comment = new Comment;
        $comment->post_id = $request->post_id;
        $comment->author_id = session('LoggedUser');
        $comment->text = $request->text;
        $comment->reply_id = $cid;
        $save = $comment->save();

        return back();
    }

    function delcomment($id)
    {
        $comment = DB::table('comments')->where('id', '=', $id)->get();
        $comment_info = $comment[0];

        if($comment_info->author_id == session('LoggedUser'))
        {
            $comment = DB::table('comments')->where('id', '=', $id)->delete();
        }
        return back();
    }
    
}
