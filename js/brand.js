function setIdBrand(id) {
   window.localStorage.setItem('idbrand', id);
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
                  prod+='<a class="swiper-slide" href="product.html" onclick="setIdBrand('+value.idbrand+')">';
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
    var id = window.localStorage.getItem('idbrand');
     $.ajax({
           type: "POST",
            url:base_url('client/product.php?option=9'),
            data: "idbrand="+id,
            dataType: "json",
            cache: false,
            crossDomain: true,
            success: function(res){
                var i=0;
                console.log(res);
                var prod = '';
                prod+='';
                $.each(res, function(key,value){
                  prod+='<a href="detailproduct.html" onclick="setIdBarang('+value.idbarang+','+value.harga+')">';
                    prod+='<img src="'+base_url(value.gambar)+'" alt="img">';
                    prod+='<strong>'+value.namabarang+'</strong>';
                    prod+='<em>'+value.deskripsi.substr(1,50)+'..</em>';
                    prod+='<u>Rp. '+Number(value.harga).toLocaleString("id")+'</u>';
                prod+='</a>';
                });
                $('.store-item-list').prepend(prod);
            },
            error: function(res){
               console.log("gagal");
            }

        });
}