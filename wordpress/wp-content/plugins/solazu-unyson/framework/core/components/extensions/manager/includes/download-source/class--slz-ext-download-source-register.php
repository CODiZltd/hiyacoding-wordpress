<?php if (! defined('SLZ')) { die('Forbidden'); }

class _SLZ_Ext_Download_Source_Register extends SLZ_Type_Register
{
	protected function validate_type( SLZ_Type $type ) {
		return $type instanceof SLZ_Ext_Download_Source;
	}
}

