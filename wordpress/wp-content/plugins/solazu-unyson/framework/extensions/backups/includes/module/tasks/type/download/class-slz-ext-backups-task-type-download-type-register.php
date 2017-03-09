<?php if ( ! defined( 'SLZ' ) ) die( 'Forbidden' );

class SLZ_Ext_Backups_Task_Type_Download_Type_Register extends SLZ_Type_Register {
	protected function validate_type(SLZ_Type $type) {
		return $type instanceof SLZ_Ext_Backups_Task_Type_Download_Type;
	}
}
