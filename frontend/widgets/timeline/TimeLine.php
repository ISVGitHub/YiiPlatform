<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ISVWork
 * Date: 04.03.13
 * Time: 11:55
 * @package widgets
 */
class TimeLine extends CWidget
{
    public $var = array('');

    /**
     * Widget initializition
     */
    public function init()
    {
        // inside CBaseController::beginWidget()
        $this->render('index');
        $this->publicationAssets();
    }

    public function run()
    {
        // inside CBaseController::endWidget()

    }

    /*
     * Renders the opening of the content element and the optional content
     */
    public function renderContentBegin()
    {
        echo CHtml::openTag('div', $this->htmlContentOptions);
        if (!empty($this->content))
            echo $this->content;
    }

    /**
     * Closes the content element
     */
    public function renderContentEnd()
    {
        echo CHtml::closeTag('div');
    }

    /**
     * Publication in assets
     */
    public function publicationAssets()
    {
        $url = CHtml::asset(
            Yii::getPathOfAlias('frontend.widgets.timeline')
        );
        Yii::app()->clientScript->registerCssFile(
            $url.'/css/timeline.css'
        );
        Yii::app()->clientScript->registerScriptFile(
            '//www.google.com/jsapi'
        );
        /*Full timeline.js*/
        /*Yii::app()->clientScript->registerScriptFile(
            $url.'/js/timeline.js'
        );*/
        Yii::app()->clientScript->registerScriptFile(
            $url.'/js/timeline-min.js'
        );
        Yii::app()->clientScript->registerScriptFile(
            $url.'/js/timeline-interactive.js'
        );

        Yii::app()->clientScript->registerPackage($url.'/img');

    }





}
