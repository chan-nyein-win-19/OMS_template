@extends('layouts.app')

@section('title','announcement list')

@section('style')
<link rel="stylesheet" href="{{ asset('/storage/OMS/data-tables/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('/storage/OMS/bootstrap5/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('/storage/OMS/css/style.css') }}">
@endsection

@section('topbar')
@parent
@endsection

@section('sidebar')
@parent
@endsection

@section('content')
    <div class="container">
        <h2 style="text-align: center;">Announcement List</h2><br>
        <table class="mb-0 table table-hover" id="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $item)
                <tr>
                    <td>
                        {{ $item->title }}
                    </td>
                    <td>
                        {{ $item->content }}
                    </td>                        
                    <td>                            
                        <button class="mb-2 mr-2 btn-transition btn btn-outline-warning"  data-toggle="tooltip" title="Edit">
                            <i class="fa fa-fw"></i>
                        </button>
                        <form method="POST" action="{{route('announcements.destroy',['announcement'=>$item])}}" id="form{{$item->id}}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="button" onclick=deleteRecord(this.id) class="mb-2 mr-2 btn-transition btn btn-outline-danger" data-toggle="tooltip" title="Delete" id="{{$item->id}}">
                                <i class="fa fa-fw"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('script')
<script src="{{ asset('/storage/OMS/data-tables/jquery.js') }}"></script>
<script src="{{ asset('/storage/OMS/data-tables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/storage/OMS/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('/storage/OMS/bootbox/bootbox.all.js') }}"></script>
<script src="{{ asset('/storage/OMS/bootbox/bootbox.js') }}"></script>
<script src="{{ asset('/storage/OMS/bootbox/bootbox.locale.js') }}"></script>
<script src="{{ asset('/storage/OMS/bootstrap5/bootstrap.min.js') }}"></script>
<script src="{{ asset('/storage/OMS/bootstrap5/popper.min.js') }}"></script>

<script type="text/javascript">
jQuery(function($) {
    //initiate dataTables plugin
    var myTable =
        $('#table')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable({
            bAutoWidth: false,
            "aoColumns": [
                null,
                null,
                null          

            ],
            "aaSorting": [],

            //"bProcessing": true,
            //"bServerSide": true,
            //"sAjaxSource": "http://127.0.0.1/table.php"   ,

            //,
            //"sScrollY": "200px",
            //"bPaginate": false,

            //"sScrollX": "100%",
            //"sScrollXInner": "120%",
            //"bScrollCollapse": true,
            //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
            //you may want to wrap the table inside a "div.dataTables_borderWrap" element

            //"iDisplayLength": 50    

            select: {
                style: 'multi'
            }
        });
});
</script>

<script type="text/javascript">
function deleteRecord($id) {
    bootbox.confirm({
        message: "Do You Really want to delete it?This can't be undone.",
        buttons: {
            confirm: {
                label: 'Yes',
                className: 'btn-success'
            },
            cancel: {
                label: 'No',
                className: 'btn-danger'
            }
        },
        callback: function(result) {
            if (result) {
                let formToDelete = document.getElementById("form"+$id);
                formToDelete.submit();
                bootbox.alert({
                    message: "Successfully Deleted!",
                    callback: function() {
                        console.log('This was logged in the callback!');
                    }
                })
            }
        }
    });
}
// $('.show_confirm').click(function(event) {
//     var form = $(this).closest("form");
//     var name = $(this).data("name");
//     event.preventDefault();
//     swal({
//             title: `Are you sure you want to delete this announcement?`,
//             text: "If you delete this, it will be gone forever.",
//             icon: "warning",
//             buttons: true,
//             dangerMode: true,
//         })
//         .then((willDelete) => {
//             if (willDelete) {
//                 form.submit();
//             }
//         });
// });
</script>

@endsection