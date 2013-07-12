define(
	[
	],
	function(){
		'use strict';
		
		var navigation = function() {
			this.sideNavigation();
		};
		
		navigation.prototype.sideNavigation = function() {
			console.log('Side navigation loaded');
		}

		return navigation;
	}
);