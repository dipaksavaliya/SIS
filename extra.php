<?
include 'connection.php';
$per_page = 5; 
$page = 1;

 if (isset($_GET['page'])) 
 {
  $page = intval($_GET['page']); 
  if($page < 1) $page = 1;
}


 $start_from = ($page - 1) * $per_page; 

 $current_items = mysql_query( "SELECT * FROM `test` LIMIT $start_from, $per_page");
 if( mysql_num_rows($current_items) > 0)
 {
  while($item = mysql_fetch_assoc($current_items))
  {
    echo $item['text'], '<br/>';
  }
 }
 else
 {
  echo 'this page does not exists'; 
 }


 $total_rows = mysql_query("SELECT COUNT(*) FROM `test`");
 $total_rows = mysql_fetch_row($total_rows);
 $total_rows = $total_rows[0];

 $total_pages = $total_rows / $per_page;
 $total_pages = ceil($total_pages); # 19/5 = 3.8 ~=~ 4

 for($i = 1; $i  <= $total_pages; ++$i)
 {
  echo "<a href='?page=$i'>$i</a> &nbsp;&nbsp;";
 }
 
?>