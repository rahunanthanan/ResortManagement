<!DOCTYPE html>
</body>
</html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="{{ asset('/css/js/bootstrap.min.js') }}"></script>
   <link href="{{ asset('/css/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

  <div class="col-md-5">

	  <div class="col-md-5"></div>
	  <div class="col-md-5">



		{!! Form::open(array('url'=>'taskAssign')) !!}

			  @if(\Illuminate\Support\Facades\Session::has('message'))
			    <h4><p class="alert alert-info"><font color="#006400">{{Session::get('message')}}</font></p></h4>
			  @endif
             <h3><strong><font color="red"></font></strong></h3>
        <div class="form-group">
			  <label for="exampleInputEmail1">Task Sheet</label>
			  <input type="text" name="task_sheet" class="form-control" id="exampleInputEmail1" placeholder="task_sheet">
			  @if ($errors->has('task_sheet')) <p class="help-block" style="color:red">{{ $errors->first('task_sheet') }}</p> @endif
		  </div>



			         <div class="form-group">
                        <label for="disabledTextInput">code</label>
                         <select class="form-control"  name="code" id="task_sheet">
                         @if ($errors->has('code')) <p class="help-block" style="color:red">{{ $errors->first('code') }}</p> @endif
                          <option></option>
                          <option>deep clean</option>
                          <option>clean</option>
                          </select>
                         </div>

           <div class="form-group">
			  <label for="exampleInputPassword1">Attendant ID</label>
			  <input type="text" name="attendant_id" class="form-control" id="exampleInputPassword1" placeholder="Attendant ID">
			  @if ($errors->has('attendant_id')) <p class="help-block" style="color:red">{{ $errors->first('attendant_id') }}</p> @endif
		  </div>

		  <div class="form-group">
			  <label for="exampleInputEmail1">Instructions</label>
			  <input type="text" name="instruction" class="form-control" id="exampleInputEmail1" placeholder="Instructions">
			  @if ($errors->has('instruction')) <p class="help-block" style="color:red">{{ $errors->first('instruction') }}</p> @endif
		  </div>


      <div class="radio">
         <label><input type="radio" name="optradio"><strong>Room ID</strong></label>
         <input type="text" name="room_id" class="form-control" id="exampleInputEmail1" placeholder="Room ID">
         @if ($errors->has('room_id')) <p class="help-block" style="color:red">{{ $errors->first('room_id') }}</p> @endif
      </div>
      <div class="radio">
          <label><input type="radio" name="optrtoadio"><strong>From-To</strong></label>
          <input type="text" name="from_id" class="form-control" id="exampleInputPassword1" placeholder="From">
          @if ($errors->has('from_id')) <p class="help-block" style="color:red">{{ $errors->first('from_id') }}</p> @endif
          <input type="text" name="to_id" class="form-control" placeholder="to" value="to">
          @if ($errors->has('to_id')) <p class="help-block" style="color:red">{{ $errors->first('to_id') }}</p> @endif
      </div>


				  <th class="col-sm-2">
					  <div class="form-group">
						  <div class="col-sm-5">
							  <button type="submit" name="btn" value="save" class="btn btn-success">save</button>
						  </div>
					  </div>
				  </th>


			  <input type="hidden" name="_token" value="{{ csrf_token() }}">
		  {{--<button type="button" value="add"  class="btn btn-success" data-toggle="modal" data-target="#myModal">Add</button>--}}
   {!!  Form::close() !!}
          </div>
        </div>
