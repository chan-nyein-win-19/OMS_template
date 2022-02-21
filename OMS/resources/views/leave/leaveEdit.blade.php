@extends('layouts.app')

@section('title','leave update')

@section('style')
    <link rel="stylesheet" href="{{ asset('/storage/OMS/css/style.css') }}">
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
                <h3 class="text-center mb-4">Leave Edit Form</h3>
                <div class="card p-5">
                    <form id="newform" action="{{route('leaves.update',['leaf'=>$leaveRecord])}}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="oldDate" value="{{$leaveRecord->date}}">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">EmployeeId*</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="employeeId" 
                                    value="{{auth()->user()->employeeid}}" readonly>
                                    <input type="hidden" value="{{auth()->user()->id}}" name="employeeId">
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
                                <input type="date" class="form-control" id="date" name="date"
                                    value="{{$leaveRecord->date}}">
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
                                    <option value="full" @if($leaveRecord->time=="full")
                                        selected
                                        @endif
                                        >Full Day</option>
                                    <option value="morning" @if($leaveRecord->time=="morning")
                                        selected
                                        @endif
                                        >Morning</option>
                                    <option value="evening" @if($leaveRecord->time=="evening")
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
                                        <option value="{{$leader->id}}">{{$leader->fname}} {{$leader->lname}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="button" class="btn btn-outline-secondary mt-3 " style="padding:7px;"
                                    id="add">+Add</button>
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

                                <button type="button" class="btn btn-outline-secondary mt-3 " style="padding:7px;"
                                    id="add1">+Add</button>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label class="col-sm-2 col-form-label">Reason*</label>
                            <div class="col-sm-10">
                                <textarea id="reason" cols="30" rows="5" class="form-control"
                                    name="reason">{{$leaveRecord->reason}}</textarea>
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
                                <textarea id="comment" cols="30" rows="5" class="form-control"
                                    name="comment">{{$leaveRecord->comment}}</textarea>
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
                                <button class="btn btn-danger ml-5" id="clear" type="reset">
                                    Clear</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
    </div>

@endsection

@section('script')
    <script>
        let addElementId = 0;

        function cancelButton(clicked_id) {
            document.getElementById("addedDiv" + clicked_id).remove();
        }
        document.addEventListener("DOMContentLoaded", function() {
            let addbutton = document.querySelector("#add");
            let result = document.querySelector("#selectinput");
            let addbutton1 = document.querySelector("#add1");
            let result1 = document.querySelector("#selectinput1");
            addbutton.onclick = function() {
                addElementId += 1;
                let newdiv = document.createElement('div')
                newdiv.innerHTML = `
                <div id="addedDiv${addElementId}" class="form-inline">
                            <select  class="form-control mt-2 " name="leader[]">
                    <option value="" disabled selected>Choose another</option>
                    @foreach($leaders as $leader)

                        <option value="{{$leader->id}}">{{$leader->fname}} {{$leader->lname}}</option>
                    @endforeach
                        </select>
                <button type="button" onclick=cancelButton(this.id) class="btn btn-outline-danger ml-3 mt-2" id="${addElementId}">X</button>
                </div>

        `
                result.append(newdiv)
                return false;
            }
            addbutton1.onclick = function() {
                let newdiv1 = document.createElement('div')
                newdiv1.innerHTML = `
                <div id="addedDiv${addElementId}" class="form-inline">
                <select  class="form-control mt-2  " name="sensei[]">
        <option value="" disabled selected>Choose another</option>
        @foreach($senseis as $sensei)
            <option value="{{$sensei->id}}">{{$sensei->fname}} {{$sensei->lname}}</option>
        @endforeach
                </select>
                <button type="button" onclick=cancelButton(this.id) class="btn btn-outline-danger ml-3 mt-2" id="${addElementId}">X</button>
                </div>        
        `
                result1.append(newdiv1)
                return false;
            }
        })
    </script>
@endsection