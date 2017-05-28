<?php
namespace Test\Parser;

use Tests\TestCase;
use Xetaio\Mentions\Parser\MentionConfiguration;

class MentionConfigurationTest extends TestCase
{
    /**
     * @var \Xetaio\Mentions\Parser\MentionConfiguration
     */
    protected $config;

    /**
     * Triggered before each test.
     *
     * @return void
     */
    public function setUp()
    {
        $this->config = $this->getObjectForTrait(\Xetaio\Mentions\Parser\MentionConfiguration::class);
    }

    /**
     * testSetConfig method
     *
     * @return void
     */
    public function testSetConfig()
    {
        $config = ['foo' => 'bar', 'baz' => 'for'];
        $this->config->setConfig($config);

        $this->assertEquals($config, $this->config->getConfig());
    }

    /**
     * testValidateName method
     *
     * @return void
     */
    public function testValidateName()
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->config->setOption('', 'bar');
    }

    /**
     * testGetOption method
     *
     * @return void
     */
    public function testGetOption()
    {
        $config = ['foo' => 'bar', 'baz' => 'foo'];
        $this->config->setConfig($config);

        $this->assertSame('bar', $this->config->getOption('foo'));
    }

    /**
     * testGetOptionNotExist method
     *
     * @return void
     */
    public function testGetOptionNotExist()
    {
        $this->assertNull($this->config->getOption('undefined'));
    }

    /**
     * testHasOption method
     *
     * @return void
     */
    public function testHasOption()
    {
        $config = ['foo' => 'bar', 'baz' => 'foo'];
        $this->config->setConfig($config);

        $this->assertTrue($this->config->hasOption('foo'));
        $this->assertFalse($this->config->hasOption('bar'));
    }

    /**
     * testMergeConfig method
     *
     * @return void
     */
    public function testMergeConfig()
    {
        $config = ['foo' => 'bar', 'baz' => 'foo'];
        $this->config->setConfig($config);

        $config = ['foo' => 'bar2', 'baz2' => 'foo'];
        $config = $this->config->mergeConfig($config);

        $expected = ['foo' => 'bar2', 'baz' => 'foo', 'baz2' => 'foo'];
        $this->assertSame($expected, $this->config->getConfig());
    }

    /**
     * testMergeConfigInverse method
     *
     * @return void
     */
    public function testMergeConfigInverse()
    {
        $config = ['foo' => 'bar', 'baz' => 'foo'];
        $this->config->setConfig($config);

        $config = ['foo' => 'bar2', 'baz2' => 'foo'];
        $config = $this->config->mergeConfig($config, true);

        $expected = ['foo' => 'bar', 'baz2' => 'foo', 'baz' => 'foo'];
        $this->assertSame($expected, $this->config->getConfig());
    }
}
