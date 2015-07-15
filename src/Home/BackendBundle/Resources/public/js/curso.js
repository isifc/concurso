(function() {
	var $cursos = $('.cursos'),
		prototype = $('.cursos').attr('data-prototype'),
	    addCurso = function(e) {
	    	var count = parseInt($cursos.attr('data-count'), 10);

	    	count = isNaN(count) ? 1 : count + 1; 
	    	$cursos.append(prototype.replace(/__name__/g, count));

	    	$cursos.attr('data-count', count);

	    	e.preventDefault();
	    },
	    removeCurso = function(e) {
	    	$(this).closest('.curso').remove();
	    	e.preventDefault();
	    };

	    $('.btn-add').on('click', addCurso);
	    $cursos.on('click', '.btn-remove', removeCurso);
}());