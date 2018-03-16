<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;
use mvc\session\sessionClass as session;

$page_id = sitePagesTableClass::ID;
$desc_site_page = sitePagesTableClass::DESC_SITE_PAGE;
$site_page_hash = sitePagesTableClass::SITE_PAGE_HASH;
$status = sitePagesTableClass::STATUS;
$created_at = sitePagesTableClass::CREATED_AT;
?>  

<div class="container body">
    <div class="main_container">
        <?php echo view::includePartial("partials/sideBar", array('objProfile' => $objProfile)); ?>
        <?php echo view::includePartial("partials/topBar", array('objProfile' => $objProfile)) ?>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <?php if (session::getInstance()->hasError() or session::getInstance()->hasInformation() or session::getInstance()->hasSuccess() or session::getInstance()->hasWarning()): ?>
                          <?php view::includeHandlerMessage() ?>
                        <?php endif ?>
                        </br>
                        <div class="x_panel">

                            <div class="x_content">
                                <div class="page-title-bohemia ">
                                    <h2><i class="fa fa-file-text-o" aria-hidden="true"></i> Site Pages Manager</h2>
                                </div>

                                <div class="panel panel-success">
                                    <div class="panel-body">
                                        <div class=" pull-right">
                                            <a href="<?php echo routing::getInstance()->getUrlWeb("cms_site_pages", "insert") ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="button"><b>Manage Partials</b></a>
                                        </div>
                                    </div>
                                </div>

                                <div id="deleteBlog_panel"></div>

                                <table id="site_pages" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Created At </th>
                                            <th>Page Title</th>
<!--                                             <th>Created By </th>-->
<!--                                             <th>Published On </th>-->
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($objSitePages as $sitePage): ?>
                                          <tr>
                                              <td><?php if (empty($sitePage->$created_at)) { ?>
                                                    <button type="button" class="btn btn-danger btn-xs">Error!</button>
                                                  <?php } else { ?>
                                                    <?php echo $sitePage->$created_at; ?>
                                                  <?php } ?>
                                              </td>
                                              <td><?php if (empty($sitePage->$desc_site_page)) { ?>
                                                    <button type="button" class="btn btn-danger btn-xs">Error!</button>
                                                  <?php } else { ?>
                                                    <?php echo $sitePage->$desc_site_page; ?>
                                                  <?php } ?>
                                              </td>


                                              <td>
                                                  <?php if ($sitePage->$status == "1") { ?>
                                                    <button class="mdl-button mdl-js-button mdl-button--primary">
                                                        PUBLISHED
                                                    </button>
                                                  <?php } elseif ($sitePage->$status == "0") { ?>
                                                    <button class="mdl-button mdl-js-button mdl-button--danger">
                                                        NOT PUBLISHED
                                                    </button>
                                                  <?php } else { ?>
                                                    <button type="button" class="mdl-button mdl-js-button mdl-js-ripple-effect">NO STATUS</button>
                                                  <?php } ?>
                                              </td>
                                              <td>
                                                  <a href="<?php echo routing::getInstance()->getUrlWeb("cms_site_pages", "manage", array("hash"=> $sitePage->$site_page_hash)) ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect " type="button"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                                                  <button data-id="<?php echo $sitePage->$site_page_hash; ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--danger btnDelete_blog" type="button" data-toggle="tooltip" data-placement="top" title="delete Post"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>

                                              </td>
                                          </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Created At </th>
                                            <th>Page Title</th>
<!--                                             <th>Created By </th>-->
<!--                                             <th>Published On </th>-->
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>

                                <div class="ln_solid"></div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
        <?php echo view::includePartial("partials/modal", array('objProfile' => $objProfile)) ?>
        <?php echo view::includePartial("partials/footer") ?>

    </div>
</div>