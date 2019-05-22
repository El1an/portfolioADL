<?php


namespace frontend\widgets\Select1One;


use frontend\models\City;
use yii\bootstrap\Widget;
use yii\helpers\Html;
use yii\web\View;
class MyCity extends Widget
{
    public $callbackUrl = '/site/gorod';
    public $model;
    public $attribute = 'name';
    public $inputID;

    public function init(){
        parent::init();
        JuiAsset::register($this->view);
    }
    public function run()
    {

        $this->view->registerJs('
       
     
          $("#'.$this->inputID.'").autocomplete
          ({
            source: function(request,response) 
            {
              $.ajax({
                url: "'.$this->callbackUrl.'",
                 method: "POST",
                 data: {
                    q: function () { return $("#'.$this->inputID.'").val() },
                   
                },
                success: function(data) {
                var parsed=JSON.parse(data);
                  
                 
                  response($.map(parsed, function(item) 
                  {
                    return {
                      label: item.parent != null?item.parent["name"]+" " + item.parent["socr"]+ ", "  + item.socr +". " + item.name:item.socr +". " + item.name ,
                      value: item.parent != null?item.parent["name"]+" " + item.parent["socr"]+ ", "  + item.socr +". " + item.name:item.socr +". " + item.name,
                      id: item.kladr,
                      src: item
                     
                    }
                    
                  }
                  ));
                }
              });
            },
            
             messages: {
        noResults: \'\',
        results: function() {}
    },
            
        
            delay: 500,
        
           
            select: function(event,ui) {
              console.log(ui.item.label);
              console.log(ui.item.src.index);
             index'.$this->inputID.'=ui.item.id;
               check();
            },
        
          
          });        
        ', View::POS_READY, $this->inputID.'Кey');







        return Html::activeInput('text', $this->model,'name', ['id'=>$this->inputID]);
    }
}


