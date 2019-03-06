<?php
session_start();
// ob_start();
if($_SESSION['email']){
require 'FlashMessages.php';
include '../config.php';
 $query1 ="SELECT * FROM `user_sharing_info_details` where `status`='1'";
 $query_exe1 = mysqli_query($conn,$query1);
 $count  = mysqli_num_rows($query_exe1);
 $page = (int) (!isset($_REQUEST['pageId']) ? 1 :$_REQUEST['pageId']);
$page = ($page == 0 ? 1 : $page);
$recordsPerPage = 5;
$start = ($page-1) * $recordsPerPage;
$adjacents = "2";

$prev = $page - 1;
$next = $page + 1;
$lastpage = ceil($count/$recordsPerPage);
$lpm1 = $lastpage - 1;   
$pagination = "";
if($lastpage > 1)
    {   
        $pagination .= "<div class='pagination'>";
        if ($page > 1)
            $pagination.= "<a href=\"#Page=".($prev)."\" onClick='changePagination(".($prev).");'>&laquo; Previous&nbsp;&nbsp;</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Previous&nbsp;&nbsp;</span>";   
        if ($lastpage < 7 + ($adjacents * 2))
        {   
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class='current'>$counter</span>";
                else
                    $pagination.= "<a href=\"#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a>";     
 
            }
        }   
 
        elseif($lastpage > 5 + ($adjacents * 2))
        {
            if($page < 1 + ($adjacents * 2))
            {
                for($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                {
                    if($counter == $page)
                        $pagination.= "<span class='current'>$counter</span>";
                    else
                        $pagination.= "<a href=\"#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a>";     
                }
                $pagination.= "...";
                $pagination.= "<a href=\"#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a>";
                $pagination.= "<a href=\"#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a>";   
 
           }
           elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<a href=\"#Page=\"1\"\" onClick='changePagination(1);'>1</a>";
               $pagination.= "<a href=\"#Page=\"2\"\" onClick='changePagination(2);'>2</a>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<span class='current'>$counter</span>";
                   else
                       $pagination.= "<a href=\"#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a>";     
               }
               $pagination.= "..";
               $pagination.= "<a href=\"#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a>";
               $pagination.= "<a href=\"#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a>";   
           }
           else
           {
               $pagination.= "<a href=\"#Page=\"1\"\" onClick='changePagination(1);'>1</a>";
               $pagination.= "<a href=\"#Page=\"2\"\" onClick='changePagination(2);'>2</a>";
               $pagination.= "..";
               for($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
               {
                   if($counter == $page)
                        $pagination.= "<span class='current'>$counter</span>";
                   else
                        $pagination.= "<a href=\"#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a>";     
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<a href=\"#Page=".($next)."\" onClick='changePagination(".($next).");'>Next &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Next &raquo;</span>";
 
        $pagination.= "</div>";       
    }
 
if(isset($_POST['pageId']) && !empty($_POST['pageId']))
{
    $id=$_POST['pageId'];
}
else
{
    $id='0';
}
$query12 ="SELECT * FROM `user_sharing_info_details` where `status`='1' limit ".mysqli_real_escape_string($conn,$start).",$recordsPerPage";
$query_exe12 = mysqli_query($conn,$query12);
$count  =   mysqli_num_rows($query12);
$HTML='';
if($count > 0)
{
 while($fetch = mysqli_fetch_array($query_exe12)){

     $post_type=$fetch['post_type'];
          switch ($post_type) {
            case '1':
              ?>
               <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-10">
                  <div class="panel panel-default">
                    <div class="panel-heading text-center"><?php echo $fetch['title'];?></div>
                    <div class="panel-body"><img class="img-responsive" src="../uploads/photo/<?php echo $fetch['photo'];?> "?>
                    </div>
                  </div>
                    
                </div>  
                </div>
              <?php
              break;
            case '2':?>
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-10">
                    <div class="panel panel-default">
                      <div class="panel-heading text-center"><?php echo $fetch['title'];?></div>
                      <div class="panel-body"><p class="text-center"> <?php echo $fetch['text'];?></p>
                      </div>
                    </div>
                    
                  </div>  
                </div>
           
            <?php
              break;
            case '3':
              ?>
              <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-10">
                    <div class="panel panel-default">
                      <div class="panel-heading text-center"><?php echo $fetch['title'];?></div>
                      <div class="panel-body"><iframe src="<?php echo $fetch['url'];?>" width="850" height="700"></iframe>
                      <p><a href="<?php echo $fetch['url'];?>" target="iframe_a">Click Here To view </a></p>
                      </div>
                    </div>
                    
                  </div>  
                </div>
              
              <?php
              break;
            case '4':
             ?>
               <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-10">
                    <div class="panel panel-default">
                      <div class="panel-heading text-center"><?php echo $fetch['title'];?></div>
                      <div class="panel-body"><img class="img-responsive" src="../uploads/photo/<?php echo $fetch['photo'];?> "?>
                      <p class="text-center"> <?php echo $fetch['text'];?></p>
                      </div>
                    </div>                    
                  </div>  
                </div>
             <?php
              break;
            default:
              # code...
              break;
          }
      }
  }else{
  	echo "No Data Is Posted";
  }

echo $pagination;
}else{
	header('Location:logout.php');
  	exit;
}