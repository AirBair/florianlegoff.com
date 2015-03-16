var carrousel = {
	nbSlide : 0, // Nombre total de slide
	nbCurrent : 1, // Numéro du slide actuel
	elemCurrent : null, // Non du slide actuel
	elem : null, // Element sur lequel est affecté le diaporama
	timer : null, // Timer

	// Fonction d'initialisation du carrousel
	init : function(elem)
	{
		this.nbSlide = elem.find('.slide').length;

		elem.find('a').hide();
		elem.mouseover(function(){elem.find('a').slideDown(200);});
		elem.mouseleave(function(){elem.find('a').slideUp(200);});

		elem.append('<div class="carrouselNav"></div>');
		for(var i = 1 ; i <= this.nbSlide ; i++)
		{
			elem.find('.carrouselNav').append('<span>'+i+'</span>');
		}
		elem.find('.carrouselNav span').click(function(){
			carrousel.gotoSlide($(this).text());
			carrousel.play();
		});

		// Attribution des variables
		this.elem=elem;
		elem.find('.slide').hide();
		elem.find('.slide:first').show();
		this.elemCurrent = elem.find('.slide:first');
		this.elem.find('.carrouselNav span:first').addClass('active');

		// Début du carrousel
		carrousel.play();

	},

	gotoSlide : function(num)
	{
		if(num == this.nbCurrent){return false;}
		this.elemCurrent.fadeOut(400);
		this.elem.find('#slide'+num).fadeIn(400);
		this.elem.find(".carrouselNav span").removeClass('active');
		this.elem.find('.carrouselNav span:eq('+(num-1)+')').addClass('active');
		this.nbCurrent = num;
		this.elemCurrent = this.elem.find('#slide'+num);
	},

	next : function()
	{
		var num = this.nbCurrent + 1;
		if(num > this.nbSlide)
		{
			num = 1;
		}
		this.gotoSlide(num);
	},

	prev : function()
	{
		var num = this.nbCurrent - 1;
		if(num < 1)
		{
			num = this.nbSlide;
		}
		this.gotoSlide(num);
	},

	arret : function(){
		// On vide le timer
		window.clearInterval(carrousel.timer);
	},

	play : function(){
		window.clearInterval(this.timer);
		this.timer = window.setInterval('carrousel.next()', 4000);
	}

}


$(function() {

	carrousel.init($('.carrouselMain'));

});