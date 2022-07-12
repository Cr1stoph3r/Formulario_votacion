    const d= document;
    $region = d.getElementById("region");
    $comuna = d.getElementById("comuna");
    $candidato = d.getElementById("candidato");
    $checks = d.querySelectorAll('.valores');

    function carga_region(){
        $.ajax({
            url: 'http://localhost/prueba_deisi/back/formulario.php',
            type: 'GET',
            dataType: 'json',
            success: function(data){
                try{
                $.each(data, function(i, item){
                 let $option = `<option value="${item.id_region}">${item.region}</option>`;
                 $("#region").append($option);
                })
            }catch(err){
            let message = err.statusText || 'Ocurrio un error';
            $region.nextElementSibling.innerHTML = `Error ${err.status}: ${message}`;
            }
            }
        })
        // fetch("http://localhost/prueba_deisi/back/")
        // .then(res => res.ok ? res.json() : Promise.reject(res))
        // .then(json =>{
        //     console.log(json);
        //     let $option = `<option value=""> Selecciona la region </option>`;
        //     json.forEach(el => $option += `<option value="${el}">${el}</option>`);
        // })
        // .catch(err => {
        //     console.log(err);
        //     let message = err.statusText || 'Ocurrio un error';
        //     $region.nextElementSibling.innerHTML = `Error ${err.status}: ${message}`;
        // })
    }

    function carga_comunas(cod_region){
        $.ajax({
            url: `http://localhost/prueba_deisi/back/formulario.php?id=${cod_region}`,
            type: 'GET',
            dataType: 'json',
            success: function(data){
                try{
                $comuna.innerHTML = `<option value=""> Selecciona la comuna </option>`;
                $.each(data, function(i, item){
                 let $option = `<option value="${item.id_comuna}">${item.comuna}</option>`;
                 $("#comuna").append($option);
                })
            }catch(err){
            let message = err.statusText || 'Ocurrio un error';
            $comuna.nextElementSibling.innerHTML = `Error ${err.status}: ${message}`;
            }
            }
        })
    }

    function carga_candidatos(){
        $.ajax({
            url: `http://localhost/prueba_deisi/back/candidatos.php`,
            type: 'GET',
            dataType: 'json',
            success: function(data){
                try{
                $candidato.innerHTML = `<option value=""> Selecciona el candidato </option>`;
                $.each(data, function(i, item){
                 let $option = `<option value="${item.id_candidato}">${item.nombre}</option>`;
                 $("#candidato").append($option);
                })
            }catch(err){
            let message = err.statusText || 'Ocurrio un error';
            $comuna.nextElementSibling.innerHTML = `Error ${err.status}: ${message}`;
            }
            }
        })
    }


    $('#enviar').click(function(){
    $nom = $('#nombres').val();
    $al= $('#alias').val();
    $rut= $('#rut').val();
    $email= $('#email').val();
    $reg = $('#region').val();
    $com = $('#comuna').val();
    $cand = $('#candidato').val();
    let dif = '';
    $checks.forEach((e) => {
        if(e.checked == true){
            dif = dif.concat(e.value,', ');
            e.checked == false ;
        }
    });
    dif = dif.slice(0, -2);

    $.ajax({
        method: 'POST',
        url: 'http://localhost/prueba_deisi/back/formulario.php',
        datatype: 'json',
        data: {
            nombres: $nom,
            alias: $al,
            rut: $rut,
            email: $email,
            cod_region: $reg,
            cod_comuna: $com,
            idcandidato: $cand,
            difusion: dif
        },
        success: function (data){
         console.log(data);
        $('#nombres').val('');
        $('#alias').val('');
        $('#rut').val('');
        $('#email').val('');
        $('#region').val('');
        $('#comuna').val('');
        $('#candidato').val('');
        $('#difusion input[type=checkbox]').prop('checked', false);
        d.getElementById("res").innerHTML = data;
        }
    });
});

    d.addEventListener("DOMContentLoaded",carga_region);
    d.addEventListener("DOMContentLoaded",carga_candidatos);
    $region.addEventListener("change", e=> carga_comunas(e.target.value));