$(document).ready(
	function() {
		init();
		
		function init(){
			var callback = $.Callbacks();
			var str = document.URL.split('/');
			var pageIndex = str[str.length-1];

			if(!isInt(parseInt(pageIndex))){
				pageIndex = 1;
			}						
			callback.add(loadContent('/home/load', pageIndex));
		}

		function isInt(n) {
 		  return typeof n === 'number' && n % 1 == 0;
		}
	}
);