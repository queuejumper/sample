<?php
use yii\widgets\ActiveForm;
use app\models\Project;
use yii\helpers\Html;
$this->title = 'أضف مشروع جديد';
?>
       
        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 triangle-tabs no-border">
            <div class="col-md-12 contact-heading-title text-center bt_heading_3">
                <h1>اضف<span> مشروع</span> جديد</h1>
                <div class="blind line_1"></div>
                    <div class="flipInX-1 blind icon">
                        <span class="icon"><i class="fa fa-stop">
                            </i>&nbsp;&nbsp;<i class="fa fa-stop"></i>
                        </span>
                    </div>
                <div class="blind line_2">
                </div>
            </div>
             <?php
                foreach (Yii::$app->session->getAllFlashes() as $type => $message)
                {
                    echo "<div class='alert-message {$type}'>{$message}</div>"; 
                }
            ?>
            <?= Html::errorSummary($project, ['class' => 'errors']) ?>
            <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
                <?= $form->field($project, 'name') ?>
                <div class="row">
                    <div class="col-sm-6">
                        <?= $form->field($project, 'field')->dropDownList(
                                          Project::$projectFileds,
                                          [
                                          'prompt'=>'أختر مجال المشروع']
                                      )
                        ?>
                    </div>
                    <div class="col-sm-6">
                        <?= $form->field($project, 'type')->dropDownList(
                                          Project::$projectTypes,
                                          [
                                          'prompt'=>'أختر نوع عمل المشروع']
                                      )
                        ?>
                    </div>
                </div>
                <?= $form->field($project, 'description')->textArea()?>
                <div class="row">
                    <div class="col-sm-6">
                        <?= $form->field($project, 'status')->dropDownList(
                                          Project::$projectStatus,
                                          ['prompt'=>'أختر مجال المشروع']
                                      )
                        ?>
                    </div>
                    <div class="col-sm-6">
                        <?= $form->field($project, 'country')->dropDownList(
                                          $countriesList,
                                          ['prompt'=>'الدولة']
                                      )
                        ?>
                    </div>
                </div>

                <div class="col-md-12 contact-heading-title text-center bt_heading_3">
                    <h1>بيانات الاتصال</h1>
                    <div class="blind line_1"></div>
                        <div class="flipInX-1 blind icon">
                            <span class="icon"><i class="fa fa-stop">
                                </i>&nbsp;&nbsp;<i class="fa fa-stop"></i>
                            </span>
                        </div>
                    <div class="blind line_2">
                    </div>
                </div>
                <?= $form->field($project, 'phone') ?>

                <div class="col-md-12 contact-heading-title text-center bt_heading_3">
                    <h1>احتياجاتالمشروع</h1>
                    <div class="blind line_1"></div>
                        <div class="flipInX-1 blind icon">
                            <span class="icon"><i class="fa fa-stop">
                                </i>&nbsp;&nbsp;<i class="fa fa-stop"></i>
                            </span>
                        </div>
                    <div class="blind line_2">
                    </div>
                </div>
                <?= $form->field($project, 'needs')->checkboxList(
                                Project::$projectNeeds
                                 )
                ?>
                <?= $form->field($project, 'cost') ?>
                <?= $form->field($project, 'reasons')->textArea() ?>
                <?= $form->field($project, 'advertise')->radioList(
                                ['1' => 'اعلن معنا']
                                 )->label(false);
                ?>
                <?=$form->field($project, 'image')->fileInput();?>
                <?= Html::submitButton('أضف', ['class' => 'btn btn-primary']) ?>        
            <?php ActiveForm::end(); ?>
    

                    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 grey-border round-corner def-padding-sm lg-btm-mrg">
                        <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12 left-border def-padding-sm" >
                            <p class="black-font sm-font text-right bold">
                                إعادة تدوير مخلفات
                            </p>
                            <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                <img src="images/project-owner.jpg" class="justified-img">
                            </div>
                            <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <p class="md-font  orange-font zero-bottom-margin cst-right-alignment">المشروع:  </p>
                                    <p class="md-font grey-font zero-bottom-margin">تحت التطوير</p>
                                </div>
                                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <p class="md-font  orange-font zero-bottom-margin cst-right-alignment">الدولة: </p>
                                    <p class="md-font  grey-font zero-bottom-margin ">جمهورية مصر العربية</p>
                                </div>
                                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                    <p class="md-font  orange-font zero-bottom-margin cst-right-alignment">المشاهدات:</p>
                                    <p class="md-font  grey-font zero-bottom-margin ">12</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12 left-border def-padding-sm">
                            <p class="md-font text-right grey-font zero-bottom-margin sm-top-padding">
                                كثير من أكبر وأنجح رجال الأعمال في العالم بدأوا وليس لديهم غير حب المغامره وشغفهم بفكرتهم ومشروعهم وثقتهم في نفسهم...الموضوع مش صعب ولا مستحيل كثير من أكبر وأنجح رجال الأعمال في العالم بدأوا وليس لديهم غير حب المغامره وشغفهم بفكرتهم ومشروعهم وثقتهم في نفسهم...الموضوع مش صعب ولا مستحيل
                            </p>
                        </div>
                        <div class="col-md-2 col-lg-2 col-xs-12 col-sm-12  def-padding-sm" >
                            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                <p class="black-font sm-font text-center bold">
                                    مالك المشروع
                                </p>
                                <img src="images/project-owner.jpg" class="justified-img">
                                <p class="black-font sm-font text-center bold zero-bottom-margin">
                                    محمود  خليفة
                                </p>
                                <div class="abs-btn cst">
                                    <a class="sm-border-btn round-corner grey-border"><i class="message-box"></i></a>
                                    <a class="sm-border-btn round-corner grey-border"><i class="call-icon"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="left-btns-cont-bottom center-button"><a href="#" class="btn white-btn md-font text-center border-btn">المزيد ...</a></div>

                    </div><!--end single item-->
                </div>
            </div>
        </div>
    </div>
</div>

