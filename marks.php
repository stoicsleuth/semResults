<?php
    
    include("simple_html_dom.php");
    $roll_no= ($_GET['roll']);
    $roll_no=(round(($roll_no)/1000))*1000;
    //echo $roll_no;
    $marks=0;  
    $total_students=-1; 
    $name_student= array();
    $marks_student=array();
    if(!$_GET['max'])
        $max=10;
    else
        $max=$_GET['max'];
    for($i=0;$i<$max;$i++){
        
        $request= array(
            'http' => array(
                'method' =>'POST',
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
                'content' => http_build_query(array(
                    'roll' => (string)($roll_no++),
                    'sem' => $_GET['sem']
                )),
            
            )
            
        );
        $context=stream_context_create($request);
        $html = file_get_html('http://61.12.70.61:8084/heresult17.aspx', true, $context);
        $name = $html->getElementById("lblname");
        
        
        
        $name_stripped = str_replace('Name', '', $name);
        //echo "<h2 style="text-align:center"><strong>".$name_stripped."</strong></h2>";
        
       
        if($name_stripped){
            
            $total_students= $total_students+1;
            $mark=$html->getElementById("lblbottom2")->plaintext;
            
            $marks= $marks+ (float)(substr($mark, -6));
            $name_student[$total_students]= $name_stripped;
            $marks_student[$total_students]=(substr($mark, -5));
            $marks_student[$total_students]=str_replace('R:','',$marks_student[$total_students]);
            //echo " GOT ".$mark."<br>";
        }
        
        
    }
    $avg_marks=$marks/($total_students+1);
    //echo "<br>Average Marks is".$avg_marks;
    
    function getColor($n){

   
    if($n>=4 && $n<=6) return "#EA1744";

    
    if($n>6 && $n<=8) return "#FF9F1C";

   
    if($n>8) return "#058E3F";

    
    return "black";

}
    

?>