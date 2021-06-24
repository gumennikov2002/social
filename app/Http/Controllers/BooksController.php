<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\models\User;
use App\models\Books;

class BooksController extends Controller
{
    function library()
    {
        $uid = session('LoggedUser');
        $mybooks = DB::table('books')->join('users', 'author_id', '=', 'users.id')->select('books.*', 'users.name')->where('author_id', '=', $uid)->get();

        $data = [
            'LoggedUserInfo'=>User::where('id', '=', session('LoggedUser'))->first(),
            'mybooks' => $mybooks
        ];
        return view('library', $data);
        // dd($mybooks);
    }

    function addbook(Request $request)
    {
        $request->validate
        ([
            'title'=>'required|min:3',
            'content'=>'required|min:20',
            'year'=>'required|min:3'
        ]);

        $book = new Books();
        $book->author_id = $request->author_id;
        $book->title = $request->title;
        $book->content = $request->content;
        $book->year = $request->year;
        $save = $book->save();

        if($save)
        {
            return back()->with('success', "Книга успешно добавлена");
        }
        else
        {
            return back()->with('fail', "Произошла ошибка, возможно вы неправильно заполнили поля");
        }
    }

    function removebook($id)
    {
        $uid = session('LoggedUser');
        $book_del = DB::table('books')->where('id', '=', $id)->where('author_id', '=', $uid)->delete();
        return back();
        // dd($book_del);
    }

    function editbook($id)
    {
        $uid = session('LoggedUser');
        $check_author = DB::table('books')->where('id', '=', $id)->get();

        if($check_author[0]->author_id !== $uid)
        {
            return back();
        }
        else
        {
            $mybooks = DB::table('books')->join('users', 'author_id', '=', 'users.id')->select('books.*', 'users.name')->where('books.id', '=', $id)->where('author_id', '=', $uid)->get();
            $data = [
                'LoggedUserInfo'=>User::where('id', '=', session('LoggedUser'))->first(),
                'mybooks' => $mybooks[0]
            ];
            return view('editbook', $data);
        }
    }

    function updatebook($id, Request $request)
    {
        $book = Books::find($id);
        $book->title = $request->title;
        $book->content = $request->content;
        $book->year = $request->year;
        $book->save();

        return redirect('/library');
    }

    function read($id)
    {
        // $book = DB::table('books')->where('id', '=', $id)->get();
        $data = [
            'LoggedUserInfo'=>User::where('id', '=', session('LoggedUser'))->first(),
            'book'=>Books::where('id', '=', $id)->get()[0]
        ];
        return view('read', $data);
    }
}
