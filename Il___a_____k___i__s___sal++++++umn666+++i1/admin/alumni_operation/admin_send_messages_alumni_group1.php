<?php
session_start();
ob_start();
if(isset($_SESSION['alumni_tech'])){
require 'FlashMessages.php';
include '../config.php';
 $msg = new \Preetish\FlashMessages\FlashMessages();
 
 // Array ( [serial] => 1 ) 
?>
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DashBoard
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="$_PHP_SELF?"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="$_PHP_SELF?">Examples</a></li>
        <li class="active">Blank page</li> -->
      </ol>
    </section>
<!-- <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"> -->
<style type="text/css">
  .mb-4 {
    margin-bottom: 1.5rem !important;
}
.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: $_PHP_SELF?fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: .25rem;
}
.card-img-top {
    width: 100%;
    border-top-left-radius: calc(.25rem - 1px);
    border-top-right-radius: calc(.25rem - 1px);
}

.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem;
}
.card-title {
    margin-bottom: .75rem;
}
.h2, h2 {
    font-size: 2rem;
}
.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
    margin-bottom: .5rem;
    font-family: inherit;
    font-weight: 500;
    line-height: 1.1;
    color: inherit;
}
h1, h2, h3, h4, h5, h6 {
    margin-top: 0;
    margin-bottom: .5rem;
}

