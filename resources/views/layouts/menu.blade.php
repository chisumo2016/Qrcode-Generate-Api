{{-- All User --}}

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.show',['id'=> Auth::user()->id ]) !!}"><i class="fa fa-edit"></i><span>My Profiles</span></a>
</li>

<li class="{{ Request::is('accounts*') ? 'active' : '' }}">
    <a href="{!! route('accounts.index') !!}"><i class="fa fa-edit"></i><span>My Account</span></a>
</li>



<li class="{{ Request::is('trasanctions*') ? 'active' : '' }}">
    <a href="{!! route('trasanctions.index') !!}"><i class="fa fa-edit"></i><span>Trasanctions</span></a>
</li>



{{-- All Webmaster --}}

@can('view.qrcodes')
<li class="{{ Request::is('qrcodes*') ? 'active' : '' }}">
    <a href="{!! route('qrcodes.index') !!}"><i class="fa fa-edit"></i><span>Qrcodes</span></a>
</li>
@endcan

{{--@if(Auth::user()->role_id < 4)--}}
{{--@endif--}}


{{-- All Moderators--}}
@can('view.users')
<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>


<li class="{{ Request::is('accounts*') ? 'active' : '' }}">
    <a href="{!! route('accounts.index') !!}"><i class="fa fa-edit"></i><span>Accounts</span></a>
</li>

<li class="{{ Request::is('accountHistories*') ? 'active' : '' }}">
    <a href="{!! route('accountHistories.index') !!}"><i class="fa fa-edit"></i><span>Account Histories</span></a>
</li>

@endcan


{{-- All Admin --}}

@can('view.roles')
<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{!! route('roles.index') !!}"><i class="fa fa-edit"></i><span>Roles</span></a>
</li>
@endcan

{{--@if(Auth::user()->role_id == 1)--}}
{{--@endif--}}



<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.api') !!}">
        <i class="fa fa-edit"></i><span>API</span></a>
</li>