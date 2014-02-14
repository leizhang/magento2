<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Magento
 * @package     Magento_Core
 * @copyright   Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace Magento\Core\Model\Layout\Argument;

/**
 * Layout argument updater processor
 *
 * @category    Magento
 * @package     Magento_Core
 * @author      Magento Core Team <core@magentocommerce.com>
 */

class Updater
{
    /**
     * @var \Magento\ObjectManager
     */
    protected $_objectManager;

    /**
     * @param \Magento\ObjectManager $objectManager
     */
    public function __construct(\Magento\ObjectManager $objectManager)
    {
        $this->_objectManager = $objectManager;
    }

    /**
     * Apply all updater to value
     *
     * @param mixed $value
     * @param array $updaters
     * @throws \InvalidArgumentException
     * @return mixed
     */
    public function applyUpdaters($value, array $updaters = array())
    {
        foreach ($updaters as $updater) {
            /** @var \Magento\Core\Model\Layout\Argument\UpdaterInterface $updaterInstance */
            $updaterInstance = $this->_objectManager->create($updater, array());
            if (false === ($updaterInstance instanceof \Magento\Core\Model\Layout\Argument\UpdaterInterface)) {
                throw new \InvalidArgumentException($updater
                        . ' should implement \Magento\Core\Model\Layout\Argument\UpdaterInterface'
                );
            }
            $value = $updaterInstance->update($value);
        }
        return $value;
    }
}
