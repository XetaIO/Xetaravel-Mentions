<?php
namespace Xetaio\Mentions\Parser;

use InvalidArgumentException;

trait MentionConfiguration
{
    /**
     * Configuration values
     *
     * @var array
     */
    protected $config = [];

    /**
     * Sets an instance configuration array
     *
     * @param array $config
     *
     * @return \Xetaio\Mentions\Parser\MentionConfiguration
     */
    public function setConfig(array $config)
    {
    	$this->config = $config;

        return $this;
    }

    /**
     * Obtains instance configuration array
     *
     * @return array
     */
    public function getConfig()
    {
    	return $this->config;
    }

    /**
     * Validates an option name
     *
     * @param string $name
     *
     * @throws \InvalidArgumentException
     *
     * @return void
     */
    protected function validateName($name)
    {
    	if (!is_string($name) || empty($name)) {
            throw new InvalidArgumentException("Option name must be a valid string");
        }
    }

    /**
     * Declares a non-transient configuration value
     *
     * @param string $name
     * @param mixed $value
     *
     * @return \Xetaio\Mentions\Parser\MentionConfiguration
     */
    public function setOption($name, $value)
    {
    	$this->validateName($name);
    	$this->config[$name] = $value;

        return $this;
    }

    /**
     * Obtains a configuration value
     *
     * @param string $name
     *
     * @return mixed
     */
    public function getOption($name)
    {
    	$this->validateName($name);

        if (array_key_exists($name, $this->config)){
    		return $this->config[$name];
        }

    	return null;
    }

    /**
     * Determines if current instance has the given option
     *
     * @param string $name
     *
     * @return bool
     */
    public function hasOption($name)
    {
    	return array_key_exists($name, $this->config);
    }

    /**
     * Merges configuration values with the new ones.
     *
     * @param array $values
     * @param boolean $invert
     *
     * @return \Xetaio\Mentions\Parser\MentionConfiguration
     */
    public function mergeConfig(array $values, $invert = false)
    {
    	$this->config = ($invert) ? array_merge($values, $this->config) : array_merge($this->config, $values);

        return $this;
    }
}
