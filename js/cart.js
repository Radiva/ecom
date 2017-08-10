
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
                var prod = '';
                prod+='';
                $.each(res, function(key,value){
                	prod+='<div class="cart-item">';
					prod+='<img data-original="'+base_url(value.gambar)+'" alt="img" class="preload-image" src="images/empty.png">';
					prod+='<h1>'+value.namabarang+'</h1>';
					prod+='<h2>Rp. '+Number(value.harga).toLocaleString("id")+'</h2>';
					prod+='<h3>'+value.deskripsi.substr(1,75)+'...</h3><h4>';
					prod+='<a href="#" class="add-qty"><i class="ion-plus-round"></i></a>';
					prod+='<input type="text" value="'+value.jumlah+'" class="qty">';
					prod+='<a href="#" class="substract-qty"><i class="ion-minus-round"></i></a></h4>';
					prod+='<h5><a class="remove-cart-item" onclick="hapusItem('+value.idcart+')" href="#"><i class="ion-android-close"></i></a></h5></div>';
                });
                $('.tampilkan').prepend(prod);
            },
            error: function(res){
               console.log(res+'error');
            }

        });
    }

function updatejumlah() {
    var id3 = window.localStorage.getItem("username");
    $.ajax({
           type: "POST",
            url:base_url('client/cart.php?fnc=4'),
            data: "user="+id3,
            dataType: "json",
            cache: false,
            crossDomain: true,
            success: function(res){
                var prod = '';
                prod+='';
                $.each(res, function(key,value){
                    prod+='<h4>Estimated Costs</h4><h5><strong>Packaging</strong><em class="color-red-dark">$0.00</em></h5>';
                    prod+='<h5><strong>Delivery</strong><em>$60.00</em></h5><h5><strong>Taxes</strong><em>$40.00</em></h5>';
                    prod+='<h5><strong>Discount</strong><em class="color-green-dark">$10.00</em></h5><h6><strong>Grand Total</strong><em>Rp. '+Number(value.hargatotal).toLocaleString("id")+'</em></h6>';
                    prod+='<div class="clear"></div><a href="invoice.html" class="button button-green button-full half-top">Proceed to Checkout</a>';
                    prod+='<a href="store-cart-2.html" class="button button-red button-full half-top">Check Version 2</a>';
                 });
                $('.cart-costs').prepend(prod);
            },
            error: function(res){
               console.log("gagal2");
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
}

function deleteFromCart($cartid) {
        $.ajax({
           type: "POST",
            url:base_url('client/cart.php?fnc=3'),
            data: "cartid="+$cartid,
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
}


