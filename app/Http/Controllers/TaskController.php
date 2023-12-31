<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ini untuk menampilkan data semuanya
        // return view('todolist.index',[
        //     'tasks' => Task::all()
        // ]);

        // ini untuk menampilkan hanya task yang dibuat user
        return view('todolist.index',[
            'tasks' => Task::where('user_id', auth()->user()->id)->get()
        ]);
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
        $validation = $request->validate([
            'tugas' => 'required|max:100',
            'deskripsi' => 'required|max:255',
            'eksekusi' => 'required'
        ]);
        $validation['user_id'] = auth()->user()->id;
        Task::create($validation);
        return redirect('/tasks')->with('sukses', 'Tugas berhasil ditambahkan') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('todolist.edit', [
            'task' => $task
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $validation = $request->validate([
            'tugas' => 'required|max:100',
            'deskripsi' => 'required|max:255',
            'eksekusi' => 'required'
        ]);

        $validation['user_id'] = auth()->user()->id;

        Task::where('id', $task->id)->update($validation);
        return redirect('/tasks')->with('sukses', 'Tugas berhasil diupdate') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task) //note Task harus sama dengan route list
    {
        Task::destroy($task->id);
        return redirect('/tasks')->with('sukses', 'tugas berhasil dihapus');
    }

    // public function destroy($id)
    // {
    //     // dd($id);
    //     Task::destroy($id);
    //     return redirect('/tasks')->with('sukses', 'tugas berhasil dihapus');
    // }
}
