$(document).ready(function() {
	$("select#adminPanelModelsList").change(function() {
		document.location.href = $("select#adminPanelModelsList option:selected").val();
	});					  
});