<div class="app-sidebar__inner">
    <ul class="vertical-nav-menu">
        <li class="app-sidebar__heading mt-4">Employee</li>
        <li class="text">
            <a href="#" class="textstyle">
                <i class="metismenu-icon pe-7s fas fa-user"  style="font-size: 16px;"></i>
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
                        <a href="{{ url('/user') }}" class="textstyle">
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
                    <a href="#" class="textstyle">
                       Announcement Create
                    </a>
                </li>
            </ul>
        </li>
        <li class="app-sidebar__heading mt-4">Assets</li>
        <li>

            <a href="{{ url('/announcements') }}">
                <i class="metismenu-icon pe-7s-diamond"></i>
                Announcement List
                <i class="metismenu-state-icon caret-left"></i>
            </a>
        </li>
        <li class="app-sidebar__heading">Leaves</li>
        <li>
                <!-- <a href="{{url("/leaveRequestForm")}}" class="textstyle">
                        Leave Request
                </a> -->
                <a href="{{route('leaves.index')}}" class="textstyle">
                        Leave Request
                </a>
        </li>
        <li>
                <!-- <a href="{{url("/leaveRecord")}}" class="textstyle">
                        <i class="metismenu-icon">
        </i>Leave Record
                </a> -->
                <a href="{{route('leaves.show')}}" class="textstyle">
                        <i class="metismenu-icon">
        </i>Leave Record
                </a>
        </li>
        <li>
                <a href="{{url("/leader/leaveRecord")}}" class="textstyle">
                        <i class="metismenu-icon">
                </i>Leader Leave
                 </a>
                </li>
        <li class="app-sidebar__heading">Assets</li>
        <li>
            <a href="#">
                <i class="metismenu-icon pe-7s-diamond"></i>
                Asset List
                <i class="metismenu-state-icon caret-left"></i>

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