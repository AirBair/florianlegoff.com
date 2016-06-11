$(function(){

    /***********************************************************************
    								HEADER
    ************************************************************************/

    // Nav Scroll
    $('header li a').each(function(){
       $(this).click(function(){
          var target = $(this).attr('href');
          $('html, body').animate({
             scrollTop:($(target).offset().top - 80)
          }, 'slow');
          return false;
       });
    });

    // ScrollSpy to change color of menu item.
    $(window).scroll(function(){
        var posTop = $(window).scrollTop() + 90;
        $('body > section').each(function(index){
            var offsetTop = $(this).offset().top;
            var h = $(this).height();

            if (posTop >= offsetTop-80 && posTop <= offsetTop + h) {
                $('header nav a').eq(index).addClass('darkred');
            } else {
                $('header nav a').eq(index).removeClass('darkred');
            }
        });
    }).trigger('scroll');

    /***********************************************************************
        								CONTACT
    ************************************************************************/

    // Display/Hide Tox ID.
    $('a[href="toxID"').popover({
        html:true,
        placement:'bottom',
        template:'<div class="popover bg_darkblack" role="tooltip"><div class="arrow darkblack"></div><div class="popover-content"></div></div>'
    });

    // Form Submit in AJAX.
    $('#contact input[type="submit"]').click(function() {
        var form_contact = $('#contact form');
        var form_data = {
            name : $('#contact_name').val(),
            email : $('#contact_email').val(),
            object : $('#contact_object').val(),
            message : $('#contact_message').val()
        };

        $.ajax({
            type: "POST",
            url: form_contact.attr('action'),
            data: form_data,
            dataType: 'json',
            success: function(data){
                if(data == "success")
                {
                    $('#contact_form_error').addClass('hidden');
                    $('#contact_form_success').removeClass('hidden');
                    $('#contact input[type="text"]').val('');
                    $('#contact textarea').val('');
                }
                else
                {
                    $('#contact_form_success').addClass('hidden');
                    $('#contact_form_error .errors_validation').html(data);
                    $('#contact_form_error').removeClass('hidden');
                }
            },
            error: function(){
                $('#contact_form_success').addClass('hidden');
                $('#contact_form_error .errors_validation').html('<p>Erreur Inconnue ...</p>');
                $('#contact_form_error').removeClass('hidden');
            }
        });
        return false;
    });
});


/***********************************************************************
                            INIT LIBRAIRIES
************************************************************************/

new WOW().init();

particlesJS.load('particles', 'assets/javascript/particles.json', function(){
  console.log('callback - particles.js config loaded');
});
