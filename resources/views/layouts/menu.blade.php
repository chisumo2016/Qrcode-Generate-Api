{{-- All User --}}

<li class="{{ Request::is('trasanctions*') ? 'active' : '' }}">
    <a href="{!! route('trasanctions.index') !!}"><i class="fa fa-edit"></i><span>Trasanctions</span></a>
</li>
@if(Auth::user()->role_id < 4)
{{-- All Webmaster --}}
<li class="{{ Request::is('qrcodes*') ? 'active' : '' }}">
    <a href="{!! route('qrcodes.index') !!}"><i class="fa fa-edit"></i><span>Qrcodes</span></a>
</li>
@endif

{{-- All Moderators--}}
@if(Auth::user()->role_id < 3)
<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>
@endif
{{-- All Admin --}}
@if(Auth::user()->role_id == 1)
<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{!! route('roles.index') !!}"><i class="fa fa-edit"></i><span>Roles</span></a>
</li>

@endif

<li class="{{ Request::is('accounts*') ? 'active' : '' }}">
    <a href="{!! route('accounts.index') !!}"><i class="fa fa-edit"></i><span>Accounts</span></a>
</li>

<li class="{{ Request::is('accountHistories*') ? 'active' : '' }}">
    <a href="{!! route('accountHistories.index') !!}"><i class="fa fa-edit"></i><span>Account Histories</span></a>
</li>

