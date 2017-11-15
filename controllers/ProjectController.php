<?php

namespace app\controllers;
use app\models\Project;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use Yii;
class ProjectController extends \yii\web\Controller
{
	//ADD PROJECT 
    public function actionAddProject()
    {	
    	//instantiate project class
    	$project = new Project();

    	//read json file of all countries
		$countries_path = 'assets/json/countries.json';
		$countriesList = [];
		if(file_exists($countries_path))
		{
			$countries = self::readJson($countries_path);
			$countriesList = ArrayHelper::map($countries,'code','name');
		}

		//listining to $_POST and validate input
    	if($project->load(Yii::$app->request->post()) )
		{	
			//Mapping checkbox list
			if($project->needs)
			{
				$project->needs = implode(',', $project->needs);
			}

			$project->created_at = date('Y-m-d H:i:s');
			$project->project_id = self::generateProjectID('project_id');

			//handling uploaded image
			$project->image = UploadedFile::getInstance($project, 'image');
			if($project->image)
			{
				$imageName = self::generateProjectID('image').'.'. $project->image->extension;
	            $project->image->saveAs('images/projects/'.$imageName);
	            $project->image = $imageName;
			}

			//Insert values into `project` table
            if($project->save())
            {
            	//return success
            	Yii::$app->getSession()->setFlash('success','تم اضافة المشروع بنجاح');
            	return $this->redirect('add-project');
            }else
            {
            	//return with array of errors
            	return $this->render('add-project',['project' => $project, 'countriesList' => $countriesList,'errors' => $project->error]);
            }    
		}
		//rendering view on page load   	
        return $this->render('add-project',['project' => $project, 'countriesList' => $countriesList]);
    }


    //RENDER SINGLE PROJECT
    public function actionView()
    {
    	//return error in case of invalid routing
	   	if(!$projectID = Yii::$app->getRequest()->getQueryParam('id'))
    		throw new \yii\web\HttpException(404, 'The requested Item could not be found.');

		if(isset($projectID) && trim($projectID) != "")
		{
			//return error if the project doesn't exist
			$project = Project::find()->where(['project_id' => $projectID])->one();
			if(!$project)
				throw new \yii\web\HttpException(404, 'The requested Item could not be found.');
				$project->needs = explode(',', $project->needs);
				$project->updateCounters(['views' => 1]);
				$project = ArrayHelper::toArray($project);

			return $this->render('single-project',['project' => $project]);	
		}
	
    }



    //DISPLAY PROJECTS
    public function actionProjects()
    {
    	$projects = Project::find()->asArray()->all();

    	//read json file of all countries
		$countries_path = 'assets/json/countries.json';
		$countriesList = [];
		if(file_exists($countries_path))
		{
			$countries = self::readJson($countries_path);
			$countriesList = ArrayHelper::map($countries,'code','name');
		}
    	return $this->render('projects',['projects' => $projects,'countriesList' => $countriesList]);
    }


    public function actionSearch()
    {
		$request = Yii::$app->request;
		if($request->isAjax)
		{
			if($request->isGet)
			{
				$keyWord = $request->get('keyWord');
				$country = (!is_null($request->get('country'))) ? $request->get('country') : null;
				$status = (!is_null($request->get('status'))) ? $request->get('status') : null;
				$needs = (!is_null($request->get('needs'))) ? $request->get('needs') : null;

				if(!isset($keyWord) && !isset($country) && !isset($status) && !isset($needs))
				{
					$result = [
						'status' => 'error',
						'msg' => 'BAD REQUEST!'
					];
					return json_encode($result);					
				}
				$project = new Project();
				$projects = $project->searchProjects($keyWord, $country, $status, $needs);
				foreach ($projects as $key => $value) 
				{
					$projects[$key]['type'] = Project::$projectTypes[$value['type']];
					$projects[$key]['country'] = self::countryName($value['country']);
					$projects[$key]['image'] = ($value['image']) ? "/images/projects/{$value['image']}"
					: "/images/projects/default/default.png";
				}
				if($projects && !empty($projects))
				{
					$result = [
						'status' => 'success',
						'data' => $projects
					];
				}else
				{
					$result = [
						'status' => 'error',
						'msg' => 'NO DATA FOUND'
					];					
				}
				return json_encode($result);
			}
		}  	
    }

    //read json file of all countries
    private static function readJson($path)
    {
		$file = file_get_contents(Yii::getAlias('@webroot').'/'.$path);
		return json_decode($file, true);  	
    }



    //GET COUNTRY NAME BY COUNTRY CODE
    public static function countryName($code)
    {
		$countries_path = 'assets/json/countries.json';
		$countriesList = [];
		if(file_exists($countries_path))
		{
			$countries = self::readJson($countries_path);
			$countries = ArrayHelper::map($countries,'code','name');
			return $countries[$code];
		}
		return null;
    }


    private static function generateProjectID($attribute)
    {
    	$randomString = Yii::$app->getSecurity()->generateRandomString(32);
    	if(!Project::findOne([$attribute => $randomString]))
    		return $randomString;
		else
			return generateProjectID();
    }
}
