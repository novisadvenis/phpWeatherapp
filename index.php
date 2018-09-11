<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
​
<h2>My Phonebook</h2>
​

<form name="form"  method="get">
<input type="text" id="myInput" onfocus="myfunction()"  name= "cityname" placeholder="Search for names.." title="Type in a name">
</form>

<div id="table">
<?php

try{
    $pdo = new PDO("mysql:host=localhost;dbname=city", "root", "");

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
/* try{
    $sql = "SELECT * FROM citylist WHERE name like \"$_GET[cityname]%\" ";  
    $result = $pdo->query($sql);
    if($result->rowCount() > 0){
            echo "<div>";
                echo "first_name";
                echo "last_name";
            echo "</div>";
        while($row = $result->fetch()){
            echo '<a href="http://api.openweathermap.org/data/2.5/weather?id='.$row['id'].'&appid=78b84b9d6f9188a25c214a7714e358ac"><div>';
                echo  $row['name'] ;
                echo  $row['country'] ;
            echo "</div></a>";
        }
        unset($result);
    } else{
        echo "No records matching your query were found.";
    }
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
} */
unset($pdo);
?>
</div>
<div id ="icon"></div>
<script>
$("#table a").click((e)=>{
    e.preventDefault();
    $.get( e.currentTarget.href, function( data ) {
  alert("finished")
}).done(function(x){
    console.log(x.weather[0].main)
    var weather = x.weather[0].main

     $("#icon").attr("class",weather)
    
    });
})
funtion myfunction(){
    
}
    /*    function myfunction2(){
        var input, filter, ul, li, a, i;
        input = document.getElementById("myInput").value;
        console.log(input)
        if (input === ""){
            ul = document.getElementById("myUL");
            ul.setAttribute("style","display:none;")
        }
        
    }
 */
</script>
​
</body>
</html>
​
