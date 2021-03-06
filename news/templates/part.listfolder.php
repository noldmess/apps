<?php

require_once \OC_App::getAppPath('news') . '/lib/feedtypes.php';


$l = new OC_l10n('news');


$folder = isset($_['folder']) ? $_['folder'] : null;
$folderId = $folder->getId();
$folderName = $folder->getName();

if($folder->getOpened()){
	$openedClass = 'open';
} else {
	$openedClass = 'collapsed';
}


$lastViewedFeedId = isset($_['lastViewedFeedId']) ? $_['lastViewedFeedId'] : null;
$lastViewedFeedType = isset($_['lastViewedFeedType']) ? $_['lastViewedFeedType'] : null;
if ($lastViewedFeedType == OCA\News\FeedType::FOLDER && $lastViewedFeedId == $folderId){
    $activeClass = 'active';
} else {
    $activeClass = '';
}

echo '<li class="folder ' . $openedClass . ' ' . $activeClass . ' all_read" data-id="' . $folderId . '">';
	echo '<button class="collapsable_trigger" title="' . $l->t('Collapse') . '"></button>';
	echo '<a href="#" class="title">' . htmlspecialchars($folderName, ENT_QUOTES, 'UTF-8') .	'</a>';
	echo '<span class="unread_items_counter"></span>';
	echo '<span class="buttons">';
		echo '<button class="svg action feeds_delete" title="' . $l->t('Delete folder') . '"></button>';
		echo '<button class="svg action feeds_edit" title="' . $l->t('Rename folder') . '"></button>';
		echo '<button class="svg action feeds_markread" title="' . $l->t('Mark all read') . '"></button>';
	echo '</span>';
	echo '<ul data-id="' . $folderId . '">';
