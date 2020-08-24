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
                            <h2>Return books</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form name="form1" action="" method="POST">
                                <table class="table table-bordered">
                                    <tr>
                                        <td><select name="enr" class="form-control">
                                                <?php
                                                $res=mysqli_query($link,"select s_enrollment from issue_books where books_return_date=''");
                                                while($row=mysqli_fetch_array($res))
                                                {
                                                    echo "<option>";
                                                    echo $row["s_enrollment"];
                                                    echo "</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="submit" name="submit1" class="form-control" value="search">
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <?php
                            if(isset($_POST["submit1"]))
                            {
                                $res=mysqli_query($link,"select * from issue_books where s_enrollment='$_POST[enr]'");
                                echo "<table class='table table-bordered'>";
                                echo "<tr>";
                                echo "<th>"; echo "Student_enrollment"; echo "</th>";
                                echo "<th>"; echo "Student_name"; echo "</th>";
                                echo "<th>"; echo "Student_sem"; echo "</th>";
                                echo "<th>"; echo "Student_contact"; echo "</th>";
                                echo "<th>"; echo "Student_email"; echo "</th>";
                                echo "<th>"; echo "Books_name"; echo "</th>";
                                echo "<th>"; echo "Books_issue_date"; echo "</th>";
                                echo "<th>"; echo "Books_return_date"; echo "</th>";
                                echo "</tr>";

                                while($row=mysqli_fetch_array($res))
                                {
                                    echo "<tr>";
                                    echo"<td>"; echo $row["s_enrollment"]; echo"</td>";
                                    echo"<td>"; echo $row["s_name"]; echo"</td>";
                                    echo"<td>"; echo $row["s_sem"]; echo"</td>";
                                    echo"<td>"; echo $row["s_contact"]; echo"</td>";
                                    echo"<td>"; echo $row["s_email"]; echo"</td>";
                                    echo"<td>"; echo $row["books_name"]; echo"</td>";
                                    echo"<td>"; echo $row["books_issue_date"]; echo"</td>";
                                    echo"<td>"; ?> <a href="return.php?id=<?php echo $row["id"];?>">Return Books</a> <?php echo "</td>";
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
?><?php
