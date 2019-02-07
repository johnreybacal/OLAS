$(document).ready(function(){
	// data-selected-text-format="count > 3" data-size="10"
	$('select').attr(
		// 'data-selected-text-format':'count > 3',
		'data-size','10'
	);
	table();
});
function table(){
	var $window = $(window);
	$window.resize(function resize() {
		if ($window.width() > 768) {
			$('table').removeClass('table-responsive');
		}
		else{
			$('table').addClass('table-responsive');  
		}
		//$html.addClass('mobile');
		//$html.removeClass('mobile');
	}).trigger('resize');
	$('table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
}