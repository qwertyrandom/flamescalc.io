<?php
 
    $flames = array(
        "F" => "Friend",
        "L" => "Lover",
        "A" => "Affection",
        "M" => "Marriage",
        "E" => "Enemy",
        "S" => "Sister"
    );
 
    if(isset($_POST["names"]))
 
        if(count($_POST["names"])==2){
 
            $name1 = strtoupper(str_replace(" ", "", $_POST["names"][0]));
 
            $name2 = strtoupper(str_replace(" ", "", $_POST["names"][1]));
            $name3 = $name1;
            $name4 = $name2;

            if($name1 == $name2)
 
                echo "<div>Names are same!</div>";
 
            else{
 
                for($i = 0; $i < strlen($name1); $i++){
 
                    if(isset($name1[$i]))
 
                        for($j = 0; $j < strlen($name1); $j++)
 
                            if(isset($name2[$j]))
 
                                if($name1[$i] == $name2[$j]){
 
                                     $name1[$i] = $name2[$j] = "/";
 
                                     break;
 
                                }
 
                }
 
                $name1 = str_replace("/", "", $name1);
 
                $name2 = str_replace("/", "", $name2);
 
                $count = strlen($name1) + strlen($name2);
                
 
                $flame = "FLAMES";
 
                echo "<div>";
 
                while(strlen($flame)!=1){
 
                    $c= $count%strlen($flame)-1;
                    if ($c>=0){
                        $left = substr($flame,0,$c-0);
                        $right = substr($flame,$c+1);
                        $flame= $right.$left;
                        }
                    else{
                        $flame= substr($flame,0,strlen($flame)-1);
                    }
            
 
                }
 
                echo "FLAMES   :   " . $flames[$flame] . "</div>";
                $var = $flames[$flame];
                
         $conn = new mysqli('sql12.freesqldatabase.com','sql12530841','fKYuaLazht','sql12530841');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into Names(name1, name2,result) values(?,?,?)");
		$stmt->bind_param("sss", $name3, $name4,$var);
		$execval = $stmt->execute();
		
		echo "";
		$stmt->close();
		$conn->close();
	}
 
        }
            
      }  else ;
 
    else
 
    {?>
    <html>
    <form method="post" action="">
        <body style="color:#fc8d8d;">
 
       <h1 style= "text-align: center; font-family:'Brush Script MT';font-size:90px;"><b>FLAMES CALCULATOR❤️</b></h1></br>
 
        <div><label style="font-family: copperplate; text-align: center; font-size:30px;">Your Name</label><input type="text" name="names[]" /></div></br>
 
        <div><label style="font-family: copperplate; text-align: center; font-size:30px;">Partner Name</label><input type="text" name="names[]" /></div></br>
 
        <div><input type="submit" value="FLAMES" /></div>
    </body>
    </form>
    </html>
 
<?php } ?>
