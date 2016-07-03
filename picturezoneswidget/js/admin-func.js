function ShowSettings()
{
    var disp=$('.settings').css('display');
    if(disp=='none')
    {
       $('.settings').show();
    }
    else 
    {
       $('.settings').hide();
    }

}
function AddNewArea(id_base,widget_num,widget_id)
{
    var n='#widget-'+id_base+'-'+widget_num+'-areanum';
    var num=$(n).val();
    var del='#area'+num;
    
    var newarea='<div id="area'+num+'" class="area">';
    newarea=newarea+'<input id="area'+num+'delete" type="hidden" name="widget-'+id_base+'['+widget_num+'][delete'+num+']" value="0">';
    newarea=newarea+' Name of area:(unique)<input id="widget-'+id_base+'-'+widget_num+'-areaname'+num+'" type="text" name="widget-'+id_base+'['+widget_num+'][areaname'+num+']" value="">';
    newarea=newarea+'Link of area: <input id="widget-'+id_base+'-'+widget_num+'-arealink'+num+'" type="text" name="widget-'+id_base+'['+widget_num+'][arealink'+num+']" value="">';
    newarea=newarea+' Target of area:<select id="widget-'+id_base+'-'+widget_num+'-areatarget'+num+'" name="widget-'+id_base+'['+widget_num+'][areatarget'+num+']">';
    newarea=newarea+'<option value="">---</option><option value="_blank">_blank</option><option value="_parent">_parent</option> <option value="_self">_self</option><option value="_top" >_top</option></select>';
    newarea=newarea+'<br>Title: <input id="widget-'+id_base+'-'+widget_num+'-areatitle'+num+'" type="text" name="widget-'+id_base+'['+widget_num+'][areatitle'+num+']" value="">';
    newarea=newarea+'<br><p><span>Area code</span><span  style="margin-left:500px;">Area div content</span></p>';
    newarea=newarea+'<textarea id="widget-'+id_base+'-'+widget_num+'-areacode'+num+'" name="widget-'+id_base+'['+widget_num+'][areacode'+num+']" cols="40" rows="5"></textarea>';
    newarea=newarea+'<textarea id="widget-'+id_base+'-'+widget_num+'-areadivcontent'+num+'" name="widget-'+id_base+'['+widget_num+'][areadivcontent'+num+']" cols="40" rows="5" style="margin-left:200px;"></textarea>';
    newarea=newarea+'</div>';
    $('.settings').append(newarea);
    num++;
    $(n).val(num);
}
function DeleteArea(id,id_del)
{
    $(id).hide();
    $(id_del).val('1');
}
        
    
        
           
      
           
      
     
