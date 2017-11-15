<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property integer $id
 * @property string $name
 * @property integer $field
 * @property integer $type
 * @property string $description
 * @property integer $status
 * @property string $country
 * @property string $phone
 * @property string $governorate
 * @property string $needs
 * @property integer $cost
 * @property string $reasons
 * @property integer $advertise
 * @property string $image
 */
class Project extends \yii\db\ActiveRecord
{
    public static   $projectFileds = ['ملابس','برمجيات','مواد غذائية','اثاث'],
                    $projectTypes = ['شركة','مصنع'],
                    $projectStatus = ['فكرة','تحت الانشاء'],
                    $projectNeeds = ['شريك','مستثمر','مشتري للمشروع'];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'field', 'type', 'description', 'status', 'country', 'phone', 'needs', 'cost', 'reasons'], 'required','message' => 'حقل مطلوب'],
            [['created_at','advertise'],'safe'],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg','message' => 'من فضلك فم برفع صور فقط'],
            [['cost','phone'], 'integer','message' => 'قم بادخال ارقام فقط'],
            [['name', 'description', 'country', 'reasons', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'اسم المشروع',
            'field' => 'مجال عمل المشروع',
            'type' => 'نوع المشروع',
            'description' => 'وصف المشروع',
            'status' => 'حالة المشروع',
            'country' => 'الدولة',
            'phone' => 'هاتف الاتصال',
            'needs' => 'احتياج المشروع لـ: ',
            'cost' => 'المبلغ المطلوب تقريباً',
            'reasons' => 'أسباب الاحتياج ',
            'image' => 'صورة المشروع',
            'advertise' => 'اعلن معنا'
        ];
    }

    public function searchProjects($keyWord,$country,$status,$needs)
    {
        $keyWord = strtolower($keyWord);
        $search = ['and',['like','LOWER(name)',$keyWord]];
        if($country)
            $search [] = ['=','country',$country];
        if($status)
            $search [] = ['=','status',$status];
        if($needs)
            $search [] = ['=','needs',$needs];

        $command = (new \yii\db\Query())
            ->select(['name','description','country','image','type','project_id'])
            ->from('project')
            ->where($search)
            ->createCommand();

        return $command->queryAll();       
    }
}
