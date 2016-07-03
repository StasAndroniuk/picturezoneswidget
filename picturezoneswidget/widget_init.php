<?php
/*
Plugin Name: Picture zones widget
Plugin URI: http://pokraska.pp.ua/
Description: An example plugin to demonstrate widgets API in WordPress
Version: 0.1
Author: Author White Panda
License: GPL2 
 
   
*/

add_action("widgets_init", function () {
    register_widget("PictureZonesWidget");
});

class PictureZonesWidget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct("Picture_zones_widget", "Picture Zones widget",
            array("description" => "Widget cuts Picture picture on different zones"));
    }
    public function form($instance) 
    {
        echo'<link rel="stylesheet" href="/wp-content/plugins/picturezoneswidget/css/admin-pic-zones.css">';
        wp_enqueue_script('jquery');
        $title = "";
        $text = "";
        $areaNumber="";
        // если instance не пустой, достанем значения
        if (!empty($instance)) 
        {

            $title = $instance["title"];
            $text = $instance["text"];
            $areaNumber['value']=$instance['areanum'];
            if($areaNumber['value']=="")
            {
                $areaNumber['value']=0;
            }
            $areaNumber['id']=$this->get_field_id("areanum");
            $areaNumber['name']=$this->get_field_name('areanum');
        
            $areas=array();
            if($areaNumber['value']>0)
            {
                for($i=0;$i<$areaNumber['value'];$i++)
                {
                    if(!isset($instance['areaname'.$i]))
                    {
                        continue;
                    }
                    $temparea['delete']=array('name'=>$this->get_field_name('delete'.$i),'value'=>0);
                    $temparea['arealink']=array('name'=>$this->get_field_name('arealink'.$i),'value'=>$instance['arealink'.$i]);
                    $temparea['areadivcontent']=array('name'=>$this->get_field_name('areadivcontent'.$i),'value'=>$instance['areadivcontent'.$i]);
                    $temparea['areatarget']=array('name'=>$this->get_field_name('areatarget'.$i),'value'=>$instance['areatarget'.$i]);
                    $temparea['areaname']=array('name'=>$this->get_field_name('areaname'.$i),'value'=>$instance['areaname'.$i]);
                    $temparea['areacode']=array('name'=>$this->get_field_name('areacode'.$i),'value'=>$instance['areacode'.$i]);
                    $temparea['areatitle']=array('name'=>$this->get_field_name('areatitle'.$i),'value'=>$instance['areatitle'.$i]);
                    $areas[]=$temparea;
                    $temparea="";
                }
            }
        }

        $tableId = $this->get_field_id("title");
        $tableName = $this->get_field_name("title");
        echo '<label for="' . $tableId . '">Picture address</label><br>';
        echo '<input id="' . $tableId . '" type="text" name="' .
        $tableName . '" value="' . $title . '"><br>';
 
        $textId = $this->get_field_id("text");
        $textName = $this->get_field_name("text");
        echo '<label for="' . $textId . '">Text</label><br>';
        echo '<textarea id="' . $textId . '" name="' . $textName .
        '">' . $text . '</textarea>';
        echo'<script src="/wp-content/plugins/picturezoneswidget/js/admin-func.js"></script><br><a class="but" onclick="ShowSettings();">Settings</a><br>';
        require('view/settings.phtml');
     
       
    }
    public function update($newInstance, $oldInstance) 
    {
      
        $values = array();
        $values["title"] = htmlentities($newInstance["title"]);
        $values["text"] = htmlentities($newInstance["text"]);
        $values['areanum']=htmlentities($newInstance['areanum']);
        if($values['areanum']>0)
        {
              for($i=0;$i<$values['areanum'];$i++)
                {
                    
                    $values['arealink'.$i]=htmlentities($newInstance['arealink'.$i]);
                    $values['areadivcontent'.$i]=htmlentities($newInstance['areadivcontent'.$i]);
                    $values['areatarget'.$i]=htmlentities($newInstance['areatarget'.$i]);
                    $values['areaname'.$i]=htmlentities($newInstance['areaname'.$i]);
                    $values['areacode'.$i]=htmlentities($newInstance['areacode'.$i]);
                    $values['areatitle'.$i]=htmlentities($newInstance['areatitle'.$i]);
                }
        }
        return $values;
    }
    public function widget($args, $instance)
    {
        $title = $instance["title"];
        $text = $instance["text"];
      
         $areaNumber=$instance['areanum'];           
        
        $areas=array();
        if($areaNumber>0)
        {
            for($i=0;$i<$areaNumber;$i++)
            {
               if(!isset($instance['arealink'.$i]))
               {
                   continue;
               }
                $temparea['arealink']=$instance['arealink'.$i];
                $temparea['areadivcontent']=$instance['areadivcontent'.$i];
                $temparea['areatarget']=$instance['areatarget'.$i];
                $temparea['areaname']=$instance['areaname'.$i];
                $temparea['areacode']=$instance['areacode'.$i];
                $temparea['areatitle']=$instance['areatitle'.$i];
                $areas[]=$temparea;
                $temparea="";
            }
        }
        foreach ($areas as &$area)
        {
            if($area['areatarget']!="")
            {
              $area['areacode']=preg_replace('/target=.*?\s+/','target="'.$area['areatarget'].'" ',$area['areacode']);                
            }
            if($area['areaname']!="")
            {
                 $area['areacode']=preg_replace('/id=.*?\s+/','id="'.$area['areaname'].'" ',$area['areacode']);
                 $area['areacode']=preg_replace('/alt=.*?\s+/','alt="'.$area['areaname'].'" ',$area['areacode']);
                 $area['areacode']=preg_replace('/title=.*?\s+/','title="'.$area['areaname'].'" ',$area['areacode']);
            }
            if($area['arealink']!="")
            {
              $area['areacode']=preg_replace('/href=.*?\s+/','href="'.$area['arealink'].'" ',$area['areacode']);                
            }
           
        }
        echo'<link rel="stylesheet" href="/wp-content/plugins/picturezoneswidget/css/picture_zones_style.css">';
        echo'<script src="/wp-content/plugins/picturezoneswidget/js/pic-zones-func.js"></script>';
       

        require('view/view.phtml');
       
       
    }
}



?>
