<?php
/*
 * Uninstall.php
 * @copyright Copyright 2008 - http://www.innov-concept.com
 * @Brand : ClicShopping(Tm) at Inpi all right Reserved
 * @license GPL 2 License & MIT Licencse
*/

  namespace ClicShopping\Apps\Payment\COD\Sites\ClicShoppingAdmin\Pages\Home\Actions\Configure;

  use ClicShopping\OM\Registry;

  class Uninstall extends \ClicShopping\OM\PagesActionsAbstract {

    public function execute() {

      $CLICSHOPPING_MessageStack = Registry::get('MessageStack');
      $CLICSHOPPING_COD = Registry::get('COD');

      $current_module = $this->page->data['current_module'];

      $m = Registry::get('CodAdminConfig' . $current_module);
      $m->uninstall();

      $CLICSHOPPING_MessageStack->add($CLICSHOPPING_COD->getDef('alert_module_uninstall_success'), 'success', 'COD');

      $CLICSHOPPING_COD->redirect('Configure&module=' . $current_module);
    }
  }