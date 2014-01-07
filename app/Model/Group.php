<?php
class Group extends AppModel{
	public $hasMany = array('User');
  public $actsAs = array('Acl' => array('type' => 'requester'));

  public function parentNode() {
      return null;
  }
}
?>
