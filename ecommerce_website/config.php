<?php

require('stripe-php-master/init.php');

$publishablekey = "pk_test_A3YuRIChnUnc91Lqbqwfj0BK00pIhueClo";
$secretkey = "sk_test_8e0DhqD0mQ2eNNpxE1ss4qnZ00jQAZ6DDo";

\Stripe\Stripe::setApiKey($secretkey);





?>