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
                            <h2>Issue books</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form name="form1" action="" method="POST">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>
                                            <select name="enr" class="form-control selectpicker">
                                                <?php
                                                $res=mysqli_query($link,"select enrollment from student_registration");
                                                while($row=mysqli_fetch_array($res))
                                                {
                                                    echo "<option>";
                                                    echo $row["enrollment"];
                                                    echo"</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="submit" value="search" name="submit1" class="form control btn btn-default"
                                        </td>
                                    </tr>
                                </table>
                                <?php
                                if(isset($_POST["submit1"]))
                                {
                                    $res5=mysqli_query($link,"select * from student_registration where enrollment='$_POST[enr]'");
                                    while($row5=mysqli_fetch_array($res5))
                                    {
                                        $firstname=$row5["firstname"];
                                        $lastname=$row5["lastname"];
                                        $username=$row5["username"];
                                        $email=$row5["email"];
                                        $contact=$row5["contact"];
                                        $sem=$row5["sem"];
                                        $enrollment=$row5["enrollment"];
                                        $_SESSION["enrollment"]=$enrollment;
                                        $_SESSION["username"]=$username;

                                    }
                                    ?>
                                    <table class="table table-bordered">
                                        <tr>
                                    <td><input type="text" class="form-control" placeholder="enrollmentno" name="enrollment" value="<?php echo $enrollment; ?>" disabled></td>
                                        </tr>
                                        <tr>

                                            <td><input type="text"class="form-control" placeholder="Student_name" name="s_name" value="<?php echo $firstname; ?>"></td>
                                        </tr>
                                        <tr>

                                            <td><input type="text"class="form-control" placeholder="Student_sem" name="s_sem" value="<?php echo $sem; ?>"></td>
                                        </tr>
                                        <tr>

                                            <td><input type="text"class="form-control" placeholder="Student_contact" name="s_contact" value="<?php echo $contact; ?>"></td>
                                        </tr>
                                        <tr>

                                            <td><input type="text"class="form-control" placeholder="Student_email" name="s_email" value="<?php echo $email; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select name="bookname" class="form-control selectpicker">
                                                    <?php
                                                    $res=mysqli_query($link,"select books_name from add_books");
                                                    while($row=mysqli_fetch_array($res))
                                                    {
                                                        echo "<option>";
                                                        echo $row["books_name"];
                                                        echo "</option>";
                                                    }
                                                    ?>

                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" placeholder="books_issue_date" name="books_issue_date" value="<?php echo date("d-M-y"); ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                        <td>
                                            <input type="text" class="form-control" placeholder="username" name="username" value="<?php echo $username; ?>" disabled>
                                        </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="submit"  name="submit2" value="issue_books" class="form control btn btn-default"
                                            </td>
                                        </tr>
                                </table>
                                    <?php
                                }
                                ?>
                            </form>
                            <?php
                            if(isset($_POST['submit2']))
                            {
                                mysqli_query($link,"insert into issue_books values('','$_SESSION[enrollment]','$_POST[s_name]','$_POST[s_sem]','$_POST[s_contact]','$_POST[s_email]','$_POST[bookname]','$_POST[books_issue_date]','','$_SESSION[username]')");
                                mysqli_query($link,"update add_books set available_qty=available_qty-1 where books_name='$_POST[bookname]'");
                                ?>

                                    <script type="text/javascript">
                                        alert("Books issued successfully");
                                        window.location.href=window.location.href;
                                </script>
                                <?php
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