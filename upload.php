<?php 	
        require("connection.php");
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
		$name=basename($_FILES['photo']['name']);
		$imageFileType=strtolower(pathinfo($name,PATHINFO_EXTENSION));
		$fileNameNew = rand(222, 999).time().".".$imageFileType;
                $path = 'uploads/'.$fileNameNew;
                if (file_exists($path)) 
                     echo "Sorry, file already exists.";
                else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";}
                else if ($_FILES["photo"]["size"] > 2000000) 
                        echo "Sorry, your file is too large.";
                
		else if(!empty($name))
                {
			
			if(move_uploaded_file($_FILES["photo"]["tmp_name"], $path))
                        {
                            $query="insert into imageurl(url) values('".$fileNameNew."')";
                            if(!(mysqli_query($connection, $query)))
                            {
                                echo 'Database insert Unsucessful: '. mysqli_error($connection);
                            }
                            echo "<br>Upload successfully";
                        }
                        else 
                            echo "Upload unsucessful";
		}
                else			 
			echo "Please choose a file";
		
	}

 mysqli_close($connection);
