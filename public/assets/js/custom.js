
//count the cart data
$(document).ready(function () { 
    cartload();
    wishlistload();
}); 
/*
function cartload()
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/load-cart-data',
            method: "GET",
            success: function (response) {
                $('.basket-item-count').html('');
                var parsed = jQuery.parseJSON(response)
                var value = parsed; //Single Data Viewing
                $('.basket-item-count').append($('<span class="badge bg-secondary">'+ value['totalcart'] +'</span>'));
            }
        });
    }*/

//cart count update in nav bar 
function cartload()
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "GET",
            url: '/load-cart-data',
           
            success: function (response) {
             //  console.log(response.count) 
                 $('.cart-count').html('');
                 $('.cart-count').html(response.count);
            }
        });
    }

//quantity
 $(document).ready(function () {

       $('.increment-btn').click(function(e){
              e.preventDefault();
              var qty=$(this).closest('.product-data').find('.input-qty').val();
             var value = parseInt(qty,10);
              value = isNaN(value) ? 0 : value;
              if(value<10){
                     value++;
                     $(this).closest('.product-data').find('.input-qty').val(value);
              }
              
        });

        $('.decrement-btn').click(function(e){
              e.preventDefault();
             
              var qty=$(this).closest('.product-data').find('.input-qty').val();
             var value = parseInt(qty,10);
              value = isNaN(value) ? 0 : value;
              if(value>1){
                     value--;
                     $(this).closest('.product-data').find('.input-qty').val(value);
              }
              
        });



 });

//Cart table model use this
$(document).ready(function () {
    $('.add-to-cart-btn').click(function (e) {
        e.preventDefault();

        var post_id = $(this).closest('.product-data').find('.product_id').val();
        var qty = $(this).closest('.product-data').find('.input-qty').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/add-to-cart",
            method: "POST",
            data: {
                'qty': qty,
                'post_id': post_id,
            },
            
            success: function (response) {
                alertify.set('notifier','position','top-right');
                alertify.success(response.status);
                cartload();
            },
        });
    });

});

//delete cart data
$(document).ready(function () {

    $('.delete_cart_data').click(function (e) {
        e.preventDefault();
         var thisDeletearea = $(this);
        var post_id = $(this).closest('.cartpage').find('.product_id').val();

        var data = {
            '_token': $('input[name=_token]').val(),
            "post_id": post_id,
        };

        // $(this).closest(".cartpage").remove();

        $.ajax({
            url: '/delete-from-cart',
            type: 'DELETE',
            data: data,
            success: function (response) {
               window.location.reload();
               thisDeletearea.closest('.cartpage').remove();
               $('#totalajexcall').load(location.href + ' .totalpricingload');
                alertify.set('notifier','position','top-right');
                alertify.success(response.status);
                cartload();
            }
        });
    });
});

//Update quantity in the cart and total
$(document).ready(function () {

    $('.changeQuantity').click(function (e) {
        e.preventDefault();

        var thisClick = $(this);//without reload page increaese the qty will be increment
        var qty = $(this).closest('.cartpage').find('.input-qty').val();
        var post_id = $(this).closest('.cartpage').find('.product_id').val();

        var data = {
            '_token': $('input[name=_token]').val(),
            'qty':qty,
            'post_id':post_id,
        };

        $.ajax({
            url: '/update-to-cart',
            type: 'POST',
            data: data,
            success: function (response) {
                window.location.reload();
            //   console.log(response.gtprice);
             thisClick.closest('.cartpage').find('.cart-grand-total-price').text(response.gtprice);
             $('#totalajexcall').load(location.href + ' .totalpricingload');
                alertify.set('notifier','position','top-right');
                alertify.success(response.status);
            }
        });
    });

});


//clear cart
$(document).ready(function () {

    $('.clear_cart').click(function (e) {
        e.preventDefault();

        $.ajax({
            url: '/clear-cart',
            type: 'GET',
            success: function (response) {
                window.location.reload();
                alertify.set('notifier','position','top-right');
                alertify.success(response.status);
                cartload();
            }
        });

    });

});




/*
//count the cart data
$(document).ready(function () {
    $('.increment-btn').click(function (e) {
        e.preventDefault();
        var incre_value = $(this).parents('.quantity').find('.input-qty').val();
        var value = parseInt(incre_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value<10){
            value++;
            $(this).parents('.quantity').find('.input-qty').val(value);
        }
    });

    $('.decrement-btn').click(function (e) {
        e.preventDefault();
        var decre_value = $(this).parents('.quantity').find('.input-qty').val();
        var value = parseInt(decre_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value>1){
            value--;
            $(this).parents('.quantity').find('.input-qty').val(value);
        }
    });

    cartload();

});

function cartload()
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/load-cart-data',
            method: "GET",
            success: function (response) {
                $('.basket-item-count').html('');
                var parsed = jQuery.parseJSON(response)
                var value = parsed; //Single Data Viewing
                $('.basket-item-count').append($('<span class="badge bg-secondary">'+ value['totalcart'] +'</span>'));
            }
        });
    }



//Add to cart
$(document).ready(function () {
    $('.add-to-cart-btn').click(function (e) {
        e.preventDefault();

       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var post_id = $(this).closest('.product-data').find('.product_id').val();
        var qty = $(this).closest('.product-data').find('.input-qty').val();
     // alert(post_id);
       $.ajax({
            url: "/add-to-cart",
            method: "POST",
            data: {
                'qty': qty,
                'post_id': post_id,
            },
            success: function (response) {
                alertify.set('notifier','position','top-right');
              alertify.success(response.status);
              cartload();
            
            },
        });
    });
});
*/


 //update card function
