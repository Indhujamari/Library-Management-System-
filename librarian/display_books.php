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
                    <h3></h3>
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
                            <h2>Display books</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form name="form1" action="" method="post">
                                <input type=text" name="t1" class="form-control" placeholder="Enter the book name">
                                <input type="submit" name="submit1" value="search books" class="btn btn-default">


                            </form>
                            <?php
                            if(isset($_POST['submit1']))
                            {
                                $res = mysqli_query($link, "select * from add_books where books_name like('$_POST[t1]')");
                                echo "<table class='table table_-bordered'>";
                                echo "<tr>";
                                echo "<th>";
                                echo "Books name";
                                echo "</th>";
                                echo "<th>";
                                echo "Author name";
                                echo "</th>";
                                echo "<th>";
                                echo "Publication name";
                                echo "</th>";
                                echo "<th>";
                                echo "Purchase date";
                                echo "</th>";
                                echo "<th>";
                                echo "Books price";
                                echo "</th>";
                                echo "<th>";
                                echo "Books quantity";
                                echo "</th>";
                                echo "<th>";
                                echo "Available quantity";
                                echo "</th>";
                                echo "<th>";
                                echo "Username";
                                echo "</th>";
                                echo "</tr>";
                                while ($row = mysqli_fetch_array($res)) {
                                    echo "<tr>";
                                    echo "<td>";
                                    echo $row["books_name"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["books_author_name"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["books_publication_name"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["book_purchase_date"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["books_price"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["booksqty"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["available_qty"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["librarian_username"];
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                            }
                            else {
                                $res = mysqli_query($link, "select * from add_books");
                                echo "<table class='table table_-bordered'>";
                                echo "<tr>";
                                echo "<th>";
                                echo "Books name";
                                echo "</th>";
                                echo "<th>";
                                echo "Author name";
                                echo "</th>";
                                echo "<th>";
                                echo "Publication name";
                                echo "</th>";
                                echo "<th>";
                                echo "Purchase date";
                                echo "</th>";
                                echo "<th>";
                                echo "Books price";
                                echo "</th>";
                                echo "<th>";
                                echo "Books quantity";
                                echo "</th>";
                                echo "<th>";
                                echo "Available quantity";
                                echo "</th>";
                                echo "<th>";
                                echo "Username";
                                echo "</th>";
                                echo "</tr>";
                                while ($row = mysqli_fetch_array($res)) {
                                    echo "<tr>";
                                    echo "<td>";
                                    echo $row["books_name"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["books_author_name"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["books_publication_name"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["book_purchase_date"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["books_price"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["booksqty"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["available_qty"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["librarian_username"];
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
<?php
include "footer.php";
?>