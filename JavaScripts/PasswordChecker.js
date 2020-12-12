$('#slaptazodis2').on('keyup', function(){     

    if($('#slaptazodis1').val()== $('#slaptazodis2').val()) {
    document.getElementById("aaa").innerHTML = "";
    document.getElementById("submit").disabled = false;
    }
    else {
      document.getElementById("aaa").innerHTML = "Slaptažodžiai neatitinka";
      document.getElementById("submit").disabled = true;
    }
    });
    
    $('#slaptazodis1').on('keyup', function(){     
    
    if($('#slaptazodis1').val()== $('#slaptazodis2').val()) {
    document.getElementById("aaa").innerHTML = "";
    document.getElementById("submit").disabled = false;
    }
    else {
      document.getElementById("aaa").innerHTML = "Slaptažodžiai neatitinka";
      document.getElementById("submit").disabled = true;
    }
    });