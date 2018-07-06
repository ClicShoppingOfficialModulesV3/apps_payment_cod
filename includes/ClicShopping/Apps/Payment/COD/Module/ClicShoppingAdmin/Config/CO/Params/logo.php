<?php
  /**
   *
   * @copyright Copyright 2008 - http://www.innov-concept.com
   * @Brand : ClicShopping(Tm) at Inpi all right Reserved
   * @license GPL 2 License & MIT Licencse

   */

  namespace ClicShopping\Apps\Payment\COD\Module\ClicShoppingAdmin\Config\CO\Params;

  class logo extends \ClicShopping\Apps\Payment\COD\Module\ClicShoppingAdmin\Config\ConfigParamAbstract {
    public $default = 'paiement_livraison.jpg';
    public $sort_order = 30;

    protected function init() {
      $this->title = $this->app->getDef('cfg_cod_no_logo_title');
      $this->description = $this->app->getDef('cfg_cod_logo_desc');
    }
  }
