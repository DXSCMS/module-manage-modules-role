<script language="Javascript" type="text/javascript" src="<?php echo MEDIA;?>/js/jquery-ui-1.10.3.min.js"></script>
<!--<link href="<?php echo MEDIA;?>/jquery-ui-1.10.3/css/ui-lightness/custom.min.css" rel="stylesheet" type="text/css" />-->

<script>
function moveUp(item) {
    var prev = item.prev();
    if (prev.length == 0)
        return;
    prev.css('z-index', 999).css('position','relative').animate({ top: item.height() }, 250);
    item.css('z-index', 1000).css('position', 'relative').animate({ top: '-' + prev.height() }, 300, function () {
        prev.css('z-index', '').css('top', '').css('position', '');
        item.css('z-index', '').css('top', '').css('position', '');
        item.insertBefore(prev);
    });
}
function moveDown(item) {
    var next = item.next();
    if (next.length == 0)
        return;
    next.css('z-index', 999).css('position', 'relative').animate({ top: '-' + item.height() }, 250);
    item.css('z-index', 1000).css('position', 'relative').animate({ top: next.height() }, 300, function () {
        next.css('z-index', '').css('top', '').css('position', '');
        item.css('z-index', '').css('top', '').css('position', '');
        item.insertAfter(next);
    });
}
</script>

<script>
$(function() {
	
	$( "#listmods" ).sortable({
		placeholder: "ui-state-highlight"
	});
	$( "#listmods" ).disableSelection();
	
	$('a.moveUp').click(function() { 
		var btn = $(this);
		moveUp(btn.parents('li.panel-info'));
	});
	$('a.moveDown').click(function() { 
		var btn = $(this);
		moveDown(btn.parents('li.panel-info'));
	});
	
});
</script>

<style>
#listmods li{
	margin-bottom: 5px;
	padding-top: 6px;
	padding-left: 10px;
	overflow: hidden;
	padding-bottom: 5px;	
}
a.moveUp, a.moveDown{
	cursor:pointer;
	float: left;
	margin-right: 10px;
	margin-top: 2px;
	font-size: 1.5em;
}
</style>
<style>

</style>