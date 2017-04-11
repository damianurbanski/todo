function sync(){
	var url = window.location.href;
	url = url.substr(21,url.length-1);
	$('.ajax-sync-today').load('modules/sync.php?sync=today');
	$('.ajax-sync-overdue').load('modules/sync.php?sync=overdue');
	$('.ajax-sync-projects-list').load('modules/sync.php?sync=project-list');
	$('.ajax-sync-project-options').load('modules/sync.php?sync=project-list-names-only');
	$('.ajax-sync-view').load("views/"+url);
}