.card {
    word-wrap: break-word;
}
p {
    margin-top: 0;
    margin-bottom: 1rem;
}
.card-footer:last-child {
    border-radius: 0 0 calc(.25rem - 1px) calc(.25rem - 1px);
}
.text-muted {
    color: $_PHP_SELF?868e96 !important;
}
.card-footer {
    padding: .75rem 1.25rem;
    background-color: rgba(0,0,0,.03);
    border-top: 1px solid rgba(0,0,0,.125);
}
</style>
    <!-- Main content -->
    <section class="content">
    	<div class="text-center">
			<?php $msg->display(); ?>
		  </div>
       <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-10 ">
            <?php
                 $rec_limit = 5;
                 $sql_list = "SELECT * FROM `admin_admin_post`";
                 $retval = mysqli_query( $conn ,$sql_list);
                 $count  = mysqli_num_rows($retval);
                  $page = (int) (!isset($_REQUEST['Page']) ? 1 :$_REQUEST['Page']);
                  $page = ($page == 0 ? 1 : $page);

                  $recordsPerPage = 5;
                  $start = ($page-1) * $recordsPerPage;
                  $adjacents = "2";


                  $prev = $page - 1;
                  $next = $page + 1;
                  $lastpage = ceil($count/$recordsPerPage);
                  $lpm1 = $lastpage - 1;   
                  $pagination = "";

                    $sql_list_detail = "SELECT * FROM `admin_admin_post` order by `slno` desc LIMIT $start, $rec_limit";
                     $retval_details = mysqli_query( $conn ,$sql_list_detail);
                    while ($res_admin=mysqli_fetch_assoc($retval_details)) {
            ?>

                <!-- Blog Post -->
                <div class="card mb-4">
                <?php
                  if(!empty($res_admin['attach_file'])){
                ?>
                    <img class="card-img-top" src="../uploads/admin_public_post/<?=$res_admin['attach_file']?>" alt="Card image cap">
                <?php }?>
                    <div class="card-body">
                        <!-- <h2 class="card-title">Post Title</h2> -->
                        <p class="card-text"><?=$res_admin['text_message']?></p>
                         <ul class="list-inline">                      
                        <li>
                        </li>
                        <li class="pull-right"><a href="$_PHP_SELF?" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments(<?=$res_admin['comment']?>)</a></li>
                      </ul>
                        <a href="$_PHP_SELF?" class="btn btn-primary">Read More &rarr;</a>
                    </div>
                    <div class="card-footer text-muted">
                        
                    <div class="row">
                      <div class="col-md-12">
                      
                      <?php 
                      $post_ids_admin=$res_admin['slno'];
                      $comment_admin="SELECT * FROM `master_admin_comment` WHERE `post_id`='$post_ids_admin'  ORDER BY `date` DESC,`time` DESC LIMIT 3  ";

                      $sql_exe_comment_admin=mysqli_query($conn,$comment_admin);
                      while($res_comment_admin=mysqli_fetch_assoc($sql_exe_comment_admin)){
                      $slno_user_admin=$res_comment_admin['user_id'];
                      $query1_user = "SELECT * FROM `master_user_registration` where `sl_no`='$slno_user_admin'";
                        $query_exe1_user= mysqli_query($conn,$query1_user);
                        $rec1_user=mysqli_fetch_assoc($query_exe1_user);
                        ?>

                      <!-- the comments -->
                      <h4><i class="fa fa-comment"></i> <?=$rec1_user['name']?>:
                          <small> <?=$res_comment_admin['time']?> on <?=$res_comment_admin['date']?></small>
                      </h4>
                      <p><?=$res_comment_admin['message']?></p>

                     <?php }?>
                    </div>
                </div>
              </div>
            </div>
            <?php }
                 //  if( $page > 0 ) {
                 //    $last = $page - 2;
                 //    echo "<a href = \"$_PHP_SELF?page = $last\">Last 5 Records</a> |";
                 //    echo "<a href = \"$_PHP_SELF?page = $page\">Next 5 Records</a>";
                 // }else if( $page == 0 ) {
                 //    echo "<a href = \"$_PHP_SELF?page = 1\">Next 5 Records</a>";
                 // }else if( $left_rec < $rec_limit ) {
                 //    $last = $page - 2;
                 //    echo "<a href = \"$_PHP_SELF?page = $last\">Last 5 Records</a>";
                 // }
                 if($lastpage > 1){  ?>

                  <div class='pagination'>
                  <?php 
                    if ($page > 1)
                    echo "<a href=\"$_PHP_SEL?Page=".($prev)."\" onClick='changePagination(".($prev).");'>&laquo; Previous&nbsp;&nbsp;</a>";
                       else
                        echo "<span class='disabled'>&laquo; Previous&nbsp;&nbsp;</span>";   
                    if ($lastpage < 7 + ($adjacents * 2))
        {   
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    echo "<span class='current'>$counter</span>";
                else
                    echo "<a href=\"$_PHP_SELF?Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a>";     

            }
        }   

        elseif($lastpage > 5 + ($adjacents * 2))
        {
            if($page < 1 + ($adjacents * 2))
            {
                for($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                {
                    if($counter == $page)
                        echo "<span class='current'>$counter</span>";
                    else
                        echo "<a href=\"$_PHP_SELF?Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a>";     
                }
                echo "...";
                echo "<a href=\"$_PHP_SELF?Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a>";
                echo "<a href=\"$_PHP_SELF?Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a>";   

           }
           elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               echo "<a href=\"$_PHP_SELF?Page=\"1\"\" onClick='changePagination(1);'>1</a>";
               echo "<a href=\"$_PHP_SELF?Page=\"2\"\" onClick='changePagination(2);'>2</a>";
               echo "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       echo "<span class='current'>$counter</span>";
                   else
                       echo "<a href=\"$_PHP_SELF?Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a>";     
               }
               echo "..";
               echo "<a href=\"$_PHP_SELF?Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a>";
               echo "<a href=\"$_PHP_SELF?Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a>";   
           }
           else
           {
               echo "<a href=\"$_PHP_SELF?Page=\"1\"\" onClick='changePagination(1);'>1</a>";
               echo "<a href=\"$_PHP_SELF?Page=\"2\"\" onClick='changePagination(2);'>2</a>";
               echo "..";
               for($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
               {
                   if($counter == $page)
                        echo "<span class='current'>$counter</span>";
                   else
                        echo "<a href=\"$_PHP_SELF?Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a>";     
               }
           }
        }
        if($page < $counter - 1)
            echo "<a href=\"$_PHP_SELF?Page=".($next)."\" onClick='changePagination(".($next).");'>Next &raquo;</a>";
        else
            echo "<span class='disabled'>Next &raquo;</span>";

        echo "</div>";       
    }

            ?>
              <!--  -->
<!--  -->

                <!-- Pagination -->
                <ul class="pagination justify-content-center mb-4">
                    <li class="page-item"><a class="page-link" href="$_PHP_SELF?">&larr; Older</a></li>
                    <li class="page-item disabled"><a class="page-link" href="$_PHP_SELF?">Newer &rarr;</a></li>
                </ul>

            </div>
          </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php

}else{
	header('Location:logout.php');
	exit;
}
$contents = ob_get_contents();
ob_clean();
include 'templates/template.php';

?>
