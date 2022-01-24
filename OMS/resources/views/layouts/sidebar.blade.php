<div class="app-sidebar__inner">
    <ul class="vertical-nav-menu">
        <li class="app-sidebar__heading">Employee</li>
        <li>
            <a href="#">
                <i class="metismenu-icon pe-7s-diamond"></i>
                Employee List
                <i class="metismenu-state-icon caret-left"></i>
            </a>
        </li>
        <li class="app-sidebar__heading">Announcements</li>
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
            </a>
        </li>
    </ul>
</div>
