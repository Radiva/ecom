function displaypopularproduct(){
      
    $.ajax({
       type: "POST",
        url:base_url('client/penjualan.php?option=1'),
        dataType: "json",
        cache: false,
        crossDomain: true,
        success: function(res){
            console.log(res);
            $.each(res, function(key,value){
                  
            });
        },
        error: function(res){
           console.log("gagal");
        }
        
    });
    
}