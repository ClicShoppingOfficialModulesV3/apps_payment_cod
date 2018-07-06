<?php
/*
 * Home.php
 * @copyright Copyright 2008 - http://www.innov-concept.com
 * @Brand : ClicShopping(Tm) at Inpi all right Reserved
 * @license GPL 2 License & MIT Licencse

*/

  namespace ClicShopping\Apps\Payment\COD\Sites\ClicShoppingAdmin\Pages\Home;

  use ClicShopping\OM\Registry;

  use ClicShopping\Apps\Payment\COD\COD;

  class Home extends \ClicShopping\OM\PagesAbstract {
    public $app;

    protected function init() {
      $CLICSHOPPING_COD = new COD();
      Registry::set('COD', $CLICSHOPPING_COD);

      $this->app = $CLICSHOPPING_COD;

      $this->app->loadDefinitions('Sites/ClicShoppingAdmin/main');
    }
  }
