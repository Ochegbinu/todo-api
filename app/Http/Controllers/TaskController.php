<?php

namespace App\Http\Controllers;

use App\Models\Task;
// use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TaskController extends Controller
{
    public function index()
    {
        $task = Task::paginate();

        return response()->json([
            $task
        ], 200);
    }


    public function create(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'task' => 'required|string'
            ]);

            $task = Task::create([
                'task' => $request->task
            ]);

            return response()->json([
                'status' => true,
                "message" => "Task created Successfully",
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $task)
    {
        $task = Task::findOrFail($task);

        $task->update([
            'task' => $request->task
        ]);

        return response()->json([
            'status' => true,
            'message' => "task Updated Successfully"
        ], 200);
    }

    public function destroy($task)
    {
        $task = Task::findOrFail($task);

        $task->delete();
        return response()->json([
            'status' => true,
            'message' => "Task Deleted Successfully"
        ]);
    }
}
