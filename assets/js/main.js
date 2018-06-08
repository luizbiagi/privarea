$(document)
.on("submit","form.js-register, form.js-login",function(event){
    event.preventDefault();
    var _form = $(this);
    var _error = $(".js-error", _form);
    var dataObj = {
        email: $("input[type='email']",_form).val(),
        password: $("input[type='password']",_form).val()
    }
    console.log("e:"+dataObj.email+" p:"+dataObj.password+" err:"+dataObj.error);
    if(dataObj.email.length<6){
        _error.text("Please enter a valid email address").show();
        return false;
    } else if(dataObj.password.length<8){
        _error.text("Please enter at least an 8 characters password ").show();
        return false;
    }

    if(dataObj.error){
        _error=dataObj.error;
    }

    _error.hide();
    //processo ajax após limpar mensagens de erro
    console.log("ajax");
    $.ajax({
        type: 'POST',
        url: (_form.hasClass('js-login') ? 'ajax/login.php' : 'ajax/register.php'),
        data: dataObj,
        dataType: 'json',
        async: true,
    })
    .done(function ajaxDone(data){
        console.log("ajaxDone:");
        console.log(data);
        if(data.redirect!==undefined){
            window.location=data.redirect;
        } else if(data.error!==undefined){
            _error.html(data.error).show();
        }
    })
    .fail(function ajaxFailed(e){
        console.log("ajaxFailed:");
        console.log(e);
    })
    .always(function ajaxAlwaysDoThis(data){
        console.log("sempre");
    })
    return false;
})