<?php

/*
 * This file is part of the Sonata Project package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\CoreBundle\Tests\Model;

use Doctrine\DBAL\Connection;
use PHPUnit\Framework\TestCase;
use Sonata\CoreBundle\Model\BaseManager;

class ManagerTest extends BaseManager
{
    /**
     * Get the DB driver connection.
     *
     * @return Connection
     */
    public function getConnection()
    {
        return;
    }

    /**
     * @param $object
     */
    public function publicCheckObject($object)
    {
        return $this->checkObject($object);
    }
}

/**
 * @author Hugo Briand <briand@ekino.com>
 */
class BaseManagerTest extends TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Object must be instance of class, DateTime given
     */
    public function testCheckObject()
    {
        $manager = new ManagerTest('class', $this->createMock('Doctrine\Common\Persistence\ManagerRegistry'));

        $manager->publicCheckObject(new \DateTime());
    }
}
