<?php
namespace app\widgets\group;

class Group {
	protected $tpl;
	protected $groups;
	protected $view;
	public function __construct($tpl) {
		$this->tpl = $tpl;
		$this->getGroups();
		$this->getView();

		echo $this->view;
	}

	protected function getGroups() {
		$this->groups = \R::findAll('group_student', "status=1");
	}

	protected function getView() {
		ob_start();
		require APP."/widgets/group/tpl/{$this->tpl}.php";
		$this->view = ob_get_clean();
	}
}
?>