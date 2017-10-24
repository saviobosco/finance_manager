<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Site helper
 * @property \Cake\View\Helper\HtmlHelper $Html
 * @property \Cake\View\Helper\FormHelper $Form
 */
class SiteHelper extends Helper
{
    var $helpers = ['Url', 'Text','Html','Form'];

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public $path = [
        'plugin' => 'assets/plugins/',
        'assets' => 'assets/'
    ];

    /**
     * @param array|string $path
     * @param array|string $folder
     * @param array $options
     * @return null|string
     */
    public function css($path, $folder , array $options = [])
    {
        $options += ['pathPrefix' => $this->path[$folder] ];
        return $this->Html->css($path , $options);
    }

    /**
     * @param array|string $path
     * @param array|string $folder
     * @param array $options
     * @return null|string
     */
    public function script($path ,$folder ,array $options = [])
    {
        $options += ['pathPrefix' => $this->path[$folder] ];
        return $this->Html->script($path , $options);
    }

    /**
     * @param null $photo
     * @param null $photoPath
     * @param array $options
     * @return string
     * This displays the admin photo
     */
    public function displayAdminPhoto($photo = null,$photoPath = null,$options = [] )
    {
        if ( isset($photo)) {
            return $this->Html->image($photoPath.$photo,$options);
        }
        return $this->Html->image('avatar/avatar_placeholder.png',$options);
    }

    public function displayStudentSearchPanel()
    {
        return "<div class='m-t-15'>
                    <form id='getStudent'>
                         <div class='input-group'>
                              <div class='input-group-btn'>
                              </div>
                              <input type='text' class='form-control' id='admissionNumber' placeholder='Student Admission Number' />
                              <div class='input-group-btn'>
                                  <input type='submit' class='btn btn-success' value='Get Student'>
                              </div>
                         </div>
                    </form>
                    <div id='get-student-ajax-return'> </div>
                </div>
               <script>
                    var handleGetStudent = function () {
                        $('#getStudent').submit(function(event){
                            event.preventDefault();
                            var admissionNumber = $('input[id=\"admissionNumber\"]');
                            console.log(admissionNumber.val());
                            $.ajax({
                                type: \"GET\",
                                url: window.location.protocol+'//'+window.location.hostname+'/finance_manager/students/get-student-by-ajax',
                                contentType:false,
                                cache:false,
                                data:{ 'id':admissionNumber.val()},
                                beforeSend:function(){
                                    $('#get-student-ajax-return').html('<div class=\"alert alert-info m-t-10\"> <i class=\"fa fa-spinner fa-spin fa-1x fa-fw\"></i> Fetching student Record </div>');
                                },
                                success: function(data,status){
                                    //$( \".result\" ).html( data );
                                    //$('#ajax-request-feedback').empty();
                                    //admissionNumber.val('');
                                    $('#get-student-ajax-return').html(data);
                                    //document.getElementById(\"result-form-upload\").reset();
                                },
                                dataType: 'text'
                            });
                        });
                    };
                    handleGetStudent();
                </script>
                ";
    }

    public function datePickerInput($name)
    {
        return $this->Form->control($name,[
            'id' => 'datepicker-autoClose',
            'type' => 'text',
            'templates'=>[
                'inputContainer' => '<div class="form-group">{{content}}</div>'
                ,'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>'
            ]
        ]);
    }

}
