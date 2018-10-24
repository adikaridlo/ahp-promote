
<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
 
AppAsset::register($this);
?>
<style type="text/css">
    @media (min-width: 992px){
        .page-sidebar-closed.page-sidebar-closed-hide-logo .page-header.navbar .page-logo {
            /* padding: 0; */
            width: 80px;
        }
    }
</style>
<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <!-- <div class="page-logo"  id="header-logo"> -->
        <div class="page-logo" >
            <a href="/site/index" style="display:unset;float: none;">
                <?= Html::img(Yii::getAlias('@web/img/remmit.png'), ['width'=>'30%','margin-top' => '5%'])?>
               <!-- <center> -->
                <!-- <h5 class="logo-default" alt="logo" style="color:white">MOM</h5> -->
                <!-- <span class="logo-default" style="color:white"><h5 id="show-logo1" style="width: 150px">Merchant Operation Management</h5></span> -->
               <!-- </center>  -->
           </a>
            <div class="menu-toggler sidebar-toggler">
                <span></span>
            </div>
        </div>

        <div class="page-logo mini" style="display: none;vertical-align: middle;text-align: center;">
            <div class="menu-toggler sidebar-toggler">
                <span></span>
            </div>
            <?= Html::img(Yii::getAlias('@web/img/remmit.png'), ['width'=>'50%','margin-top' => '5%'])?>
           </a>
        </div>

        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
            <span></span>
        </a>  

        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <!--<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-bell"></i>
                        <span class="badge badge-default"> 7 </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="external">
                            <h3>
                                <span class="bold">12 pending</span> notifications</h3>
                            <a href="page_user_profile_1.html">view all</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">just now</span>
                                        <span class="details">
                                            <span class="label label-sm label-icon label-success">
                                                <i class="fa fa-plus"></i>
                                            </span> New user registered. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">3 mins</span>
                                        <span class="details">
                                            <span class="label label-sm label-icon label-danger">
                                                <i class="fa fa-bolt"></i>
                                            </span> Server #12 overloaded. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">10 mins</span>
                                        <span class="details">
                                            <span class="label label-sm label-icon label-warning">
                                                <i class="fa fa-bell-o"></i>
                                            </span> Server #2 not responding. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">14 hrs</span>
                                        <span class="details">
                                            <span class="label label-sm label-icon label-info">
                                                <i class="fa fa-bullhorn"></i>
                                            </span> Application error. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">2 days</span>
                                        <span class="details">
                                            <span class="label label-sm label-icon label-danger">
                                                <i class="fa fa-bolt"></i>
                                            </span> Database overloaded 68%. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">3 days</span>
                                        <span class="details">
                                            <span class="label label-sm label-icon label-danger">
                                                <i class="fa fa-bolt"></i>
                                            </span> A user IP blocked. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">4 days</span>
                                        <span class="details">
                                            <span class="label label-sm label-icon label-warning">
                                                <i class="fa fa-bell-o"></i>
                                            </span> Storage Server #4 not responding dfdfdfd. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">5 days</span>
                                        <span class="details">
                                            <span class="label label-sm label-icon label-info">
                                                <i class="fa fa-bullhorn"></i>
                                            </span> System Error. </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="time">9 days</span>
                                        <span class="details">
                                            <span class="label label-sm label-icon label-danger">
                                                <i class="fa fa-bolt"></i>
                                            </span> Storage server failed. </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-envelope-open"></i>
                        <span class="badge badge-default"> 4 </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="external">
                            <h3>You have
                                <span class="bold">7 New</span> Messages</h3>
                            <a href="app_inbox.html">view all</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                <li>
                                    <a href="#">
                                        <span class="photo">
                                            <img src="<?php echo Yii::getAlias('@web/theme/') ?>assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> 
                                        </span>
                                        <span class="subject">
                                            <span class="from"> Lisa Wong </span>
                                            <span class="time">Just Now </span>
                                        </span>
                                        <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="photo">
                                            <img src="<?php echo Yii::getAlias('@web/theme/') ?>assets/layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> </span>
                                        <span class="subject">
                                            <span class="from"> Richard Doe </span>
                                            <span class="time">16 mins </span>
                                        </span>
                                        <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="photo">
                                            <img src="<?php echo Yii::getAlias('@web/theme/') ?>assets/layouts/layout3/img/avatar1.jpg" class="img-circle" alt=""> </span>
                                        <span class="subject">
                                            <span class="from"> Bob Nilson </span>
                                            <span class="time">2 hrs </span>
                                        </span>
                                        <span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="photo">
                                            <img src="<?php echo Yii::getAlias('@web/theme/') ?>assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>
                                        <span class="subject">
                                            <span class="from"> Lisa Wong </span>
                                            <span class="time">40 mins </span>
                                        </span>
                                        <span class="message"> Vivamus sed auctor 40% nibh congue nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="photo">
                                            <img src="<?php echo Yii::getAlias('@web/theme/') ?>assets/layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> </span>
                                        <span class="subject">
                                            <span class="from"> Richard Doe </span>
                                            <span class="time">46 mins </span>
                                        </span>
                                        <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-calendar"></i>
                        <span class="badge badge-default"> 3 </span>
                    </a>
                    <ul class="dropdown-menu extended tasks">
                        <li class="external">
                            <h3>You have
                                <span class="bold">12 pending</span> tasks</h3>
                            <a href="app_todo.html">view all</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                <li>
                                    <a href="javascript:;">
                                        <span class="task">
                                            <span class="desc">New release v1.2 </span>
                                            <span class="percent">30%</span>
                                        </span>
                                        <span class="progress">
                                            <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">40% Complete</span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="task">
                                            <span class="desc">Application deployment</span>
                                            <span class="percent">65%</span>
                                        </span>
                                        <span class="progress">
                                            <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">65% Complete</span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="task">
                                            <span class="desc">Mobile app release</span>
                                            <span class="percent">98%</span>
                                        </span>
                                        <span class="progress">
                                            <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">98% Complete</span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="task">
                                            <span class="desc">Database migration</span>
                                            <span class="percent">10%</span>
                                        </span>
                                        <span class="progress">
                                            <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">10% Complete</span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="task">
                                            <span class="desc">Web server upgrade</span>
                                            <span class="percent">58%</span>
                                        </span>
                                        <span class="progress">
                                            <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">58% Complete</span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="task">
                                            <span class="desc">Mobile development</span>
                                            <span class="percent">85%</span>
                                        </span>
                                        <span class="progress">
                                            <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">85% Complete</span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="task">
                                            <span class="desc">New UI release</span>
                                            <span class="percent">38%</span>
                                        </span>
                                        <span class="progress progress-striped">
                                            <span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">38% Complete</span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>-->
                
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="color:white">
                        <?php 
                        $name = Yii::$app->user->identity->name;
                        echo  $name; ?>
                        <!-- <img alt="" class="img-responsive" src="<?php echo Yii::getAlias('@web/theme/') ?>assets/pages/img/logo_layout.png" /> -->
                        <span class="username username-hide-on-mobile">  </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <!-- <li class="divider"> </li> -->
                        <?php 
                            $id = Yii::$app->user->identity->merchant_id; 
                            if (Yii::$app->user->identity->user_type == 'merchant') { 
                                $url = 'merchant/update?id='.$id;
                            } elseif (Yii::$app->user->identity->user_type == 'aggregator') {
                                $url = 'merchant/update-aggregator?id='.$id;
                            }
                        ?>
                        <?php if ((Yii::$app->user->identity->user_type == 'merchant') || (Yii::$app->user->identity->user_type == 'aggregator')) { ?>
                        <li>
                            <a href="<?php echo Yii::$app->urlManager->createUrl($url)?>">
                                <i class="icon-user"></i> Profile </a>
                        </li>
                        <?php } ?>
                        
                        <!-- <li>
                            <a href="<?php echo Yii::$app->urlManager->createUrl('/change-password')?>">
                                <i class="icon-lock"></i> Change Password </a>
                        </li> -->
                        <li>
                            <a href="<?php echo Yii::$app->urlManager->createUrl('/site/logout')?>">
                                <i class="icon-key"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

<?php  

$en = <<< JS
$( ".sidebar-toggler" ).click(function() {
    let collapse = $(".page-header-fixed").hasClass('page-sidebar-closed');
    if(collapse){
        $('.page-logo').show();
        $('.mini').hide();
    }else {
        $('.page-logo').hide();
        $('.mini').show();
    }
});
JS;

$this->registerJs($en,  \yii\web\View::POS_END);
?>


