$(function(){

    updateCartData();


    $(document).on('click', '.addtocart', function () {
        var title = $(this).attr('data-title'), price = $(this).attr('data-price');
        $.post('/sample/ajax-endpoints/addToCart.php', {title: title, price: price}, function (data) {
            if (data.code == 200) {
                updateCartData();
                alert("Item added to cart successfully")
            } else {
                alert("Error adding item to cart");
            }
        })
    })
});

function getCheckoutItems(){
    $.get('/sample/ajax-endpoints/getCartItems.php',function(data){
        var source = $('#tpl-items'), final = '';
        $(data).each(function (i) {
            final += tmpl(source.html(), data[i]);
        });
        $('#items').html(final);
    })
}

function checkOut(){

}

function updateCartData(){
    $.get('/sample/ajax-endpoints/getCartDetails.php',function(data){
        if(data.code == 200){
            $('#items-count').text(data.items + ' items in cart')
        }
    })
}