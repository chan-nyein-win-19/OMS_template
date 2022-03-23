@extends("layouts.app")

@section('title','employee history list')

@section("style")
    <link rel="stylesheet" href="{{ asset('/storage/OMS/bootstrap5/bootstrap.min.css') }}" >  
    <link rel="stylesheet" href="{{ asset('/storage/OMS/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/OMS/css/fixedColumns.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/OMS/data-tables/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/OMS/data-tables/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/storage/OMS/bootstrap5/bootstrapAjax.min.css') }}" >
@endsection

@section('topbar')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section("content")
    <div class="container">
        <h3 style="text-align: center;">Employee History List</h3><br>
        
        <table class="table table-hover" id="example" style="width:100%">
            <thead>
            <tr>
                <th>AccessEmployee</th>
                <th>UserName</th>
                <th>Role</th>
                <th>NRC</th>
                <th>JoinDate</th>
                <th>GICExperience</th>
                <th>Address</th>
                <th>Email</th>
                <th>PhNo</th>
                <th>Education</th>
                <th>DOB</th>
                <th>Batch</th>
                <th>Gender</th>
                <th>Office</th>
                <th>WorkExperience</th>
                <th>MarriedStatus</th>
                <th>TravelFee</th>
                <th>Band</th>
                <th>PBC</th>
                <th>Japanese</th>
                <th>English</th>
                <th>CreatedDate</th> 
            </tr>
            </thead>
            <tbody>
                @foreach($list as $item)
                    <tr>
                        <td>{{$item->accessUserId}}</td>
                        <td>{{$item->username}}</td>
                        <td>{{$item->role}}</td>
                        <td>{{$item->NRC}}</td>
                        <td>{{$item->joinDate}}</td>
                        <td>{{$item->gicmExp}}</td>
                        <td>{{$item->address}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phNo}}</td>
                        <td>{{$item->educationId}}</td>
                        <td>{{$item->DOB}}</td>
                        <td>{{$item->batch}}</td>
                        <td>{{$item->gender}}</td>
                        <td>{{$item->office}}</td>
                        <td>{{$item->workExp}}</td>
                        <td>{{$item->marriageStatus}}</td>
                        <td>{{$item->travelFees}}</td>
                        <td>{{$item->bandId}}</td>
                        <td>{{$item->PBCId}}</td>
                        <td>{{$item->japaneseId}}</td>
                        <td>{{$item->englishId}}</td>
                        <td>{{$item->created_at}}</td>
                    </tr>  
                @endforeach
            </tbody>
        </table>
    </div>
   
@endsection

@section('script')   
    <script src="{{ asset('/storage/OMS/data-tables/jquery.js') }}"></script>
    <script src="{{ asset('/storage/OMS/data-tables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/storage/OMS/bootbox/bootbox.all.js') }}"></script>
    <script src="{{ asset('/storage/OMS/bootbox/bootbox.js') }}"></script>
    <script src="{{ asset('/storage/OMS/bootstrap5/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/storage/OMS/bootstrap5/popper.min.js') }}"></script>
    <script src="{{ asset('/storage/OMS/bootstrap5/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/storage/OMS/JQuery/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('/storage/OMS/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/storage/OMS/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/storage/OMS/js/dataTables.fixedColumns.min.js') }}"></script>
    <script>
        jQuery(function($) {
        //initiate dataTables plugin
        var myTable = 
        $('#table')
        .DataTable({
            bAutoWidth: false,
            "aoColumns": [
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null
            ],
            "aaSorting": [],
                select: {
                    style: 'multi'
                }
            });
        });
    </script>
    <script>
        $(document).on('click','a.paginate_button',function(event){
            $('[data-toggle="tooltip"]').tooltip();                            
        })
    </script>
    <script>
        $(document).ready(function() {
        var table = $('#example').DataTable( {
        scrollY:        "300px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         false,
        fixedColumns:   true,
    } );
} );
    </script>
@endsection 