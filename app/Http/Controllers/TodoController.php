<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // create
    function TodoCreate(Request $request){
        try {
            $user_id = $request->header('id');
            Todo::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'user_id' => $user_id
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Task Created Successfully'
            ],201);

        } catch (Exception $e){

            return response()->json([
                'status' => 'failed',
                // 'message' => 'Task Create Failed',
                'message' => $e->getMessage()
            ]);

        }
    }

    // update
    function TodoUpdate(Request $request){
        try {
            $todo_id = $request->route('id');
            $user_id = $request->header('id');
            $result = Todo::where('id',$todo_id)->where('user_id',$user_id)->update([
                'title' => $request->input('title'),
                'description' => $request->input('description')
            ]);

            if($result != true){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Task Update Failed'
                ],200);
            }else{
                return response()->json([
                    'status' => 'success',
                    'message' => 'Task Updated Successfully'
                ],200);
            }

        } catch (Exception $e){

            return response()->json([
                'status' => 'failed',
                // 'message' => 'Task Create Failed',
                'message' => $e->getMessage()
            ]);

        }
    }

    // delete
    function TodoDelete(Request $request){
        try {
            $todo_id = $request->route('id');
            $user_id = $request->header('id');
            $result = Todo::where('id',$todo_id)->where('user_id',$user_id)->delete();

            if($result != true){
                return response()->json([
                    'status' => 'error',
                    'message' => 'The selected task id is not valid'
                ],200);
            }else{
                return response()->json([
                    'status' => 'success',
                    'message' => 'Task Deleted Successfully'
                ],200);
            }

        } catch (Exception $e){

            return response()->json([
                'status' => 'failed',
                // 'message' => 'Task Create Failed',
                'message' => $e->getMessage()
            ]);

        }
    }

    // all
    function AllTodo(Request $request){
        try {
            $user_id = $request->header('id');
            return Todo::where('user_id',$user_id)->get();

        } catch (Exception $e){

            return response()->json([
                'status' => 'failed',
                // 'message' => 'Task Create Failed',
                'message' => $e->getMessage()
            ]);

        }
    }

    // one task
    function TodoShow(Request $request){
        try {
            $todo_id = $request->route('id');
            $user_id = $request->header('id');
            $result = Todo::where('id',$todo_id)->where('user_id',$user_id)->first();

            if($result != true){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Not Found'
                ],200);
            }else{
                return $result;
            }

        } catch (Exception $e){

            return response()->json([
                'status' => 'failed',
                // 'message' => 'Task Create Failed',
                'message' => $e->getMessage()
            ]);

        }
    }
}
