/*
 * Shows:
 * 	# filters
 * 
 * Copyright (C) SugarCRM Inc. All rights reserved.
 */
({
	plugins : ['Dashlet'],
	initDashlet : function () {
		debugger;
	},
	loadData : function (options) {
		debugger;
		App.api.call(
			'read', 
			App.api.buildURL('me/filters'), 
			null, 
			{ 
				success: _.bind(
					function(data) {
						debugger;
						if (this.disposed) {
							return;
						}
						this.filterData = data;
						this.render();
					},
					this)
			}
		);
	}
})
