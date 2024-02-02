
$(document).ready(function(){
    //Increment btn

   $("#increment-btn").click(function(){
        var qty = $(".qty-input").val();
        var value = Number(qty);
        value = isNaN(value) ? 0 : value;
        if(value <10){
        value++;
        $(".qty-input").val(value);
        }
        
    })
    
    //Decrement btn
    $("#decrement-btn").click(function(){
        var qty = $(".qty-input").val();
        var value = Number(qty);
        value = isNaN(value) ? 0 : value;
        if(value > 1){
         value--;
         $(".qty-input").val(value);
        }
    })
    
    

    // Add to cart
    $('.add2cart').click(function(){
        cartCount();
    })
       cartCount();
        function cartCount(){

            $.ajax({
                type: "GET",
                url: "process/process_cart.php",
                data: {cartItem: "cart_item"},
                success: function(response){
                    $('#cart_num').html(response)
                }
            })
        };
    
        //Qty update
       $(".qty-input").on("change", function(){
        var $prodQty = $(this).closest(".product-data");
        var prod_id = $prodQty.find(".prod_id").val();
        var prod_qty = $prodQty.find(".qty-input").val();
        var prod_amt = $prodQty.find(".prod_amt").val();
            location.reload(true);
        $.ajax({
            type: "POST",
            url: "process/cartqty_process.php",
            data: {
                prod_qty: prod_qty,     
                prod_amt: prod_amt,
                prod_id: prod_id
            },
            success: function(response){
                console.log(response);
                if (response.success) {
                    $qty.find(".total-amount").text("&#8358;" + response.message);
                }
            },
            cache: false
        });
    });
   
    
});

