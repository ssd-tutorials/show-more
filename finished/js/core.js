var systemObject = {
	showMore : function(obj) {
		if (obj.length > 0) {
			obj.click(function(e) {
				e.preventDefault();
				e.stopPropagation();
				var thisObj = $(this);
				var thisParent = thisObj.closest('.item');
				var isMore = thisObj.hasClass('showMore') ? true : false;
				if (isMore) {
					thisObj.hide();
					thisParent.children('.more').show();
				} else {
					thisParent.find('.showMore').show();
					thisParent.children('.more').hide();
				}
			});
		}
	}
};
$(function() {
	systemObject.showMore($('a.show'));
});