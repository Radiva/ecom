function setIdKategori(idkategori){
    window.localStorage.setItem("idkategori", idkategori);
}
function setIdBarang(idbarang,harga,idkategori){
    window.localStorage.setItem("idbarang", idbarang);
    window.localStorage.setItem("harga", harga);
    window.localStorage.setItem("kategori", idkategori);
}

function setIdBrand(id) {
   window.localStorage.setItem('idbrand', id);
}

function setTitle(title) {
   window.localStorage.setItem('title', title);
}

function getTitle(title){
    var code = 0;
    switch(title){
      case 'brand':
            code = 8;
      break;
      case 'popular':
            code = 6;
      break;
      case 'kategori':
            code = 3;
      break;
    };
    var judul = '';
    alert(code);
    // $.ajax({
    //    type: "POST",
    //     url:base_url('client/product.php?option=8'),
    //     dataType: "json",
    //     cache: false,
    //     crossDomain: true,
    //     success: function(res){
    //         console.log(res);
    //     },
    //     error: function(res){
    //        console.log("gagal");
    //     }

    // });
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
                  prod+='<a class="swiper-slide" href="product2.html" onclick="setIdBrand('+value.idbrand+')">';
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
                console.log(res);
                var prod = '';
                $.each(res, function(key,value){
                    prod+='<div class="store-item">';
                        prod+='<a href="detailproduct.html" onclick="setIdBarang('+value.idbarang+','+value.harga+','+value.idkategori+')"><img src="images/pictures/1.jpg" alt="img"></a>';
                        prod+='<a href="#" class="scale-hover store-item-button-1"><i class="ion-ios-cart"></i></a>';
                        prod+='<strong>'+value.namabarang+'</strong>';
                        prod+='<em>Rp. '+Number(value.harga).toLocaleString("id")+'</em>';
                    prod+='</div>';
                });
                $('.store-items').prepend(prod);
            },
            error: function(res){
               console.log(res);
            }

        });
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
                kategori+='<a class="swiper-slide" href="product2.html" onclick="setIdKategori('+value.idkategori+')">';
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
                var prod = '';
                $.each(res, function(key,value){
                    prod+='<div class="store-item">';
                        prod+='<a href="detailproduct.html" onclick="setIdBarang('+value.idbarang+','+value.harga+','+value.idkategori+')"><img src="images/pictures/1.jpg" alt="img"></a>';
                        prod+='<a href="#" class="scale-hover store-item-button-1"><i class="ion-ios-cart"></i></a>';
                        prod+='<strong>'+value.namabarang+'</strong>';
                        prod+='<em>Rp. '+Number(value.harga).toLocaleString("id")+'</em>';
                    prod+='</div>';
                });
                $('.store-items').prepend(prod);
        },
        error: function(res){
           console.log(res);
        }
        
    });
    
}

function displaysimilarkategori(){

}

function displaydetailproduct(){
console.log(window.localStorage.getItem('idbarang'));
var idbarang = window.localStorage.getItem('idbarang');
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
                        detail+='<div class="button button-icon button-blue button-round button-full button-xs no-bottom" onclick=cekPelanggan()><i class="ion-social-usd"></i>Purchase</div>';
                        //detail+='<div class="cart-item-1"><a href="#" class="add-qty"><i class="ion-plus-round"></i></a><input type="text" value="1" class="qty"><a href="#" class="substract-qty"><i class="ion-minus-round"></i></div>';
                    detail+='</div>';
                    detail+='<div class="one-half last-column">';
                        detail+='<div class="button button-icon button-blue button-round button-full button-xs no-bottom" onclick=cekPelanggan()><i class="ion-ios-cart"></i>Add to cart</div>';
                    detail+='</div>';
                    detail+='<div class="clear"></div>';
                    
                    detail+='<div class="decoration half-top"></div>';
                    detail+='<div class="store-product-description">';
                        detail+='<p>'+value.deskripsi+'</p>';
                    detail+='</div>';
                    detail+='<div class="decoration"></div>';
                    detail+='<div class="store-product-separator">';
                        detail+='<h5>Reviews</h5>';
                        detail+='<a href="#">See All</a>';
                    detail+='</div>';
                    detail+='<div class="commentarea">';
                    detail+='</div>'
            });
             var login = localStorage.getItem('username');
               if(login != null){
                  detail+='<form id="contactForm reviewForm">';
                      detail+='<div class="formTextareaWrap">';
                      detail+='<textarea name="comment" class="contactTextarea requiredField" placeholder="Comment" id="contactMessageTextarea"></textarea>';
                      detail+='</div>';
                      detail+='<div class="formSubmitButtonErrorsWrap contactFormButton">';
                      detail+='<input type="submit" class="buttonWrap button button-green contactSubmitButton" id="contactSubmitButton" value="Send Message" data-formId="contactForm"/>';
                      detail+='</div>';
                  detail+='</form>';
              }
              $('#page-content-scroll').append(detail);
              tampilreview();
              insertreview();
        },
        error: function(res){
           console.log(res);
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
                popular+='<a class="swiper-slide" href="detailproduct.html" onclick="setIdBarang('+value.idbarang+','+value.harga+','+value.idkategori+')">';
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

function insertreview(){

  $('input[type="submit"]').click(function() {
      var id = window.localStorage.getItem('idbarang');
      var username = window.localStorage.getItem('username');
      var comment = $('textarea[name="comment"]').val();

      var Data = {
          idbarang:id,
          username:username,
          comment:comment
      };

      if(comment!=null||comment!=''){
        $.ajax({
           type: "POST",
            url:base_url('client/product.php?option=0'),
            dataType: "json",
            data:Data,
            cache: false,
            crossDomain: true,
            success: function(res){
                console.log(res);
                if(res){
                    $('textarea[name="comment"]').val(null);
                    tampilreview();
                }
            },
            error: function(res){
               console.log(res);
            }

        });
      }
  });
   
}

function tampilreview(){
   var id = window.localStorage.getItem('idbarang');
     $.ajax({
           type: "POST",
            url:base_url('client/product.php?option=1'),
            dataType: "json",
            data:'idbarang='+id,
            cache: false,
            crossDomain: true,
            success: function(res){
                console.log(res);
                var i = 0;
                var review = '';
                if(res!=false){
                $('.commentarea').text(null);
                  $.each(res, function(key,value){
                        if(i<3){
                            review+='<div class="store-review-item">';
                                review+='<img class="preload-image" alt="img" src="images/pictures/1t.jpg">';
                                review+='<h1><b>'+value.username+'</b></h1>';
                                review+='<em>';
                                    review+=value.tanggalcomment;
                                review+='</em>';
                                review+='<p>';
                                    review+=value.comment;
                                review+='</p>';
                            review+='</div>';
                        }
                        i++;
                    });
                     if(i>=4){
                            review+='<div class="store-review-item">';
                            review+='<p>... '+i+' Reviews List</p>';
                            review+='</div>';
                     }
                  
                }
                else{
                    review+='<p>Tidak ada review</p>';
                }
                    
                 $('.commentarea').append(review);
                              
            },
            error: function(res){
               console.log(res);
            }

        });
}