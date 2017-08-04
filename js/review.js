function setIdProduct(id) {
  window.localStorage.setItem('product', id);
}

function tampilreview(){
   var id = window.localStorage.getItem('product');
     $.ajax({
           type: "POST",
            url:base_url('client/product.php?fnc=3&id='+id),
            dataType: "json",
            cache: false,
            crossDomain: true,
            success: function(res){
                var i=0;
                console.log(res);
                var prod = '';
                prod+='';
                $.each(res, function(key,value){
                  prod+='<div class="store-review-item">';
                  prod+='<img class="preload-image" data-original="images/pictures/1t.jpg" alt="img" src="images/empty.png">';
                  prod+='<h1>usernameone</h1><em><i class="ion-ios-star"></i><i class="ion-ios-star"></i><i class="ion-ios-star"></i><i class="ion-ios-star"></i><i class="ion-ios-star"></i></em>';
                  prod+='<u>08 August 2024</u><strong>Excellent</strong><p>The usefulness of Enabled templates is unmatched. I personally find the value to be many,</p>';
                  prod+='</div><div class="decoration"></div>';
                });
                $('.tampilkan').append(prod);


            },
            error: function(res){
               console.log("gagal");
            }

        });
}

// function tampilproductbybrand(){
//     var id = window.localStorage.getItem('brand');
//      $.ajax({
//            type: "POST",
//             url:base_url('client/product.php?fnc=2&id='+id),
//             dataType: "json",
//             cache: false,
//             crossDomain: true,
//             success: function(res){
//                 var i=0;
//                 console.log(res);
//                 var prod = '';
//                 prod+='';
//                 $.each(res, function(key,value){
//                   prod+='<div class="cart-item">';
//                   prod+='<img data-original='+base_url(value.gambar)+' alt="img" class="preload-image" src="images/empty.png">';
//                   prod+='<h1>'+value.namabarang+'</h1>';
//                   prod+='<h2>Rp.'+value.harga+'</h2>';
//                   prod+='<h3>'+value.deskripsi+'</h3>';
//                   prod+='</div>';
//                 });
//                 //console.log(prod);
//                 $('#lalala').prepend(prod);
//                 // alert("aaaa");
//             },
//             error: function(res){
//                console.log("gagal");
//             }

//         });
// }