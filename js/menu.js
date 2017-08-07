function menu(){
    $.ajax({
        url:"menu.html",
        success:function(result){
            $('.sidebars').prepend(result);
        }
    })   
}
