<?php

/**
 * \TechDivision\Properties\PropertiesInterface
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @category  Library
 * @package   TechDivision_Properties
 * @author    Tim Wagner <tw@techdivision.com>
 * @copyright 2014 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/TechDivision_Properties
 */

namespace TechDivision\Properties;

use TechDivision\Collections\Map;

/**
 * The interface for all property implementations.
 *
 * @category  Library
 * @package   TechDivision_Properties
 * @author    Tim Wagner <tw@techdivision.com>
 * @copyright 2014 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/TechDivision_Properties
 */
interface PropertiesInterface extends Map
{

    /**
     * Reads a property list (key and element pairs) from the passed file.
     *
     * @param string  $file     The path and the name of the file to load the properties from
     * @param boolean $sections Has to be TRUE to parse the sections
     *
     * @return \TechDivision\Properties\Properties The initialized properties
     * @throws \TechDivision\Properties\PropertyFileParseException Is thrown if an error occurse while parsing the property file
     * @throws \TechDivision\Properties\PropertyFileNotFoundException Is thrown if the property file passed as parameter does not exist in the include path
     */
    public function load($file, $sections = false);

    /**
     * Stores the properties in the property file. This method is NOT using the include path for storing the file.
     *
     * @param string $file The path and the name of the file to store the properties to
     *
     * @return void
     *
     * @throws \TechDivision\Properties\PropertyFileStoreException Is thrown if the file could not be written
     * @todo Actually only properties without sections will be stored, if a section is specified, then it will be ignored
     */
    public function store($file);

    /**
     * Searches for the property with the specified key in this property list.
     *
     * @param string $key     Holds the key of the value to return
     * @param string $section Holds a string with the section name to return the key for (only matters if sections is set to TRUE)
     *
     * @return string Holds the value of the passed key
     * @throws \TechDivision\Lang\NullPointerException Is thrown if the passed key, or, if sections are TRUE, the passed section is NULL
     */
    public function getProperty($key, $section = null);

    /**
     * Calls the HashMap method add.
     *
     * @param string $key     Holds the key of the value to return
     * @param mixed  $value   Holds the value to add to the properties
     * @param string $section Holds a string with the section name to return the key for (only matters if sections is set to TRUE)
     *
     * @return void
     * @throws \TechDivision\Lang\NullPointerException Is thrown if the passed key, or, if sections are TRUE, the passed section is NULL
     */
    public function setProperty($key, $value, $section = null);

    /**
     * Returns all key values as an array.
     *
     * @return array The keys as array values
     */
    public function getKeys();
}
