<?php

/**
 * Helper Text
 * @author    Igor Chepurnoy <Chepurnoy@zfort.com>
 */
class Image {

    /**
     * Function Get Image
     * @param type $text
     * @param type $param
     * @return string
     */
    public static function getImage($classModel, $id) {
        $image = $classModel::model()->findByPk($id);
        $modelFolder = str_replace("Model", "", $classModel);
        if ($image) {
            return "/uploads/{$modelFolder}/" . $id . "/image/" . $image->image;
        }
    }
}
