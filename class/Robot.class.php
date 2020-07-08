<?php
/**
* Filename   : Robot.class.php
*
* @author    : Sheikh Iftekhar <siftekher@gmail.com>
* @project   : Xplor
* @version   : 1.0.0
* @copyright :
**/


class Robot
{
   private $isGameStarted;
   private $currentX;
   private $currentY;
   private $robotPosition;
   
   private $positionList = array(0 => "NORTH", 1 => "EAST", 2 => "SOUTH", 3 => "WEST");
   
   const X_ROWS = 5;
   const Y_ROWS = 5;
   const EXCEPTION_NO_POSITION = 'Please provide correct Robot position.';
   const EXCEPTION_NO_X = 'Please provide correct X position.';
   const EXCEPTION_NO_Y = 'Please provide correct Y position.';
	
   public function __construct($params = null)
   {

	  if (empty($params['position']) || !in_array(trim($params['position']), $this->positionList) )
      {
          throw new Exception(SELF::EXCEPTION_NO_POSITION );
          return;
      }

	  if (!is_numeric($params['currentX']) || $params['currentX'] >= SELF::X_ROWS || $params['currentY'] < 0)
      {
          throw new Exception(SELF::EXCEPTION_NO_X );
          return;
      }

	  if (!is_numeric($params['currentY']) || $params['currentY'] >= SELF::Y_ROWS  || $params['currentY'] < 0 )
      {
          throw new Exception(SELF::EXCEPTION_NO_Y );
          return;
      }
	  
	  $this->setRobotPosition($params['position']);
	  $this->setCurrentX($params['currentX']);
	  $this->setCurrentY($params['currentY']);
	  
	  $this->setIsGameStarted(1);
   }
   
   
   /**
   * name: getIsGameStarted
   * @access public
   * @param  none
   * @return Integer
   */
   public function getIsGameStarted()
   {
      return $this->isGameStarted;
   }
   
   /**
   * name: setIsGameStarted
   * @access private
   * @param  $flag  --Integer
   * @return none
   */
   private function setIsGameStarted($flag = null)
   {
      $this->isGameStarted = $flag;
   }
   
   /**
   * name: getRobotPosition
   * @access public
   * @param  none
   * @return -- String
   */
   public function getRobotPosition()
   {
      return trim($this->robotPosition);
   }

   /**
   * name: setRobotPosition
   * @access private
   * @param  $flag  --String
   * @return none
   */   
   private function setRobotPosition($robotPosition = null)
   {
      $this->robotPosition = $robotPosition;
   }

   /**
   * name: getCurrentX
   * @access public
   * @param  none
   * @return -- Integer
   */  
   public function getCurrentX()
   {
      return $this->currentX;
   }
   /**
   * @access private
   * @param  $flag  -- String
   * @return none
   */   
   private function setCurrentX($CurrentX = null)
   {
      $this->currentX = $CurrentX;
   }
   
   /**
   * name: getCurrentY
   * @access public
   * @param none
   * @return -- String
   */  
   public function getCurrentY()
   {
      return $this->currentY;
   }

   /**
   * @access private
   * @param  $flag  --String
   * @return none
   */   
   private function setCurrentY($CurrentY = null)
   {
      $this->currentY = $CurrentY;
   }   
   
   /**
   * name: move
   * @access public
   * @param  none
   * @return boolean
   */
   public function move(){
	   
	   if($this->getIsGameStarted() !== 1) return;
	   
	   $isValidMove = true;
	   $position = $this->getRobotPosition();
	   
	   if(strpos($position, 'NORTH') !== false){
		   $tmp = $this->getCurrentY() + 1;
		   
		   if($tmp >= self::Y_ROWS) $isValidMove = false;
		   else $this->setCurrentY($tmp);
	   }
        
	   if(strpos($position, 'EAST') !== false){
		   $tmp = $this->getCurrentX() + 1;
		   
		   if($tmp >= self::X_ROWS) $isValidMove = false;
		   else $this->setCurrentX($tmp);
	   }

	   if(strpos($position, 'SOUTH') !== false){
		   $tmp = $this->getCurrentY() - 1;
		   
		   if($tmp <= 0) $isValidMove = false;
           else $this->setCurrentY($tmp);
	   }

	   if(strpos($position, 'WEST') !== false){
		   $tmp = $this->getCurrentX() - 1;
		   
		   if($tmp <= 0) $isValidMove = false;
           else $this->setCurrentX($tmp);
	   }
	   
	   //echo $this->getCurrentX() ."<>". $this->getCurrentY() . "<br>";
	   
	   return $isValidMove;
   }
  
   /**
   * name: shiftLeft
   * @access public
   * @param  none
   * @return none
   */
   public function shiftLeft()
   {
	   if($this->getIsGameStarted() !== 1) return;
	   
	   $tmp = $this->getRobotPosition();
	   $currentKey = array_search($tmp, $this->positionList);

	   $modifiedKey = $currentKey - 1;
	   
	   if($modifiedKey < 0) $modifiedKey = 3;

	   $this->setRobotPosition($this->positionList[$modifiedKey]);
   }
   
   
   /**
   * name: shiftRight
   * @access public
   * @param  none
   * @return none
   */
   public function shiftRight()
   {
	   if($this->getIsGameStarted() !== 1) return;
	   
	   $tmp = $this->getRobotPosition();
	   $currentKey = array_search($tmp, $this->positionList);
	   
	   $modifiedKey = $currentKey + 1;
	   if($modifiedKey > 3) $modifiedKey = 0;
	   
	   $this->setRobotPosition($this->positionList[$modifiedKey]);
   }
   
   /**
   * name: report
   * @access public
   * @param  none
   * @return none
   */
   public function report()
   {
	   $format = '%d,%d,%s';
       echo sprintf($format, $this->getCurrentX(), $this->getCurrentY(), $this->robotPosition). "<br>";
   }
   
}
?>