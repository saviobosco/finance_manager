<?php
return [
    'inputContainer' => '<div class="form-group {{type}}{{required}}">{{content}}</div>',
    //'inputContainerError' => '<div class="form-group {{type}}{{required}} error">{{content}} <span class="text-danger"> {{error}} </span></div>',
    'error' => '<div class="text-danger">{{content}}</div>',
    'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
    'select' => '<select class="form-control" name="{{name}}"{{attrs}}>{{content}}</select>',
    'selectMultiple' => '<select class="form-control" name="{{name}}[]" multiple="multiple"{{attrs}}>{{content}}</select>',
    'inputSubmit' => '<input type="{{type}}"{{attrs}}/>',
    'radioWrapper' => '<div class="radio"> {{label}} </div>',
    'checkboxWrapper' => '<div class="form-group">{{label}}</div>',
    'textarea' => '<div class="form-group"> <textarea class="form-control" name="{{name}}"{{attrs}}>{{value}}</textarea> </div>',
];