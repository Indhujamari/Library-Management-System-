<?php
session_start();
if(!isset($_SESSION["librarian"]))
{
    ?>
    <script type="text/javascript">
        window.location="login.php";
    </script>
    <?php
}
include "connection.php";
include "header.php";
?>
    <!-- page content area main -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="row" style="min-height:500px">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>All books info</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form name="form1" action="" method="POST" class="col-lg-6" enctype="multipart/form-data">
                            <table class="table table-bordered">
                                <tr>

                                    <td><input type="text"class="form-control" placeholder="books_name" name="books_name" required></td>
                                </tr>
                                <tr>
                                    <td><input type="text"class="form-control" placeholder="Books_author name" name="books_author_name"required"></td>
                                </tr>
                                <tr>
                                    <td><input type="text"class="form-control" placeholder="Books_publication name" name="books_publication_name"required"></td>
                                </tr>
                                <tr>
                                    <td><input type="text"class="form-control" placeholder="Books_purchase_date" name="book_purchase_date" required"></td>
                                </tr>
                                <tr>
                                    <td><input type="text"class="form-control" placeholder="Books_price" name="books_price" required"></td>
                                </tr>
                                <tr>
                                    <td><input type="text"class="form-control" placeholder="Books_quantity" name="booksqty" required"></td>
                                </tr>
                                <tr>
                                    <td><input type="text"class="form-control" placeholder="Available_quantity" name="available_qty" required"></td>
                                </tr>
                                <tr>
                                    <td><input type="text"class="form-control" placeholder="Username" name="librarian_username" required"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="submit" name="submit1" class="btn btn-default submit" value="Insert book details" color="white">
                                    </td>
                                </tr>

                            </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
<?php
if(isset($_POST["submit1"]))
{
    mysqli_query($link,"insert into add_books values('','$_POST[books_name]','$_POST[books_author_name]','$_POST[books_publication_name]','$_POST[book_purchase_date]','$_POST[books_price]','$_POST[booksqty]','$_POST[available_qty]','$_POST[librarian_username]')");
    ?>
    <script type="text/javascript">
        alert("Books inserted successfully");
    </script>
    <?php

}
?>
<?php
include "footer.php";
?>