<?php

/**
 * Dataset form.
 *
 * @package    indago
 * @subpackage form
 * @author     Your name here
 */
class DatasetNuevoForm extends BaseDatasetForm
{
	public function configure()
	{
		unset($this['id'], $this['created_at']);
	}
}
