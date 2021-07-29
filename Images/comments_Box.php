
<!DOCTYPE html>
<html lang >
      <head>
          <meta charset = "utf-8">
            <title> الرئيسية - ريشة</title>

               <link rel="stylesheet" href="style.css" >
               <script>
               if(window.history.replaceState){
               window.history.replaceState(null,null,window.location.href );}
               </script>
          </head>
          <body>
          <div class="head">
            <video class="videobackground " autoplay muted loop src="colorbackground.mp4"  ></video>
             <h2 class="texthead">ريشة</h2>
           </div>
             <div id="navbar">
               <a class="active" href="home.html">الرئيسية</a>
               <a href="gallary.html"> معرض الرسمات</a>
               <a href="#">اراء الزوار</a>

</div>

            <div class="all" >
               <div id="comment">



<form action="comments_Box.php" method="POST">
<lable class="inputname"> : الأسم </lable><br><br>
<input type="text" name="name" ><br><br>
<lable class="inputname"> : تعليقك  </lable><br><br>
<textarea name="mes" cols="45"rows="5" placeholder="...أضف تعليقك هنا" ></textarea>
<br><br><br><br><br>
<input type="submit" value="إرسال" name="send" ></form>
</body>




<?php
/* you should creat database has name : usercomment */
$con = mysqli_connect("localhost","root","","usercomment" )
or die( mysqli_connect_error() );

	mysqli_query($con,"CREATE TABLE IF NOT EXISTS comment_user(
		id INT NOT NULL AUTO_INCREMENT,
		PRIMARY KEY(id),
	    Name VARCHAR(30),
		comment text(100))")
	or die( mysqli_connect_error());


echo "<p id='comment2'>";
if(isset($_POST['send'])){

	$name=$_POST['name'];
	$comments=$_POST['mes'];
	if($name&&$comments){
mysqli_query($con,"INSERT INTO comment_user (Name,comment) VALUES ('$name','$comments')") or
die( mysqli_connect_error() );}
	else
	{echo"يلزم تعبئة كل الحقول لإرسال تعليقك* ";}
}
$query = "SELECT * FROM comment_user";
	$result = mysqli_query($con, $query) or
die( mysqli_connect_error());

echo "<br/><Strong>: التعليقات<Strong><br/>";
        echo"<br><hr id='linecomment'>";
	while($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {

		echo"<p id='commentbox'>:".$row['Name']."<br><br>".$row['comment']."</p>";

	}

echo "<p>";

	?>
</div>
</div>
<script>
window.onscroll = function() {myFunction()};
/* from https://www.w3schools.com/howto/howto_js_navbar_sticky.asp */
var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>
</html>
