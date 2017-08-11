jQuery(document).ready(function($) {
	menu();
	ceklogin();
});

function menu(){
    $.ajax({
        url:"menu.html",
        success:function(result){
            $('.sidebars').prepend(result);
        }
    });

}

function ceklogin(){
	var dataSession = getSession();
	console.log(dataSession);
	if(dataSession==false){
		$('a.login-menu').show();
	}
	else{
		$('.login-menu').css({
			display: 'hidden',
		});
	}
}

function logout(){
	localStorage.clear();
    
    window.location = 'index.html';
}

function register(){
	
}
