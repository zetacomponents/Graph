<?php
/**
 * ezcGraphHorizontalRendererTest 
 * 
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 * 
 *   http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 *
 * @package Graph
 * @version //autogen//
 * @subpackage Tests
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 */

require_once dirname( __FILE__ ) . '/test_case.php';

/**
 * Tests for ezcGraph class.
 * 
 * @package Graph
 * @subpackage Tests
 */
class ezcGraphHorizontalRendererTest extends ezcGraphTestCase
{
    protected $basePath;

    protected $tempDir;

    protected $renderer;

    protected $driver;

	public static function suite()
	{
	    return new PHPUnit_Framework_TestSuite( "ezcGraphHorizontalRendererTest" );
	}

    public function setUp()
    {
        parent::setUp();

        static $i = 0;
        if ( version_compare( phpversion(), '5.1.3', '<' ) )
        {
            $this->markTestSkipped( "This test requires PHP 5.1.3 or later." );
        }

        $this->tempDir = $this->createTempDir( __CLASS__ . sprintf( '_%03d_', ++$i ) ) . '/';
        $this->basePath = dirname( __FILE__ ) . '/data/';

        $this->renderer = new ezcGraphHorizontalRenderer();

        $this->driver = $this->getMockBuilder( 'ezcGraphSvgDriver' )
            ->enableArgumentCloning()
            ->setMethods( array(
                'drawPolygon',
                'drawLine',
                'drawTextBox',
                'drawCircleSector',
                'drawCircularArc',
                'drawCircle',
                'drawImage',
            ) )->getMock();
        $this->renderer->setDriver( $this->driver );

        $this->driver->options->width= 400;
        $this->driver->options->height= 200;
    }

    public function tearDown()
    {
        $this->driver = null;
        $this->renderer = null;

        if ( !$this->hasFailed() )
        {
            $this->removeTempDir();
        }
    }
// /*

    public function testRenderHorizontalStackedBar()
    {
        $this->driver
            ->expects( $this->at( 0 ) )
            ->method( 'drawPolygon' )
            ->with(
                $this->equalTo( array( 
                    new ezcGraphCoordinate( 200, 75. ),
                    new ezcGraphCoordinate( 200, 75. ),
                    new ezcGraphCoordinate( 200, 165. ),
                    new ezcGraphCoordinate( 200, 165. ),
                ), 1. ),
                $this->equalTo( ezcGraphColor::fromHex( '#FF0000' ) ),
                $this->equalTo( true )
            );
        $this->driver
            ->expects( $this->at( 1 ) )
            ->method( 'drawPolygon' )
            ->with(
                $this->equalTo( array( 
                    new ezcGraphCoordinate( 200, 75. ),
                    new ezcGraphCoordinate( 200, 75. ),
                    new ezcGraphCoordinate( 200, 165. ),
                    new ezcGraphCoordinate( 200, 165. ),
                ), 1. ),
                $this->equalTo( ezcGraphColor::fromHex( '#800000' ) ),
                $this->equalTo( false )
            );

        $this->renderer->drawHorizontalStackedBar( 
            new ezcGraphBoundings( 0, 0, 400, 200 ),
            new ezcGraphContext(),
            ezcGraphColor::fromHex( '#FF0000' ), 
            new ezcGraphCoordinate( .5, .2 ),
            new ezcGraphCoordinate( .5, .6 ),
            100,
            0
        );
    }
}
?>
