<div class="contentBox">
	<h3 class="subHeadline"><a href="index.php?page=LinkList{@SID_ARG_2ND}">{lang}wcf.linkList.index{/lang}</a> <span>({#$linkCount})</span></h3>
	
	<ul class="dataList">
		{foreach from=$links item=link}
			<li class="{cycle values='container-1,container-2'}">
				<div class="containerIcon">
					<img src="{icon}linkListLinkM.png{/icon}" alt="" />
				</div>
				<div class="containerContent">
					<h4><a href="index.php?page=LinkListLink&amp;linkID={@$link->linkID}{@SID_ARG_2ND}">{$link->subject}</a></h4>
					<p class="firstPost smallFont light">{@$link->time|time}</p>
				</div>
			</li>
		{/foreach}
	</ul>
	
	<div class="buttonBar">
		<div class="smallButtons">
			<ul>
				<li class="extraButton"><a href="#top" title="{lang}wcf.global.scrollUp{/lang}"><img src="{icon}upS.png{/icon}" alt="{lang}wcf.global.scrollUp{/lang}" /> <span class="hidden">{lang}wcf.global.scrollUp{/lang}</span></a></li>

			</ul>
		</div>
	</div>
</div>