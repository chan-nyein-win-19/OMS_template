{{--Admin  --}}
@if ( Auth::user()->role == 'Admin')
<div class="app-sidebar__inner">
    <ul class="vertical-nav-menu">
        <li class="app-sidebar__heading mt-4">Employee</li>
        <li class="text">
            <a href="#" class="textstyle">
                <i class="metismenu-icon pe-7s fas fa-user" style="font-size: 16px;"></i>
                    Employee
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
                        Announcement Lists
                    </a>
                </li>
                <li>
                    <a href="{{ url('/announcements/create') }}" class="textstyle">
                        Announcement Create
                    </a>
                </li>
            </ul>
        </li>
        <li class="app-sidebar__heading mt-4">Attendance</li>
        <li>
            <a href="#">
                <i class="metismenu-icon pe-7s fas fa-briefcase" style="font-size: 16px;"></i>
                
                    <span class="ml-3">Attendance</span>
                <i class="fa fa-angle-down ml-5 opacity-8"></i>
            </a>
            <ul>
                <li>
                    <a href="{{ url('/attendanceList') }}" class="textstyle">
                           Attendance List
                        </a>
                </li>
                <li>
                        <a href="{{ url('/attendanceform') }}" class="textstyle">
                           Attendance Create
                        </a>
                </li>
                <li>
                    <a href="{{ url('/attendanceshow') }}" class="textstyle">
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
                        Asset Lists
                    </a>
                </li>
                <li>
                    <a href="#" class="textstyle">
                        Asset Create
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
@endif

{{--Leader  --}}
@if ( Auth::user()->role == 'leader')
<div class="app-sidebar__inner">
    <ul class="vertical-nav-menu">
        <li class="app-sidebar__heading mt-4">Employee</li>
        <li class="text">
            <a href="#" class="textstyle">
                <i class="metismenu-icon pe-7s fas fa-business-time" style="font-size: 16px;"></i>
                <span class="mr-3">Leaves&nbsp&nbsp</span>
                <i class="fa fa-angle-down ml-5 opacity-8"></i>
            </a>
            <ul>
                <li>
                    <a href='{{url("/leader/leaveRecord")}}' class="textstyle">
                        View Leave Request
                    </a>
                </li>

            </ul>
        </li>
        <li class="app-sidebar__heading mt-4">Attendence</li>
        <li>
            <a href="#" class="textstyle">
                <i class="metismenu-icon pe-7s fas fa-list" style="font-size: 16px;"></i>
                <span class="">Attendence</span>
                <i class="fa fa-angle-down ml-5 opacity-8"></i>
            </a>
            <ul>
                <li>
                    <a href='{{url("/attendanceshow")}}' class="textstyle">
                        View Attendence Record
                    </a>
                </li>
            </ul>
        </li>
        <li class="app-sidebar__heading mt-4">Announcements</li>
        <li>
            <a href="#">
                <i class="metismenu-icon pe-7s fas fa-scroll" style="font-size: 16px;"></i>
                Announcements
                <i class="fa fa-angle-down ml-3 opacity-8"></i>
            </a>
            <ul>
                <li>
                    <a href="{{ url('/announcements') }}" style="text-decoration: none">
                        Announcement Lists
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
@endif
{{--Sensei  --}}
@if ( Auth::user()->role == 'sensei')
<div class="app-sidebar__inner">
    <ul class="vertical-nav-menu">
        <li class="app-sidebar__heading mt-4">Employee</li>
        <li class="text">
            <a href="#" class="textstyle">
                <i class="metismenu-icon pe-7s fas fa-business-time" style="font-size: 16px;"></i>
                    <span class="mr-3">Leaves&nbsp&nbsp</span>
                <i class="fa fa-angle-down ml-5 opacity-8"></i>
            </a>
            <ul>
                <li>
                    <a href='{{url("/leader/leaveRecord")}}' class="textstyle">
                        View Leave Request
                    </a>
                </li>

            </ul>
        </li>
        <li class="app-sidebar__heading mt-4">Attendence</li>
        <li>
            <a href="#" class="textstyle">
                <i class="metismenu-icon pe-7s fas fa-list" style="font-size: 16px;"></i>
                    <span class="">Attendence</span>
                <i class="fa fa-angle-down ml-5 opacity-8"></i>
            </a>
            <ul>
                <li>
                    <a href='{{url("/attendanceshow")}}' class="textstyle">
                        View Attendence Record
                    </a>
                </li>
            </ul>
        </li>
        <li class="app-sidebar__heading mt-4">Announcements</li>
        <li>
            <a href="#">
                <i class="metismenu-icon pe-7s fas fa-scroll" style="font-size: 16px;"></i>
                    Announcements
                <i class="fa fa-angle-down ml-3 opacity-8"></i>
            </a>
            <ul>
                <li>
                    <a href="{{ url('/announcements') }}" style="text-decoration: none">
                        Announcement Lists
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
@endif

{{--Employee  --}}
@if ( Auth::user()->role == 'employee')
<div class="app-sidebar__inner">
    <ul class="vertical-nav-menu">
        <li class="app-sidebar__heading mt-4">Employee</li>
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
        <li class="app-sidebar__heading mt-4">Attendence</li>
        <li>
            <a href="#" class="textstyle">
                <i class="metismenu-icon pe-7s fas fa-list" style="font-size: 16px;"></i>
                    <span class="">Attendence</span>
                <i class="fa fa-angle-down ml-5 opacity-8"></i>
            </a>
            <ul>
                <li>
                    <a href='{{url("/attendanceform")}}' class="textstyle">
                        Report Daily Attendence
                    </a>
                </li>
                <li>
                    <a href='{{url("/attendanceList")}}' class="textstyle">
                        View Attendence Record
                    </a>
                </li>
            </ul>
        </li>
        <li class="app-sidebar__heading mt-4">Announcements</li>
        <li>
            <a href="#">
                <i class="metismenu-icon pe-7s fas fa-scroll" style="font-size: 16px;"></i>
                    Announcements
                <i class="fa fa-angle-down ml-3 opacity-8"></i>
            </a>
            <ul>
                <li>
                    <a href="{{ url('/announcements') }}" style="text-decoration: none">
                        Announcement Lists
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
@endif