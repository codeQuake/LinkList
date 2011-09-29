<?php
// wcf imports
require_once(WCF_DIR.'lib/system/event/EventListener.class.php');
require_once(WCF_DIR.'lib/data/linkList/link/LinkListLinkList.class.php');
require_once(WCF_DIR.'lib/data/linkList/category/LinkListCategory.class.php');

/**
 * Shows the best x links on the linklist page.
 *
 * @author 	Jens Krumsieck
 * @copyright	2011 Jens Krumsieck
 * @license	GNU Lesser General Public License <http://www.gnu.org/licenses/lgpl.html>
 * @package	de.chrihis.wcf.linkList.newestLinks
 * @subpackage system.event.listener
 * @category 	WoltLab Community Framework (WCF)
 */
class LinkListBestLinksListener implements EventListener {
	/**
	 * list of linklist links
	 *
	 * @var LinkListLinkList
	 */
	public $links = array();

	/**
	 * @see EventListener::execute()
	 */
	public function execute($eventObj, $className, $eventName) {
		if (!LINKLIST_SHOW_BESTLINKS) return;
		$categoryIDs = LinkListCategory::getAccessibleCategoryIDArray();
				
		if (empty($categoryIDs)) {
			$categoryIDs = array(0);
		}

		$categoryIDs = implode(',', $categoryIDs);
		
		$sql = "SELECT linkList_link.linkID, linkList_link.subject, linkList_link.visits, linkList_link.time, linkList_link.categoryID, linkList_link.userID
			FROM		wcf".WCF_N."_linklist_link linkList_link
			WHERE linkList_link.isDisabled = 0 AND linkList_link.isDeleted = 0 AND linkList_link.categoryID IN(".$categoryIDs.")
			ORDER BY linkList_link.visits DESC";
		$result = WCF::getDB()->sendQuery($sql, LINKLIST_BESTLINKS_NUMBER);
		while ($row = WCF::getDB()->fetchArray($result)) {
			$this->links[] = new ViewableLinkListLink(null, $row);
		}

		foreach ($this->links as $link) {
			$link->category = new LinkListCategory($link->categoryID);
		}
			
		$this->status = 1;
		if (WCF::getUser()->userID != 0) {
			$this->status = intval(WCF::getUser()->linkListShowBestLinks);
		}
		else {
			if (WCF::getSession()->getVar('linkListShowBestLinks') != false) {
				$this->status = WCF::getSession()->getVar('linkListShowBestLinks');
			}
		}
		// assign variables
		WCF::getTPL()->assign(array(
			'links' => $this->links,
			'status' => $this->status
		));
		
		if (LINKLIST_BESTLINKS_TYPE == 1) {
			WCF::getTPL()->append(array(
				'additionalLinkListBoxes' => WCF::getTPL()->fetch('linkListBestLinks'),
				'specialStyles' => '<style type="text/css">.bestLinkListLinks { list-style: none; margin-top: 10px; padding: 0; } .bestLinkListLinks li { min-height: 0; } .bestLinkListLinks .breadCrumbs { margin: 0; }</style>'

			));
		}
		else if (LINKLIST_BESTLINKS_TYPE == 2) {
			WCF::getTPL()->append('additionalMessages', WCF::getTPL()->fetch('linkListBestLinks'));
		}
		else if (LINKLIST_BESTLINKS_TYPE == 3) {
			WCF::getTPL()->append('linkListSidebar', WCF::getTPL()->fetch('linkListBestLinks'));
		}
	}
}
?>
