<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Tools\Di\Compiler\Config\Chain;

class ArgumentsSerializationTest extends \PHPUnit_Framework_TestCase
{
    public function testModifyArgumentsDoNotExist()
    {
        $inputConfig = [
            'data' => []
        ];
        $modifier = new ArgumentsSerialization();
        $this->assertSame($inputConfig, $modifier->modify($inputConfig));
    }

    public function testModifyArguments()
    {
        $inputConfig = [
            'arguments' => [
                'argument1' => [],
                'argument2' => null,
            ]
        ];

        $expected = [
            'arguments' => [
                'argument1' => serialize([]),
                'argument2' => null,
            ]
        ];

        $modifier = new ArgumentsSerialization();
        $this->assertEquals($expected, $modifier->modify($inputConfig));
    }
}
