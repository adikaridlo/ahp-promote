<?php 
use app\components\rbac\MenuHelper;
use app\components\rbac\Helper;
use yii\bootstrap\Nav;
use app\models\MerchantRequest;
// use app\widgets\MenuWidget; 
use yii\widgets\Menu;
use yii\bootstrap\NavBar; 
use yii\helpers\Html; 
?>

<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <!-- <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px"> -->

        <?php 
            $callback = function($menu){

                $item      = Yii::$app->controller->action->id;
                // $data   = eval($menu['data']);
                $data      = json_decode($menu['data'], true);
                $icon      = isset($data['icon']) ? $data['icon'] : '';
                $accordion = !empty($menu['children']) ? '<span class="selected"></span><span class="arrow"></span>' : '';
                $navToogle = ($menu['route'] == '/#') ? 'nav-toggle' : '';
                // $merch     = MerchantRequest::find()->where(['not in', 'status', ['rejected', 'verified']])->count();
                $notif     = isset($data['notif']['count']) ? $data['notif']['count'] > 0 ? '<small id="notif" class="label label-danger pull-right">'. $data['notif']['count'] .'</small>' : ''  : '';
                // $notif     = isset($data['notif']['count']) ? $merch > 0 ? '<small class="label label-danger pull-right">'. $merch .'</small>' : ''  : '';
                $notif     = \Yii::$app->user->identity->user_type == 'admin' ? $notif : '';
                // $hide = !(isset($data['hide']) ? ($data['hide'] == 1 ? true : false) : false);
                
                $hide = 1;

                /*
                    - ada 2 menu report, 1. report tanpa dropdown dan 2. report dengan dropdown
                    - tampilkan menu report tanpa dropdown jika yang login (merchant) dan
                    - tamilkan menu report dropdown jika super admin / admin 
                 */
                if ((isset($data['hide']) && $data['hide'] == 1)) {
                    if (Yii::$app->user->can('merchant') && Yii::$app->user->can('report_merchant')) {
                        if ($menu['route'] != '/#') {
                            $hide = 1;
                        } else $hide = 0;
                    }
                    elseif (Yii::$app->user->can('sub_merchant') && Yii::$app->user->can('qr_merchant')) {
                        if ($menu['route'] != '/#') {
                            $hide = 1;
                        } else $hide = 0;
                    }
                     else {
                        if ($menu['route'] != '/#') {
                            $hide = 0;
                        } else $hide = 1;
                    }

                    if (Yii::$app->user->can('admin') && Yii::$app->user->can('monitoring_fee_bni')) {
                        if ($menu['route'] != '/#') {
                            $hide = 1;
                        } else $hide = 0;
                    }
                     else {
                        if ($menu['route'] != '/#') {
                            $hide = 0;
                        } else $hide = 1;
                    }
                }

                $v_route = function() use ($menu,$hide){
                    if ($menu['route'] == '/merchant/generate-qr' && !Yii::$app->user->can('sub_merchant')) {
                        return 0;
                    }else{
                        return $hide;
                    }
                };
                
                return [
                    'label'    => $menu['name'],
                    'url'      => ($menu['route'] == '/#') ? 'javascript:;' : $menu['route'],
                    'option'   => $data,
                    'visible'  => $v_route(),
                    'icon'     => 'fa fa-dashboard',
                    'items'    => $menu['children'],
                    'template' => '<a href="{url}" class="nav-link '.$navToogle.'"><i class="'.$icon.'"></i> <span class="title">{label}</span>'.$notif.$accordion.'</a>',
                    // 'visible' => Yii::$app->user->can('role')
                ];
            };

            $items = MenuHelper::getAssignedMenu(Yii::$app->user->id, null, $callback);
            $items = Helper::filter($items);

            echo Menu::widget([ 
                'options' => [ 
                                "class"              => "page-sidebar-menu  page-header-fixed ", 
                                "data-keep-expanded" => "false", 
                                "data-auto-scroll"   => "true", 
                                "data-slide-speed"   => "200", 
                                "style"              => "padding-top: 20px"
                            ], 
                'encodeLabels'    => false,   
                // 'linkTemplate'    => '<a href="{url}"><i class="{icon}"></i><span class="title">{label}</span><span class="selected"></span></a>',
                'items'           => $items,
                'submenuTemplate' => "\n<ul class='sub-menu'>\n{items}\n</ul>\n",   
                'itemOptions'=>['class'=>'nav-item'],
            ]); 
        ?> 
        <!-- </ul> -->
    </div> 
</div> 

<?php 

$en = <<< JS

$(function(){
    var url = window.location;

    url = decodeURIComponent(url);

    $('li.nav-item a.nav-link').filter(function() {
        return this.href == url;
    }).closest('li.nav-item').addClass('active open')
        .closest('ul.sub-menu').closest('li.nav-item').addClass('active open')
        .find('.arrow').addClass('open');
});

$( ".menu-toggler" ).click(function() { 
    let collapse = $(".page-sidebar-menu").hasClass('page-sidebar-menu-closed'); 

    if(collapse){ 
        setNotif();
        hoverIconNotif();
    } else { 
        setNotif(collapse);
        hoverIconNotif(collapse);
    } 

    let navbarCollapse = $(this).data("toggle") == 'collapse';
    if(navbarCollapse){
        setNotif();
        hoverIconNotif();
    }
}); 

function hoverIconNotif(collapse){
    $( "#notif" ).parent().mouseenter(function() {
        setNotif();
    }).mouseleave(function() {
        setNotif(collapse);
    });
}

function setNotif(collapse){  
    return $("#notif").css({ 'margin-top': (collapse == false) ? '-20px' : '', 'margin-right': (collapse == false) ? '-3px' : '', 'position': (collapse == false) ? 'relative' : '' });
}
JS;

$this->registerJs($en,  \yii\web\View::POS_END);

?>
