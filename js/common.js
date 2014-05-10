var EMERGE = {};

EMERGE.common = {
	init: function() {
		commonClass = this;
		$('.sidebar-menu').slimScroll({
			height: '500px'
		});
	},

	notify: function() {
		var emerge = angular.module('emerge', ['firebase']);

		emerge.value('firebaseUrl', 'https://emerge.firebaseio.com/');

		emerge.filter('reverse', function () {
			function toArray(list) {
         		var k, out = [];
				if( list ) {
					if( angular.isArray(list) ) {
				   		out = list;
					}
					else if( typeof(list) === 'object' ) {
				   		for (k in list) {
				      		if (list.hasOwnProperty(k)) { out.push(list[k]); }
					   	}
					}
				}
	         	return out;
	      	}
      		return function(items) {
         		return toArray(items).slice().reverse();
      		};
		});

		emerge.controller('NotifCtrl', function ($scope, $firebase, firebaseUrl) {
			var newNotifs = false;
			var dataRef = new Firebase(firebaseUrl + 'requests');
			var fb = $firebase(new Firebase(firebaseUrl + 'requests'));

			dataRef.on('child_added', function (snapshot) {
				if (!newNotifs) return;
				$.gritter.add({
					title: snapshot.val().name + ' is asking for help',
				});
			});

			dataRef.once('value', function (snapshot) {
				newNotifs = true;
			});

			// fb.$on('loaded', function (snapshot) {
			// 	console.log(snapshot);
			// 	$scope.notifs = snapshot;
			// });
			$scope.notifs = fb;
		});
	}
}