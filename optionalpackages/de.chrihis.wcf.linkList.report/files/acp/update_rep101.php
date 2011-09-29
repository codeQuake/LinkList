<?php

//Table rename
$sql = array();
$sql[0] = "RENAME TABLE wcf1_linkList_link_report TO  wcf1_linklist_link_reportX";

$sql[1] = "RENAME TABLE  wcf1_linklist_link_reportX TO  wcf1_linklist_link_report";

		
		for($i = 0; $i != 2; $i++)
		{
			WCF::getDB()->sendQuery($sql[$i]);
		}

?>