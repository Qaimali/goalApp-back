<?php

namespace App\Http\Controllers;

use App\Goal;
use App\Http\Resources\Goal as GoalResource;
use App\Http\Resources\GoalCollection;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    //
    public function index()
    {
        return new GoalCollection(Goal::all());
    }
    public function show($id)
    {
        return new GoalResource(Goal::findOrFail($id));
    }
    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|max:255',
        ]);

        $todoList = Goal::create($request->all());

        return (new GoalResource($todoList))
            ->response()
            ->setStatusCode(201);
    }
    public function delete($id)
    {

        $todoList = Goal::findOrFail($id);
        $todoList->delete();

        return response()->json(null, 204);
    }
    public function editTask($id, Request $request)
    {
        $todoList = Goal::findOrFail($id);
        $todoList->task = $request->get('task');
        $todoList->save();

        return new GoalResource($todoList);
    }
    public function editStatus($id, Request $request)
    {
        $todoList = Goal::findOrFail($id);
        $todoList->isDone = $request->get('isDone');
        $todoList->save();

        return new GoalResource($todoList);
    }
}
