// Show Password Button
$('.toggle-panel').click(function(){
    var input = $($(this).attr("toggle"));
    if(input.attr("type")  == "password"){
      input.attr("type", "text");
    } else { 
      input.attr("type", "password");
    }
  });