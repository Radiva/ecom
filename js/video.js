function tampilvideo(){
     $.ajax({
           type: "POST",
            url:base_url('client/video.php?option=1'),
            dataType: "json",
            cache: false,
            crossDomain: true,
            success: function(res){
                console.log(res);
                var prod = '';
                prod+='';
                $.each(res, function(key,value){
                  prod+='<div class="one-half-responsive">';
                  prod+='<h3>'+value.title+'</h3>';
                  prod+='<p>lala</p>';
                  prod+='<div class="responsive-video full-bottom">';
                  prod+='<embed src="'+base_url(value.video)+'" /></div></div>';
                });
                $('.content').prepend(prod);
            },
            error: function(res){
               console.log("gagal");
            }

        });
}