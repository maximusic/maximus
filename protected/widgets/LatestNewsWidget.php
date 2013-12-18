<?php
/**
 *
 * @author    Igor Chepurnoy <Chepurnoy@zfort.com>
 * @link      http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license   http://www.zfort.com/terms-of-use
 */
class LatestNewsWidget extends CWidget {
   
    public $limit;
    
    public function run() {
        $criteria =  new CDbCriteria();
        $criteria->order = 'RAND()';
        $criteria->limit = $this->limit;
        $model = ArticleModel::model()->findAll($criteria);
        $this->render('_latestNewsWidget',array(
             'model' =>  $model
        ));
    }
}
