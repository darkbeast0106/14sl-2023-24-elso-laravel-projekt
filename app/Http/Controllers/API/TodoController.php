<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Todo::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoRequest $request)
    {
        $todo = Todo::create($request->all());
        return $todo;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $todo = Todo::find($id);
        if (is_null($todo)) {
            return response()->json(["message" => "No item found with id: $id"], 404);
        }
        return $todo;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoRequest $request, string $id)
    {
        $todo = Todo::find($id);
        if (is_null($todo)) {
            return response()->json(["message" => "No item found with id: $id"], 404);
        }
        $todo->fill($request->all());
        $todo->save();
        return $todo;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = Todo::find($id);
        if (is_null($todo)) {
            return response()->json(["message" => "No item found with id: $id"], 404);
        }
        $todo->delete();
        return response()->noContent();
    }

    public function markAsDone(string $id) {
        $todo = Todo::find($id);
        if (is_null($todo)) {
            return response()->json(["message" => "No item found with id: $id"], 404);
        }
        $todo->done = true;
        $todo->save();
        return $todo;
    }
}
