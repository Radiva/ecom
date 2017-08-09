function tampilbanner(){
     $.ajax({
           type: "POST",
            url:base_url('client/banner.php?option=1'),
            dataType: "json",
            cache: false,
            crossDomain: true,
            success: function(res){
                var i=0;
                console.log(res);
                var prod = '';
                prod+='';
                $.each(res, function(key,value){
                  prod+='<a href="#" class="swiper-slide store-slider-item">';
                  prod+='<em class="bg-red-dark">'+value.judul+'</em>';
                  prod+='<img class="responsive-image" src="'+base_url(value.gambar)+'" alt="img">';
                  prod+='<h3>'+value.content+'</h3></a>';
                });
                $('.bannershow').prepend(prod);


            },
            error: function(res){
               console.log("gagal");
            }

        });
}