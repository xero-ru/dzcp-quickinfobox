<?php
if(_adminMenu != 'true') exit;

    $where = $where.': '._quickinfo_head;
    if(!permission("quickinfo"))
    {
      $show = error(_error_wrong_permissions, 1);
    } else {
      $wysiwyg = '_word';
      if($_GET['do'] == "add")
      {
        $show = show($dir."/form_quickinfo", array("head" => _quickinfo_add_head,
                                                "what" => _button_value_add,
                                                "bbcode" => _bbcode,
                                                "titel" => _titel,
												"more" => _quickinfo_more_link,
												"e_more" => "",
                                                "e_titel" => "",
                                                "e_inhalt" => "",
                                                "lang" => $language,
                                                "ja" => _yes,
                                                "nein" => _no,
                                                "error" => "",
                                                "inhalt" => _inhalt,
                                                "do" => "addsite"));
      } elseif($_GET['do'] == "addsite") {
        if(empty($_POST['titel']) || empty($_POST['inhalt']))
        {
          if(empty($_POST['titel'])) $error = _empty_titel;
          elseif(empty($_POST['inhalt'])) $error = _empty_editor_inhalt;
          
          $error = show("errors/errortable", array("error" => $error));

          $show = show($dir."/form_quickinfo", array("head" => _quickinfo_add_head,
                                                  "what" => _button_value_add,
                                                  "lang" => $language,
                                                  "bbcode" => _bbcode,
												  "more" => _quickinfo_more_link,
												  "e_more" => "",
                                                  "error" => $error,
                                                  "ja" => _yes,
                                                  "nein" => _no,
                                                  "titel" => _titel,
                                                  "e_titel" => re($_POST['titel']),
                                                  "e_inhalt" => re_bbcode($_POST['inhalt']),
                                                  "inhalt" => _inhalt,
                                                  "do" => "addsite"));
        } else {
			
          $qry = db("INSERT INTO ".$sql_prefix."quickinfo 
                     SET `title` = '".up($_POST['titel'])."',
					 	`more` = '".up($_POST['more'])."',
                         `content`  = '".up($_POST['inhalt'],1)."'");

          $show = info(_quickinfo_added, "?admin=quickinfo");
        }
      } elseif($_GET['do'] == "edit") {

        $qrys = db("SELECT * FROM ".$sql_prefix."quickinfo 
                    WHERE id = '".intval($_GET['id'])."'");
        $gets = _fetch($qrys);

        $show = show($dir."/form_quickinfo", array("head" => _quickinfo_edit_head,
                                                "what" => _button_value_edit,
                                                "lang" => $language,
                                                "bbcode" => _bbcode,
                                                "titel" => _titel,
                                                "e_titel" => re($gets['title']),
												"more" => _quickinfo_more_link,
												"e_more" => re($gets['more']),
                                                "e_inhalt" => re_bbcode($gets['content']),
                                                "ja" => _yes,
                                                "nein" => _no,
                                                "error" => "",
                                                "inhalt" => _inhalt,
                                                "do" => "editsite&amp;id=".$_GET['id'].""));
      } elseif($_GET['do'] == "editsite") {
        if(empty($_POST['titel']) || empty($_POST['inhalt']))
        {
          if(empty($_POST['titel'])) $error = _empty_titel;
          elseif(empty($_POST['inhalt'])) $error = _empty_editor_inhalt;

          $error = show("errors/errortable", array("error" => $error));
          
          $show = show($dir."/form_quickinfo", array("head" => _quickinfo_edit_head,
                                                  "what" => _button_value_edit,
                                                  "lang" => $language,
                                                  "bbcode" => _bbcode,"error" => $error,
                                                  "ja" => _yes,
                                                  "nein" => _no,
                                                  "titel" => _titel,
                                                  "e_titel" => re($_POST['titel']),
												  "more" => _quickinfo_more_link,
												"e_more" => re($gets['more']),
                                                  "e_inhalt" => re_bbcode($_POST['inhalt']),
                                                  "inhalt" => _inhalt,
                                                  "do" => "editsite&amp;id=".$_GET['id'].""));
        } else {
			
          $qry = db("UPDATE ".$sql_prefix."quickinfo 
                     SET `title` = '".up($_POST['titel'])."',
					 `more` = '".up($_POST['more'])."',
                         `content`  = '".up($_POST['inhalt'],1)."'
                     WHERE id = '".intval($_GET['id'])."'");
         
          $show = info(_quickinfo_edited, "?admin=quickinfo");
        }
      } elseif($_GET['do'] == "delete") {
	  
        $qry = db("DELETE FROM ".$sql_prefix."quickinfo 
                   WHERE id = '".intval($_GET['id'])."'");

        $show = info(_quickinfo_deleted, "?admin=quickinfo");
		
	   } elseif($_GET['do'] == "status") {
        $qry = db("UPDATE ".$sql_prefix."quickinfo 
                   SET `status` = '".intval($_GET['set'])."'
                   WHERE id = '".intval($_GET['id'])."'");
                   
        $show = info((empty($_GET['set']) ? _quickinfo_admin_status_unsetted : _quickinfo_admin_status_setted), "?admin=quickinfo");
      } else {
		  
        $qry = db("SELECT * FROM ".$sql_prefix."quickinfo ");
        while($get = _fetch($qry))
        {
          $class = ($color % 2) ? "contentMainSecond" : "contentMainFirst"; $color++;
          $edit = show("page/button_edit_single", array("id" => $get['id'],
                                                        "action" => "admin=quickinfo&amp;do=edit",
                                                        "title" => _button_title_edit));
          $delete = show("page/button_delete_single", array("id" => $get['id'],
                                                            "action" => "admin=quickinfo&amp;do=delete",
                                                            "title" => _button_title_del,
                                                            "del" => convSpace(_confirm_del_quickinfo)));
			
		$status = empty($get['status']) 
               ? '<a href="?admin=quickinfo&amp;do=status&amp;set=1&amp;id='.$get['id'].'"><img src="../inc/images/no.gif" alt="" title="'._quickinfo_admin_show_set.'" /></a>'
               : '<a href="?admin=quickinfo&amp;do=status&amp;set=0&amp;id='.$get['id'].'"><img src="../inc/images/yes.gif" alt="" title="'._quickinfo_admin_show_unset.'" /></a>';	
			
          $show_ .= show($dir."/quickinfo_show", array("name" => re($get['title']),
                                                    "del" => $delete,
                                                    "edit" => $edit,
													"status" => $status,
                                                    "class" => $class));
        }

        $show = show($dir."/quickinfo", array("head" => _quickinfo_head,
                                           "show" => $show_,
                                           "add" => _quickinfo_add_head,
                                           "edit" => _editicon_blank,
                                           "del" => _deleteicon_blank,
                                           "name" => _quickinfo_titel));
      }
    }
?>