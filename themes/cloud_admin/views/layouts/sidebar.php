<div id="sidebar" class="sidebar" ng-controller="NotifCtrl">
	<div class="sidebar-menu nav-collapse">
		<div class="divide-20"></div>
		<div id="search-bar">
			<input type="text" class="search" placeholder="Search">
			<i class="fa fa-search search-icon"></i>
		</div>

		<!-- sidebar menu -->
		<ul>
			<li ng-repeat="notifications in notifs | orderByPriority | reverse" class="{{ notifications.class }}" data-option="{{ notifications.option }}">
				<a href="#">
					<span class="menu-text">{{ notifications.name }}</span>
					<br>
					<small>{{ notifications.sender_number }}</small>
				</a>
			</li>
		</ul>
	</div>
</div>