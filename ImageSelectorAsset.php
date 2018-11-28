<?php

namespace lgxenos\yii2\imgSelector;

use yii\web\AssetBundle;

class ImageSelectorAsset extends AssetBundle {

	public $sourcePath = '@vendor/lg-xenos/yii2-img-selector/assets';

	public $js = [
		'fancybox.min.js',
		'res.js',
	];
	public $css = [
		'fancybox.css',
		'res.css',
	];
	public $depends = [
		'yii\web\JqueryAsset',
	];

	public function init() {
		//$this->setSourcePath(__DIR__ . '/assets');
		// $this->setupAssets('css', []);
		// $this->setupAssets('js', []);
		parent::init();
	}
}
