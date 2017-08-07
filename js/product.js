function setIdKategori(idkategori){
    window.localStorage.setItem("idkategori", idkategori);
}
function setIdBarang(idbarang){
    window.localStorage.setItem("idbarang", idbarang);
}

function kategoriproduct(){
    $.ajax({
       type: "POST",
        url:base_url('client/product.php?option=3'),
        dataType: "json",
        cache: false,
        crossDomain: true,
        success: function(res){
            console.log(res);
            var i = 0;
            var w = 0;
            var kategori = '';
            var warna = ['bg-green-dark','bg-blue-dark','bg-magenta-dark','bg-orange-dark','bg-red-dark','bg-night-dark' ];
            $.each(res, function(key,value){
                i++;
                if(w>warna.length)w=0;
                kategori+='<a class="swiper-slide" href="product.html" onclick="setIdKategori('+value.idkategori+')">';
                kategori+='<u>'+value.namakategori+'</u>';
                kategori+='<img class="responsive-image" src="images/pictures/'+i+'t.jpg" alt="img">';
                kategori+='<em class="overlay '+warna[w]+'"></em>';
                kategori+='</a>';
                w++;
            });
            $('.productkategori').prepend(kategori);
        },
        error: function(res){
           console.log(res);
        }
        
    });
    
}
function displayproductbykategori(){
    var idkategori = localStorage.getItem("idkategori");
    $.ajax({
       type: "POST",
        url:base_url('client/product.php?option=4'),
        data: "idkategori="+idkategori,
        dataType: "json",
        cache: false,
        crossDomain: true,
        success: function(res){
            console.log(res);
            var item = '';
            $.each(res, function(key,value){
                item+='<a href="detailproduct.html" onclick="setIdBarang('+value.idbarang+')">';
                    item+='<img src="images/pictures/1t.jpg" alt="img">';
                    item+='<strong>'+value.namabarang+'</strong>';
                    item+='<em>'+value.deskripsi.substr(1,50)+'..</em>';
                    item+='<u>Rp. '+Number(value.harga).toLocaleString("id")+'</u>';
                item+='</a>';
            });
            $('.store-item-list').prepend(item);
        },
        error: function(res){
           console.log(res);
        }
        
    });
    
}
function displaydetailproduct(idbarang){
    $.ajax({
       type: "POST",
        url:base_url('client/product.php?option=5'),
        data:"idbarang="+idbarang,
        dataType: "json",
        cache: false,
        crossDomain: true,
        success: function(res){
            console.log(res);
            var detail = '';
            $.each(res, function(key,value){
                detail+='<div class="heading-strip bg-2">';
                    detail+='<h3>'+value.namabarang+'</h3>';
                    detail+='<p>'+value.namakategori+'</p>';
                    detail+='<i class="ion-cube"></i>';
                    detail+='<div class="overlay dark-overlay"></div>';
                detail+='</div>';
                detail+='<div class="decoration decoration-margins"></div>';
                detail+='<div class="content-fullscren">';
                    detail+='<div class="store-slider full-bottom">';
                        detail+='<div class="swiper-wrapper">';
                        var g = 0;
                        for(x in value.gambar){
                            detail+='<a href="#" class="swiper-slide store-slider-item">';
                                detail+='<img class="responsive-image no-bottom" src="'+value.gambar[x]+'" alt="img">';
                            detail+='</a>';
                        }
                        detail+='</div>';
                    detail+='</div>';
                detail+='</div>';
                detail+='<div class="content full-bottom">';
                    detail+='<div class="one-half">';
                        detail+='<a href="#" class="button button-icon button-blue button-round button-full button-xs no-bottom"><i class="ion-social-usd"></i>Purchase</a>';
                    detail+='</div>';
                    detail+='<div class="one-half last-column">';
                        detail+='<a href="#" class="button button-icon button-green button-round button-full button-xs no-bottom"><i class="ion-android-bookmark"></i>Wishlist</a>';
                    detail+='</div>';
                    detail+='<div class="clear"></div>';
                    detail+='<div class="decoration half-bottom full-top"></div>';
                    detail+='<div class="store-product-rating half-top">';
                        detail+='<h1>3.5</h1>';
                        detail+='<div>';
                            detail+='<em><i class="ion-ios-star"></i></em>';
                            detail+='<em><i class="ion-ios-star"></i></em>';
                            detail+='<em><i class="ion-ios-star"></i></em>';
                            detail+='<em><i class="ion-android-star-half"></i></em>';
                            detail+='<em><i class="ion-android-star-outline"></i></em>';
                        detail+='</div>';
                        detail+='<strong>181 Reviews</strong>';
                    detail+='</div>';
                    detail+='<div class="store-product-icons">';
                        detail+='<strong><i class="ion-card"></i></strong>';
                        detail+='<strong><i class="ion-cash"></i></strong>';
                        detail+='<strong><i class="ion-android-car"></i></strong>';
                    detail+='</div>';
                    detail+='<div class="decoration half-top"></div>';
                    detail+='<div class="store-product-description">';
                        detail+='<p>'+value.deskripsi+'</p>';
                    detail+='</div>';
            });
            $('#page-content-scroll').prepend(detail);
        },
        error: function(res){
           console.log("gagal");
        }
        
    });
    
}
function displaypopularproduct(){
    $.ajax({
       type: "GET",
        url:base_url('client/product.php?option=6'),
        dataType: "json",
        cache: false,
        crossDomain: true,
        success: function(res){
            console.log(res);
            var popular = '';
            $.each(res, function(key,value){
                popular+='<a class="swiper-slide" href="detailproduct.html" onclick="setIdBarang('+value.idbarang+')">';
                    popular+='<img class="responsive-image" src="images/pictures/4t.jpg" alt="img">';
                    popular+='<em>'+value.namabarang+'</em>';
                    popular+='<strong>Rp. '+Number(value.harga).toLocaleString("id")+'</strong>';
                    popular+='<u class="color-green-dark">Free Shipping</u>';
                popular+='</a>';
            });
            
            $('.popularproduct').prepend(popular);
        },
        error: function(res){
           console.log("gagal");
        }
        
    });
    
}