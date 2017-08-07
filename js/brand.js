function setIdKategori(id) {
   window.localStorage.setItem('brand', id);
}

function tampilbrand(){
     $.ajax({
           type: "POST",
            url:base_url('client/product.php?option=8'),
            dataType: "json",
            cache: false,
            crossDomain: true,
            success: function(res){
                var i=0;
                console.log(res);
                var prod = '';
                prod+='';
                $.each(res, function(key,value){
                  prod+='<a class="swiper-slide" href="store-list.html" onclick="setIdKategori('+value.idbrand+')">';
                  prod+='<u>'+value.namabrand+'</u>';
                  prod+='<img class="responsive-image" src='+base_url(value.logobrand)+' alt="img">';
                  prod+='<em class="overlay bg-red-dark"></em></a>';
                });
                $('.tampilkan').append(prod);


            },
            error: function(res){
               console.log("gagal");
            }

        });
}

function tampilproductbybrand(){
    var id = window.localStorage.getItem('brand');
     $.ajax({
           type: "POST",
            url:base_url('client/product.php?option=9&id='+id),
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
                  prod+='<img data-original='+base_url(value.gambar)+' alt="img" class="preload-image" src="images/empty.png">';
                  prod+='<h1>'+value.namabarang+'</h1>';
                  prod+='<h2>Rp.'+value.harga+'</h2>';
                  prod+='<h3>'+value.deskripsi+'</h3>';
                  prod+='</div>';
                });
                //console.log(prod);
                $('#lalala').prepend(prod);
                // alert("aaaa");
            },
            error: function(res){
               console.log("gagal");
            }

        });
}