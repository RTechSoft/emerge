<div id="sidebar" class="sidebar" ng-controller="NotifCtrl">
	<div class="sidebar-menu nav-collapse">
		<div class="divide-20"></div>

		<!-- sidebar menu -->
		<ul>
			<li ng-repeat="notifications in notifs | orderByPriority | reverse" class="{{ notifications.class }} request {{ notifications.sender_number }}" data-id="{{ notifications.$id }}" data-option="{{ notifications.option }}">
				<a href="#">
					<span class="menu-text">{{ notifications.name }}</span>
					<br>
					<small>{{ notifications.sender_number }}</small>
				</a>
			</li>
		</ul>
	</div>
</div>