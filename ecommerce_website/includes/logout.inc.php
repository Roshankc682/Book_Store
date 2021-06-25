<?php

session_start();
session_unset();
session_destroy();
header("Location: /ecommerce_website/index.php?succesfully_logout=true");

?>