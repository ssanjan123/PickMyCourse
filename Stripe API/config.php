<?php
    require_once "stripe-php-master/init.php";

    $stripeDetails = array(
        "secretKey" => "sk_test_51IXe6KE4tXpskHvCV3jqG2xyq0gV16DLetaT1QhDA7OWCouRkH3LU4jrNL2sOm4UuEQLobHc5O5c00quYloz137N00nwlLjVhb",
        "publishableKey" => "pk_test_51IXe6KE4tXpskHvCoqBYTzvfm3hnVT6Wxl3d35hZIXqcgnNMZQxtCcQv2nfOQYKIIfzA01yMYNeMgn7JhC4xiEHR00497laaNh"
    );

    \Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);
?>