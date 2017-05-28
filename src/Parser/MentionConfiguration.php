<?php
namespace Xetaio\Mentions\Parser;

use InvalidArgumentException;

trait MentionConfiguration
{
    /**
     * Configuration options.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Sets a configuration array.
     *
     * @param array $config
     *
     * @return \Xetaio\Mentions\Parser\MentionParser
     */
    public function setConfig(array $config)
    {
        $this->config = $config;

        return $this;
    }

    /**
     * Get all the configuration options.
     *
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * Validates an option name.
     *
     * @param string $name The option name to validate.
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
     * Set a configuration value with the option name.
     *
     * @param string $name The name of the option.
     * @param mixed $value The value of the option.
     *
     * @return \Xetaio\Mentions\Parser\MentionParser
     */
    public function setOption(string $name, $value)
    {
        $this->validateName($name);
        $this->config[$name] = $value;

        return $this;
    }

    /**
     * Get a configuration value by the option name.
     *
     * @param string $name The name of the option.
     *
     * @return mixed
     */
    public function getOption(string $name)
    {
        $this->validateName($name);

        if (array_key_exists($name, $this->config)) {
            return $this->config[$name];
        }

        return null;
    }

    /**
     * Determines if current instance has the given option.
     *
     * @param string $name
     *
     * @return bool
     */
    public function hasOption(string $name): bool
    {
        return array_key_exists($name, $this->config);
    }

    /**
     * Merges configuration values with the new ones.
     *
     * @param array $values The configuration options to merge.
     * @param boolean $invert Invert the merge order.
     *
     * @return \Xetaio\Mentions\Parser\MentionParser
     */
    public function mergeConfig(array $values, bool $invert = false)
    {
        $this->config = ($invert) ? array_merge($values, $this->config) : array_merge($this->config, $values);

        return $this;
    }
}
