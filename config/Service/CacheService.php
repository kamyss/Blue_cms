<?php
/**
 * 缓存服务，将缓存同一管理，利用事件监听
 * Created by PhpStorm.
 * User: Blue
 * Date: 2017/5/29
 * Time: 14:03
 */


return [
     /*
     |--------------------------------------------------------------------------
     | Cache Status
     |--------------------------------------------------------------------------
     |
     | Enable or disable cache
     |
     */
    'enable' => true,
     /*
     |--------------------------------------------------------------------------
     | Cache Minutes
     |--------------------------------------------------------------------------
     |
     | Time of expiration cache
     |
     */
    'minutes' => '30',
     /*
    |--------------------------------------------------------------------------
    | Actions in Service
    |--------------------------------------------------------------------------
    |
    | created : Clear Cache on create
    | updated : Clear Cache on update
    | deleted : Clear Cache on delete
    |
    */
    'clean' => [
        'created' => true,
        'updated' => true,
        'deleted' => true,
    ],
    'allowed' => [
    /*
    |--------------------------------------------------------------------------
    | Methods Allowed
    |--------------------------------------------------------------------------
    |
    | methods cacheable : all, paginate
    |
    |
    */
        'all' => true,
        'paginate' => true,
    ],
];