<?php

namespace React\Tests\MySQL\Commands;

use PHPUnit\Framework\TestCase;
use React\MySQL\Commands\AuthenticateCommand;

class AuthenticateCommandTest extends TestCase
{
    /**
     * @doesNotPerformAssertions
     */
    public function testCtorWithKnownCharset()
    {
        new AuthenticateCommand('Alice', 'secret', '', 'utf8');
    }

    public function testCtorWithUnknownCharsetThrows()
    {
        if (method_exists($this, 'expectException')) {
            $this->expectException('InvalidArgumentException');
        } else {
            // legacy PHPUnit < 5.2
            $this->setExpectedException('InvalidArgumentException');
        }
        new AuthenticateCommand('Alice', 'secret', '', 'utf16');
    }
}
