function menuDynamique(page) {

	$('#' + page + ' a').css('backgroundColor', 'rgba(243,60,60,1)').css('color', 'white');
	$('#' + page + ' .linktext').hide();
	$('#' + page + ' .linkimg').css('display', 'inline-block');
	$('#' + page + 'Arrow').show();
	$('#' + page + 'Nav').show();

	$('nav ul li').mouseenter(function(){
		$('#' + page + ' a').css('backgroundColor', 'rgba(0,0,0,0)').css('color', 'rgb(100,100,100)');
		$('#' + page + ' .linktext').show();
		$('#' + page + ' .linkimg').css('display', 'none');
		$('#' + page + 'Arrow').hide();
		$('#' + page + 'Nav').slideUp(50);
	});

	$('nav li').mouseenter(function() {
		$(this).children().css('backgroundColor', 'rgba(243,60,60,1)').css('color', 'white');
		link = $(this).attr('id');
		$('#' + link + ' .linktext').hide();
		$('#' + link + ' .linkimg').css('display', 'inline-block');
		$('#' + link + 'Arrow').slideDown(200);
		$('#' + link + 'Nav').slideDown(200);
	});

	$('nav li').mouseleave(function() {
		$(this).children().css('backgroundColor', 'rgba(0,0,0,0)').css('color', 'rgb(100,100,100)');
		link = $(this).attr('id');
		$('#' + link + ' .linktext').show();
		$('#' + link + ' .linkimg').css('display', 'none');
		$('#' + link + 'Arrow').hide();
		$('#' + link + 'Nav').slideUp(50);
	});

	$('nav ul').mouseleave(function(){
		$('#' + page + ' a').css('backgroundColor', 'rgba(243,60,60,1)').css('color', 'white');
		$('#' + page + ' .linktext').hide();
		$('#' + page + ' .linkimg').css('display', 'inline-block');
		$('#' + page + 'Arrow').slideDown(200);
		$('#' + page + 'Nav').slideDown(200);
	});
}

$(function(){

   /* ID TOX */
   $('.clickToTox').click(function(){

      $('.idTox').fadeIn();
      $('#overlay').fadeIn();
         var taille = document.body.offsetHeight;
      $('#overlay').css('height', taille);

      return false;
   });

   $('#overlay button').click(function(){
      $('#overlay').fadeOut();
      return false;
   });

	/* Slider */
	var i=0;
	affiche();
    setInterval(affiche, 4000);

	function affiche() {
		i++;
		if (i==1) precedent = '#slide4'
		else precedent = '#slide' + (i-1);

		var actuel = '#slide' + i;
		$(precedent).fadeOut(800);
		$(actuel).fadeIn(800);
		if (i==4) i=0;          
   }


	/* MON CV */

   $('.menuRed a').each(function(){
      $(this).click(function(){
         var ancre = $(this).attr('href');
         $('html, body').animate({  
            scrollTop:$(ancre).offset().top - 50 
         }, 'slow'); 
         return false;
      });
   });

   $(window).scroll(function() {
     if ($(window).scrollTop() >= 350)
     {
         // fixed
         $('.menuRed').addClass("menuFloat");
     }
     else
     {
         // relative
         $('.menuRed').removeClass("menuFloat");
     }
   });

	$('.cv h3 a').each(function(){
		$(this).click(function(){
			var blocCV = $(this).parent().parent().find('div.itemCV');

			if ($(blocCV).hasClass('open'))
			{
				$(blocCV).slideUp(150);
				$(blocCV).toggleClass('open').toggleClass('close');
			}
			else
			{
				$(blocCV).slideDown(100);
				$(blocCV).toggleClass('close').toggleClass('open');
			}
			return false;
		});
	});

   /* MES COMPETENCES */

   /*$('.skillInfos').each(function(){

         var taille = $(this).offsetHeight;

         var padding = (150 - taille) / 2;
         $(this).css('padding-top', padding);

   });*/

   $('.skillInfos').hide();

   $('.titleSkill').mouseenter(function(){
      $(this).find('img').fadeOut(100);
      $(this).find('.skillInfos').slideDown(100);
   });

   $('.titleSkill').mouseleave(function(){
      $(this).find('img').fadeIn(100);
      $(this).find('.skillInfos').slideUp(100);
   });

   /* MES PROJETS */

   	$('.projet').each(function(){
   		$(this).mouseenter(function(){
   			$(this).find('a.viewProject').slideDown(100);
   		});
   });

   	$('.projet').each(function(){
   		$(this).mouseleave(function(){
   			$(this).find('a.viewProject').slideUp(100);
   		});
   });

   	$('.projet a').each(function(){
   		$(this).click(function(){
   			$('.prezProjet').hide();
   			var link = $(this).attr('href');
   			$(link).slideDown();
   			$('html,body').animate({scrollTop: $(link).offset().top}, 'slow');
   			return false;
   		});
   	});

   	$('.prezProjet .closeProjet').click(function(){
   		$('.prezProjet').slideUp(300);
   		return false;
   	});

   	$('.prezProjet .footProjet a').each(function(){
   		$(this).click(function(){
   			$('.prezProjet').hide();
   			var link = $(this).attr('href');
   			$(link).show();
   			return false;
   		});
   	});

   
   

});