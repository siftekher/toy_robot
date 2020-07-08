<?php
use PHPUnit\Framework\TestCase;

final class RobotTest extends TestCase
{
	private $robotObj;
	public function setUp(): void
    {
		$params   =  array();
		$params['currentX'] = 0;
		$params['currentY'] = 0;
		$params['position'] = "NORTH";
        $this->robotObj = new Robot($params);
		$this->robotObj->move();
		$this->robotObj->shiftRight();
    }
	
    public function testPosition()
    {
        //$this->assertNotEquals("NORTH", $this->robotObj->getRobotPosition());
		//$this->assertEquals("NORTH", $this->robotObj->getRobotPosition()); 
		$this->assertSame("EAST", $this->robotObj->getRobotPosition());
    }
	
	public function testPosition1()
    {
        
        //$this->assertNotEquals("NORTH", $this->robotObj->getRobotPosition());
		$this->assertSame("EAST", $this->robotObj->getRobotPosition());
    }
	
	public function testCurrentX()
    {
        
        //$this->assertNotEquals("NORTH", $this->robotObj->getRobotPosition());
		$this->assertSame(0, $this->robotObj->getCurrentX());
    }

	public function testCurrentY()
    {
        
        //$this->assertNotEquals("NORTH", $this->robotObj->getRobotPosition());
		$this->assertSame(1, $this->robotObj->getCurrentY());
    }

}





