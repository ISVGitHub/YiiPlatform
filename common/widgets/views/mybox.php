<?php /* @var $this MywidgetsController */ ?>
<div class="row-fluid">
    <div id="col<?php echo $this->id; ?>" class="span12 column ui-sortable">
        <div id="box-<?php echo $this->id; ?>" class="box">
            <h4 class="box-header round-top">
                <?php echo $this->name; ?>

                <?php $this->activationButton(); ?>

                <div class="three-button">
                <?php $this->renderThreeIconButtons(); ?>
                </div>
            </h4>
            <div class="box-container-toggle">
                <div class="box-content">
                    <h2><?php echo $this->titleHeaderContent; ?></h2>
                    <p>
                        <?php echo $this->mainBoxContent; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>