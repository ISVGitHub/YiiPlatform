<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ISVWork
 * Date: 24.02.13
 * Time: 9:48
 * @package common widgets
 */
class MyBox extends CWidget
{
    /**
     * Name header box
     * @var string
     */
    public $name = '';

    /**
     * Mode imaging row or row-fluid
     * @var string
     */
    public $mode = '';

    /**
     * box HTML additional attributes
     * @var array
     */
    public $htmlOptions = array();

    /**
     * Title header content
     * @var string
     */
    public $titleHeaderContent = '';
    /**
     * Box content
     * optional, the content of this attribute is echoed as header content
     * @var string
     */
    public $mainBoxContent = 'this something content';
    /**
     * box content HTML additional attributes
     * @var array
     */
    public $htmlContentOptions = array();


    /**
     * Widget initializition
     */
    public function init()
    {
        // этот метод будет вызван внутри CBaseController::beginWidget()
        $this->renderRow();

    }

    /**
     * Get TbToggleButton
     */
    public function getToggleButton()
    {
        $this->widget('bootstrap.widgets.TbToggleButton', array(
            'onChange' => 'js:function($el, status, e){console.log($el, status, e);}',
            'name' => 'TestToggleButton',
        ));
    }

    public function run()
    {
        // этот метод будет вызван внутри CBaseController::endWidget()

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
     * Base method
     */
    public function renderRow()
    {
        if(isset($this->mode))
            echo CHtml::openTag('div', array('class'=>'row-'.$this->mode));
        else
            echo CHtml::openTag('div', array('class'=>'row'));
        // insert second tag
        $this->renderSpan();
        echo CHtml::closeTag('div');
    }

    public function renderSpan()
    {
        if(isset($this->htmlOptions['class']))
            echo CHtml::openTag('div', array('id'=>'col_'.$this->id, 'class'=>$this->htmlOptions['class']));
        else
            echo CHtml::openTag('div', array('id'=>'col_'.$this->id, array('class'=>'span12')));
        // insert second tag
        $this->renderBox();
        echo CHtml::closeTag('div');
    }

    public function renderBox()
    {
        echo CHtml::openTag('div', array('id'=>'box-'.$this->id, 'class'=>'box'));
        // insert second tag
        $this->renderBoxHeader();
        echo CHtml::closeTag('div');
    }

    public function renderBoxHeader()
    {
        echo CHtml::openTag('h4', array('class'=>'box-header round-top'));
        echo $this->name;
        // insert secong tag
        $this->renderThreeIconButtons();
        echo CHtml::closeTag('div');
        $this->box_container_toggle();
    }

    public function renderIconButtonClose()
    {
        echo CHtml::openTag('a', array('title'=>'close', 'class'=>'box-btn'));
        echo CHtml::openTag('i', array('class'=>'icon-remove'));echo CHtml::closeTag('i');
        echo CHtml::closeTag('a');
    }

    public function renderIconButtonToggle()
    {
        echo CHtml::openTag('a', array('title'=>'toggle', 'class'=>'box-btn'));
        echo CHtml::openTag('i', array('class'=>'icon-minus'));echo CHtml::closeTag('i');
        echo CHtml::closeTag('a');
    }

    public function renderIconConfigButton()
    {
        echo CHtml::openTag('a', array('title'=>'config', 'href'=>'#box-config-modal', 'data-toggle'=>'modal', 'class'=>'box-btn'));
        echo CHtml::openTag('i', array('class'=>'icon-cog'));echo CHtml::closeTag('i');
        echo CHtml::closeTag('a');
    }

    /**
     * Make three icon buttons
     */
    public function renderThreeIconButtons()
    {
       $this->renderIconButtonClose();
       $this->renderIconButtonToggle();
       $this->renderIconConfigButton();
    }

    public function box_container_toggle()
    {
        echo CHtml::openTag('div', array('class'=>'box-container-toggle'));
        //enter second tag
        echo $this->box_content();
        echo CHtml::closeTag('div');
    }

    public function box_content()
    {
        echo CHtml::openTag('div', array('class'=>'box-content'));
        // enter second tag
        $this->h2_and_MainBoxContent();
        echo CHtml::closeTag('div');
    }

    public function h2_and_MainBoxContent()
    {
        echo CHtml::openTag('h2');
        echo $this->titleHeaderContent;
        echo CHtml::closeTag('h2');
        echo $this->renderMainBoxContent();
    }

    public function renderMainBoxContent()
    {
       echo CHtml::openTag('p');
       echo $this->mainBoxContent;
       echo CHtml::closeTag('p');
    }

}
