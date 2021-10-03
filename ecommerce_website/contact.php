<?php
    require "header.php";

if (isset($_SESSION['name'])) 
{
     $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if(strpos($fullUrl, "success=message_sent_succefully")== true)
            {
                echo '<br><div class="alert alert-primary alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    <strong>Message sent succusfully</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }
            else if(strpos($fullUrl, "unsuccess=message_false")== true)
            {
                echo '<br><div class="alert alert-danger alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    <strong>Try again later !! </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }
            else
            {
                //nothing :)
            }

    ?>
    <title>Online Book Store | Contact</title>

<div class="container">
<!--Section: Contact v.2-->
<section class="mb-4">

    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
        a matter of hours to help you.</p>

    <div class="row">

        <!--Grid column-->
        <div class="col-md-9 mb-md-0 mb-5">
            <form id="contact-form" name="contact-form" action="mail_sent.php" method="POST">

                <!--Grid row-->
                <div class="row"> 

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <input type="text" id="subject" name="subject" class="form-control">
                            <label for="subject" class="">Subject</label>
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                            <label for="message">Your message</label>
                        </div>

                    </div>
                </div>
                <!--Grid row-->

            </form>

            <div class="text-center text-md-left">
                <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>
            </div>
            <div class="status"></div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 text-center">
            <ul class="list-unstyled mb-0">
                <li><i class="fas fa-map-marker-alt fa-2x"></i>
                    <p>Chitwan, Pra-Road 4006, Nepal</p>
                </li>

                <li><i class="fas fa-phone mt-4 fa-2x"></i>
                    <p>+977-9840216038</p>
                </li>

                <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                    <p>ecommerce_website@admin.com</p>
                </li>
            </ul>
        </div>
        <!--Grid column-->

    </div>

</section>
<!--Section: Contact v.2-->
</div>
<?php
    require "footer.php";
}
else
{
    echo '<script>window.location.replace("index.php?error=Darling_you_need_to_login");</script>';
    exit();
}
?>