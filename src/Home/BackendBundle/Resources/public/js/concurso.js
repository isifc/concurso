(function() {
	var $cargos = $('.cargos'),
		prototype = $('.cargos').attr('data-prototype'),
	    addCargo = function(e) {
	    	var count = parseInt($cargos.attr('data-count'), 10);

	    	count = isNaN(count) ? 1 : count + 1; 
	    	$cargos.append(prototype.replace(/__name__/g, count));

	    	$cargos.attr('data-count', count);

	    	e.preventDefault();
	    },
	    removeCargo = function(e) {
	    	$(this).closest('.cargo').remove();
	    	e.preventDefault();
	    };

	    $('.btn-add').on('click', addCargo);
	    $cargos.on('click', '.btn-remove', removeCargo);
}());