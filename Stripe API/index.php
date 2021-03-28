<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Integartion (Stripe)</title>
    <link rel="stylesheet" href="./css/_style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<br/>
   <h3 style="background:transparent;color:white;">Subscription plans for PickMyCourse</h3>
    <br/>
     <div class="row">
        
        <div class="col-md-3">
            <div class="card">
               <div class="card-header"> Basic </div> 
               <div class="card-body">
                    <img src="./Laptops/first.jpg"/>
                    <input type="hidden" name="image_src" id="image_src" value="./Laptops/first.jpg"/>
                    
               </div> 
               <div class="card-footer">
               <span>1 month</span>
                    <span>$19.99 </span>
                    <input type="submit" name="submit" value="check-in" class="buy_now"/>
                    <input type="hidden" name="price"  id="price" value="19.99"/>
                    <input type="hidden" name="item_name" id="item_name" value="Basic"/>   
               </div>   
            </div>
        </div>
        <div class="col-md-3">
          <div class="card">
                    <div class="card-header"> Standard</div> 
                    <div class="card-body">
                         <img src="./Laptops/second.jpg"/>
                         <input type="hidden" name="image_src"  id="image_src" value="./Laptops/second.jpg"/>
                    </div>
                    <div class="card-footer">
                    <span>3 months</span>
                    <span>$29.99 </span>
                    <input type="submit" name="submit" value="check-in" class="buy_now"/>
                    <input type="hidden" name="price" id="price" value="29.99"/>
                    <input type="hidden" name="item_name" id="item_name" value="Standard"/>     
                    </div>    
          </div>
        </div>
        <div class="col-md-3">
            <div class="card">
               <div class="card-header">Best Value</div> 
               <div class="card-body">
                    <img src="./Laptops/fifth.jpg" width="1000" height="1000"/>
                    <input type="hidden" name="image_src" id="image_src" value="./Laptops/fifth.jpg"/>
               </div>    
               <div class="card-footer">
               <span>6 months</span>
                    <span>$39.99 </span>
                    <input type="submit" name="submit" value="check-in" class="buy_now"/>
                    <input type="hidden" name="price"  id="price" value="39.99"/>
                    <input type="hidden" name="item_name" id="item_name" value="Best value"/>  
               </div>
            </div>
        </div>
        <div class="col-md-3">
        <div class="card">
        <div class="card-header">Premium</div> 
               <div class="card-body">
                    <img src="./Laptops/yoga.jpg" width="1000" height="1000"/>
                    <input type="hidden" name="image_src" id="image_src" value="./Laptops/yoga.jpg"/>
               </div> 
               <div class="card-footer">
               <span>1 year</span>
               <span>$100.00 </span>
               <input type="submit" name="submit" value="check-in" class="buy_now"/>
               <input type="hidden" name="price" id="price" value="100.00"/>
               <input type="hidden" name="item_name" id="item_name" value="Premium"/>
               </div> 
            </div>
        </div>
       
        </div>
   </div>
   <script>
        $(document).ready(function(){
           $(".buy_now").on('click',function(e){
                e.preventDefault();
                    var image_src = $(this).closest(".card").find("#image_src").attr("value");
                    var item_name = $(this).closest(".card").find("#item_name").attr("value");
                    var price = $(this).closest(".card").find("#price").attr("value");
                    var dt = '&image='+image_src+'&item_name='+item_name+'&price='+price;
                    var url = 'http://localhost/stripe/checkout.php?'+dt; 
                    
                    $.ajax({
                         url:url,
                         method:'GET',
                         success:function(){
                              window.location.href=url;
                         }
                    });
                   
                    
           });
          
        });
   </script>
</body>
</html>