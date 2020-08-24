<?php
include "connection.php";
$id=$_GET["id"];
$s=date("d-M-y");
$res=mysqli_query($link,"update issue_books set books_return_date='$s' where id=$id");
$b_name="";
$res=mysqli_query($link,"select * from issue_books where id=$id");
while($row=mysqli_fetch_array($res))
{
    $b_name=$row["books_name"];
}
mysqli_query($link,"update add_books set available_qty=available_qty+1 where books_name='$b_name'");
?>
<script type="text/javascript">
    window.location="return_book.php";
</script>