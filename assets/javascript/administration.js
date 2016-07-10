$(function(){
    $('.btnModal').each(function(){
        $(this).click(function(){
            modalBox = $($(this).data('target'));
            action = '/admin/'+$(this).data('table')+'/'+$(this).data('action');
            if($(this).data('action') != 'add')
                action += '/'+$(this).data('value');

            if($(this).data('action') == 'edit')
            {
                $.ajax({
                    url: '/admin/readRowJSON/'+$(this).data('table')+'/'+$(this).data('value'),
                    type: 'get',
                    dataType: 'json',
                    success: function(data) {
                        if(!data.error) // Si le controlleur PHP retourne une variable de succès d'insertion en BDD
                        {
                            for(field in data)
                            {
                                modalBox.find('[name*='+field+']').val(data[field].replace(/<br \/>/g, ''));
                            }
                        }
                        else
                        {
                            alert(data.error);
                        }
                    },
                    error: function() {
                        alert('JavaScript Erreur ...');
                    }
                });

                modalBox.find('input[type="submit"]').val('Edit');
                modalBox.find('h4 span').text('Edit');
            }

            if($(this).data('action') == 'add')
            {
                modalBox.find('input').val('');
                modalBox.find('textarea').val('');
                modalBox.find('input[type="submit"]').val('Add');
                modalBox.find('h4 span').text('Add');
            }

            modalBox.find('form').attr('action', action);
            modalBox.modal('show');
        });
    });

    $('.formAjax').submit(function(){
        var form = $(this);
        var modal = form.parents('modal');
        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize(),
            dataType: 'json',
            success: function(data) {
                if(data.success) // Si le controlleur PHP retourne une variable de succès d'insertion en BDD
                {
                    location.reload();
                }
                else if (data.validation_errors)
                {
                    form.parent().find('.alert').remove();
                    form.parent().prepend(data.validation_errors);
                }
                else
                {
                    alert('Une erreur inconnue est survenue..');
                }
            },
            error: function() {
                alert('JavaScript Erreur ...');
            }
        });
        return false;
    });
});
