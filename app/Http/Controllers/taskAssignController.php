<?php


namespace App\Http\Controllers;
use App\Http\Requests;

use App\Http\Controllers\Controller;

use Request;
use App\task;

use Auth;
use Illuminate\Support\Facades\DB;
use App\documents;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;

class taskAssignController extends Controller
{

    public function index()
    {
        $entries['files'] = saveas::get();
        return View::make('taskAssign', compact('entries'));
    }

    public function abc()
    {
        return view('taskAssign')
            ->with('zoneCoors', task::all());

    }



    public function addtask()
    {
        $button = Input::get('btn');
        if ($button == 'save') {
            $rules = array(
                'task_sheet' => 'required',
                'code' => 'required',
                'attendant_id' => 'required',
                'instruction' => 'required',


            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {
                return Redirect::to('taskAssign')->withErrors($validator)->withInput()->with('message', 'Add FAILED');
            } else {

                $task = new task;

                $task->task_sheet = Input::get('task_sheet');
                $task->code = Input::get('code');
                $task->attendant_id = Input::get('attendant_id');
                $task->instruction = Input::get('instruction');
                $task->room_id = Input::get('room_id');
                $task->from_id = Input::get('from_id');
                $task->to_id = Input::get('to_id');
                $task->status = "pending";

                $task->save();


            }
            return Redirect::to('taskAssign')->with('message', 'Successfully added!!!');
        }

        else {

            $rules = array(
                'status' => 'required',
            );

            $validator = Validator::make(Input::all(), $rules);

            // check if the validator failed -----------------------
            if ($validator->fails()) {

                return Redirect::to('taskAssign')->withErrors($validator)->withInput()->with('message', 'UPDATE FAILED');
            } else {

                $entry = new task();
                $id = Input::get('id');
                $status = Input::get('status');
                $entry->remember_token = Input::get('_token');

                DB::table('task')
                    ->where('id', $id)
                    ->update(array('status' => $status));
                return Redirect::to('taskAssign')->with('message', 'UPDATED SUCCESSFULLY');
            }
        }

    }
}
