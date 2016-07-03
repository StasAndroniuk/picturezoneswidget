$(document).ready(function()
{
        $(function() {$("img[usemap]").maphilight();});
});

function PrepareArea(areaname,color="ffff00")
{
	$(document).ready(function(){
    $('#'+areaname+', #'+areaname+'title').hover(function(e) {
    			e.preventDefault();
    			var data = $('#'+areaname).data('maphilight') || {};
    			data.alwaysOn = !data.alwaysOn;
    			data.fillColor = color;
    			data.stroke = true;
    			data.strokeColor =color;
    			data.strokeWidth = 3;
    			$('area[id*="'+areaname+'"]').data('maphilight', data).trigger('alwaysOn.maphilight');
				$('#'+areaname+'content').show();
    		});
    $('#'+areaname).on('mouseout',function(){$('#'+areaname+'content').hide();});
	$('#'+areaname+'title').on('mouseout',function(){$('#'+areaname+'content').hide();});
	$('#'+areaname+'title').on('mouseover',function(){$('#'+areaname+'content').show();});
});
}


