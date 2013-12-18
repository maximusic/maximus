<?php
/**
 *
 * @author    Igor Chepurnoy <Chepurnoy@zfort.com>
 * @link      http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license   http://www.zfort.com/terms-of-use
 */
class SidebarInfoWidget extends CWidget {
   
    public $pageContent;
    
    public function run() {
        switch ($this->pageContent) {
            case "contact":
                $model = BlockModel::model()->findByAttributes(array('pageName' => $this->pageContent));
                break;
            default:
                break;
        }
        $this->render('_sidebarInfoWidget',array(
             'model' =>  $model
        ));
    }
}