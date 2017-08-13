function insertreview(){

  $('#reviewForm').submit(function(event) {
      event.preventDefault();
      var id = window.localStorage.getItem('idbarang');
      var username = window.localStorage.getItem('username');
      var comment = $('input[name="comment"]').val();

      var Data = {
          idbarang:id,
          username:username,
          comment:comment
      };

       $.ajax({
           type: "POST",
            url:base_url('client/product.php?option=0'),
            dataType: "json",
            data:Data,
            cache: false,
            crossDomain: true,
            success: function(res){
                console.log(res);
            },
            error: function(res){
               console.log(res);
            }

        });
  });
   
}

function tampilreview(){
   var id = window.localStorage.getItem('idbarang');
     $.ajax({
           type: "POST",
            url:base_url('client/product.php?option=1'),
            dataType: "json",
            data:'idbarang='+id
            cache: false,
            crossDomain: true,
            success: function(res){
                console.log(res);
                var review = '';
                if(res!=false){
                  $.each(res, function(key,value){
                    review+='<div class="store-review-item">';
                            review+='<img class="preload-image" data-original="images/pictures/1t.jpg" alt="img" src="images/empty.png">';
                            review+='<h1>usernameone</h1>';
                            review+='<em>';
                                review+='<i class="ion-ios-star"></i>';
                                review+='<i class="ion-ios-star"></i>';
                                review+='<i class="ion-ios-star"></i>';
                                review+='<i class="ion-ios-star"></i>';
                                review+='<i class="ion-ios-star"></i>';
                            review+='</em>';
                            review+='<u>08 August 2024</u>';
                            review+='<strong>Excellent</strong>';
                            review+='<p>';
                                review+='The usefulness of Enabled templates is unmatched. I personally find the value to be many, many times the purchase price. There is no question this is one of the top tier development houses on CodeCanyon.';
                            review+='</p>';
                        review+='</div>';
                    });
                }
                else{
                    review+='<p>Tidak ada riview</p>';
                }
                $('#page-content-scroll').append(review);
                              
            },
            error: function(res){
               console.log(res);
            }

        });
}

function reviewform(){
  var review = '';
      review+='<form id="contactForm reviewForm">';
          review+='<div class="formTextareaWrap">';
          review+='<textarea name="comment" class="contactTextarea requiredField" placeholder="Comment" id="contactMessageTextarea"></textarea>';
          review+='</div>';
          review+='<div class="formSubmitButtonErrorsWrap contactFormButton">';
          review+='<input type="submit" class="buttonWrap button button-green contactSubmitButton" id="contactSubmitButton" value="Send Message" data-formId="contactForm"/>';
          review+='</div>';
      review+='</form>';
      $('#page-content-scroll').append(review);
                              
}