<?php
session_start();
include('../config/db_conn.php'); //db connection
$query = "SELECT `id` ,`unit_code`,`unit_name`,`lecturer`,`semester` FROM `units`;";
$result = $mysqli->query($query);
?>

<!DOCTYPE html>
<html  lang="en">

    <?php  include('head.php');?>
    <br><br>

    <div class ="container">
        <h2 align ="center">Manage Unit Master list</h2>
        <button class="btn btn-dark float-right"  data-toggle="modal" data-target="#search_modal">Search</button>
        <table class="table table-bordered table-striped" id="tabledit">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Unit Code</th>
                    <th>Unit Name</th>
                    <th>Unit Coordinator</th>
                    <th>Semester</th>
                </tr>
            </thead>
            <tbody> </tbody>
        </table>
        <button class="btn btn-primary float-right"  data-toggle="modal" data-target="#add_modal">Add New Unit</button>
    </div>

    <!-- Modal for add_modal-->
    <div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="SearchModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-dark">Add New Unit</h4>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" >
                        <div class="mb-2" id="addBody">
                            <form id="add_form">
                                <label for="unitCodelabel"><b>Unit Code</b></label>
                                <input class="form-control" type="text"  id="unitCode" name="unitCode"></input> <br>
                                <label for="unitNamelabel"><b>Unit Name</b></label>
                                <input class="form-control" type="text"  id="unitName" name="unitName"></input> <br>
                                <label for="lecturerlabel"><b>Unit Coordinator(staff ID)</b></label>
                                <input class="form-control" type="text"  id="lecturer" name="lecturer"></input> <br>
                                <label for="descriptionlabel"><b>Unit Description</b></label>
                                <textarea class="form-control" type="text"  id="unitDescription" name="unitDescription"></textarea> <br>
                                <label for="semesterlabel"><b>Semester</b></label>
                                <select  id="semester" name="semester" class="form-control">
                                    <option value="Semester 1">Semester 1</option>
                                    <option value="Semester 2">Semester 2</option>
                                    <option value="Spring school">Spring school</option>
                                    <option value="Summer school">Summer school</option>
                                </select> <br>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" id="addUnitBtn">Add</button>
                            <button type="button" class="btn btn-outline-dark " data-dismiss="modal" >Close</button>
                        </div>
                </div>
            </div>
        </div>
    </div>

<?php include('../action/searchModal.php'); ?>
<?php  include('foot.php');?>
</html>

<script type="text/javascript" src="../JS/jquery.tabledit.js"></script>
<script>

function showData(){           //update data in tbody
    $.ajax({
        url: '../action/process.php?a=view',
        method:'GET'
    }).done(function(data) {
        $('tbody').html(data);
        tableData();
    })
};

function tableData(){        //table edit libary
    $('#tabledit').Tabledit({
        url:'../action/process.php?a=modify',
        eventType: 'dblclick',
        editButton: true,
        deleteButton:true,
        hideIdentifier:false,
        buttons: {
            edit: {
                class: 'btn btn-sm btn-outline-dark  fas fa-pencil-alt',
                html: ' <span></span>',
                action: 'edit'
            },
            delete: {
                class: 'btn btn-sm btn-outline-dark fas fa-trash-alt',
                html:  '<span ></span>' ,
                action: 'delete'
            },
            save: {
                class: 'btn btn-sm btn-success',
                html: 'Save'
            },
            restore: {
                class: 'btn btn-sm btn-warning',
                html: '<span class="glyphicon glyphicon-pencil"></span>',
                action: 'restore'
            },
            confirm: {
                class: 'btn btn-sm btn-danger',
                html: 'Confirm'
            }
        },
        columns:{
            identifier:[0, 'id'],
            editable:[[1,'unit_code'],[2,'unit_name'],[3,'lecturer'],[4,'semester','{"Semester 1":"Semester 1","Semester 2":"Semester 2","Spring school":"Spring school","Summer school":"Summer school"}']]
        },
        onSuccess: function(data, textStatus, jqXHR) {
            viewData();

        },
        onFail: function(jqXHR, textStatus, errorThrown) {
            console.log('onFail(jqXHR, textStatus, errorThrown)');
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        },
        onAjax: function(action, serialize) {
            console.log('onAjax(action, serialize)');
            console.log(action);
            console.log(serialize);
            location.reload();
        }
    });
}

//function to handle of add unit
$("#addUnitBtn").click(function(){

    if(!$("#unitCode").val())
        alert("Unit code is required");
    else if(!$("#unitName").val())
        alert("Unit Name is required");
    else if(!$("#lecturer").val())
        alert("Lecturer is required");
    else if(!$("#semester").val())
        alert("Semester is required");
    else {
        var $unitCode=$("#unitCode").val();
        var $unitName=$("#unitName").val();
        var $lecturer=$("#lecturer").val();
        var $semester=$("#semester").val();
        var $unitDescription=$('#unitDescription').val();
        var str_value="&uc="+$unitCode+"&un="+$unitName+"&l="+$lecturer+"&s="+$semester+"&desc="+$unitDescription;

        $.ajax({
            url: '../action/process.php?a=add'+str_value,
            method:'GET'
        }).done(function(data) {
            alert(data);
            console.log(data);
            $("#add_modal").modal('toggle');
            location.reload();
        })
    }
})

//Modal dialog Return key to exec search function
function returnKeySearch(){
    if (event.keyCode==13)
    $("#Search_btn").click();
}

function returnKeySearch(){
        if (event.keyCode==13)
        $("#Search_btn").click();
    }

// search button to call Process.php
$("#Search_btn").click(function(){
    $var1= $("#searchVal").val();                //get search content
    if(!$var1){
        alert("please input search content!");
        return false;
    }
    else{
    $str="../action/process.php?a=search&s="+$var1;       //added by adding variable at the end of url
    $.ajax({
            url: $str,
            method:'GET'
        }).done(function(data) {
            console.log(data);
            $('#searchBar').hide();
            $('#showContent').html(data);
        })
    }
})

// close button to initalise search bar interface
$(".modalClose").click(function (){
    $('#showContent').html("");
        $('#searchBar').show();


})

</script>

