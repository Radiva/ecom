
function tampilCart() {
    var id3 = window.localStorage.getItem("username");
	$.ajax({
           type: "POST",
            url:base_url('client/cart.php?fnc=1'),
            data: "user="+id3,
            dataType: "json",
            cache: false,
            crossDomain: true,
            success: function(res){
                var i=0;
                //console.log(res);
                var prod = '';
                prod+='';
                $.each(res, function(key,value){
                	prod+='<div class="cart-item">';
					prod+='<img data-original="'+base_url(value.gambar)+'" alt="img" class="preload-image" src="images/empty.png">';
					prod+='<h1>'+value.namabarang+'</h1>';
					prod+='<h2>Rp. '+Number(value.harga).toLocaleString("id")+'</h2>';
					prod+='<h3>'+value.deskripsi.substr(1,50)+'</h3><h4>';
					prod+='<a href="#" class="add-qty"><i class="ion-plus-round"></i></a>';
					prod+='<input type="text" value="1" class="qty">';
					prod+='<a href="#" class="substract-qty"><i class="ion-minus-round"></i></a></h4>';
					prod+='<h5><a class="remove-cart-item" href="#"><i class="ion-android-close"></i></a></h5></div>';
                });
                $('.tampilkan').prepend(prod);


            },
            error: function(res){
               console.log("gagal");
            }

        });
    }

function cekPelanggan() {
    if (getSession()) {
        addToCart();
    } else {
        window.location = "login.html";
    }
}

function addToCart() {
    var id1 = localStorage.getItem("idbarang");
    var id2 = localStorage.getItem("harga");
    var id3 = window.localStorage.getItem("username");
    //$('.button-blue').click(function() {
        //console.log(id1+", "+id2);
        $.ajax({
           type: "POST",
            url:base_url('client/cart.php?fnc=2'),
            data: {idbarang:id1, harga:id2, username:id3},
            dataType: "json",
            cache: false,
            crossDomain: true,
            success: function(res){
                console.log(res);
            },
            error: function(res){
               console.log(res+' error');
            }
            
        });
    //}); 
}
