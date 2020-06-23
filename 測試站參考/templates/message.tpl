<div>
	{if $smarty.session.messages}
		<div class="alert alert-success alert-dismissable text-center">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{$smarty.session.messages}
		</div>
	{/if}
	{if $smarty.session.warnings}
		<div class="alert alert-dismissable alert-danger text-center">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{$smarty.session.warnings}
		</div>
	{/if}
</div>