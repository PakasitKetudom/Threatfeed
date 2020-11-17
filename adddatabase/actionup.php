<?php
    switch ($_REQUEST['action']) {
        case 'cveven':?>
        <script>window.location='add2cveven.php';</script>
  <?php break;
        case 'datacve';?>
        <script>window.location='add2datacve.php';</script>
 <?php  break;
    }

?>

<script>
alert('Successfully');
window.location='showutable.php';
</script>