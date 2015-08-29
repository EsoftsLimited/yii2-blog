<?php

namespace esoftslimited\blog\models;

use Yii;
use esoftslimited\blog\Module;
use pendalf89\filemanager\behaviors\MediafileBehavior;
use pendalf89\filemanager\models\Mediafile;
/**
 * This is the model class for table "blog_category".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $title
 * @property string $alias
 * @property integer $position
 *
 * @property Post[] $posts
 */
class Category extends \yii\db\ActiveRecord
{
    public $thumbnail;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog_category';
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'mediafile' => [
                'class' => MediafileBehavior::className(),
                'name' => 'category',
                'attributes' => [
                    'thumbnail',
                ],
            ]
        ];
    }
    public function getImage(){
        return  Mediafile::loadOneByOwner('category', $this->id, 'thumbnail');
    }
    /**
     * Thumbnail url by alias
     *
     * @param string $alias thumbnail alias
     * @return string thumbnail url
     */
    public function getThumbnailUrl($alias)
    {
        $thumbnail = $this->getImage();
        return $thumbnail ? $thumbnail->getThumbUrl($alias) : '';
    }
        /**
     * Html thumbnail image tag
     *
     * @param string $alias thumbnail alias
     * @param array $options html options
     * @return string Html image tag
     */
    public function getThumbnailImage($alias, $options=[])
    {
        $thumbnail = $this->getImage();

        if (empty($thumbnail)) {
            return '';
        }

        return $thumbnail->getThumbImage($alias, $options);
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'position','thumbnail'], 'integer'],
            [['title', 'alias'], 'required'],
            [['title', 'alias'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => Module::t('main', 'Parent category'),
            'title' => Module::t('main', 'Title'),
            'alias' => Module::t('main', 'Alias'),
            'position' => Module::t('main', 'Position'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['category_id' => 'id']);
    }

    /**
     * Get published posts
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getPublishedPosts()
    {
        return PostSearch::find()
            ->joinWith('category')
            ->where(['publish_status' => Post::STATUS_PUBLISHED, 'blog_category.id' => $this->id])
            ->all();
    }

    /**
     * @return null|string parent title
     */
    public function getParentTitle()
    {
        $model = Category::findOne($this->parent_id);

        return !empty($model) ? $model->title : null;
    }

    /**
     * Gets a list of all the models.
     * Can be used as array in yii\widgets\ActiveForm dropDownList().
     *
     * @param int $excludeId ignoring model with this id
     * @return array list of all models.
     */
    public static function getList($excludeId = 0)
    {
        $list = [];
        $query = self::find()->orderBy('position DESC, title');

        if (!empty($excludeId)) {
            $query->where('`id` != :excludeId', ['excludeId' => $excludeId]);
        }

        $models = $query->all();

        foreach ($models as $model) {
            $list[$model->id] = $model->title;
        }

        return $list;
    }
}
