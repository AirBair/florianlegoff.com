function menuDynamique(page) {

	$('#' + page + ' a').css('backgroundColor', 'rgba(243,60,60,1)').css('color', 'white');
	$('#' + page + ' .linktext').hide();
	$('#' + page + ' .linkimg').css('display', 'inline-block');
	$('#' + page + 'Arrow').show();
	$('#' + page + 'Nav').show();

	/*$('nav ul li').mouseenter(function(){
		
	});*/

	$('nav li').mouseenter(function() {
      $('#' + page + ' a').css('backgroundColor', 'rgba(0,0,0,0)').css('color', 'rgb(150,150,150)');
      $('#' + page + ' .linktext').show();
      $('#' + page + ' .linkimg').css('display', 'none');
      $('#' + page + 'Arrow').hide();
      $('#' + page + 'Nav').slideUp(50);
		$(this).children().css('backgroundColor', 'rgba(243,60,60,1)').css('color', 'white');
		link = $(this).attr('id');
		$('#' + link + ' .linktext').hide();
		$('#' + link + ' .linkimg').css('display', 'inline-block');
		$('#' + link + 'Arrow').slideDown(100);
		$('#' + link + 'Nav').slideDown(200);
	});

	$('nav li').mouseleave(function() {
      $(this).each(function(){
         $(this).children().css('backgroundColor', 'rgba(0,0,0,0)').css('color', 'rgb(150,150,150)');
         $('.linktext').show();
         $('.linkimg').css('display', 'none');
      });
      $('.infoNav').each(function(){
         $(this).find('img').hide();
         $(this).find('span').slideUp(100);
      })
	});

	$('nav').mouseleave(function(){
		$('#' + page + ' a').css('backgroundColor', 'rgba(243,60,60,1)').css('color', 'white');
		$('#' + page + ' .linktext').hide();
		$('#' + page + ' .linkimg').css('display', 'inline-block');
		$('#' + page + 'Arrow').slideDown(100);
		$('#' + page + 'Nav').slideDown(100);
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


   /*$('.itemSkill').mouseenter(function(){
      $(this).find('img').fadeOut(100);
      $(this).find('.skillInfos').slideDown(100);
   });

   $('.itemSkill').mouseleave(function(){
      $(this).find('img').fadeIn(100);
      $(this).find('.skillInfos').slideUp(100);
   });*/

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