<?php
use PHPUnit\Framework\TestCase;

final class Robot2Test extends TestCase
{
	private $robotObj;
	public function setUp(): void
    {
		$params   =  array();
		$params['currentX'] = 1;
		$params['currentY'] = 2;
		$params['position'] = "EAST";
        $this->robotObj = new Robot($params);
		$this->robotObj->move();
		$this->robotObj->move();
		$this->robotObj->shiftLeft();
		$this->robotObj->move();
    }
	
	public function testPosition()
    {
        
        //$this->assertNotEquals("NORTH", $this->robotObj->getRobotPosition());
		$this->assertSame("NORTH", $this->robotObj->getRobotPosition());
    }
	
	public function testCurrentX()
    {
        
        //$this->assertNotEquals("NORTH", $this->robotObj->getRobotPosition());
		$this->assertSame(3, $this->robotObj->getCurrentX());
    }

	public function testCurrentY()
    {
        
        //$this->assertNotEquals("NORTH", $this->robotObj->getRobotPosition());
		$this->assertSame(3, $this->robotObj->getCurrentY());
    }

}





