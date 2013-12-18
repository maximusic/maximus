<?php
/**
 *
 * @author    Igor Chepurnoy <Chepurnoy@zfort.com>
 * @link      http://www.zfort.com/
 * @copyright Copyright &copy; 2000-2013 Zfort Group
 * @license   http://www.zfort.com/terms-of-use
 */
class CategoriesWidget extends CWidget {
    
    public function run(){
         $category = CategoryModel::model()->findAll();
        $this->render('_categoriesWidget',array(
            'category' => $category
        ));
    }
}