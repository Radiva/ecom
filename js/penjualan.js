.jQuery(document).ready(function() {
    invoice();
});

function generatenota(){
    $.ajax({
       type: "POST",
        url:base_url('client/penjualan.php?option=5'),
        dataType: "json",
        cache: false,
        crossDomain: true,
        data:"notapemesanan="+notapemesanan,
        success: function(res){
            console.log(res);
         },
        error: function(res){
           console.log("gagal");
        }
}

function invoice(notapemesanan){
      
    $.ajax({
       type: "POST",
        url:base_url('client/penjualan.php?option=5'),
        dataType: "json",
        cache: false,
        crossDomain: true,
        data:"notapemesanan="+notapemesanan,
        success: function(res){
            console.log(res);
            var invoice = '';

            invoice+='<h4>History Orders</h4>';

            $.each(res, function(key,value){
                invoice+='<div class="toggle store-history-toggle">';
                    invoice+='<a href="#" class="toggle-title"><strong class="bg-green-dark">Order ID: 1</strong>January 1, 2025<i class="ion-android-add"></i></a>';
                    invoice+='<div class="toggle-content">';
                        invoice+='<div class="store-history-item">';
                            invoice+='<a href="#">';
                                invoice+='<img data-original="images/pictures/1t.jpg" alt="img" class="preload-image" src="images/empty.png">';
                            invoice+='</a>';
                            invoice+='<h1>ProMobile</h1>';
                            invoice+='<h2>Mobile andTablet Template</h2>';
                            invoice+='<h3 class="color-green-dark">Status: Delivered</h3>';
                            invoice+='<h4>Quantity: 12 Pieces</h4>';
                            invoice+='<h6>11.00 / item</h6>';
                        invoice+='</div>';
                        
                        invoice+='<div class="cart-costs">';
                            invoice+='<h4>Delivery Details</h4>';
                            invoice+='<h5><strong>Unique ID</strong><em>#312312</em></h5>';
                            invoice+='<h5><strong>Status</strong><em>Delivered</em></h5>';
                            invoice+='<h5><strong>Taxes</strong><em>$40.00</em></h5>';
                            invoice+='<h5><strong>Discount</strong><em class="color-green-dark">$10.00</em></h5>';
                            invoice+='<h6><strong>Grand Total</strong><em>$90.00</em></h6>';
                            invoice+='<div class="clear"></div>';
                        invoice+='</div>';
                    invoice+='</div>';
                invoice+='</div>';
            });
            $('.invoice-content').append(invoice);
        },
        error: function(res){
           console.log("gagal");
        }
        
    });
    
}