<?php

namespace lgxenos\yii2\imgSelector;

use yii\helpers\Html;
use yii\widgets\InputWidget;

class ImageSelector extends InputWidget {
	/** @var string путь к Responsive File Manager */
	public $fileManagerPathTpl = '"/adm-scripts/responsivefilemanager/filemanager/dialog.php?type=1&field_id=%s&relative_url=0&callback=ImageSelectorCallBack"';
	
	public function run() {
		if (!array_key_exists('class', $this->options)) {
			$this->options['class'] = 'form-control';
		}
		$this->options = array_merge($this->options, ['readonly' => true]);
		$input         = Html::textInput($this->name, $this->value, $this->options);
		if ($this->hasModel()) {
			$input = Html::activeTextInput($this->model, $this->attribute, $this->options);
		}
		$url          = sprintf($this->fileManagerPathTpl, $this->options['id']);
		$selectImgBtn = Html::a('Выбрать другую картинку', $url, [
			'class' => 'btn iframe-btn btn-default',
			'type'  => 'button',
		]);
		$removeImgBtn = Html::tag('span', 'Удалить картинку', [
			'class'       => 'btn btn-default js_RemoveImg',
			'type'        => 'button',
			'data-img-id' => $this->options['id'],
		]);
		$imgPreview   = Html::tag('div', '&nbsp;', [
			'id'    => 'preview__' . $this->options['id'],
			'class' => 'imgSelectorPreview',
			'style' => 'background-image:url("' . $this->model->{$this->attribute} . '");',
		]);
		echo '
			<div class="row">
				<span class="col-sm-2">' . $imgPreview . '</span>
				<span class="col-sm-10 center-block">' . $input . '<br>' . $selectImgBtn . ' ' . $removeImgBtn . '</span>
			</div>
		';
		
		$this->registerClientScript();
	}
	
	private function registerClientScript() {
		
		$view = $this->getView();
		
		ImageSelectorAsset::register($view);
		
	}
}
