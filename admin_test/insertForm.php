<?php
  include "header.php";
?>


 <?php
            $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if(strpos($fullUrl, "error=not_valid_filename")== true)
            {
                echo ' <div class="alert alert-danger alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    <strong>Upload a valid file</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }
            if(strpos($fullUrl, "error=not_acceptable")== true)
            {
                echo ' <div class="alert alert-danger alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    <strong>Not valid details</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }
            if(strpos($fullUrl, "error=IISN")== true)
            {
                echo ' <div class="alert alert-danger alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    <strong>IISN number not valid !!! </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }
            if(strpos($fullUrl, "ISSN=already_exits")== true)
            {
                echo ' <div class="alert alert-danger alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    <strong>This Book already exits !!! </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }
            


 if (isset($_SESSION['name'])) 
            { 


            echo '<!DOCTYPE html>
            <html>
            <head>
            	<title>Insert Book Detals</title>
            	   <link rel="stylesheet" type="text/css" href="include_style/main.css">
            	
            	<style type="text/css">
            		body
            		{
            			background-color: #e5efe8;

            		}
            		
            	</style>
            </head>
            <body>

            <div class="add_new_center" />
            <form action="insertion.php" method="POST" enctype="multipart/form-data" class="form">
            <center><h1>Insert Book Detals</h1></center>
            <div class="form-group col-lg-12">

            <fieldset class="form-group col-xs-4">
                <label>ISBN</label>
                <input class="form-control"
                  formControlName="minPower"
                  type="text"
                  name="ISSN" 
                  placeholder="ISBN" />

                <fieldset class="form-group col-xs-4">
                <label>Title</label>
                <input class="form-control"
                  formControlName="minPower"
                  type="text"
                  name="title" 
                  placeholder="Title" />
                 
                
                <label>Author</label>
                <input class="form-control"
                  formControlName="minPower"
                  type="text"
                  name="author" 
                  placeholder="Author" />


                 <label>Co-Author</label>
                 <input class="form-control"
                  formControlName="minPower"
                  type="text"
                  name="Co-Author" 
                  id="coaut"
                  placeholder="Write co-author Name Seperate by (,) comma" />

                 <label>Publisher</label>
                   <input class="form-control"
                  formControlName="minPower"
                  type="text"
                  name="Publisher"
                  id="pub"
                  placeholder="Publisher" />
             
             
                <label>Price</label>
                <input class="form-control"
                  formControlName="minPower"
                  type="text"
                  name="price" 
                  id="price_id"
                  placeholder="Price" />

                  <label>Stock</label>
                <input class="form-control"
                  formControlName="minPower"
                  type="text"
                  name="stock" 
                  id="stock"
                  placeholder="Stock" />

                <label>Category</label>
                <input class="form-control"
                  formControlName="minPower"
                  type="text"
                  name="category" 
                  placeholder="Category seperate by ," />


                    <br>
                   <label>Descriptions : Must not be more than 1000 words !!!</label>
                <textarea class="description_style" type="text" style="width:100%;" name="descriptions" ></textarea>
             						
             	<br>
              <br>

                  <label for="formGroupExampleInput">Upload cover page</label>
             	<div class="file-field">
                <div class="btn-primary btn-sm float-left">
                  <input class="btn btn-dark" type="file" name="image">
                </div>
              </div>
               
             	<br><br><br>
              <center><button onclick="return check_null()" class="btn btn-primary btn-lg btn-block" type="submit">Upload Details</button></center>

              </fieldset>
            </div>
            </form>
            <script>
                function check_null() 
                {
                 price = document.getElementById("price_id").value;
                 publisher___ = document.getElementById("pub").value;
                 coaut___ = document.getElementById("coaut").value;
                 stock = document.getElementById("stock").value;


                 var reg = /^\d+$/;
                 if(reg.test(stock))
                 {}else{
                     alert("Check Stock !!! ")
                     return false
                 }
                 if(stock == "0"){
                     alert("Stock Null !!! ")
                     return false
                 }

                     if(reg.test(price))
                     {
                        if(publisher___.length >= 100)
                        {
                            alert("Check the publisher name !!! ")
                            return false
                        }else
                        {
                            if(coaut___.length >= 30)
                            {
                                 alert("Check the Co-Author name !!! ")
                                 return false
                            }
                            return true
                        }
                        return false
                     }else{
                      alert("Check your price again !!! ");
                      return false
                    }
                
                }
                </script>
                
            </div>

           

            </body>
            </html>';

}
else
{
  
   header("Location: login.php?Login_needed");
           exit();

}