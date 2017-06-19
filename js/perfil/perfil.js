$(document).ready(function(){
    $('.cambiar').hide();
    $('#cambio').on('change', function(){
        if($(this).is(':checked') ){
           $('.cambiar').show(); 
        } else {
             $('.cambiar').hide();
        }
   });
   $('#validar_contras').click(function(){
        var antigua,nueva, repetir;
        antigua = $('#antigua').val();
        nueva = $('#nueva').val();
        repetir = $('#repetir').val();
        if(nueva != repetir){
            $("#result_contra").html("<div class='alert alert-dismissible alert-danger'><strong>¡Error!</strong>Las contraseñas no coinciden.</div>");
        }
        if ($.trim(antigua).length > 0 && $.trim(nueva).length > 0 && $.trim(repetir).length > 0) {
            $.ajax({
                url: 'perfil/modificar_contra.php',
                method: 'POST',
                data: {antigua:antigua, nueva:nueva, repetir:repetir},
                cache: false,
                beforeSend: function(){
                    $('#validar_contras').html('Validando...');
                },
                success: function(data){
                     $('#validar_contras').html('Cambiar Contraseña');
                    if (data) {
                        $('#result_contra').html(data);
                        $('.vacio').val('');
                    } else {
                        $("#result_contra").html("<div class='alert alert-dismissible alert-danger'><strong>¡Error!</strong>No se ha podido actualizar la contraseña correctamente.</div>");
                    }
                }
            });
        } else {
            $("#result_contra").html("<div class='alert alert-dismissible alert-danger'><strong>¡Error!</strong>Por favor complete todos los campos</div>");
        }
   });
});