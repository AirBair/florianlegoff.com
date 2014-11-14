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


   	$('.btn').mouseenter(function(){
   		$(this).animate({
   			backgroundColor: 'rgb(243,60,60)',
   			color: 'white'
   		},'fast');
   	});

   	$('.btn').mouseleave(function(){
   		$(this).animate({
   			backgroundColor: 'white',
   			color: 'black'
   		},'fast');
   	});

   	/* MON CV */

      $('.menuCV a').each(function(){
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
            $('.menuCV').addClass("menuFloat");
        }
        else
        {
            // relative
            $('.menuCV').removeClass("menuFloat");
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
   			$('.back1').hide();
   			var link = $(this).attr('href');
   			$(link).slideDown();
   			$('html,body').animate({scrollTop: 1000}, 'slow');
   			return false;
   		});
   	});

   	$('.prezProjet .closeProjet').click(function(){
   		$('.back1').slideUp(300);
   		return false;
   	});

   	$('.prezProjet .footProjet a').each(function(){
   		$(this).click(function(){
   			$('.back1').hide();
   			var link = $(this).attr('href');
   			$(link).show();
   			return false;
   		});
   	});

   
   

});