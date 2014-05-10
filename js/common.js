var EMERGE = {};

EMERGE.common = {
	init: function() {
		commonClass = this;
	},

	notify: function() {
		var emerge = angular.module('emerge', ['firebase']);

		emerge.value('firebaseUrl', 'https://emerge.firebaseio.com/');

		emerge.controller('NotifCtrl', function ($scope, firebaseUrl) {
			var newNotifs = false;
			var dataRef = new Firebase(firebaseUrl + 'requests');

			dataRef.on('child_added', function (snapshot) {
				if (!newNotifs) return;
				console.log(snapshot);
			});

			dataRef.once('value', function (snapshot) {
				newNotifs = true;
			});
		});
	}
}