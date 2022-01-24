@extends('layouts.app')

@section('title','Leave Edit')

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




    <div class="centered">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10" class="background:white;">
              <div class="card p-3">
              <h1 class="text-center mt-5 mb-5">Leave Edit Form</h1>
              <form id="newform" action="{{route('leaves.update',['leaf'=>$leaveRecord])}}" method="post">
                   @csrf
                   @method('PUT')
                   <input type="hidden" name="oldDate" value="{{$leaveRecord->date}}">
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
                              clear</button></div>
                      </div>
                         
                               
                  </form>
              </div>
            
            
                  
                 
                  
               
            </div>
            <div class="col-md-1"></div>
        </div>


      
    </div>
</div>
    

   
  
   
@endsection

<!-- @section('script')

@endsection -->