<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
    </head>
    <body>
        <form id='uploadImage' action='upload.php' method='post' enctype='multipart/form-data'>
			<input type='file' name='photo' />
                        <input type="submit" value="Upload Image">
	</form>
		
        <!-- p element with id msg to display success msg --> 
	<p id='msg'></p>
    </body>
    <script>
        //Adding a submit function to the form 
   $('#uploadImage').submit(function(e){
	
	//Preventing the default behavior of the form 
	//Because of this line the form will do nothing i.e will not refresh or redirect the page 
	e.preventDefault();
	
	//Creating an ajax method
	$.ajax({
		//Getting the url of the uploadphp from action attr of form 
		//this means currently selected element which is our form 
		url: $(this).attr('action'),
		
		//For file upload we use post request
		type: "POST",
		
		//Creating data from form 
		data: new FormData(this),
		
		//Setting these to false because we are sending a multipart request
		contentType: false,
		cache: false,
		processData: false,
		success: function(data){
			//If the request is successfull we will get the scripts output in data variable 
			//Showing the result in our html element 
			$('#msg').html(data);
		},
		error: function(){}
	});
});
    </script>
</html>
