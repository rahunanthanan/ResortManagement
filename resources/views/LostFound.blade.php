<!DOCTYPE html>
<html lang="en">
<head>
    <script src="jquery-2.1.1.js" language="javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="{{ asset('/css/js/bootstrap.min.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

   <!-- <link href="{{ asset('/css/css/bootstrap.min.css') }}" rel="stylesheet">-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="css/style.css" rel="stylesheet">


    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">

</head>
<body >

 <h3 align="center"><strong><font color="red">Lost And Found</font></strong></h3>

{!! Form::open(array('url'=>'LostFound')) !!}
  <div class="form-horizontal" >
    @if(Session::has('message'))
    <p class="alert"><font color="green">{{ Session::get('message') }}</font></p>
    @endif
     <div class="form-group">
      <label for="itemcode" class="col-sm-3 control-label" ><h><strong><font color="green">Lost Item Details</font></strong></h></label>
     </div>

     <div class="form-group">
        <label for="itemcode" class="col-sm-2 control-label">Item Code</label>
        <div class="col-sm-3">
           <input type="text" name="itemcode" class="form-control" id="itemcode" placeholder="Item Code">
        </div>
     </div>

     <div class="form-group">
        <label for="itemname" name="itemname" class="col-sm-2 control-label">Item Name</label>
        <div class="col-sm-3">
           <input type="text" name="itemname" class="form-control" id="itemname" placeholder="Item Name">
        </div>
     </div>

     <div class="form-group">
       <label for="description" class="col-sm-2 control-label">Description</label>
       <div class="col-sm-3">
          <textarea name="description" class="form-control" id="description" placeholder="Description"></textarea>
        </div>
      </div>

       <div class="form-group">
         <label for="datetime" class="col-sm-2 control-label"> Date and Time</label>
         <div class="col-sm-3">
           <input type="text" name="datetime" class="form-control" id="datetime" placeholder="Lost Date and Time">
         </div>
        </div>

        <div class="form-group">
          <label for="itemcode" class="col-sm-3 control-label" ><h><strong><font color="green">Customer Details</font></strong></h></label>
        </div>

       <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Customer ID</label>
           <div class="col-sm-3">
               <input type="text" name="cusid" class="form-control" id="custoemrid" placeholder="Customer ID">
           </div>
         </div>
         <div class="form-group">
               <label for="name" class="col-sm-2 control-label">Customer Name</label>
           <div class="col-sm-3">
              <input type="text" name="name" class="form-control" id="name" placeholder="Customer Name">
           </div>
         </div>

         <div class="form-group">
            <label for="contact" class="col-sm-2 control-label"> Contact No</label>
             <div class="col-sm-3">
               <input type="text" name="contact" class="form-control" id="contact" placeholder="Contact No">
             </div>
         </div>

        <div class="form-group">
           <label for="contact" class="col-sm-2 control-label"> Email</label>
           <div class="col-sm-3">
            <input type="text" name="email" class="form-control" id="email" placeholder="Email">
           </div>
        </div>

   <div class="form-group">
       <div class="col-sm-offset-2 col-sm-10">
         <button type="submit" name="btn" value="Save" class="btn btn-success">Save</button>
       </div>
  </div>

 {!!  Form::close() !!}



{{--<h4 align="center"><strong><font color="blue">Lost Item Details</font></strong></h4>--}}
   <div class="panel-default" style="margin-top:2px;margin-right: 60px;height: 900px;">
       <div class="panel-body" style="height: 400px;overflow: auto"  >
         <table id="sourcetable" class="table-bordered" cellspacing=14  style="height: 100px" width="1000" >
                  <thead>
                                        <tr >
                                            <th class="col-sm-2">Id</th>
                                            <th class="col-sm-2">Itemcode</th>
                                            <th class="col-sm-2">Itemname</th>
                                            <th class="col-sm-2">Description</th>
                                            <th class="col-sm-2">datetime</th>
                                            <th class="col-sm-1">Edit</th>
                                            <th class="col-sm-2">View</th>
                                            <th class="col-sm-2">Found</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach($lostt as $lost)
                                              <tr>
                                                <td class="col-sm-2">{{$lost->id}}</td>
                                                <td class="col-sm-2">{{$lost->itemcode}}</td>
                                                <td class="col-sm-2">{{$lost->itemname}} </td>
                                                <td class="col-sm-2">{{$lost->description}}</td>
                                                <td class="col-sm-2">{{$lost->datetime}}</td>
                                               <td align="center">
                                                  <button type="button" name="btn" value="Edit" class="btn btn-info" data-toggle="modal" data-target="#{{$lost->id}}">View</button>
                                               </td>
                                               <td align="center">
                                                  <button type="button"  name="btn" value="Add" class="btn btn-info" data-toggle="modal" data-target="#{{$lost->itemcode}}">Edit</button>
                                               </td>
                                               <td align="center">
                                                  <button type="button"  name="btn" class="btn btn-info" data-toggle="modal" data-target="#{{$lost->itemname}}">Found</button>
                                               </td>

                                     <div id="{{$lost->id}}" class="modal fade" role="dialog">
                                       <div class="modal-dialog"  style="width:40%">

                                  <!-- Modal content-->
                                     <div class="modal-content">

                                      <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h class="modal-title" id="myModalLabel"><strong><font color="red">Lost Details</font></strong></h>
                                        </div>
                                                       <div class="modal-body">
                                                          <fieldset>
                                                          @if(Session::has('message'))
                                                          <p class="alert"><font color="green">{{ Session::get('message') }}</font></p>
                                                          @endif

                                                             <div class="form-group">
                                                                 <label for="disabledTextInput" class="col-sm-4 control-label">Id</label>
                                                                 <div class="col-sm-6">
                                                                 <input type="text"  name="id" id="TextInput"readonly class="form-control" value={{$lost->id}}>
                                                             </div>
                                                             </div>

                                                             <div class="form-group">
                                                                 <label for="disabledTextInput" class="col-sm-4 control-label">Item Code</label>
                                                                 <div class="col-sm-6">
                                                                 <input type="text" disabled="true" name="itemcode" id="TextInput" class="form-control"  value={{$lost->itemcode}}>
                                                             </div>
                                                             </div>

                                                             <div class="form-group">
                                                                 <label for="disabledTextInput" class="col-sm-4 control-label">Item Name</label>
                                                                  <div class="col-sm-6">
                                                                 <input type="text" disabled="true" name="itemname" id="TextInput" class="form-control" value={{$lost->itemname}}>

                                                             </div>
                                                             </div>

                                                             <div class="form-group">
                                                                 <label for="disabledTextInput" class="col-sm-4 control-label">Description</label>
                                                                 <div class="col-sm-6">
                                                                 <textarea name="description" class="form-control" disabled="true" id="description" placeholder="Description" value={{$lost->decription}}></textarea>

                                                             </div>
                                                             </div>

                                                             <div class="form-group">
                                                                 <label for="disabledTextInput" class="col-sm-4 control-label">Date and Time</label>
                                                                 <div class="col-sm-6">
                                                                 <input type="text" disabled="true" name="datetime" id="disabledTextInput" class="form-control" value={{$lost->datetime}}>
                                                             </div>
                                                             </div>

                                                             <div class="form-group">
                                                                 <label for="disabledTextInput" class="col-sm-4 control-label">cusid</label>
                                                                 <div class="col-sm-6">
                                                                 <input type="text"disabled="true" name="Cusid" maxlength="100px" id="disabledTextInput"  class="form-control" value={{$lost->cusid}}>

                                                             </div>
                                                             </div>

                                                              <div class="form-group">
                                                              <label for="disabledTextInput" class="col-sm-4 control-label">Name</label>
                                                              <div class="col-sm-6">
                                                              <input type="text"disabled="true" name="name" maxlength="100px" id="disabledTextInput"  class="form-control" value={{$lost->name}}>

                                                              </div>
                                                              </div>

                                                              <div class="form-group">
                                                                <label for="disabledTextInput" class="col-sm-4 control-label">Contact No</label>
                                                                 <div class="col-sm-6">
                                                                 <input type="text"disabled="true" name="Contact" maxlength="100px" id="disabledTextInput"  class="form-control" value={{$lost->contact}}>

                                                               </div>
                                                               </div>

                                                              <div class="form-group">
                                                               <label for="disabledTextInput" class="col-sm-4 control-label">Email</label>
                                                               <div class="col-sm-6">
                                                               <input type="text"disabled="true" name="email" maxlength="100px" id="disabledTextInput"  class="form-control" value={{$lost->email}}>

                                                              </div>
                                                              </div>

                                                           </fieldset>
                                                            </div>
                                                            <div class="modal-footer">
                                                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                          </div>
                                                        </div>

                                                   </form>

                                                </div>
                                              </tr>



                                     <div id="{{$lost->itemcode}}" class="modal fade" role="dialog">
                                       <div class="modal-dialog"  style="width:40%">

                                  <!-- Modal content-->
                                     <div class="modal-content">

                                      <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h class="modal-title" id="myModalLabel"><strong><font color="red">Found Details</font></strong></h>
                                        </div>
                                          {!! Form::open(array('url'=>'LostFound')) !!}
                                                       <div class="modal-body">
                                                          <fieldset>
                                                          @if(Session::has('message'))
                                                          <p class="alert"><font color="green">{{ Session::get('message') }}</font></p>
                                                          @endif

                                                             <div class="form-group">
                                                                 <label class="col-sm-4 control-label">Id</label>
                                                                 <div class="col-sm-6">
                                                                 <input type="text"  name="id" id="TextInput" class="form-control" value={{$lost->id}}>
                                                             </div>
                                                             </div>

                                                             <div class="form-group">
                                                                 <label class="col-sm-4 control-label">Item Code</label>
                                                                 <div class="col-sm-6">
                                                                 <input type="text" name="itemcode" id="TextInput" class="form-control"  value={{$lost->itemcode}}>
                                                             </div>
                                                             </div>

                                                             <div class="form-group">
                                                                 <label class="col-sm-4 control-label">Item Name</label>
                                                                  <div class="col-sm-6">
                                                                 <input type="text"  name="itemname" id="TextInput" class="form-control" value={{$lost->itemname}}>

                                                             </div>
                                                             </div>

                                                             <div class="form-group">
                                                                 <label  class="col-sm-4 control-label">Description</label>
                                                                 <div class="col-sm-6">
                                                                 <textarea name="description" class="form-control" id="description" value={{$lost->description}} placeholder="Description"></textarea>
                                                             </div>
                                                             </div>

                                                             <div class="form-group">
                                                                 <label class="col-sm-4 control-label">Date and Time</label>
                                                                 <div class="col-sm-6">
                                                                 <input type="text"  name="datetime" id="disabledTextInput" class="form-control" value={{$lost->datetime}}>
                                                             </div>
                                                             </div>

                                                             <div class="form-group">
                                                                 <label class="col-sm-4 control-label">cusid</label>
                                                                 <div class="col-sm-6">
                                                                 <input type="text" name="Cusid" maxlength="100px" id="disabledTextInput"  class="form-control" value={{$lost->cusid}}>

                                                             </div>
                                                             </div>

                                                              <div class="form-group">
                                                              <label class="col-sm-4 control-label">Name</label>
                                                              <div class="col-sm-6">
                                                              <input type="text" name="name" maxlength="100px" id="disabledTextInput"  class="form-control" value={{$lost->name}}>

                                                              </div>
                                                              </div>

                                                              <div class="form-group">
                                                                <label  class="col-sm-4 control-label">Contact No</label>
                                                                 <div class="col-sm-6">
                                                                 <input type="text" name="Contact" maxlength="100px" id="disabledTextInput"  class="form-control" value={{$lost->contact}}>

                                                               </div>
                                                               </div>

                                                              <div class="form-group">
                                                               <label  class="col-sm-4 control-label">Email</label>
                                                               <div class="col-sm-6">
                                                               <input type="text" name="email" maxlength="100px" id="disabledTextInput"  class="form-control" value={{$lost->email}}>

                                                              </div>
                                                              </div>

                                                           </fieldset>
                                                            </div>
                                                            <div class="modal-footer">
                                                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                              <input class="btn btn-primary" name="btn" value="Edit" type="submit">
                                                            </div>
                                                          </div>
                                                        </div>

                                                  {!!  Form::close() !!}
                                                   </div>


  <div id="{{$lost->itemname}}" class="modal fade" role="dialog">
                                        <div class="modal-dialog"  style="width:40%">

                                   <!-- Modal content-->
                                      <div class="modal-content">

                                       <div class="modal-body">
                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                             <h class="modal-title" id="myModalLabel"><strong><font color="red">Lost Details</font></strong></h>
                                         </div>
                                          {!! Form::open(array('url'=>'LostFound')) !!}

                                                        <div class="modal-body">
                                                           <fieldset>
                                                           @if(Session::has('message'))
                                                           <p class="alert"><font color="green">{{ Session::get('message') }}</font></p>
                                                           @endif
                                                               <div class="form-group">
                                                                      <label class="col-sm-4 control-label">id</label>
                                                                      <div class="col-sm-6">
                                                                      <input type="text" name="id" id="TextInput" placeholder="id" class="form-control" value={{$lost->id}}>
                                                                  </div>
                                                                  </div>


                                                              <div class="form-group">
                                                                  <label class="col-sm-4 control-label">Item Code</label>
                                                              <div class="col-sm-6">
                                                                  <input type="text" name="itemcode" id="TextInput" class="form-control"  value={{$lost->itemcode}}>
                                                               </div>
                                                              </div>

                                                              <div class="form-group">
                                                                  <label class="col-sm-4 control-label">Item Name</label>
                                                                <div class="col-sm-6">
                                                                  <input type="text"  name="itemname" id="TextInput" class="form-control" value={{$lost->itemname}}>

                                                                </div>
                                                              </div>

                                                              <div class="form-group">
                                                                  <label  class="col-sm-4 control-label">Description</label>
                                                              <div class="col-sm-6">
                                                                  <textarea name="description" class="form-control" id="description" value={{$lost->description}} placeholder="Description"></textarea>
                                                              </div>
                                                              </div>

                                                              <div class="form-group">
                                                                  <label class="col-sm-4 control-label">Found Date</label>
                                                              <div class="col-sm-6">
                                                                  <input type="text"  name="founddate" id="disabledTextInput" class="form-control" placeholder="Found Date">
                                                              </div>
                                                              </div>

                                                               <div class="form-group">
                                                                <label class="col-sm-4 control-label">Found Venue</label>
                                                              <div class="col-sm-6">
                                                                <input type="text"  name="foundvenue" id="disabledTextInput" class="form-control" placeholder=" Found Venue">
                                                              </div>
                                                              </div>

                                                              <div class="form-group">
                                                                  <label class="col-sm-4 control-label">cusid</label>
                                                                <div class="col-sm-6">
                                                                  <input type="text" name="cusid" maxlength="100px" id="disabledTextInput"  class="form-control" value={{$lost->cusid}}>
                                                              </div>
                                                              </div>


                                                                <div class="form-group">
                                                                 <label class="col-sm-4 control-label">Status</label>
                                                                  <div class="col-sm-6">
                                                                 <select class="form-control"  name="status" id="status">
                                                                 <option>Not submitted</option>
                                                                 <option>Submitted</option>
                                                                 </select>
                                                                 </div>
                                                                </div>

                                                            </fieldset>
                                                             </div>
                                                             <div class="modal-footer">
                                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                               <input class="btn btn-primary" name="btn" value="Add" type="submit">

                                                             </div>
                                                           </div>
                                                         </div>

                                                {!!  Form::close() !!}
                                                    </div>
                                            @endforeach
                                       </tbody>

                                    </table>


{{--<h4 align="middle"><strong><font color="blue">Found Item Details</font></strong></h4>--}}
  <div class="panel-default" style="margin-top:2px;margin-right: 60px;height: 700px;">
       <div class="panel-body" style="height: 400px;overflow: auto">
         <table id="sourcetable" class="table-bordered"  style="height: 130px" cellspacing="10" >
                  <thead>
                                         <tr>
                                             <th class="col-sm-2">Id</th>
                                             <th class="col-sm-2">Item Code</th>
                                             <th class="col-sm-2">Item Name</th>
                                             <th class="col-sm-2">Description</th>
                                             <th class="col-sm-2">Found Date</th>
                                             <th class="col-sm-2">Found Venue</th>
                                             <th class="col-sm-2">CustomerId</th>
                                             <th class="col-sm-2">Status</th>
                                             <th colspan="15" class="col-sm-2">Action</th>


                                         </tr>
                                     </thead>
                                     <tbody>
                                             @foreach($founds as $found)
                                               <tr>
                                                 <td class="col-sm-2">{{$found->id}}</td>
                                                 <td class="col-sm-2">{{$found->itemcode}}</td>
                                                 <td class="col-sm-2">{{$found->itemname}} </td>
                                                 <td class="col-sm-2">{{$found->description}}</td>
                                                 <td class="col-sm-2">{{$found->founddate}}</td>
                                                 <td class="col-sm-3">{{$found->foundvenue}}</td>
                                                 <td class="col-sm-3">{{$found->cusid}}</td>
                                                 <td class="col-sm-2">{{$found->status}}</td>
                                              <td align="center">
                                                   <button type="button" class="btn btn-success" data-toggle="modal" data-target="#{{$found->id}}">edit</button>

                                      <div id="{{$found->id}}" class="modal fade" role="dialog">
                                         <div class="modal-dialog"  style="width: 40%">

                                    <!-- Modal content-->
                                       <div class="modal-content">

                                        <div class="modal-body">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                              <h4 class="modal-title" id="myModalLabel"><strong><font color="red"> Found Details</font></strong></h4>
                                          </div>
                                                         <div class="modal-body">
                                                            <fieldset >
                                                            @if(Session::has('message'))
                                                            <p class="alert"><font color="green">{{ Session::get('message') }}</font></p>
                                                            @endif
                                                               {!! Form::open(array('url'=>'LostFound')) !!}



                                                                <div class="form-group">
                                                                 <label class="col-sm-4 control-label">Customer Id</label>
                                                                 <div class="col-sm-6">
                                                                 <input type="text"  name="cusid" id="TextInput" class="form-control" value={{$found->cusid}}>
                                                                 </div>
                                                                 </div>

                                                              <div class="form-group">
                                                               <label class="col-sm-4 control-label">Status</label>
                                                               <div class="col-sm-6">
                                                                <select class="form-control"  name="status" id="status">
                                                                <option>Not submitted</option>
                                                                <option>Submitted</option>
                                                                </select>
                                                                </div>
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
                               <h3 align="center"><strong><font color="red"></font></strong></h3>
                              <button type="button" name="btn" value="Add Found" class="btn btn-info" data-target="#add" data-toggle="modal">Add Found</button>
                              <div id="add" class="modal fade" role="dialog">
                                            <div class="modal-dialog"  style="width:40%">

                                       <!-- Modal content-->
                                          <div class="modal-content">

                                           <div class="modal-body">
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                 <h class="modal-title" id="myModalLabel"><strong><font color="red">Found Details</font></strong></h>
                                             </div>
                                              {!! Form::open(array('url'=>'LostFound')) !!}

                                                            <div class="modal-body">
                                                               <fieldset>
                                                               @if(Session::has('message'))
                                                               <p class="alert"><font color="green">{{ Session::get('message') }}</font></p>
                                                               @endif



                                                                  <div class="form-group">
                                                                      <label class="col-sm-4 control-label">Item Code</label>
                                                                      <div class="col-sm-6">
                                                                      <input type="text" name="itemcode" id="TextInput" placeholder="itemcode" class="form-control">
                                                                  </div>
                                                                  </div>

                                                                  <div class="form-group">
                                                                      <label class="col-sm-4 control-label">Item Name</label>
                                                                       <div class="col-sm-6">
                                                                      <input type="text"  name="itemname" id="TextInput" placeholder="itemname" class="form-control" >

                                                                  </div>
                                                                  </div>

                                                                  <div class="form-group">
                                                                      <label  class="col-sm-4 control-label">Description</label>
                                                                      <div class="col-sm-6">
                                                                      <textarea name="description" class="form-control" id="description" placeholder="Description"></textarea>

                                                                  </div>
                                                                  </div>

                                                                  <div class="form-group">
                                                                      <label class="col-sm-4 control-label">Found Date</label>
                                                                      <div class="col-sm-6">
                                                                      <input type="text"  name="founddate" id="disabledTextInput" class="form-control" placeholder="Found Date">
                                                                  </div>
                                                                  </div>

                                                                   <div class="form-group">
                                                                    <label class="col-sm-4 control-label">Found Venue</label>
                                                                    <div class="col-sm-6">
                                                                    <input type="text"  name="foundvenue" id="disabledTextInput" class="form-control" placeholder=" Found Venue">
                                                                   </div>
                                                                  </div>

                                                                  <div class="form-group">
                                                                      <label class="col-sm-4 control-label">cusid</label>
                                                                      <div class="col-sm-6">
                                                                      <input type="text" name="cusid" maxlength="100px" id="disabledTextInput"placeholder="customer ID" value="" class="form-control">

                                                                  </div>
                                                                  </div>


                                                                    <div class="form-group">
                                                                     <label class="col-sm-4 control-label">Status</label>
                                                                      <div class="col-sm-6">
                                                                     <select class="form-control"  name="status" id="status">
                                                                     <option>Not submitted</option>
                                                                     <option>Submitted</option>
                                                                     </select>
                                                                     </div>
                                                                    </div>

                                                                </fieldset>
                                                                 </div>
                                                                 <div class="modal-footer">
                                                                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                   <input class="btn btn-primary" name="btn" value="Add Found" type="submit">

                                                                 </div>
                                                               </div>
                                                             </div>

                                                    {!!  Form::close() !!}
                                                        </div>
                                                       </div>
                                                      </div>

                    </div>
                  </div>
                 </div>
               </body>
              </html>