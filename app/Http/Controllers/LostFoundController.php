<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Request;
use App\losts;
use App\found;
use Auth;
use App\notice;
use Illuminate\Support\Facades\DB;
use App\documents;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class LostFoundController extends Controller
{


    public function lostview()
    {
        return view('LostFound')
            ->with('lostt', losts::all())
            ->with('founds', found::all());;

    }

    public function addlost()
    {
        $button = Input::get('btn');
        if ($button == 'Save') {

            $rules = array(
                'itemcode' => 'required',

            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {
                return Redirect::to('LostFound')->withErrors($validator)->withInput()->with('message', 'Add FAILED');
            } else {

                $lost = new losts();

                $lost->itemcode = Input::get('itemcode');
                $lost->itemname = Input::get('itemname');
                $lost->description = Input::get('description');
                $lost->datetime = Input::get('datetime');
                $lost->cusid = Input::get('cusid');
                $lost->name = Input::get('name');
                $lost->contact = Input::get('contact');
                $lost->email = Input::get('email');
                $lost->status = "notfound";

                $lost->save();


            }
            return Redirect::to('LostFound')->with('message', 'Successfully added!!!');
        }
        else if ($button == 'Edit') {

            $rules = array(
                'itemcode' => 'required',
            );

            $validator = Validator::make(Input::all(), $rules);

            // check if the validator failed -----------------------
            if ($validator->fails()) {

                return Redirect::to('LostFound')->withErrors($validator)->withInput()->with('message', 'UPDATE FAILED');
            } else {

                $entry = new losts();
                $id = Input::get('id');
                $itemcode = Input::get('itemcode');
                $entry->remember_token = Input::get('_token');

                DB::table('losts')
                    ->where('id', $id)
                    ->update(array('itemcode' => $itemcode));
                return Redirect::to('LostFound')->with('message', 'UPDATED SUCCESSFULLY');
            }
        }

        else if ($button == 'Save Changes') {

            $rules = array(
                'id' => 'required',
            );

            $validator = Validator::make(Input::all(), $rules);

            // check if the validator failed -----------------------
            if ($validator->fails()) {

                return Redirect::to('LostFound')->withErrors($validator)->withInput()->with('message', 'UPDATE FAILED');
            } else {

                $entry = new found();
                $id = Input::get('id');
                $cusid = Input::get('cusid');
                $status = Input::get('status');
                $entry->remember_token = Input::get('_token');

                DB::table('found')
                    ->where('id', $id)
                    ->update(array('cusid'=>$cusid,'status' => $status));
                return Redirect::to('LostFound')->with('message', 'UPDATED SUCCESSFULLY');
            }
        }
        else if ($button == '"Add Found') {

            $rules = array(
                'itemcode' => 'required',
            );

            $validator = Validator::make(Input::all(), $rules);

            // check if the validator failed -----------------------
            if ($validator->fails()) {

                return Redirect::to('LostFound')->withErrors($validator)->withInput()->with('message', ' FAILED');
            } else {


                $lost = new found();
                $lost->itemcode = Input::get('itemcode');
                $lost->itemname = Input::get('itemname');
                $lost->description = Input::get('description');
                $lost->founddate = Input::get('founddate');
                $lost->foundvenue = Input::get('foundvenue');
                $lost->cusid = Input::get('cusid');
                $lost->status =Input::get('status');

                $lost->save();
            }
            return Redirect::to('LostFound')->with('message', 'Successfully added!!!');

        }

    else{

        $rules = array(
            'itemcode' => 'required',

        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('LostFound')->withErrors($validator)->withInput()->with('message', 'Add FAILED');
        } else {

            $lost = new found();
            $lost->id = Input::get('id');
            $lost->itemcode = Input::get('itemcode');
            $lost->itemname = Input::get('itemname');
            $lost->description = Input::get('description');
            $lost->founddate = Input::get('founddate');
            $lost->foundvenue = Input::get('foundvenue');
            $lost->cusid = Input::get('cusid');
            $lost->status =Input::get('status');

            $lost->save();
            $lost = Input::get('id');
            $lost =losts::find($lost);

            if (!is_null($lost)) {
                $lost->delete();
            }
        }
        return Redirect::to('LostFound')->with('message', 'Successfully added!!!');
      }
    }

    }
