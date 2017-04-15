<ul class="sidebar-menu">
	<li class="header">MAIN NAVIGATION</li>
	@if(RBAC::isAdmin() || RBAC::hasPerm('users'))
	<li class="treeview {{Nav::regex('users', 'active')}}">
		<a href="#">
			<i class="fa fa-users"></i> <span>Users</span>
			<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
			</span>
		</a>
		<ul class="treeview-menu">
			<li class="{{Nav::is('users', 'active')}}">
				<a href="{{route('users')}}">
					<i class="fa fa-circle-o"></i> Manage
					<span class="pull-right-container">
						<span class="label label-primary pull-right">{{\App\User::count()}}</span>
					</span>
				</a>
			</li>
			<li class="{{Nav::is('users.create', 'active')}}">
				<a href="{{route('users.create')}}"><i class="fa fa-circle-o"></i> Create</a>
			</li>
		</ul>
	</li>
	@endif
	@if(RBAC::isAdmin() || RBAC::hasPerm('rbac'))
	<li class="treeview {{Nav::regex('rbac', 'active')}}">
		<a href="#">
			<i class="fa fa-lock"></i> <span>Access Control</span>
			<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
			</span>
		</a>
		<ul class="treeview-menu">
			<li class="{{Nav::is('rbac.roles', 'active')}}">
				<a href="{{route('rbac.roles')}}">
					<i class="fa fa-circle-o"></i> Manage Roles
				</a>
			</li>
			<li class="{{Nav::is('rbac.permissions', 'active')}}">
				<a href="{{route('rbac.permissions')}}">
					<i class="fa fa-circle-o"></i> Manage Permissions
				</a>
			</li>
			<li class="{{Nav::is('rbac.roles.create', 'active')}}">
				<a href="{{route('rbac.roles.create')}}"><i class="fa fa-circle-o"></i> Create Role</a>
			</li>
			<li class="{{Nav::is('rbac.permissions.create', 'active')}}">
				<a href="{{route('rbac.permissions.create')}}"><i class="fa fa-circle-o"></i> Create Permission</a>
			</li>
		</ul>
	</li>
	@endif
	@if(RBAC::isAdmin() || RBAC::hasPerm('characters'))
	<li class="treeview {{Nav::regex('characters', 'active')}}">
		<a href="#">
			<i class="fa fa-google-wallet"></i> <span>Characters</span>
			<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
			</span>
		</a>
		<ul class="treeview-menu">
			<li class="{{Nav::is('characters', 'active')}}">
				<a href="{{route('characters')}}">
					<i class="fa fa-circle-o"></i> Manage
					<span class="pull-right-container">
						<span class="label label-primary pull-right">{{\App\Character::notChecked()->count()}}</span>
					</span>
				</a>
			</li>
			<li class="{{Nav::is('characters.create', 'active')}}">
				<a href="{{route('characters.create')}}"><i class="fa fa-circle-o"></i> Create</a>
			</li>
		</ul>
	</li>
	@endif
	@if(RBAC::isAdmin())
	<li class="treeview {{Nav::regex('imagegallery', 'active')}}">
		<a href="{{route('imagegallery')}}">
			<i class="fa fa-image"></i> <span>Image Gallery</span>
		</a>
	</li>
	@endif
	@if(RBAC::isAdmin())
	<li class="treeview {{Nav::regex('addons', 'active')}}">
		<a href="{{route('addons')}}">
			<i class="fa fa-plus"></i> <span>Addons</span>
		</a>
	</li>
	@endif
	@if(RBAC::isAdmin() || Auth::user()->hasAnyPermission('settings.rules', 'settings.teamspeak', 'settings.raidtime', 'settings.stream'))
	<li class="treeview {{Nav::regex('settings', 'active')}}">
		<a href="#">
			<i class="fa fa-cogs"></i> <span>Settings</span>
			<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
			</span>
		</a>
		<ul class="treeview-menu">
			@if(RBAC::isAdmin() || RBAC::hasPerm('settings.rules'))
			<li class="{{Nav::is('settings.rules', 'active')}}">
				<a href="{{route('settings.rules')}}">
					<i class="fa fa-circle-o"></i> Rules
				</a>
			</li>
			@endif
			@if(RBAC::isAdmin() || RBAC::hasPerm('settings.teamspeak'))
			<li class="{{Nav::is('settings.teamspeak', 'active')}}">
				<a href="{{route('settings.teamspeak')}}">
					<i class="fa fa-circle-o"></i> TeamSpeak
				</a>
			</li>
			@endif
			@if(RBAC::isAdmin() || RBAC::hasPerm('settings.raidtime'))
			<li class="{{Nav::is('settings.raidtime', 'active')}}">
				<a href="{{route('settings.raidtime')}}">
					<i class="fa fa-circle-o"></i> RaidTime
				</a>
			</li>
			@endif
			@if(RBAC::isAdmin() || RBAC::hasPerm('settings.stream'))
			<li class="{{Nav::is('settings.stream', 'active')}}">
				<a href="{{route('settings.stream')}}">
					<i class="fa fa-circle-o"></i> Stream
				</a>
			</li>
			@endif
		</ul>
	</li>
	@endif
</ul>