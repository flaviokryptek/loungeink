$(function(){
	$(window).scroll(function(){
		var window_scrolltop = $(this).scrollTop();
		
		// Passa por cada elemento com a classe .main-foto
		$('.main-foto').each(function(){
			var obj = $(this);
			
			// Garante que apenas trabalhemos no elemento que está visível na tela
			if ( window_scrolltop >= obj.position().top - obj.height() 
				&& window_scrolltop <= obj.position().top + obj.height()) {
				
				// O atributo data-divisor vai definir a velocidade do efeito
				var divisor = typeof obj.attr('data-divisor') == 'undefined' ? 4 : obj.attr('data-divisor');
				
				// Corrige a diferença do primeiro elemento
				if ( obj.is(':first-child') ) {
					var bg_pos = ( window_scrolltop - obj.position().top ) / divisor;
				} else {
					var bg_pos = ( window_scrolltop - obj.position().top + ( obj.height() - 520 ) ) / divisor;
				}
				
				// Modifica a posição do bg
				obj.css({
					'background-position' : '50% -' + bg_pos + 'px'
				});
				
				// Animação do primeiro texto
				obj.children('.frase').css({
					'bottom' : ( window_scrolltop - obj.position().top + 100 ) + 'px'
				});
				
			} // Garante que apenas trabalhemos no elemento que está visível na tela
		}); // $('.parallax').each(function(){ ...
	}); // $(window).scroll(function(){ ...
}); // jQuery