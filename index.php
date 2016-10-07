<!DOCTYPE html>
<html>
<body>



<script src="jquery-1.11.2.min.js"></script>
<script>
	/*$(document).ready(function () {
		//Program a custom submit function for the form
		$("form#fileForm").submit(function(event){
		 
		  //disable the default form submission
		  event.preventDefault();
		 
		  //grab all form data  
		  
		 
		  return false;
		});
	});*/
	function submit1() {
		var data = document.getElementById('fileToUpload').files[0];
		var filename = document.getElementById('fileToUpload').files[0].name;
	    var reader = new FileReader();
		reader.onload = Upload;
		reader.readAsText(data);
		function Upload(){
			var formData = reader.result;
			var json = EncodeJson(formData, filename);
			$.ajax({
				url: 'upload.php',
				type: 'POST',
				data: "submit="+json,  
				success: function (text) {
					document.getElementById("contents").innerHTML = text;
				}
			});
	    }
	}
	function EncodeJson(text, filename){
		//var arr = "{'content':'" + text + "','filename':'" + filename + "'}";
		//var arr = "'{"content":"'+ text +'","filename":"'+ filename +'"}'";
        //var json_string = JSON.stringify(arr);//.replace(/\\r\\n/g, '<br />');
		
		var json_string = JSON.stringify({content: text, filename: filename}).replace(/\\r\\n/g, '<br />');
		//var json_string2 = JSON.parse(json_string);
		//json_string =eval(“(“+arr+”)”);
		return json_string;	
	}
	function processFile(){
		var text = $("#contents").text().trim().split(" ");	
		var text2 = $("#contents").text().trim();
		for(var i=0;i<text.length;i++){
			alert(text[i]);
		}
	}
	 
</script>
<form id="fileForm" name="fileForm" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="button" id="uploadButton" value="Upload" name="submit" onclick="submit1();">
</form>

<div id="contents1"></div>
<div id="contents"></div>
<button onclick="processFile()">Process File</button>
</head>
</body>
</html>