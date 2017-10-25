<div class="panel panel-inverse panel-student-search">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title"> Search For Student </h4>
    </div>
    <div class="panel-body">
        <div class='m-t-15'>
            <form id='getStudent'>
                <div class='input-group'>
                    <div class='input-group-btn'>
                    </div>
                    <input type='text' class='form-control' id='admissionNumber' placeholder='Student Admission Number' />
                    <div class='input-group-btn'>
                        <input type='submit' class='btn btn-success' value='Get Student'>
                    </div>
                </div>
                <div class='text-center'>
                    <b> Search By : </b>   Admission Number<input type='radio' name='type' checked >  or Full Name <input type='radio' name='type'>
                </div>
            </form>
            <div id='get-student-ajax-return'> </div>
        </div>
    </div>
</div>

<script>
    var handleGetStudent = function () {
        $('#getStudent').submit(function(event){
            event.preventDefault();
            var admissionNumber = $('input[id=\"admissionNumber\"]');
            console.log(admissionNumber.val());
            $.ajax({
                type: "GET",
            url: '<?= $this->Url->build(['plugin'=>null,'controller'=>'Students','action'=>'get_student_by_ajax'], true) ?>',
                contentType:false,
                cache:false,
                data:{ 'id':admissionNumber.val()},
            beforeSend:function(){
                $('#get-student-ajax-return').html('<div class=\"alert alert-info m-t-10\"> <i class=\"fa fa-spinner fa-spin fa-1x fa-fw\"></i> Fetching student Record </div>');
            },
            success: function(data,status){
                $('#get-student-ajax-return').html(data);
            },
            dataType: 'text'
        });
    });
    };
    handleGetStudent();
</script>