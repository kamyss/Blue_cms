<?php
/**
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/6/24
 * Time: 8:45
 */

namespace App\Service\Theme;


interface ThemeService
{
    /**
     * 获取调用的模板文件存放位置
     * @param $model
     * @param $relation
     * @param $cate_id
     * @return mixed
     */
    public function getTheme($model, $relation, $cate_id);

    /**
     * 动态获取列表页显示模型
     * @param $model
     * @param $cate_id
     * @return mixed
     */
    public function getModuleModel($model, $cate_id);

    /**
     * 获取模块对应文档列表（带分页）
     * @param $id
     * @param string $page
     * @param int $pre
     * @return mixed
     */
    public function getList($id, $pre,$page = '1');

    /**
     * 获取nestable插件处理后的导航json数据
     * @return mixed
     */
    public function getMenu();

    /**
     * 获取单条内容
     * @param $cate_id
     * @param $id
     * @return mixed
     */
    public function getContent($cate_id, $id);

    /**
     * 获取所有tag
     * @return mixed
     */
    public function getAllTag();

}