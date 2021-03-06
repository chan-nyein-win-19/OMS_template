{{--Admin  --}}
@if ( Auth::user()->role == 'Admin')
<div class="app-sidebar__inner">
    <ul class="vertical-nav-menu">
        <li class="app-sidebar__heading mt-4">Employees</li>
        <li class="text">
            <a href="#" class="textstyle">
                <i class="metismenu-icon pe-7s fas fa-user" style="font-size: 16px;"></i>
                Employees
                <i class="fa fa-angle-down ml-5 opacity-8"></i>
            </a>
            <ul>
                <li>
                    <a href="{{ url('/users') }}" class="textstyle">
                        Employee List
                    </a>
                </li>
                <li>
                    <a href="{{ url('/users/create') }}" class="textstyle">
                        Employee Create
                    </a>
                </li>
            </ul>
        </li>
        <li class="app-sidebar__heading mt-4">Announcements</li>
        <li>
            <a href="#">
                <i class="metismenu-icon pe-7s fas fa-scroll" style="font-size: 16px;"></i>
                Announcements
                <i class="fa fa-angle-down ml-2 opacity-8"></i>
            </a>
            <ul>
                <li>
                    <a href="{{ url('/announcements') }}" style="text-decoration: none">
                        Announcement List
                    </a>
                </li>
                <li>
                    <a href="{{ url('/announcements/create') }}" class="textstyle">
                        Announcement Create
                    </a>
                </li>
            </ul>
        </li>
        <li class="app-sidebar__heading mt-4">Attendances</li>
        <li>
            <a href="#">
                <i class="metismenu-icon pe-7s fas fa-briefcase" style="font-size: 16px;"></i>
                <span class="ml-3">Attendances</span>
                <i class="fa fa-angle-down ml-3 opacity-8"></i>
            </a>
            <ul>
                <li>
                    <a href="{{ url('/attendanceList') }}" class="textstyle">
                        View Attendance Record
                    </a>
                </li>
            </ul>
        </li>
        <li class="app-sidebar__heading mt-4">Assets</li>
        <li>
            <a href="#" class="textstyle">
                <i class="metismenu-icon pe-7s fas fa-list" style="font-size: 16px;"></i>
                <span class="ml-3">Assets</span>
                <i class="fa fa-angle-down ml-5 opacity-8"></i>
            </a>
            <ul>

                <li>
                    <a href="#" class="textstyle">
                    <i class="metismenu-icon" style="font-size: 16px;"></i>
                    <span>Asset List&nbsp&nbsp&nbsp</span>
                    <i class="fa fa-angle-down ml-5 opacity-8"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ url('/otherAsset') }}" class="textstyle">
                                Asset Detail List
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/otherpurchase') }}" class="textstyle">
                                Other Purchase List
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/pc')}}" class="textstyle">
                                PC List
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/pcpurchase') }}" class="textstyle">
                                PC Purchase List
                            </a>
                        </li>
                    </ul>
                </li>
                <li>

                    <a href="#" class="textstyle">
                        <i class="metismenu-icon"></i>
                        <span> Asset Create</span>
                        <i class="fa fa-angle-down ml-5 opacity-8"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ url('/otherpurchase/create') }}" class="textstyle">
                                Other Assets
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/pcpurchase/create')}}" class="textstyle">
                                PC
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('/allAssetLists') }}" class="textstyle">
                        Assets-CurrentPrice
                    </a>
                </li>
                <li>
                    <a href="{{ url('/categories') }}" class="textstyle">
                        Category
                    </a>
                </li>
                <li>
                    <a href="{{ url('/subCategory') }}" class="textstyle">
                        SubCategory
                    </a>
                </li>
                <li>
                    <a href="{{ url('/brands') }}" class="textstyle">
                        Brand
                    </a>
                </li>
            </ul>
        </li>
        <li class="app-sidebar__heading mt-4">Pc Rents</li>
        <li>
            <a href="#">
                <i class="metismenu-icon pe-7s fas fa-laptop" style="font-size: 16px;"></i>
                <span class="ml-3">PC Rents</span>
                <i class="fa fa-angle-down ml-5 opacity-8"></i>
            </a>
            <ul>
                <li>
                    <a href="{{ url('/pcrent') }}" class="textstyle">
                        Rent List
                    </a>
                </li>
                <li>
                    <a href="{{ url('/pcrent/create') }}" class="textstyle">
                        Rent Create
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
@endif

