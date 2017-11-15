<?php
use app\models\Project;
use app\controllers\ProjectController;
use yii\helpers\Html;
$this->title = 'المشروعات';
?>   

    <div role="tabpanel" class="tab-pane active" id="tab2">
        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 grey-border round-corner def-padding-sm grey btm-mrg-sm">
            <div class="row">
                <div class="col-md-9 col-lg-9 col-xs-12 col-sm-12 def-padding left-border ">
                    <h2 class="line-right sm-font zero-bottom-margin"><span class="black-font">تصنيفات البحث</span></h2>
                    <div class="cust-form col-md-10 col-lg-offset-2 col-md-10 col-lg-offset-2 search_box">
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">ابحث عن </label>
                            <div class="col-sm-8">
                                <input name="keyWord" type="text" class="form-control" id="" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">الدولة</label>
                            <div class="col-sm-8 ">
                                 <select class="form-control countriesList">
                                        <option autocomplete="off" selected="selected">أختر الدولة</option>
                                    <?php foreach($countriesList as $key => $country):?>
                                        <option value=<?=$key?>><?=$country?></option>
                                    <?php endforeach;?>
                                 </select>
                             </div>
                         </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">الحالة</label>
                            <div class="col-sm-8 ">
                                 <select class="form-control statusList">
                                        <option autocomplete="off" selected="selected">أختر الحالة</option>
                                    <?php foreach(Project::$projectStatus as $key => $status):?>
                                        <option value=<?=$key?>><?=$status?></option>
                                    <?php endforeach;?>
                                 </select>
                             </div>
                         </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">المشروع يحتاج</label>
                            <div class="col-sm-8 statusCheckbox">
                                <?php foreach(Project::$projectNeeds as $key => $need):?>
                                    <label class="checkbox-inline">
                                        <input class="statusCheckbox" type="checkbox" value=<?=$key?>><?=$need?>
                                    </label>
                                <?php endforeach;?>
                             </div>
                         </div>
                        <div class="col-sm-8 col-sm-offset-4">
                            <button type="submit" class="btn orange-btn search-btn">إبحث</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12 def-padding">
                    <p class="black-font sm-font text-center">
                        إقترح لي
                    </p>
                    <p class="grey-font md-font text-justify">
                        الاسم (وجنبه عدد المشروعات اللي تحت المستخدم ده)، والصورة ، البلد   ويتكتب استشاري في مجالات كذا
                    </p>
                    <button class="btn orange-btn search-btn">   إبدأ</button>
                </div>
            </div> <hr>

            <div class="projects">
                <?php if($projects && !empty($projects)): 
                            foreach($projects as $project):                
                    ?>
                    <!--PROJECT ROW -->
                    <div class="row project-row">
                        <div class="col-md-4 col">
                            <?php
                                $projectImage = '/images/projects/';
                                $projectImage .= ($project['image']) ? $project['image'] : "default/default.png";
                            ?>
                            <div>
                                <div class="type"><?=Project::$projectTypes[$project['type']]?></div>
                                <img class="project-image" src=<?=$projectImage?>>
                            </div>                    
                        </div>
                        <div class="col-md-8 project-info col">
                            <h4 id="name"><?=$project['name']?></h4>
                                <p id="description"><?=substr($project['description'],0,120)?>
                                    <a id="details" href=<?="/single-project/{$project['project_id']}"?>>المزيد</a>
                                </p>
                            <div class="info-bottom">
                                <span class="country">
                                    <?=ProjectController::countryName($project['country'])?>   
                                </span>
                                <span class="views"><?=$project['views']?> مشاهدة</span>
                            </div>
                        </div>
                    </div> <!--/PROJECT ROW -->
                    
                <?php endforeach; endif; ?>
            </div>
        </div>


    </div></div>
 </div>   