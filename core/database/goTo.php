<?php
    function goAt ($host, $uri, $time){
    
    header("refresh:$time; url= http://$host$uri");
    exit;
}?>