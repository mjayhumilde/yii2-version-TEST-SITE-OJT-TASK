<?php

namespace app\assets;

use yii\web\AssetBundle;

class LeafletAsset extends AssetBundle
{
    // Remove the $sourcePath property to avoid the "does not exist" error
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css',
    ];

    public $js = [
        'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
