jQuery(document).ready(function() {
    // $data = getSession();
    generatenota('willy');
    invoice('willy');
});

function generatenota(username){
    $.ajax({
       type: "POST",
        url:base_url('client/penjualan.php?option=1'),
        dataType: "json",
        cache: false,
        crossDomain: true,
        data:"username="+username,
        success: function(res){
            console.log(res);
         },
        error: function(res){
           console.log("gagal");
        }
    });
}

function invoice(username){
      
    $.ajax({
        type: "POST",
        data:"username="+username,
        url:base_url('client/penjualan.php?option=2'),
        dataType: "json",
        cache: false,
        crossDomain: true,
        success: function(res){
            console.log(res);
            var invoice = '';

            invoice+='<h4>History Orders</h4>';

            $.each(res, function(key,value){
                invoice+='<div class="toggle store-history-toggle">';
                    invoice+='<a href="#" class="toggle-title"><strong class="bg-green-dark">'+value.notapemesanan+'</strong>'+value.waktupembelian+'<i class="ion-android-add"></i></a>';
                    invoice+='<div class="toggle-content">';
                        $.each(value.detailpenjualan, function(key,detail){
                        invoice+='<div class="store-history-item">';
                            invoice+='<a href="#">';
                                invoice+='<img data-original="images/pictures/1t.jpg" alt="img" class="preload-image" src="images/empty.png">';
                            invoice+='</a>';
                            invoice+='<h1>'+detail.namabarang+'</h1>';
                            invoice+='<h2>Kategori: '+detail.namakategori+'</h2>';
                            invoice+='<h2>Brand: '+detail.namabrand+'</h2>';
                            invoice+='<h3 class="color-green-dark">Status: Delivered</h3>';
                            invoice+='<h4>Quantity: '+detail.jumlah+' Pieces</h4>';
                            invoice+='<h6>@ Rp. '+Number(detail.hargajual).toLocaleString("id")+'</h6>';
                        invoice+='</div>';
                        });
                        invoice+='<div class="cart-costs">';
                            invoice+='<h4>Delivery Details</h4>';
                            invoice+='<h5><strong>Nota pemesanan</strong><em>'+value.notapemesanan+'</em></h5>';
                            invoice+='<h5><strong>Status</strong><em>Delivered</em></h5>';
                            invoice+='<h5><strong>Harga</strong><em>Rp. '+Number(value.totalharga).toLocaleString("id")+'</em></h5>';
                            invoice+='<h5><strong>Discount</strong><em class="color-green-dark">'+value.diskon+'</em></h5>';
                            invoice+='<h6><strong>Grand Total</strong><em>Rp. '+Number(value.totalharga-value.diskon).toLocaleString("id")+'</em></h6>';
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