<?php

namespace Dhii\Data\FuncTest;

use Xpmock\TestCase;

/**
 * Tests {@see \Dhii\Data\ParentAwareTrait}.
 *
 * @since [*next-version*]
 */
class ParentAwareTraitTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'Dhii\\Data\\ParentAwareTrait';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return \Dhii\Data\ParentAwareTrait
     */
    public function createInstance()
    {
        $mock = $this->getMockForTrait(static::TEST_SUBJECT_CLASSNAME, array(), '', true, true, true, array('_validateParent'));

        return $mock;
    }

    /**
     * Tests whether a valid instance of the test subject can be created.
     *
     * @since [*next-version*]
     */
    public function testCanBeCreated()
    {
        $subject = $this->createInstance();

        $this->assertInternalType('object', $subject, 'Subject is not a valid instance');
    }

    /**
     * Tests whether the parent can be assigned and retrieved correctly.
     *
     * @since [*next-version*]
     */
    public function testCanGetSetParent()
    {
        $subject = $this->createInstance();
        $parent = uniqid('parent-');
        $subject->expects($this->exactly(1))
                ->method('_validateParent')
                ->with($parent);
        $_subject = $this->reflect($subject);

        $_subject->_setParent($parent);
        $result = $_subject->_getParent();

        $this->assertSame($parent, $result, 'Parent retrieved is not the same as parent set');
    }
}
