function setNotificationSeen(notificationId){

	var siteUrl = $("#site_url").val();

	var urlToPost = siteUrl + "/ajax/notificationajax/setNotificationSeen";

	var notificationId = notificationId;

	$.post(
		urlToPost,
		{
			notification: notificationId
		},
		function(data){
		}
	);
}
