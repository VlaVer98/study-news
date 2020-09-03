<?php
namespace app\controllers\admin;
use study_news\base\Controller;
use app\models\admin\AppModel;
use study_news\APP;
use study_news\Cache;

class AppController extends Controller {
	public function __construct($route) {
    	parent::__construct($route);
    	$this->layout = ADMIN_LAYOUT;
    	new AppModel;

		APP::$app->setProperty('category_file', self::getCategoryFile());
		APP::$app->setProperty('category_gallery', self::getCategoryGallery());

    	if(!(isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin') && $this->action != 'login') {
    		redirect('/admin/user/login');
    	}
   	}
   	private static function getCategoryFile() {
		$category = Cache::get('category_file');
		if(!$category) {
			$category = \R::getAssoc('SELECT * FROM category_file');
			Cache::set('category_file', $category, 3600*24*30);
		}
		return $category;
	}

	private static function getCategoryGallery() {
		$category = Cache::get('category_gallery');
		if(!$category) {
			$category = \R::getAssoc('SELECT * FROM category_gallery');
			Cache::set('category_gallery', $category, 3600*24*30);
		}
		return $category;
	}
}

?>