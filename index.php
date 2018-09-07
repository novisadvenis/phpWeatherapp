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

<form name="form" action="" method="get">
<input type="text" id="myInput" onkeyup="myFunction()" name= "cityname" onfocusout="myfunction2()" placeholder="Search for names.." title="Type in a name">
</form>

<?php echo $_GET['cityname']; ?>
<?php

try{
    $pdo = new PDO("mysql:host=localhost;dbname=city", "root", "");

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
 

try{
    $sql = "SELECT * FROM citylist WHERE name like \"$_GET[cityname]%\" ";  
    $result = $pdo->query($sql);
    if($result->rowCount() > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>first_name</th>";
                echo "<th>last_name</th>";
            echo "</tr>";
        while($row = $result->fetch()){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['country'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
     
        unset($result);
    } else{
        echo "No records matching your query were found.";
    }
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 

unset($pdo);
?>
​
<ul id="myUL" style="display:none;">
  <li><a href="#">Adele</a></li>
  <li><a href="#">Agnes</a></li>
​
  <li><a href="#">Billy</a></li>
  <li><a href="#">Bob</a></li>
​
  <li><a href="#">Calvin</a></li>
  <li><a href="#">Christina</a></li>
  <li><a href="#">Cindy</a></li>
</ul>
​<div id="icon"></div>
<script>
       function myfunction2(){
        var input, filter, ul, li, a, i;
        input = document.getElementById("myInput").value;
        console.log(input)
        if (input === ""){
            ul = document.getElementById("myUL");
            ul.setAttribute("style","display:none;")
        }
        
    }
function myFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    ul.setAttribute("style","display:block;")
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

/* $.get( "http://api.openweathermap.org/data/2.5/weather?id=7287650&appid=78b84b9d6f9188a25c214a7714e358ac", function( data ) {
  alert("finished")
}).done(function(x){
    var weather = x.weather[0].main
    if(weather ="Drizzle"){
        $("#icon").attr("class","Rain")
    }else{
        $("#icon").attr("class",weather)
    }
    
    }); */
</script>
​
</body>
</html>
​
