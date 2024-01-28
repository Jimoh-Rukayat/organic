$(document).ready(function(){
    $(".increment-btn").click(function(){
        var qty = $(".qty-input").val();
        //var totalPrice = 0;
        var value = Number(qty);
        value = isNaN(value) ? 0 : value;
        if(value <10){
            value++;
            $(".qty-input").val(value);
        }
        // totalPrice += ".unit-price" * ".qty-input";
    })

    $(".decrement-btn").click(function(){
        var qty = $(".qty-input").val();
        var value = Number(qty);
        value = isNaN(value) ? 0 : value;
        if(value > 1){
            value--;
            $(".qty-input").val(value);
        }
    })

    $(".add2cart").click(function(){

    })
    $(document).on('click', 'delete-item' ,function(){
        var cart_id = $(this).val();

        $.ajax({
            method: "post",
            url: ""
        })
    })
})

