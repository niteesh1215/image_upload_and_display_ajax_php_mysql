<?php

require 'connection.php';

$query="select url from imageurl";

$result= mysqli_query($connection, $query);

if($result)
{
    while ($row = mysqli_fetch_array($result)) 
    {
            echo "<img src=uploads/".$row['url'].">";
    }
}

