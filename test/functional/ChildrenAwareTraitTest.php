<?php

namespace Dhii\Data\FuncTest;

use Xpmock\TestCase;

/**
 * Tests {@see \Dhii\Data\ChildrenAwareTrait}.
 *
 * @since [*next-version*]
 */
class ChildrenAwareTraitTest extends TestCase
{
    /**
     * The name of the test subject.
     *
     * @since [*next-version*]
     */
    const TEST_SUBJECT_CLASSNAME = 'Dhii\\Data\\ChildrenAwareTrait';

    /**
     * Creates a new instance of the test subject.
     *
     * @since [*next-version*]
     *
     * @return \Dhii\Data\ChildrenAwareTrait
     */
    public function createInstance($children = array())
    {
        $mock = $this->getMockForTrait(static::TEST_SUBJECT_CLASSNAME, array(), '', true, true, true, array('_validateChild'));
        $this->reflect($mock)->children = $children;

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
     * Tests whether the children can be added and retrieved correctly.
     *
     * @since [*next-version*]
     */
    public function testCanGetAddChildren()
    {
        $subject = $this->createInstance();
        $_subject = $this->reflect($subject);
        $children = array(
            uniqid('child-') => uniqid('value-'),
            uniqid('child-') => uniqid('value-'),
            uniqid('child-') => uniqid('value-'),
            uniqid('child-') => uniqid('value-'),
        );

        foreach (array_values($children) as $_idx => $_child) {
            $subject->expects($this->at($_idx))
                    ->method('_validateChild')
                    ->with($_child);
        }

        $_subject->_addChildren($children);
        $result = $_subject->_getChildren();

        $this->assertEquals($children, $result, 'Children retrieved are not the same as chldren added', 0.0, 10, true);
    }
}
