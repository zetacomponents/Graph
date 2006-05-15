<?php
/**
 * File containing the abstract ezcGraphDatasetIntProperty class
 *
 * @package Graph
 * @version //autogentag//
 * @copyright Copyright (C) 2005, 2006 eZ systems as. All rights reserved.
 * @license http://ez.no/licenses/new_bsd New BSD License
 */
/**
 * Class for integer properties of datasets
 *
 * @package Graph
 */
class ezcGraphDatasetIntProperty extends ezcGraphDatasetProperty
{
    /**
     * Converts value to an ezcGraphColor object
     * 
     * @param & $value 
     * @return void
     */
    protected function checkValue( &$value )
    {
        $value = (int) $value;
        return true;
    }
}

?>