<div class="contentBox">
	<div class="border">
		<div class="containerHead">
			<h3>{lang}wcf.linkList.link.thumbnail{/lang}</h3>
		</div>
		<div class="container-2">
			{if $service == 'thumbsniper'}
				<br />
			{/if}
			<div style="text-align: center">
				{if $service == 'thumbsniper'}
					<a href="index.php?page=LinkListLinkVisit&amp;linkID={$linkID}" title="{lang}wcf.linkList.link.visit.value{/lang}"><img src="{$url}" alt="" /></a>
				{elseif $service == 'websnapr'}
					<script type="text/javascript">wsr_snapshot('{$url|encodejs}', '{LINKLIST_LINK_THUMBNAIL_WEBSNAPR_KEY}', s);</script>
				{/if}
			</div>
		</div>
	</div>
</div>