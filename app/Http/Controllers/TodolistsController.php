<?php

namespace App\Http\Controllers;

use App\Todolist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodolistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $todo = Todolist::all();
      return view('todo.index', compact('todo')); //memakai fungsi compact
      // $todo = DB::table('todolists')->get();
      // return view('todo.index', ['todo' => $todo]);
      // $todo = Todolist::all();
      // return view('todo.index', ['todo' => $todo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // insert cara ke satu 
      // $todo = new Todolist;
      // $todo->title = $request->title;
      // $todo->todo = $request->todo;
      // $todo->status = "Belum Selesai";

      // $todo->save();

      $validate = $request->validate([
        'title' => 'required',
        'todo' => 'required'
      ]);

      // insert cara kedua
      $todo = Todolist::create([
        'title' => $request->title,
        'todo' => $request->todo,
        'status' => "Belum Selesai"
      ]);
      $todo->save();

      //insert cara ketiga
      // Todolist::create($request->all());
      return redirect('/')->with('status', 'Todo Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function show(Todolist $todolist)
    {
      $todo = Todolist::all();
      return view('todo.index', compact('todo')); //memakai fungsi compact
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function edit(Todolist $todolist)
    {
        return view('todo.edit', compact('todolist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todolist $todolist)
    {
      $validate = $request->validate([
        'title' => 'required',
        'todo' => 'required'
      ]);
        Todolist::where('id', $todolist->id)
                  ->update([
                    'title'=>$request->title,
                    'todo'=>$request->todo,
                    'status'=>$request->status
                  ]);
        return redirect('/')->with('status', 'Todo Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todolist $todolist)
    {
        Todolist::destroy($todolist->id);
        return redirect('/')->with('status', 'Todo Berhasil Dihapus!');
    }
}
