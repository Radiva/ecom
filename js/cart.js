function tampilCart() {
	$.ajax({
           type: "POST",
            url:base_url('client/product.php?fnc=1'),
            dataType: "json",
            cache: false,
            crossDomain: true,
            success: function(res){
                var i=0;
                console.log(res);
                var prod = '';
                prod+='';
                $.each(res, function(key,value){
                	prod+='<div class="cart-item">';
					prod+='<img data-original="images/pictures/1t.jpg" alt="img" class="preload-image" src="images/empty.png">';
					prod+='<h1>BeMobile</h1>';
					prod+='<h2>$11.00</h2>';
					prod+='<h3>Mobile and Tablet Template</h3><h4>';
					prod+='<a href="#" class="add-qty"><i class="ion-plus-round"></i></a>';
					prod+='<input type="text" value="1" class="qty">';
					prod+='<a href="#" class="substract-qty"><i class="ion-minus-round"></i></a></h4>';
					prod+='<h5><a class="remove-cart-item" href="#"><i class="ion-android-close"></i></a></h5></div>';
                });
                $('.tampilkan').append(prod);


            },
            error: function(res){
               console.log("gagal");
            }

        });
}