<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<style>


.slide-show figure{
transition:opacity 0.5s;
opacity:1;
}

.slide-show figcaption{
   position: absolute;
   top:100px;
   left:100px;
   font-family:yu mincho demibold;
   color: #47142C;
   font-size: 40px;
   opacity: 1;
   }


figure:nth-child(1) {
   animation: xfade 30s 24s infinite;
}
figure:nth-child(2) {
   animation: xfade 30s 18s infinite;
}
figure:nth-child(3) {
   animation: xfade 30s 12s infinite;
}
figure:nth-child(4) {
   animation: xfade 30s 6s infinite;
}
figure:nth-child(5) {
   animation: xfade 30s 0s infinite;
}


 
@keyframes xfade{
   0%{
      opacity: 1;
   }
   15% {
      opacity:1;
   }
   20%{
      opacity: 0;
   }
   95% {
      opacity:0;
   }
   100% {
      opacity:1;
   }
}



</style>

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Adrenaline | Enter DOB |</title>
</head>
<body>
<div class="slide-show">
<figure><img src="Images\scblacklist.jpg" style="position:absolute;top:0px;left:0px;" width="1366" height="677"></figure>
<figure><img src="Images\nfs.jpg" style="position:absolute;top:0px;left:0px;" width="1366" height="677"></figure>
<figure><img src="Images\tombraider.jpg" style="position:absolute;top:0px;left:0px;" width="1366" height="677"></figure>
<figure><img src="Images\crysis.jpg" style="position:absolute;top:0px;left:0px;" width="1366" height="677"></figure>
<figure><img src="Images\metalgear.png" style="position:absolute;top:0px;left:0px;" width="1366" height="677"></figure>

</div>



<input type="number" maxlength="2" style="position:absolute; top:250px;left:575px;width:160px;height:20px;border:none;outline:none;  text-align:center;
            vertical-align:middle;">
<input type="number" maxlength="2" style="position:absolute; top:350px;left:575px;width:160px;height:20px;border:none;outline:none;  text-align:center;
            vertical-align:middle;">
<input type="number" maxlength="4" style="position:absolute; top:450px;left:575px;width:160px;height:20px;border:none;outline:none;  text-align:center;
            vertical-align:middle;">

<a href="#" class="continue" style="position:absolute; top:565px;left:605px;font-family:sakkal majalla;color:white;font-size:30px;" >Continue</a>
<a href="#"></a>
<img src="Images\next.png" style="position:absolute;top:570px;left:690px;" width="36" height="36">



</body>
</html>