function login(){
    $('.login-button').click(function() {
        console.log($('#form-login').serialize());
        $.ajax({
           type: "POST",
            url:base_url('client/user.php?option=3'),
            data: $('#form-login').serialize(),
            dataType: "json",
            cache: false,
            crossDomain: true,
            success: function(res){
                console.log(res);
                setSession(res);
            },
            error: function(res){
               console.log(res);
            }
            
        });
    }); 
}

function register(){
    $('form#form-register').submit(function(e) {
        e.preventDefault();
        $.ajax({
           type: "POST",
            url:base_url('client/user.php?option=1'),
            data: $('form#form-register').serialize(),
            dataType: "json",
            cache: false,
            crossDomain: true,
            success: function(res){
                console.log(res);
                if(res){
                    window.location = 'index.html';
                }
            },
            error: function(res){
               console.log(res);
            }
            
        });
    }); 
}

function createCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name,"",-1);
}

function setSession(data)
{
    window.localStorage.setItem("username", data.username);
    window.localStorage.setItem("namagroupuser", data.namagroupuser);
    //window.location = 'index.html';
    window.history.back();
}

function getSession(){
    var username = window.localStorage.getItem("username");
    var namagroupuser = window.localStorage.getItem("namagroupuser");
    if(username!=null&&namagroupuser!=null) {
        var data = {
          username:username,
          namagroupuser:namagroupuser  
        };
        return data;
    }  
    else{
        return false;
    } 
}