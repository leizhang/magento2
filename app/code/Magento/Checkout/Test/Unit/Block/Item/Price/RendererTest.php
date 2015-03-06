<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Checkout\Test\Unit\Block\Item\Price;

use \Magento\Checkout\Block\Item\Price\Renderer;


class RendererTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Renderer
     */
    protected $renderer;

    protected function setUp()
    {
        $objectManagerHelper = new \Magento\Framework\Test\Unit\TestFramework\Helper\ObjectManager($this);

        $this->renderer = $objectManagerHelper->getObject(
            'Magento\Checkout\Block\Item\Price\Renderer'
        );
    }

    public function testSetItem()
    {
        $item = $this->getMockBuilder('Magento\Quote\Model\Quote\Item\AbstractItem')
            ->disableOriginalConstructor()
            ->getMock();

        $this->renderer->setItem($item);
        $this->assertEquals($item, $this->renderer->getItem());
    }
}
