<?php
session_start();
if(!isset($_SESSION["user"]))
{
    ?>
    <script type="text/javascript">
        window.location="login.php";
    </script>
    <?php
}

include "header.php";
include "connection.php";
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
                            <h2>Search books</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form name="form1" action="" method="POST">
                                <table class="table table-bordered">
                                    <tr>
                                        <td><input type="text"class="form-control" placeholder="Enter books name" name="t1" required></td>
                                        <td> <input type="submit"  name="submit1" value="search books" class="form control btn btn-default"</td>
                                    </tr>
                                </table>
                            </form>
                            <?php
                            if(isset($_POST["submit1"]))
                            {
                                $res=mysqli_query($link,"select * from add_books where books_name like('%$_POST[t1]%')");
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                while($row=mysqli_fetch_array($res))
                                {
                                    echo "<td>";
                                    echo "<br>";
                                    echo "<b>",$row["books_name"],"</b>";
                                    echo " ";
                                    echo "availavle=";
                                    echo "<b>",$row["available_qty"],"</b>";
                                    echo "</td>";
                                }
                                echo "</tr>";
                                echo "</table>";
                            }
                            else
                            {
                                $res=mysqli_query($link,"select * from add_books where available_qty>0");
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                while($row=mysqli_fetch_array($res))
                                {
                                    echo "<td>";
                                    echo "<br>";
                                    echo "<b>",$row["books_name"],"</b>";
                                    echo " ";
                                    echo "availavle=";
                                    echo "<b>",$row["available_qty"],"</b>";
                                    echo "</td>";
                                }
                                echo "</tr>";
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