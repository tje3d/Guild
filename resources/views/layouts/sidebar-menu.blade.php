<ul class="sidebar-menu">
	<li class="header">MAIN NAVIGATION</li>
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
	<li class="treeview {{Nav::regex('settings', 'active')}}">
		<a href="#">
			<i class="fa fa-cogs"></i> <span>Settings</span>
			<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
			</span>
		</a>
		<ul class="treeview-menu">
			<li class="{{Nav::is('settings.rules', 'active')}}">
				<a href="{{route('settings.rules')}}">
					<i class="fa fa-circle-o"></i> Rules
				</a>
			</li>
			<li class="{{Nav::is('settings.teamspeak', 'active')}}">
				<a href="{{route('settings.teamspeak')}}">
					<i class="fa fa-circle-o"></i> TeamSpeak
				</a>
			</li>
			<li class="{{Nav::is('settings.raidtime', 'active')}}">
				<a href="{{route('settings.raidtime')}}">
					<i class="fa fa-circle-o"></i> RaidTime
				</a>
			</li>
			<li class="{{Nav::is('settings.stream', 'active')}}">
				<a href="{{route('settings.stream')}}">
					<i class="fa fa-circle-o"></i> Stream
				</a>
			</li>
		</ul>
	</li>
</ul>