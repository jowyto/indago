<?php



/**
 * Skeleton subclass for representing a row from the 'dataset' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Sat Dec 14 11:40:59 2013
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class Dataset extends BaseDataset
{
	public function __toString(){
		return $this->getDataset();
	}
}