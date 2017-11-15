<?php
use app\models\Project;
use app\controllers\ProjectController;
?>  
    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 grey-border round-corner">
        <div class="col-md-10 col-lg-10 col-xs-12 col-sm-12 center-table">
            <h2 class="full-lines sm-font"><span class="blue-font"><?=$project['name']?></span></h2>
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 grey-border round-corner def-padding">
                    <div class="row">
                        <div class="col-md-5 col-lg-5 col-xs-6 col-sm-6">
                            <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                <img src="/images/img-part-1.jpg" class="">
                                <a class="sm-border-btn round-corner grey-border"><i class="message-box"></i></a>
                                <a class="sm-border-btn round-corner grey-border"><i class="call-icon"></i></a>
                            </div>
                            <div class="col-md-8 col-lg-8 col-xs-12 col-sm-12 def-padding zero-top-padding">
                                <p class="sm-font black-font">
                                    أحمد عبد الملك
                                </p>
                                <p class="md-font orange-font">رائد أعمال في الصناعة</p>
                                <p class="md-font grey-font">البلد : مصر</p>
                                <p class="md-font grey-font">نوع المشروع :  مصنع</p>
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 col-xs-12 col-sm-12">
                            <p class="text-right grey-font md-font">مقدمة :</p>
                            <p class="text-right grey-font md-font">
                                يطلق مسمى تدوير على عدد من مشروعات التدوير المتنوعة ، ولا تقتصر فقط على المخلفات .. فعلى سبيل المثال وليس الحصر يطلق هذا اللفظ على (تدوير قش الأرز– تدوير تراب الأسمنت الناتج من مصانع الأسمنت
                            </p>
                        </div>
                        <!---->
                    </div>
                    <div class="row">


                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-6 def-padding-sm">
                            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 grey-border def-padding-sm round-corner" style="height: 192px;">
                                <div class="col-md-4 col-lg-4 col-xs-6 col-sm-6">
                                    <p class="black-font bold">يحتاج إلى:</p>
                                </div>
                                <div class="col-md-8 col-lg-8 col-xs-6 col-sm-6">
                                    <?php
                                        foreach(Project::$projectNeeds as $key => $need):
                                            $iClass = 'tick-none';
                                            $pClass = 'grey-font sm-font';
                                            if(in_array($key, $project['needs'])):
                                                $iClass = 'green-tick';
                                                $pClass = 'blue-font sm-font';
                                            endif;
                                    ?>
                                    <div class="col-md-6 col-lg-6 col-xs-12 col-sm-6">
                                        <i class=<?=$iClass?>></i>
                                        <p class=<?=$pClass?>><?=$need?></p>
                                    </div>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-6 def-padding-sm">
                            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 grey-border round-corner def-padding-sm">
                                <div class="col-md-6 col-lg-6 col-xs-12 col-sm-6">
                                    <p class="orange-font sm-font text-right float-right">الدولة:</p>
                                    <p class="grey-font sm-font text-right float-right">
                                     <?=ProjectController::countryName($project['country'])?>   
                                    </p>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xs-12 col-sm-6">
                                    <p class="orange-font sm-font text-right float-right"> المشاهدات:</p>
                                    <p class="grey-font sm-font text-right float-right"><?=$project['views']?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-6 def-padding-sm">
                            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 grey-border round-corner def-padding-sm" style="height: 120px">
                                <div class="col-md-10 col-lg-10 col-xs-12 col-sm-12 col-md-offset-2 col-lg-offset-2">
                                    <?php foreach (Project::$projectStatus as $key1 => $status):?>
                                    <div class="col-md-6 col-xs-12 col-sm-6">
                                        <?php if($key1 == $project['status']) echo '<i class="green-tick"></i>'; ?>
                                        <p class="orange-font md-font text-right float-right"><?=$status?></p>
                                    </div>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12 def-padding-sm">
                            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 grey-border round-corner def-padding-sm">
                                <p class="black-font md-font text-right">
                                    يحتاج منتجات:
                                </p>
                                <p><?=$project['reasons']?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                        $projectImage = '/images/projects/';
                        $projectImage .= ($project['image']) ? $project['image'] : "default/default.png";
                    ?>
                    <img class="round-corner def-padding-sm" src=<?=$projectImage?>>
                    <p class="grey-font md-font text-justify def-padding-sm">
                        <?=$project['description']?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div></div>