<h3 align="center"><strong><font color="red">Task Assignment Details</font></strong></h3>
  <div class="panel-default" style="margin-right:30px;margin-top:8px;margin-right: 8px;height: 300px">
       <div class="panel-body" style="height: 300px;overflow: auto" >
         <table id="sourcetable" class="table-bordered" >
                  <thead>
                                        <tr>
                                            <th class="col-sm-2">Id</th>
                                            <th class="col-sm-2">Task Sheet</th>
                                            <th class="col-sm-2">Code</th>
                                            <th class="col-sm-2">Attendant Id</th>
                                            <th class="col-sm-2">Instruction</th>
                                            <th class="col-sm-2">Room_Id</th>
                                            <th class="col-sm-2">Status</th>
                                            <th class="col-sm-2">ACTION</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach($zoneCoors as $zoneCoor)
                                              <tr>
                                                <td class="col-sm-2">{{$zoneCoor->id}}</td>
                                                <td class="col-sm-2">{{$zoneCoor->task_sheet}}</td>
                                                <td class="col-sm-2">{{$zoneCoor->code}} </td>
                                                <td class="col-sm-2">{{$zoneCoor->attendant_id}}</td>
                                                <td class="col-sm-2">{{$zoneCoor->instruction}}</td>
                                                <td class="col-sm-3">{{$zoneCoor->room_id}}{{$zoneCoor->from_id}} {{$zoneCoor->to_id}}</td>
                                                <td class="col-sm-2">{{$zoneCoor->status}}</td>
                                                <td>

                                                 <button type="button" class="btn btn-success" data-toggle="modal" data-target="#{{$zoneCoor->id}}">Edit</button>

                                     <div id="{{$zoneCoor->id}}" class="modal fade" role="dialog">
                                       <div class="modal-dialog"  style="width: 40%">

                                  <!-- Modal content-->
                                     <div class="modal-content">

                                      <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel"><strong><font color="red"> Task Details</font></strong></h4>
                                        </div>
                                                       <div class="modal-body">
                                                          <fieldset >
                                                          @if(Session::has('message'))
                                                          <p class="alert"><font color="green">{{ Session::get('message') }}</font></p>
                                                          @endif
                                                             {!! Form::open(array('url'=>'taskAssign')) !!}
                                                             <div class="form-group">
                                                                 <label for="disabledTextInput">Id</label>
                                                                 <input type="text"  name="id" id="TextInput"readonly class="form-control" value={{$zoneCoor->id}}>
                                                             </div>

                                                             <div class="form-group">
                                                                 <label for="disabledTextInput">Task Sheet</label>
                                                                 <input type="text" disabled="true" name="task_sheet" id="TextInput" class="form-control"  value={{$zoneCoor->task_sheet}}>
                                                             </div>

                                                             <div class="form-group">
                                                                 <label for="disabledTextInput">Code</label>
                                                                 <input type="text" disabled="true" name="code" id="TextInput" class="form-control" value={{$zoneCoor->code}}>
                                                             </div>

                                                             <div class="form-group">
                                                                 <label for="disabledTextInput">Attendant Id</label>
                                                                 <input type="text" disabled="true"  name="attendant_id" id="TextInput" class="form-control" value={{$zoneCoor->attendant_id}} >
                                                             </div>

                                                             <div class="form-group">
                                                                 <label for="disabledTextInput">Instruction</label>
                                                                 <input type="text" disabled="true" name="instruction" id="disabledTextInput" class="form-control" value={{$zoneCoor->instruction}}>
                                                             </div>

                                                             <div class="form-group">
                                                                 <label for="disabledTextInput">Room Id</label>
                                                                 <input type="text"disabled="true" name="room_id" maxlength="100px" id="disabledTextInput"  class="form-control" value={{$zoneCoor->room_id}}{{$zoneCoor->from_id}}{{$zoneCoor->to_id}}>
                                                             </div>

                                                           <div class="form-group">
                                                             <label for="disabledTextInput">Status</label>
                                                             <select class="form-control"  name="status" id="status">
                                                             <option>pending</option>
                                                             <option>completed</option>
                                                             </select>
                                                           </div>

                                                           </fieldset>
                                                            </div>
                                                            <div class="modal-footer">
                                                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                             <input class="btn btn-primary" name="btn" value="Save Changes" type="submit">
                                                            </div>
                                                          </div>
                                                        </div>

                                              {!!  Form::close() !!}

                                                </div>
                                              </tr>
                                            @endforeach
                                       </tbody>
                                      </td>
                                    </table>
                                   </div>

                                </div>



     </body>
   </html>


