<?php
/*
 * Configure.php
 * @copyright Copyright 2008 - http://www.innov-concept.com
 * @Brand : ClicShopping(Tm) at Inpi all right Reserved
 * @license GPL 2 License & MIT Licencse
 
*/

  use ClicShopping\OM\HTML;
  use ClicShopping\OM\Registry;

  $CLICSHOPPING_MessageStack = Registry::get('MessageStack');
  $CLICSHOPPING_COD = Registry::get('COD');

  $CLICSHOPPING_Page = Registry::get('Site')->getPage();

  $current_module = $CLICSHOPPING_Page->data['current_module'];

  $CLICSHOPPING_COD_Config = Registry::get('CodAdminConfig' . $current_module);

  if ($CLICSHOPPING_MessageStack->exists('COD')) {
    echo $CLICSHOPPING_MessageStack->get('COD');
  }
?>
<div class="contentBody">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-block headerCard">
        <div class="row">
          <span class="col-md-1 logoHeading"><?php echo HTML::image($CLICSHOPPING_Template->getImageDirectory() . '/categories/modules_modules_checkout_payment.gif', $CLICSHOPPING_COD->getDef('heading_title'), '40', '40'); ?></span>
          <span class="col-md-4 pageHeading"><?php echo '&nbsp;' . $CLICSHOPPING_COD->getDef('heading_title'); ?></span>
          <span class="col-md-7 text-md-right"><?php echo HTML::button($CLICSHOPPING_COD->getDef('button_back'), null, $CLICSHOPPING_COD->link('index.php', 'A&Payment\COD'),  'primary'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="separator"></div>
<?php
  if ($CLICSHOPPING_COD_Config->is_installed === true) {
?>
  <form name="codConfigure" action="<?php echo $CLICSHOPPING_COD->link('Configure&Process&module=' . $current_module); ?>" method="post">

    <div class="mainTitle">
      <?php echo $CLICSHOPPING_COD->getConfigModuleInfo($current_module, 'title'); ?>
    </div>
    <div class="adminformTitle">
      <div class="card-block">

        <p class="card-text">
<?php
    foreach ($CLICSHOPPING_COD_Config->getInputParameters() as $cfg) {
      echo '<div>' . $cfg . '</div>';
      echo '<div class="separator"></div>';
    }
?>
        </p>
      </div>
    </div>

    <div class="separator"></div>
    <div class="col-md-12">
<?php
    echo HTML::button($CLICSHOPPING_COD->getDef('button_save'), null, null, 'success');

    if ($CLICSHOPPING_COD->getConfigModuleInfo($current_module, 'is_uninstallable') === true) {
        echo '<span class="float-md-right">' . HTML::button($CLICSHOPPING_COD->getDef('button_dialog_uninstall'), null, '#', 'warning', ['params' => 'data-toggle="modal" data-target="#ppUninstallModal"']) . '</span>';
    }
?>
    </div>
  </form>
<?php
    if ($CLICSHOPPING_COD->getConfigModuleInfo($current_module, 'is_uninstallable') === true) {
?>
      <div id="ppUninstallModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><?php echo $CLICSHOPPING_COD->getDef('dialog_uninstall_title'); ?></h4>
            </div>
            <div class="modal-body">
              <?php echo $CLICSHOPPING_COD->getDef('dialog_uninstall_body'); ?>
            </div>
            <div class="modal-footer">
              <?php echo HTML::button($CLICSHOPPING_COD->getDef('button_delete'), null, $CLICSHOPPING_COD->link('Configure&Delete&module=' . $current_module), 'danger'); ?>
              <?php echo HTML::button($CLICSHOPPING_COD->getDef('button_uninstall'), null, $CLICSHOPPING_COD->link('Configure&Uninstall&module=' . $current_module), 'danger'); ?>
              <?php echo HTML::button($CLICSHOPPING_COD->getDef('button_cancel'), null, '#', 'warning',  ['params' => 'data-dismiss="modal"']); ?>
            </div>
          </div>
        </div>
      </div>
<?php
    }
  } else {
?>
     <div class="col-md-12 mainTitle"><strong><?php echo $CLICSHOPPING_COD->getConfigModuleInfo($current_module, 'title'); ?></strong></div>
     <div class="adminformTitle">
       <div class="row">
         <div class="separator"></div>
          <div class="col-md-12">
            <div><?php echo $CLICSHOPPING_COD->getConfigModuleInfo($current_module, 'introduction'); ?></div>
            <div class="separator"></div>
            <div><?php echo HTML::button($CLICSHOPPING_COD->getDef('button_install_title', ['title' => $CLICSHOPPING_COD->getConfigModuleInfo($current_module, 'title')]), null, $CLICSHOPPING_COD->link('Configure&Install&module=' . $current_module), 'warning'); ?></div>
         </div>
       </div>
     </div>
<?php
  }
?>
    </div>
