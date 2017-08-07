jQuery(document).ready(function($) {
	menu();
	menukategori();
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

function menukategori(){
	$.ajax({
       type: "POST",
        url:base_url('client/product.php?option=3'),
        dataType: "json",
        cache: false,
        crossDomain: true,
        success: function(res){
            console.log(res);
            var i = 0;
            var kategori = '';
           
            $.each(res, function(key,value){
                i++;
                kategori+='<a href="product.html" onclick="setIdKategori('+value.idkategori+')"><span>'+value.namakategori+'</span></a>';
            });
            $('.menu-kategori').after(kategori);
        },
        error: function(res){
           console.log(res);
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
