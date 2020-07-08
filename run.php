<?php
   //echo 'FROM RUN.php'. $_SERVER['DOCUMENT_ROOT'];
   
   define('DOCUMENT_ROOT',  $_SERVER['DOCUMENT_ROOT']);
   //define('CONFIG_DIR',     DOCUMENT_ROOT   . '/xplor/config');
   define('CLASS_DIR',      DOCUMENT_ROOT   . '/xplor/class');
   //define('INPUT_DIR',      DOCUMENT_ROOT   . '/xplor/input');
  
   //set_include_path(get_include_path() . PATH_SEPARATOR . CONFIG_DIR);
   set_include_path(get_include_path() . PATH_SEPARATOR . CLASS_DIR);
   //set_include_path(get_include_path() . PATH_SEPARATOR . INPUT_DIR);
   
   require_once('Robot.class.php');
   
   $inputFilePath = "input.txt";
   $fp = fopen($inputFilePath, "r");
   
   while (!feof($fp)){ 
     $current_line = fgets ($fp);
	 
     $command = explode(" ", $current_line);
	 
	 if(count($command) > 1) {
		 if($command[0] == 'PLACE' ) {
		 
		    $subCommand = explode(",", $command[1]);

		    $params   =  array();
		    $params['currentX'] = $subCommand[0];
		    $params['currentY'] = $subCommand[1];
		    $params['position'] = $subCommand[2];
		    $robotObj = new Robot($params);
		 }
		 
	 }
	 else if(strpos($command[0], 'LEFT') !== false){
		 $robotObj->shiftLeft();
	 }
	 else if(strpos($command[0], 'RIGHT') !== false){
		 $robotObj->shiftRight();
	 }
	 else if(strpos($command[0], 'MOVE') !== false){
		 $movereport = $robotObj->move();
		 //use $movereport to show move operation
	 }
	 else if($command[0] == "REPORT"){
		 $robotObj->report();
	 }
   
   }

   fclose($fp);
   
   
   
   $inputFilePath = "input1.txt";
   $fp = fopen($inputFilePath, "r");
   
   while (!feof($fp)){ 
     $current_line = fgets ($fp);
	 
     $command = explode(" ", $current_line);
	 
	 if(count($command) > 1) {
		 if($command[0] == 'PLACE' ) {
		    $subCommand = explode(",", $command[1]);
		 
		    $params   =  array();
		    $params['currentX'] = $subCommand[0];
		    $params['currentY'] = $subCommand[1];
		    $params['position'] = $subCommand[2];
		    
			$robotObj = new Robot($params);
		 }
		 
	 }
	 else if(strpos($command[0], 'LEFT') !== false){
		 $robotObj->shiftLeft();
	 }
	 else if(strpos($command[0], 'RIGHT') !== false){
		 $robotObj->shiftRight();
	 }
	 else if(strpos($command[0], 'MOVE') !== false){
		 $movereport = $robotObj->move();
		 //use $movereport to show move operation
	 }
	 else if($command[0] == "REPORT"){
		 $robotObj->report();
	 }
   
   }

   fclose($fp);
   
   
   
   $inputFilePath = "input2.txt";
   $fp = fopen($inputFilePath, "r");
   
   while (!feof($fp)){ 
     $current_line = fgets ($fp);
	 
     $command = explode(" ", $current_line);
	 
	 if(count($command) > 1) {
		 if($command[0] == 'PLACE' ) {
		    $subCommand = explode(",", $command[1]);

		    $params   =  array();
		    $params['currentX'] = $subCommand[0];
		    $params['currentY'] = $subCommand[1];
		    $params['position'] = $subCommand[2];
		 
		    $robotObj = new Robot($params);
		 }
	 }
	 else if(strpos($command[0], 'LEFT') !== false){
		 $robotObj->shiftLeft();
	 }
	 else if(strpos($command[0], 'RIGHT') !== false){
		 $robotObj->shiftRight();
	 }
	 else if(strpos($command[0], 'MOVE') !== false){
		 $movereport = $robotObj->move();
		 //use $movereport to show move operation
	 }
	 else if($command[0] == "REPORT"){
		 $robotObj->report();
	 }
   
   }

   fclose($fp);
?>