<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todos::all();
        return view('todo.index', [
            'todos' => $todos,
        ]);
    }

    public function save(Request $request)
    {
        Todos::create([
            'title' => $request->input('title'),
            'description' => $request->input('desc'),
            'deadline' => $request->input('deadline'),
            'status' => false,
        ]);
        return redirect('/');
    }

    public function edit($id)
    {
        $todo = Todos::find($id);
        return view('todo.edit')->with('todo', $todo);
    }

    public function update(Request $request, $id)
    {
        Todos::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->desc,
            'deadline' => $request->deadline,
        ]);

        return redirect('/');
    }

    public function destroy($id)
    {
        Todos::where('id', $id)->delete();

        return redirect('/');
    }
}
