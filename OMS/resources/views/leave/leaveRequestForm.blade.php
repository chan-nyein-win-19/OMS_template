@extends('layouts.app')

@section('title','Leave Request Form')

@section('style')
    <link rel="stylesheet" href="{{ asset('/storage/OMS/data-tables/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/OMS/bootstrap5/bootstrap.min.css') }}">
@endsection

@section('topbar')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection
@section('content')




    <div class="centered p-3">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8" class="background:white;">
            <h1 class="text-center mt-5 mb-5">Leave Request Form</h1>
            <!-- @if($errors->any())
                  <div class="alert alert-warning">
                      
                          @foreach($errors->all() as $value)
                          <span>{{$value}}</span><br>
                          @endforeach
                    

                  </div>
                  @endif -->
                  
               
                  
                  @if($newLeave)
                  <form id="newform" action="{{route('leaves.store')}}" method="POST">
                   @csrf
                    <div class="form-group row">

                      <label class="col-sm-2 col-form-label">EmployeeId*</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" id="employeeId" name="employeeId" value="{{auth()->user()->employeeid}}" readonly>
                      </div>
                    </div>
                    @error('employeeId')
                    <div class="row">
                      <div class="col-sm-2">

                      </div>
                      <div class="col-sm-10">
                      <span class="text-danger small">*{{$message}}</span><br>
                      </div>
                      
                      </div>
                    @enderror
                    
                   
                    <div class="form-group row mt-3">
                      
                        <label class="col-sm-2 col-form-label">Date*</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" id="date" name="date" value="{{$leaveRecord->date}}">
                        </div>
                      </div>
                      @error('date')
                    <div class="row">
                      <div class="col-sm-2">

                      </div>
                      <div class="col-sm-10">
                      <span class="text-danger small">*{{$message}}</span><br>
                      </div>
                      
                      </div>
                    @enderror
                      <div class="form-group row mt-3">
                     
                        <label class="col-sm-2 col-form-label">Time*</label>
                        <div class="col-sm-10">
                         <select class="form-control" id="time" name="time">
                           <option value="" disabled selected>Choose Time</option>
                           <option value="full" 
                                @if($leaveRecord->time=="full")
                                selected
                                @endif
                                >Full Day</option>
                                <option value="morning"
                                @if($leaveRecord->time=="morning")
                                selected
                                @endif
                                >Morning</option>
                                <option value="evening"
                                @if($leaveRecord->time=="evening")
                                selected
                                @endif
                                >Evening</option>
                         </select>
                        </div>
                      </div>
                      @error('time')
                    <div class="row">
                      <div class="col-sm-2">

                      </div>
                      <div class="col-sm-10">
                      <span class="text-danger small">*{{$message}}</span><br>
                      </div>
                      
                      </div>
                    @enderror
                      
                      <div class="form-group row mt-3">
                        <label class="col-sm-2 col-form-label">Incharge</label>
                        <div class="col-sm-10">
                            <label class="mt-2">Leader*</label>
                           
                                <div id="selectinput">
                                      <select class="form-control" id="leader" name="leader[]">
                                      <option value="" disabled selected>Choose Leader</option>
                                        @foreach($leaders as $leader)
                                        <option value="{{$leader->id}}" >{{$leader->fname}} {{$leader->lname}}</option>
                                        @endforeach
                                    </select>                         
                                </div>
                              
                             <button class="btn btn-secondary mt-3 " style="padding:7px;" id="add">+Add</button>
                        
                          
                        </div>
                  
                      </div>
                      <div class="form-group row mt-3">
                        <label class="col-sm-2 col-form-label" id="sensei"></label>
                        <div class="col-sm-10">
                            <label class="mt-2">Sensei*</label>
                           
                                <div id="selectinput1">
                                    
                                    <select class="form-control" id="sensei" name="sensei[]">
                                    <option value="" disabled selected>Choose Sensei</option>
                                        @foreach($senseis as $sensei)
                                        <option value="{{$sensei->id}}">{{$sensei->fname}} {{$sensei->lname}}</option>
                                        @endforeach
                                    </select>
                                
                                </div>
                              
                             <button class="btn btn-secondary mt-3 "style="padding:7px;" id="add1">+Add</button>
                           
                        
                          
                      
                        </div>

                  
                      </div>
                      
                      <div class="form-group row mt-3">
                        <label class="col-sm-2 col-form-label">Reason*</label>
                        <div class="col-sm-10">
                         <textarea id="reason" cols="30" rows="5" class="form-control" name="reason">{{$leaveRecord->reason}}</textarea>
                        </div>
                      </div>

                      @error('reason')
                    <div class="row">
                      <div class="col-sm-2">

                      </div>
                      <div class="col-sm-10">
                      <span class="text-danger small">*{{$message}}</span><br>
                      </div>
                      
                      </div>
                    @enderror
                      <div class="form-group row mt-3">
                        <label class="col-sm-2 col-form-label">Comment</label>
                        <div class="col-sm-10">
                         <textarea id="comment" cols="30" rows="5" class="form-control" name="comment">{{$leaveRecord->comment}}</textarea>
                        </div>
                      </div>
                      @error('comment')
                    <div class="row">
                      <div class="col-sm-2">

                      </div>
                      <div class="col-sm-10">
                      <span class="text-danger small">*{{$message}}</span><br>
                      </div>
                      
                      </div>
                    @enderror
                      <div class="form-group row mt-5">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                        <input type="submit" class="btn btn-primary">
                            <button class="btn btn-danger ml-5" id="clear">
                              clear</button>
                         </div>
                      </div>
                         
                               
                  </form>
                  @else
                  <form id="newform" action="{{route('leaves.store')}}" method="post">
                   @csrf
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">EmployeeId*</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" id="employeeId" name="" value="{{auth()->user()->employeeid}}" readonly>
                        <input type="hidden" class="form-control" id="userId" name="employeeId" value="{{auth()->user()->id}}">
                      </div>
                    </div>
                    @error('employeeId')
                    <div class="row">
                      <div class="col-sm-2">

                      </div>
                      <div class="col-sm-10">
                      <span class="text-danger small">*{{$message}}</span><br>
                      </div>
                      
                      </div>
                    @enderror
                    <div class="form-group row mt-3">
                        <label class="col-sm-2 col-form-label">Date*</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" id="date" name="date" value="{{$today}}">
                        </div>
                      </div>
                      @error('date')
                    <div class="row">
                      <div class="col-sm-2">

                      </div>
                      <div class="col-sm-10">
                      <span class="text-danger small">*{{$message}}</span><br>
                      </div>
                      
                      </div>
                    @enderror
                      <div class="form-group row mt-3">
                        <label class="col-sm-2 col-form-label">Time*</label>
                        <div class="col-sm-10">
                         <select class="form-control" id="time" name="time">
                           <option value="" disabled selected>Choose Time</option>
                                <option value="full">Full Day</option>
                                <option value="morning">Morning</option>
                                <option value="evening">Evening</option>
                         </select>
                        </div>
                      </div>
                      @error('time')
                    <div class="row">
                      <div class="col-sm-2">

                      </div>
                      <div class="col-sm-10">
                      <span class="text-danger small">*{{$message}}</span><br>
                      </div>
                      
                      </div>
                    @enderror
                      
                      <div class="form-group row mt-3">
                        <label class="col-sm-2 col-form-label">Incharge</label>
                        <div class="col-sm-10">
                            <label class="mt-2">Leader*</label>
                           
                                <div id="selectinput">
                                      <select class="form-control" id="leader" name="leader[]">
                                      <option value="" disabled selected>Choose Leader</option>
                                        @foreach($leaders as $leader)
                                        <option value="{{$leader->id}}">{{$leader->fname}} {{$leader->lname}}</option>
                                        @endforeach
                                    </select>                         
                                </div>
                              
                             <button class="btn btn-secondary mt-3 " style="padding:7px;" id="add">+Add</button>
                        
                          
                        </div>
                  
                      </div>
                      <div class="form-group row mt-3">
                        <label class="col-sm-2 col-form-label" id="sensei"></label>
                        <div class="col-sm-10">
                            <label class="mt-2">Sensei*</label>
                           
                                <div id="selectinput1">
                                    
                                    <select class="form-control" id="sensei" name="sensei[]">
                                    <option value="" disabled selected>Choose Sensei</option>
                                        @foreach($senseis as $sensei)
                                        <option value="{{$sensei->id}}">{{$sensei->fname}} {{$sensei->lname}}</option>
                                        @endforeach
                                    </select>
                                
                                </div>
                              
                             <button class="btn btn-secondary mt-3 "style="padding:7px;" id="add1">+Add</button>
                           
                        
                          
                      
                        </div>

                  
                      </div>
                     
                      <div class="form-group row mt-3">
                        <label class="col-sm-2 col-form-label">Reason*</label>
                        <div class="col-sm-10">
                         <textarea id="reason" cols="30" rows="5" class="form-control" name="reason"></textarea>
                        </div>
                      </div>
                      @error('reason')
                    <div class="row">
                      <div class="col-sm-2">

                      </div>
                      <div class="col-sm-10">
                      <span class="text-danger small">*{{$message}}</span><br>
                      </div>
                      
                      </div>
                    @enderror
                     
                      <div class="form-group row mt-3">
                        <label class="col-sm-2 col-form-label">Comment</label>
                        <div class="col-sm-10">
                         <textarea id="comment" cols="30" rows="5" class="form-control" name="comment"></textarea>
                        </div>
                      </div> 
                      @error('comment')
                    <div class="row">
                      <div class="col-sm-2">

                      </div>
                      <div class="col-sm-10">
                      <span class="text-danger small">*{{$message}}</span><br>
                      </div>
                      
                      </div>
                    @enderror

                      <div class="form-group row mt-5">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                        <input type="submit" class="btn btn-primary">
                            <button class="btn btn-danger ml-5" id="clear">
                              clear</button>
                        </div>
                      </div> 
                      </form>
                  @endif
                  
               
            </div>
            <div class="col-md-2"></div>
        </div>


      
    </div>
