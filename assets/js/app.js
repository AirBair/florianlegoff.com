import $ from 'jquery';
import 'bootstrap';

$(function() {
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