{{--Leader  --}}
@if ( Auth::user()->role == 'Leader')
<div class="app-sidebar__inner">
    <ul class="vertical-nav-menu">
        <li class="app-sidebar__heading mt-4">Employees</li>
        <li class="text">
            <a href="#" class="textstyle">
                <i class="metismenu-icon pe-7s fas fa-business-time" style="font-size: 16px;"></i>
                <span class="mr-3">Leaves&nbsp&nbsp</span>
                <i class="fa fa-angle-down ml-5 opacity-8"></i>
            </a>
            <ul>
                <li>
                    <a href='{{url("/leader/leaveRecord")}}' class="textstyle">
                        View Leave Requests
                    </a>
                </li>

            </ul>
        </li>
        <li class="app-sidebar__heading mt-4">Attendances</li>
        <li>
            <a href="#" class="textstyle">
                <i class="metismenu-icon pe-7s fas fa-list" style="font-size: 16px;"></i>
                <span class="">Attendances</span>
                <i class="fa fa-angle-down ml-5 opacity-8"></i>
            </a>
            <ul>
                <li>
                    <a href="{{ url('/attendanceList') }}" class="textstyle">
                        View Attendance Record
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</div>
@endif
{{--Sensei  --}}
@if ( Auth::user()->role == 'Sensei')
<div class="app-sidebar__inner">
    <ul class="vertical-nav-menu">
        <li class="app-sidebar__heading mt-4">Employees</li>
        <li class="text">
            <a href="#" class="textstyle">
                <i class="metismenu-icon pe-7s fas fa-business-time" style="font-size: 16px;"></i>
                <span class="mr-3">Leaves&nbsp&nbsp</span>
                <i class="fa fa-angle-down ml-5 opacity-8"></i>
            </a>
            <ul>
                <li>
                    <a href='{{url("/leader/leaveRecord")}}' class="textstyle">
                        View Leave Requests
                    </a>
                </li>

            </ul>
        </li>
        <li class="app-sidebar__heading mt-4">Attendances</li>
        <li>
            <a href="#" class="textstyle">
                <i class="metismenu-icon pe-7s fas fa-list" style="font-size: 16px;"></i>
                <span class="">Attendances</span>
                <i class="fa fa-angle-down ml-5 opacity-8"></i>
            </a>
            <ul>
                <li>
                    <a href="{{ url('/attendanceList') }}" class="textstyle">
                        View Attendance Record
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</div>
@endif

{{--Employee  --}}
@if ( Auth::user()->role == 'Employee')
<div class="app-sidebar__inner">
    <ul class="vertical-nav-menu">
        <li class="app-sidebar__heading mt-4">Employees</li>
        <li class="text">
            <a href="#" class="textstyle">
                <i class="metismenu-icon pe-7s fas fa-business-time" style="font-size: 16px;"></i>
                <span class="mr-3">Leaves&nbsp&nbsp</span>
                <i class="fa fa-angle-down ml-5 opacity-8"></i>
            </a>
            <ul>
                <li>
                    <a href="{{route('leaves.index')}}" class="textstyle">
                        Request Leave
                    </a>
                </li>
                <li>
                    <a href="{{route('leaves.show')}}" class="textstyle">
                        View Leave List
                    </a>
                </li>
            </ul>
        </li>
        <li class="app-sidebar__heading mt-4">Attendance</li>
        <li>
            <a href="#" class="textstyle">
                <i class="metismenu-icon pe-7s fas fa-list" style="font-size: 16px;"></i>
                <span class="">Attendances</span>
                <i class="fa fa-angle-down ml-5 opacity-8"></i>
            </a>
            <ul>
                <li>
                    <a href="{{ url('/attendance/create') }}" class="textstyle">
                        Report Daily Attendance
                    </a>
                </li>
                <li>
                    <a href="{{ url('/attendance') }}" class="textstyle">
                        View Attendance Records
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
@endif