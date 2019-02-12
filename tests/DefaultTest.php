<?php

namespace PageSEO\Test;

use PHPUnit\Framework\TestCase;

final class DefaultTest extends TestCase
{
    public function testTypos()
    {
        $seo = new \PageSEO\PageSEO();

        $this->assertEquals(1, 1);
    }
}