/*
 $(document).ready(function () {

    $('.changeQuantity').click(function (e) {
        e.preventDefault();

        var thisClick = $(this);//without reload page increaese the qty
        var qty = $(this).closest(".cartpage").find('.input-qty').val();
        var post_id = $(this).closest(".cartpage").find('.product_id').val();

        var data = {
            '_token': $('input[name=_token]').val(),
            'qty':qty,
            'post_id':post_id,
        };

        $.ajax({
            url: '/update-to-cart',
            type: 'POST',
            data: data,
            success: function (response) {
               // window.location.reload();
            //   console.log(response.gtprice);
             thisClick.closest(".cartpage").find('.cart-grand-total-price').text(response.gtprice);
             $('#totalajexcall').load(location.href + ' .totalpricingload');
                alertify.set('notifier','position','top-right');
                alertify.success(response.status);
            }
        });
    });

});


// Delete Cart Data
$(document).ready(function () {

    $('.delete_cart_data').click(function (e) {
        e.preventDefault();
         var thisDeletearea = $(this);
        var post_id = $(this).closest(".cartpage").find('.product_id').val();

        var data = {
            '_token': $('input[name=_token]').val(),
            "post_id": post_id,
        };

        // $(this).closest(".cartpage").remove();

        $.ajax({
            url: '/delete-from-cart',
            type: 'DELETE',
            data: data,
            success: function (response) {
               // window.location.reload();
               thisDeletearea.closest(".cartpage").remove();
               $('#totalajexcall').load(location.href + ' .totalpricingload');
                alertify.set('notifier','position','top-right');
                alertify.success(response.status);
            }
        });
    });
});

// Clear Cart Data
$(document).ready(function () {

    $('.clear_cart').click(function (e) {
        e.preventDefault();

        $.ajax({
            url: '/clear-cart',
            type: 'GET',
            success: function (response) {
                window.location.reload();
                alertify.set('notifier','position','top-right');
                alertify.success(response.status);
            }
        });

    });

});
*/

//wishlist load in nav bar
function wishlistload()
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "GET",
            url: '/load-wishlist-data',
           
            success: function (response) {
             //  console.log(response.count) 
                 $('.wishlist-count').html('');
                 $('.wishlist-count').html(response.count);
            }
        });
    }

   //Add to wishlist 
    $(document).ready(function () {
        $('.addToWishlist').click(function (e) {
            e.preventDefault();
           
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            var post_id = $(this).closest('.product-data').find('.product_id').val();
           // alert(post_id)
            $.ajax({
                url: "/add-to-wishlist",
                method: "POST",
                data: {
                    
                    'post_id': post_id,
                },
                
                success: function (response) {
                    window.location.reload();
                    alertify.set('notifier','position','top-right');
                    alertify.success(response.status);
                    wishlistload();
                },
            });
        });
    
    });

  //delete wishlist  
  /*  $(document).ready(function () {

        $('.delete_wishlist_data').click(function (e) {
            e.preventDefault();
              $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

             var thisDeletearea = $(this);
            var post_id = $(thisDeletearea).closest('.product-data').find('.product_id').val();
    
            var data = {
                '_token': $('input[name=_token]').val(),
                "post_id": post_id,
            };
    
            // $(this).closest(".cartpage").remove();
    
            $.ajax({
                url: '/delete-from-wishlist',
                type: 'DELETE',
                data: data,
                success: function (response) {
                   // window.location.reload();
                   thisDeletearea.closest('.product-data').remove();
                   $('#totalajexcall').load(location.href + ' .totalpricingload');
                    alertify.set('notifier','position','top-right');
                    alertify.success(response.status);
                }
            });
        });
    });*/


    
    $(document).ready(function () {

        $('.delete_wishlist_data').click(function (e) {
            e.preventDefault();
              $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var Clickedthis = $(this);
            var wishlist_id = $(Clickedthis).closest('.wishlist-content').find('.wishlist_id').val();
            //alert(wishlist_id)
            $.ajax({
                url: '/delete-from-wishlist',
                type: 'POST',
            data: {
               'wishlist_id' :wishlist_id,
            },
                
                success: function (response) {
                   window.location.reload();
                   thisDeletearea.closest('.product-data').remove();
                   $('#totalajexcall').load(location.href + ' .totalpricingload');
                    alertify.set('notifier','position','top-right');
                    alertify.success(response.status);
                    wishlistload();
                }
            });
        });
    });

//clear wishlist
    $(document).ready(function () {

        $('.clear_wishlist').click(function (e) {
            e.preventDefault();
    
            $.ajax({
                url: '/clear-wishlist',
                type: 'GET',
                success: function (response) {
                    window.location.reload();
                    alertify.set('notifier','position','top-right');
                    alertify.success(response.status);
                    wishlistload();
                }
            });
    
        });
    
    });