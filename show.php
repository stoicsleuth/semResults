<?php include("marks.php"); ?>


<html>

<head>
    <title> Here are your marks, baby! </title>
    <link href="https://fonts.googleapis.com/css?family=Share:700" rel="stylesheet">
    <style>
    .header{
        background-color:#36C9C6;
        height: 200px;
        
        display: flex;
        justify-content:center;
        align-items: center;
        font-size: 30px;
    }
    h1{
        font-family: "Share", serif;
        color: white;
    }
    .box{
        margin-top:7px;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80px;
               
    }
    .box p{
        color: white;
        font-size: 25px;
        font-family: "Share";
    }
    .footer{
        background-color:#36C9C6;
        height: 200px;
        
        display: flex;
        justify-content:center;
        align-items: center;
        font-size: 26px;
    }
    .footer p{
        color: white;
        font-family: "Share";
    }
    </style>
</head>

<body>
    <div class="header">
        <h1> On Your Marks </h1>
    </div>

    <?php for($count=0;$count<$total_students+1;$count++) : ?>

    <div class="box" style="background-color: <?=getColor($marks_student[$count]); ?>">
        <p><?php echo $name_student[$count]; ?> GOT <span class="marks"><?php echo $marks_student[$count]; ?></span></p>
    </div>

    <?php endfor; ?>

    <div class="footer">
    <p> Average CGPA of <?=$total_students+1?> students is <?=$avg_marks?> </p>
    </div>
<?php //dump($students); ?>


</body>



</html>

