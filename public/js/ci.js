$("#cbx_cidade").change(function(data){
    /*$("#div_setor").append("<label for='nome'>Setor Destinatario</label>"+
       "<select class='form-control' name='setores_id' id='cbx_setor'>"+
       "<option value=''>Teste</option>"+
       "<option value=''>Teste 2</option>"+
       "@endforeach"+
     "</select>");*/
     var url = URL + "/adm/setor/consulta";
     var cidade = $("#cbx_cidade").val();

     $.post(url, {"_token" : TOKEN, "cidade" : cidade})
     .done(function(data){
       console.log(data);
     });
})
