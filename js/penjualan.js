.jQuery(document).ready(function() {
    invoice();
});
function invoice(){
      
    $.ajax({
       type: "POST",
        url:base_url('client/penjualan.php?option=1'),
        dataType: "json",
        cache: false,
        crossDomain: true,
        success: function(res){
            console.log(res);
            var invoice = '';
            $.each(res, function(key,value){
                  invoice+='<div class="page-invoice">';
                        invoice+='<div class="invoice-body full-bottom">';
                            invoice+='<h4 class="invoice-header">';
                            invoice+='<strong class="color-green-dark">';
                            invoice+='<i class="ion-checkmark"></i>Approved</strong>';
                            invoice+='15 August 2024';
                            invoice+='</h4>';
                            invoice+='<div class="decoration"></div>';
                            invoice+='<div class="invoice-title">';
                                invoice+='<h1>Invoice</h1>';
                                invoice+='<em>ENAB-3413</em>';
                                invoice+='<strong>15 Aug 2024</strong>';
                            invoice+='</div>';
                            invoice+='<div class="invoice-logo">';
                                invoice+='<a href="#">';
                                    invoice+='<img data-original="images/preload-logo.png" class="preload-image responsive-image" src="images/empty.png">';
                                invoice+='</a>';
                            invoice+='</div>';
                            invoice+='<div class="clear"></div>';
                        invoice+='</div>';
                        invoice+='<div class="decoration half-bottom"></div>';
                        invoice+='<div class="invoice-item">';
                            invoice+='<h1>ProMobile</h1>';
                            invoice+='<h2>1 x $15.00 + Tax</h2>';
                            invoice+='<h3>$15.00</h3>';
                        invoice+='</div>';
                        invoice+='<div class="invoice-total">';
                            invoice+='<h1 class="color-blue-dark">Subtotal</h1>';
                            invoice+='<h2 class="color-blue-dark">$60.00</h2>';
                        invoice+='</div>';
                        invoice+='<div class="decoration half-bottom"></div>';
                        invoice+='<div class="invoice-total">';
                            invoice+='<h3>Grand Total</h3>';
                            invoice+='<h4 class="color-green-dark">$100.00</h4>';
                        invoice+='</div>';
                    invoice+='</div>';
                    invoice+='<div class="decoration"></div>';
                    invoice+='<div class="one-half">';
                        invoice+='<a href="#" class="button button-icon button-full bg-green-dark bold uppercase no-bottom"><i class="ion-document"></i>Save</a>';
                    invoice+='</div>';
                    invoice+='<div class="clear"></div>';
            });
            $('.invoice-content').append(invoice);
        },
        error: function(res){
           console.log("gagal");
        }
        
    });
    
}