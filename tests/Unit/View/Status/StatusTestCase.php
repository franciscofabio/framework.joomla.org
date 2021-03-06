<?php
/**
 * Joomla! Framework Status Application
 *
 * @copyright  Copyright (C) 2014 Open Source Matters, Inc. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License Version 2 or Later
 */

namespace Joomla\Status\Tests\Unit\View\Status;

use Joomla\Status\Tests\Mock\DatabaseDriver;

/**
 * Abstract test case for the Status view classes
 */
abstract class StatusTestCase extends \PHPUnit_Framework_TestCase
{
	/**
	 * Mock PackageModel
	 */
	protected $mockModel;

	/**
	 * Mock RendererInterface
	 */
	protected $mockRenderer;

	/**
	 * Sets up the fixture, for example, open a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
		parent::setUp();

		$mockDbo = (new DatabaseDriver)->create($this, 'mysqli');

		$this->mockModel = $this->getMock('\\Joomla\\Status\\Model\\StatusModel', [], [$mockDbo]);
		$this->mockModel->expects($this->any())
			->method('getItems')
			->willReturn(array());

		$this->mockRenderer = $this->getMock('\\Joomla\\Renderer\\RendererInterface');
	}
}
