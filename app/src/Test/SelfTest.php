<?php


namespace DI\Test;


use PHPUnit\Framework\TestCase;

class SelfTest extends TestCase
{

    public function testSelf(){
        $this->assertEquals('1','1', 'first Selftest');
        $this->assertEquals('1','0', 'secound Selftest');
    }

}
