<html>
 <head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--Font awesome CSS-->
<script src="https://use.fontawesome.com/03638eeb4c.js"></script>
<!--JQuery User Interface & other effects
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
 <title>Convert Number to Words in PHP</title>

 </head>

 <body><br><br>

<?php


if (isset($_POST['value'])) {             //1. If a value has been entered into the form the  'post' variable value  will have a value.
                                           // i tested that
    $num = $_POST['value'];


    //echo numberToWords($num);


}




?>

 <div class="container">
 		<div class="row">
 			<div class="col-md-4  ">
              
			 <form class="form-group" method="post">      <!--A form to enter a value to be transformed -->

			 <input type="text" name="value" class="form-control" placeholder="Enter Your Numbers" ><br>
			 
                 <input type="submit" value="Convert Number" name="convert" class="btn btn-info">
             </form>
            </div>
            <div class="col-md-6">
                <table class="table table-stripped">  <!--A table to display a number and its corresponding words form.-->
                    <tr class="active">
                        <td>Number</td>
                        <td>Number in Words</td>
                    </tr>
                    <?php
                    if(isset($num)){ //.If a number is entered in the input the table data is displayed. This ensures that.



                        ?>
                        <tr>
                            <td><?php echo $num; ?></td> <!-- This displays the number being transformed-->
                            <td><?php
                                include 'function.php';   //The file to process the number is included in this form.
                                echo numberToWords($num);//The function to display the word form of the number is called here
                                ?></td>
                        </tr>


                   <?php } ?>





                </table>


            </div>

        </div>
 </div>


 </body>
</html>