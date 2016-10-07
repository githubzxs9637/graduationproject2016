<?php
	

	// Create connection
    function login($username,$password)
	{
		$con = mysql_connect("jd-thesis.ecs.csun.edu","stone","Arg@n0il");
				if (!$con)
					{
						die('Could not connect: ' . mysql_error());
						return 2;
					}
				mysql_select_db('stone');
		$sql="select * from student where account = '$username' and password='$password'";   
        $rs=mysql_query($sql);
        if(mysql_num_rows($rs)==1)
			return 1;
		else
			return 0;
		if (!mysql_query($sql,$con))
		{
			die('Error: ' . mysql_error());
			return 3;
		}
			mysql_close($con);
		
	}
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
	
	function GetArticle()
	{
	$con = mysql_connect("jd-thesis.ecs.csun.edu","stone","Arg@n0il");
				if (!$con)
					{
						die('Could not connect: ' . mysql_error());
					}
				mysql_select_db('party');
		$query = mysql_query("SELECT article_id,article_name FROM article");
		if($query){
		$items = array();
			while($row=mssql_fetch_array($query)){
				$result["id"][] = array($row["article_id"]);
				$result["name"][] = array($row["article_name"]);
			}
			echo json_encode($result);
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
	
	function AddPunctuations($article_id,$content,$time,$readed)
	{
		$con = mysql_connect("localhost","root","party123");
				if (!$con)
					{
						die('Could not connect: ' . mysql_error());
					}
				mysql_select_db('party');
		$sql="INSERT INTO Punctuation  VALUES('$article_id','$content','time','readed')";

					if (!mysql_query($sql,$con))
					{
						die('Error: ' . mysql_error());
					}
				mysql_close($con);
	}
	function AddArticle($title,$content)
	{
		$con = mysql_connect("jd-thesis.ecs.csun.edu","stone","Arg@n0il");
				if (!$con)
					{
						die('Could not connect: ' . mysql_error());
					}
				mysql_select_db('stone');
		$sql="INSERT INTO article VALUES(article_title,article_content)('$title','$content')";   

					if (!mysql_query($sql,$con))
					{
						die('Error: ' . mysql_error());
					}
				mysql_close($con);
	}
	function AddStudent($student_id,$student_name)
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