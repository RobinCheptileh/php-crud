<?php

$string = "<html>
<body bgcolor= \"\">
<hr>
<center><fieldset style=\"width:1000\">
<center><form style=\"background:hi1.jpg\">
<a href =\"http://www.kisiiuniversity.ac.ke\"><img src = \"logo.png\"/></a><img src =\"hi1.jpg\"/><a href=\"http://www.kisiiuniversity.ac.ke\"><img src = \"logo.png\"/></a>
</form></center>

  <legend>Student Details</legend>
  
 
<form>
<hr>
<center>
<b>KISII UNIVERSITY JAB INTAKE LETTERS</b>

<hr>
<table border = \"1\" width = \"700\">


<center><b>Welcome JAMILLA ACHIENG OCHIENG To Kisii University</b></center><tr><b><td colspan = 3><b>Student Name:</b></td><td><b>JAMILLA ACHIENG OCHIENG</b></td></b></tr><tr><b><td colspan = 3><b>Student Index Number:</b></td><td><b>44739104164/2017</td></b></tr><tr><b><td colspan = 3><b>Student Registration Number:</b></td><td><b>AS12/00023/18/16</td></b></tr><tr><b><td colspan = 3><b>Student Course Admitted To:</b></td><td><b>BACHELOR OF ARTS (LITERATURE)
</td></b></tr><tr><b><td colspan = 3><a href = \"447391041642017.pdf\"><b>>>Download Letter(Page 1)</b></a></b></a></td><td colspan = 3>&nbsp;&nbsp;<a href=\"NEW STUDENT REGISTRATION FORMS.pdf\"><b>&nbsp;>>Download Registration Forms&nbsp;&nbsp;<a href=\"Dean of Students Registration.pdf\"><b>&nbsp;>>Download Dean of Students Registration Forms</b></a></td></tr><hr/><hr>Kindly download and Print Page 1, Page 2 of the Admission Letter and the KSU Registration Forms as shown in the Links below below.<hr><h3 style =\"color:red\">WARNING:DO NOT SEND MONEY TO ANY NUMBER THROUGH M-PESA OR ANY OTHER SERVICES IN THE NAME OF HOSTEL/ACCOMMODATION FEE. ALL THE UNIVERSITY FEES IS PAID VIA THE UNIVERSITY BANK ACCOUNT AS INDICATED IN ADMISSION LETTERS.</h3><hr>
</table>
<b>In case of any difficulty, please send an email with your index number to acregistrar@kisiiuniversity.ac.ke or Kindly call us on +254 720 875 082 for further information.
 <br>
<br>
<a href=\"index.php\"><b>Go Back</b></a><a href =\"http://www.kisiiuniversity.ac.ke\"><b>Main Website</b></a>
</b>
</center><hr>
</form>
</fieldset></center>
<hr><hr>
</body>
</html>";

preg_match('/\d{11}\/2017/', $string, $matches1, PREG_OFFSET_CAPTURE);
preg_match('/[A-Za-z]{2}\d{2}\/\d{5}\/\d{2}\/\d{2}/', $string, $matches2, PREG_OFFSET_CAPTURE);

var_dump($matches1);
var_dump($matches2);