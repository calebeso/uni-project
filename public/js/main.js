// Mostrar senha
$('.toggle-panel').click(function(){
    var input = $($(this).attr("toggle"));
    if(input.attr("type")  == "password"){
      input.attr("type", "text");
    } else { 
      input.attr("type", "password");
    }
  });

  //Mensagens de validação
    $(".alert-success, .alert-danger").fadeTo(4000, 500).slideUp(500, function() {
        $(".alert-success, .alert-danger").slideUp(500);
    });
