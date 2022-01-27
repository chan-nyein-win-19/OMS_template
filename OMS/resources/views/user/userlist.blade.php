@extends("layouts.app")
@section("style")
        <link  href="{{ asset('/storage/OMS/data-tables/jquery.dataTables.min.css') }}" rel="stylesheet">
        <script src="{{ asset('/storage/OMS/data-tables/jquery.js') }}"></script>  
        
        <script src="{{ asset('/storage/OMS/data-tables/jquery.dataTables.min.js') }}"></script>
@endsection

@section("content")
                    <div class="container">
                    <h2>User Account Table</h2>
                            <table class="mb-0 table table-hover" id="table">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>fname</th>
                                        <th>lname</th>
                                        <th>email</th>
                                        <th>password</th>
                                        <th>employeeid</th>
                                        <th>role</th>
                                    </tr> 
                                </thead>
                                <tbody>
                                    @foreach($list as $user)
                                        <tr>
                                            <td>{{$user['id']}}</td>
                                            <td>{{$user['fname']}}</td>
                                            <td>{{$user['lname']}}</td>
                                            <td>{{$user['email']}}</td>
                                            <td>{{$user['employeeid']}}</td>
                                            <td>{{$user['role']}}</td>
                                            <td>
                                            <form method="POST" action="{{ route('users.update', $user->id) }}">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="UPDATE">
                                                    <button class="mb-2 mr-2 btn-transition btn btn-outline-warning"><i class="fa fa-fw"></i>
                                                </button>
                                                </form>
                                               
                                                <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'><i class="fa fa-fw" ></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>  
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
            </div>
@endsection

@section('script')   
    <script src="{{ asset('/storage/OMS/data-tables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/storage/OMS/data-tables/jquery.dataTables.bootstrap.min.js') }}"></script>
    
    <script>
         jQuery(function($) {
        //initiate dataTables plugin
        var myTable = 
        $('#table')
        .DataTable( {
            bAutoWidth: false,
            "aoColumns": [
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

    <script src="{{ asset('/storage/OMS/sweetalert/sweetalert.min.js') }}"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({

                title: `Are you sure you want to delete this record?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,

            })
            .then((willDelete) => {
                if (willDelete) {
                form.submit();
                }
            });
        });
    </script>

@endsection 