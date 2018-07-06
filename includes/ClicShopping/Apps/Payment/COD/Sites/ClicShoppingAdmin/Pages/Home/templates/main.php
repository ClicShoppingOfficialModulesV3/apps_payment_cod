<?php
/*
 * main.php
 * @copyright Copyright 2008 - http://www.innov-concept.com
 * @Brand : ClicShopping(Tm) at Inpi all right Reserved
 * @license GPL 2 License & MIT Licencse
*/

  use ClicShopping\OM\HTML;
  use ClicShopping\OM\CLICSHOPPING;
  use ClicShopping\OM\Registry;

  $CLICSHOPPING_COD = Registry::get('COD');

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
          </div>
        </div>
      </div>
    </div>
    <div class="separator"></div>
    <div class="col-md-12 mainTitle"><strong><?php echo $CLICSHOPPING_COD->getDef('text_cod') ; ?></strong></div>
    <div class="adminformTitle">
      <div class="row">
        <div class="separator"></div>

        <div class="col-md-12">
          <div class="form-group">
            <div class="col-md-12">
              <?php echo $CLICSHOPPING_COD->getDef('text_intro');  ?>
            </div>
          </div>
          <div class="separator"></div>

          <div class="col-md-12 text-md-center">
            <div class="form-group">
              <div class="col-md-12">
<?php
  echo HTML::form('configure', CLICSHOPPING::link('index.php', 'A&Payment\COD&Configure'));
  echo HTML::button($CLICSHOPPING_COD->getDef('button_configure'), null, null, 'primary');
  echo '</form>';
?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
