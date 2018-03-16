<?php

$table = sanitize($_GET['p']);
$smarty->assign('title', 'Bohemia Website Administration');
$smarty->assign('table', $table);

switch ($_GET['t']) {
      case 'list':
        switch($table) {
            case 'press_pubs':
            case 'users_profiles':                
            case 'seo': 
                $data = select($table,'1',"*","id desc");
                break;
            case 'press':
                $data = select("press,press_pubs","press.pub_id=press_pubs.id","press.id,press.date,press.link,press.description,press_pubs.name,press_pubs.image","press.id desc");
                break; 
            case 'users_bios':
                $data = select("users_profiles,users_bios","users_profiles.intranet_userid=users_bios.user_id and users_bios.language_id=1 and users_profiles.status='Active'","*,users_bios.id as bio_id","users_profiles.name asc");
                break; 
            case 'users_reviews':
                $data = select("users_profiles,users_reviews","users_profiles.intranet_userid=users_reviews.user_id and users_profiles.status='Active'","*,users_reviews.id as review_id","users_profiles.name asc");
                break;                 
            case 'homepage':
                $feats = select("homepage","item in ('Featured1','Featured2','Featured3','Featured4')","*","item asc");
                $smarty->assign('feats', $feats);
                break;
        }
        $smarty->assign('data', $data);
        $smarty->display('admin_'.$table.'-list.tpl');
        break;
    case 'add':
        $smarty->assign('heading','Add a new');
        $smarty->display('admin_'.$table.'-add.tpl');
        break;
    case 'edit':
        $smarty->assign('heading','Edit an existing');
        $id = sanitize($_GET['id']);
        $data = select($table,"id=$id","*","",1);
        $smarty->assign('data',$data);
        $smarty->display('admin_'.$table.'-add.tpl');
        break;
}
?>