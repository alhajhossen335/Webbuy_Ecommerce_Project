// Homepage
// To fixed the top
// var header = document.getElementById("myHeader");

// window.onscroll = function() {
//     if (window.pageYOffset > header.offsetTop) {
//         header.classList.add("fixed");
//     } else {
//         header.classList.remove("fixed");
//     }
// } 


// Control Product Quantity
function increase()
{
    var quantity = document.getElementById("quantity").value;
    quantity++;
    document.getElementById("quantity").value = quantity;
    
}
function decrease()
{
    var quantity = document.getElementById("quantity").value;
    quantity--;
    if(quantity == 0)
    {
        document.getElementById("quantity").value = "1";
    }
    else
    {
        document.getElementById("quantity").value = quantity;
    }
}

// Cart Management
function manage_cart(product_id,type)
{
    if(type=='update')
    {
        var quantity=$("#"+product_id+"quantity").val();
    }
    else
    {
        var quantity=$("#quantity").val();
    }
    $.ajax({
        url:'manage-cart.php',
        method:'post',
        data:'product_id='+product_id+'&quantity='+quantity+'&type='+type,
        success:function(result){
            
            if(type=='update' || type=='remove')
            {
                window.location.href=window.location.href;
            }
        
            $('#cart-item-numbers').html(result);
                
        }	
    });	
}