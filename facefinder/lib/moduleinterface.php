<?php



interface OC_Module_Interface {
	/**
	 * for the construction of the class you need the path
	 * @param unknown_type $paht
	 */
	public  function __construct($path);
	public function insert();
	public function remove();
	public function update($newpaht);
	public function search($query);
	public function getID();
	public function equivalent();
}