<?php

//Table rename
$sql = array();
$sql[0] = "RENAME TABLE  wcf1_linkList_category TO  wcf1_linklist_categoryT";
$sql[1] = "RENAME TABLE  wcf1_linkList_category_structure TO  wcf1_linklist_category_structureT";
$sql[2] = "RENAME TABLE  wcf1_linkList_category_to_group TO wcf1_linklist_category_to_groupT";
$sql[3] = "RENAME TABLE  wcf1_linkList_link  TO wcf1_linklist_linkT";
$sql[4] = "RENAME TABLE  wcf1_linkList_link_comment TO wcf1_linklist_link_commentT";
$sql[5] = "RENAME TABLE  wcf1_linkList_link_last_visitor TO wcf1_linklist_link_last_visitorT";

$sql[6] = "RENAME TABLE  wcf1_linklist_categoryT TO  wcf1_linklist_category";
$sql[7] = "RENAME TABLE  wcf1_linklist_category_structureT TO  wcf1_linklist_category_structure";
$sql[8] = "RENAME TABLE  wcf1_linklist_category_to_groupT TO wcf1_linklist_category_to_group";
$sql[9] = "RENAME TABLE  wcf1_linklist_linkT  TO wcf1_linklist_link";
$sql[10] = "RENAME TABLE  wcf1_linklist_link_commentT TO wcf1_linklist_link_comment";
$sql[11] = "RENAME TABLE  wcf1_linklist_link_last_visitorT TO wcf1_linklist_link_last_visitor";
		
		for($i = 0; $i != 12; $i++)
		{
			WCF::getDB()->sendQuery($sql[$i]);
		}

?>