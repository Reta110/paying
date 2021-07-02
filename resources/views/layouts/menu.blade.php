<li class="{{ Request::is('works*') ? 'active' : '' }}">
    <a href="{{ route('works.index') }}"><i class="fa fa-briefcase"></i><span>Works</span></a>
</li>

<li class="{{ Request::is('generator*') ? 'active' : '' }}">
    <a href="{{ route('generator.index') }}"><i class="fa fa-calendar"></i><span>Generator</span></a>
</li>

<li class="treeview" style="height: auto;">
    <a href="#">
        <i class="fa fa-gear"></i>
        <span>Configuration</span>
    </a>
    <ul class="treeview-menu" style="display: none;">

        <li class="{{ Request::is('activities*') ? 'active' : '' }}">
            <a href="{{ route('activities.index') }}"><i class="fa fa-list-ul"></i><span>Activities</span></a>
        </li>

        <li class="{{ Request::is('activityTypes*') ? 'active' : '' }}">
            <a href="{{ route('activityTypes.index') }}"><i class="fa fa-cogs"></i><span>Activity Types</span></a>
        </li>

        <li class="{{ Request::is('locations*') ? 'active' : '' }}">
            <a href="{{ route('locations.index') }}"><i class="fa fa-hospital-o"></i><span>Locations</span></a>
        </li>

        <li class="{{ Request::is('users*') ? 'active' : '' }}">
            <a href="{{ route('users.index') }}"><i class="fa fa-user-md"></i><span>Users</span></a>
        </li>
    </ul>
</li>