<?php
	$servername = "localhost";
	$username = "username";
	$password = "password";

	// Create connection

	function SelectPunctuations($article_id)
	{
	$con = mysql_connect("localhost","root","party123");
				if (!$con)
					{
						die('Could not connect: ' . mysql_error());
					}
				mysql_select_db('party');
		  $result = mysql_query("SELECT content FROM punctuation where Article_id = '$article_id' ");
		  if($result){
		  $row = mysql_fetch_row ($result);
		  $number = $row[0];
		  return $number;
		  }
          else{
            return false;
          }		  
		mysql_close($con);
	}
	
	function SelectAll($article_id)
	{
	$con = mysql_connect("localhost","root","party123");
				if (!$con)
					{
						die('Could not connect: ' . mysql_error());
					}
				mysql_select_db('party');
		  $result = mysql_query("SELECT * FROM punctuation where Article_id = '$article_id' ");
		  if($result){
		  $temp=array();
		  while($row = mysql_fetch_array($result))
			{
				$temp[]=$row;
			}
			return $temp;
		  }
		  else{
			return false;
		  }
		mysql_close($con);
	}
	
	function AddPunctuations(&punctuation_id,&article_id,&content,$time,$readed)
	{
		$con = mysql_connect("localhost","root","party123");
				if (!$con)
					{
						die('Could not connect: ' . mysql_error());
					}
				mysql_select_db('party');
		$sql="INSERT INTO Punctuation  VALUES('$punctuation_id','$article_id','$content','time','readed')";

					if (!mysql_query($sql,$con))
					{
						die('Error: ' . mysql_error());
					}
				echo "Success!";
				mysql_close($con);
	}
	function AddStudent(&student_id,&student_name)
	{
		$con = mysql_connect("localhost","root","party123");
				if (!$con)
					{
						die('Could not connect: ' . mysql_error());
					}
				mysql_select_db('party');
		$sql="INSERT INTO student  VALUES('$student_id','$student_name')";

					if (!mysql_query($sql,$con))
					{
						die('Error: ' . mysql_error());
					}
				echo "Success!";
				mysql_close($con);
	}
	
?>