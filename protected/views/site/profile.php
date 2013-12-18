<script>
    $(function() {
        $(".succsess_box").delay(1000).fadeOut();
        $(".info_box").delay(2000).fadeOut();
        
    })
</script>
<div id="simple_header">
    <div class="gradient">
        <div class="header">
            <h1>Your Profile</h1>
        </div>
    </div>
</div>
<?php if (Yii::app()->user->hasFlash('success')): ?>
    <div class="info">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>
<div id="breadcrumbs">
    <ul>
        <li class="first"><a href="./index.html" title="Home">Home</a></li>
        <li>User Profile</li>
    </ul>
    <div class="clear"></div>
</div>
<!-- End Breadcrumbs -->
<!-- Begin Content -->
<?php if (Yii::app()->user->hasFlash('successProfile')): ?>
    <div class="succsess_box">
        <?php echo Yii::app()->user->getFlash('successProfile'); ?>
    </div>        
<?php endif; ?>
<div class="content spr">
    <div class="cont">
        <div class="contact_form">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'userprofile',
                'enableAjaxValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
            ));
            ?>

            <p>
                <?php echo $form->labelEx($model, 'firstName'); ?>
                <?php echo $form->textField($model, 'firstName'); ?>
                <?php echo $form->error($model, 'firstName'); ?>
            </p>

            <p>
                <?php echo $form->labelEx($model, 'lastName'); ?>
                <?php echo $form->textField($model, 'lastName'); ?>
                <?php echo $form->error($model, 'lastName'); ?>
            </p>

            <p>
                <?php echo $form->labelEx($model, 'email'); ?>
                <?php echo $form->textField($model, 'email'); ?>
                <?php echo $form->error($model, 'email'); ?>
            </p>

            <div class="pi-row avatar-row">
                <?php echo $form->labelEx($model, 'Avatar'); ?>
                <?php echo $form->hiddenField($model, 'avatar'); ?>
                <img id="afterUploadPreview" src="<?php echo $model->getFileSrc('avatar') ?>" width="222">
            </div>
            <div class="pi-row clearfix">
                <?php
                $this->widget('ext.cocoCod.CocoCodWidget', array(
                    'id' => 'cocowidget1',
                    'onCompleted' => 'function(id,filename,jsoninfo){ $("#UserModel_avatar").val(filename); $("#afterUploadPreview").attr("src",jsoninfo.uploadUrl)}',
                    'onCancelled' => 'function(id,filename){ alert("cancelled"); }',
                    'onMessage' => 'function(m){ alert(m); }',
                    'allowedExtensions' => array('jpeg', 'jpg', 'gif', 'png'), // server-side mime-type validated
                    //'sizeLimit' => 20000000, // limit in server-side and in client-side
                    'uploadDir' => Yii::getPathOfAlias('webroot') . '/uploads/temp/', // coco will @mkdir it
                    'uploadUrl' => Yii::app()->getBaseUrl(true) . '/uploads/temp/', // coco will @mkdir it
                    'receptorClassName' => 'application.models.UserModel',
                    'methodName' => 'onFileUploaded',
                    'userdata' => array(),
                    'maxUploads' => -1, // defaults to -1 (unlimited)
                    'maxUploadsReachMessage' => 'No more files allowed', // if empty, no message is shown
                    'multipleFileSelection' => true, // true or false, defaults: true
                    'buttonText' => 'Upload photo',
                    'dropFilesText' => 'Upload or Drop here',
                    'htmlOptions' => array('style' => 'width: 300px;'),
                    'defaultControllerName' => '/site',
                ));
                ?>
            </div>

            <div class="row_form">
                <?php echo CHtml::ajaxSubmitButton('Save'); ?>
            </div>

            <?php $this->endWidget(); ?>
        </div>
        <br>
        <?php if (Yii::app()->user->hasFlash('successChangePassword')): ?>
            <div class="info_box">
                <?php echo Yii::app()->user->getFlash('successChangePassword'); ?>
            </div>
        <?php endif; ?>
        <div class="contact_form1">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'user-change-password',
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                    'validateOnChange' => true
                ),
            ));
            ?>

            <p>
                <?php echo $form->labelEx($passwordForm, 'oldPassword'); ?>
                <?php echo $form->passwordField($passwordForm, 'oldPassword'); ?>
                <?php echo $form->error($passwordForm, 'oldPassword'); ?>
            </p>

            <p>
                <?php echo $form->labelEx($passwordForm, 'newPassword'); ?>
                <?php echo $form->passwordField($passwordForm, 'newPassword'); ?>
                <?php echo $form->error($passwordForm, 'newPassword'); ?>
            </p>

            <p>
                <?php echo $form->labelEx($passwordForm, 'confirmPassword'); ?>
                <?php echo $form->passwordField($passwordForm, 'confirmPassword'); ?>
                <?php echo $form->error($passwordForm, 'confirmPassword'); ?>
            </p>

            <div class="row_form">
                <?php
                echo CHtml::submitButton('Save new password');
                ?>
            </div>

<?php $this->endWidget(); ?>
        </div>
    </div>

    <div id="sliding-navigation" class="sidebar">
        <?php
        $this->widget('application.widgets.SidebarInfoWidget', array(
            'pageContent' => 'contact'
        ));
        ?>
    </div>
    <div class="clear"></div>
</div>


