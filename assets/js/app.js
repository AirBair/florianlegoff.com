import $ from 'jquery';
import 'bootstrap';

$(function() {
    $('header #mainNav li a').each(function() {
        $(this).click(function(event) {
            event.preventDefault();
            var target = $(this).attr('href');
            $('html, body').animate({
                scrollTop: ($(target).offset().top - $('header nav').outerHeight())
            }, 'slow');
        });
    });

    var contactForm = $('section#contact form');
    contactForm.submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: contactForm.attr('method'),
            url: contactForm.attr('action'),
            data: contactForm.serialize(),
            success: function(response) {
                $('section#contact').replaceWith(response);
            }
        });
    });
});