</div>
    

    
  
   
@endsection

@section('script')
<script>
  
document.addEventListener("DOMContentLoaded",function(){
let addbutton = document.querySelector("#add");
let result = document.querySelector("#selectinput");
let addbutton1 = document.querySelector("#add1");
let result1 = document.querySelector("#selectinput1");
addbutton.onclick = function(){
let newdiv = document.createElement('div')
newdiv.innerHTML = `
<select  class="form-control mt-2 " name="leader[]">
<option value="" disabled selected>Choose another</option>
@foreach($leaders as $leader)

     <option value="{{$leader->id}}">{{$leader->fname}} {{$leader->lname}}</option>
@endforeach
     </select>
`
result.append(newdiv) 
return false;
}
addbutton1.onclick = function(){
 let newdiv1 = document.createElement('div')
 newdiv1.innerHTML = `
 <select  class="form-control mt-2  " name="sensei[]">
 <option value="" disabled selected>Choose another</option>
 @foreach($senseis as $sensei)
     <option value="{{$sensei->id}}">{{$sensei->fname}} {{$sensei->lname}}</option>
 @endforeach
         </select>
       
          
 `   
 result1.append(newdiv1) 
 return false;
}

let clear = document.querySelector("#clear");
clear.onclick = function(){

document.getElementById('newform').reset();

}

}) 

</script>
@endsection