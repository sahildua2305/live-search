<?php
include('db.php');
?>

<?php
if(isset($_POST['kw']) && $_POST['kw'] != '')
{
  $kws = $_POST['kw'];
  $kws = mysql_real_escape_string($kws); 
  $query = "select * from competitions where title like '%".$kws."%' limit 10" ;
  $res = mysql_query($query);
  $count = mysql_num_rows($res);
  $i = 0;
  
  if($count > 0)
  {
    echo "<ul>";
    while($row = mysql_fetch_array($res))
	{
	  echo "<a href='$row[id]'><li>";
	  echo "<div id='rest'>";
	  echo $row['title'];
	  echo "<br />";
	  echo "<div id='auth_dat'>".$row['category']."</div>";
	  echo "</div>";
	  echo "<div style='clear:both;'></div></li></a>";
	  $i++;
	  if($i == 5) break;
	}
	echo "</ul>";
	if($count > 5)
	{
	  echo "<div id='view_more'><a href='#'>View more results</a></div>";
	}
  }
  else
  {
    echo "<div id='no_result'>No result found !</div>";
  }
}
?>
