// JavaScript Document

var jq = jQuery.noConflict();
jQuery(function(){
	jq(".leftNav ul li").hover(
		function(){
			jq(this).find(".fj").addClass("nuw");
			jq(this).find(".zj").show();
			jq(this).find(".zj").css('top', $(this).index() * -40 + 'px');
		}
		,
		function(){
			jq(this).find(".fj").removeClass("nuw");
			jq(this).find(".zj").hide();
		}
	)
})
