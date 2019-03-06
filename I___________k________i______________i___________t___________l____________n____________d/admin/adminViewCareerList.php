<?php

include_once './protected.php';
ob_start();
$title = "career list";
?>
<style type="text/css">
    .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control{
        cursor: default;
    }
    .pagination > .disabled > span,
    .pagination > .disabled > a,
    .pagination > .disabled > a:hover,
    .pagination > .disabled > a:focus {
        cursor: default;
    }
    input.form-control.date-picker{
        width: 80%;
        display: inline;
        margin-right: 10px;
    }
</style>

<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header" >View <small>Candidate from career list</small></h3>                        
    </div>
</div>  

<div class="row">

    <!-- Search Grid 3 Starts here -->
<!--    <div class="col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-bars"></i>Search Candidate</h3>
            </div> 
            <div class="panel-body">
                <form name="frmSearchCandidate" autocomplete="off">
                    <div id="search-msgDiv" role="alert">                                               
                    </div>  
                    <div class="form-group">
                        <label for="txtName">Name</label>
                        <input type="text" id="txtName" class="form-control" placeholder="Enter First Name here." autofocus>                       
                    </div>                
                    <div class="form-group">
                        <label for="cmbQualification">Qualification</label>
                        <select id="cmbQualification" class="form-control">
                            <option value="">Select a Qualification</option>
                            <option>B.Tech.</option>
                            <option>B.Sc.</option>
                            <option>B.Arts.</option>
                            <option>B.Com.</option>
                            <option>M.Tech.</option>
                            <option>MCA</option>
                            <option>MBA</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cmbYear" style="display: block;">Experience</label>
                        <select id="cmbYear" class="form-control" style="width: 48%;display: inline;">
                            <option value="">Year</option>                        
                            <option>00</option>
                            <option>01</option>
                            <option>02</option>
                            <option>03</option>
                            <option>04</option>
                            <option>05</option>
                            <option>06</option>
                            <option>07</option>
                            <option>08</option>
                            <option>09</option>
                            <option>10</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txtKeyword">Resume Keyword</label>
                        <input type="text" id="txtKeyword" class="form-control" placeholder="Enter keyword here.">                       
                    </div>
                    <div class="form-group">
                        <label for="txtLastDate">Registration From Date</label>
                        <input type="text" id="txtLastDate" class="form-control date-picker" readonly>                       
                    </div>
                    <div class="form-group">
                        <label for="txtNextDate">Registration To Date</label>
                        <input type="text" id="txtNextDate" class="form-control date-picker" readonly>
                    </div>

                    <button type="button" class="btn btn-success" onclick="searchCandidate();">Search</button>
                    <button type="reset" class="btn btn-danger" onclick="searchCandidate('all');">Reset</button>    
                </form>
            </div>
        </div>       
    </div>-->

    <!-- Table Gird 8 starts here-->
    <div class="col-lg-12" id="serach-panel">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-bars"></i>Candidate Details</h3>
            </div> 
            <div class="panel-body" id="tbl-search-result">                                                            
                Please search candidate.
            </div>
        </div>       
    </div>   

    <!-- Generate all candidate list on page load-->
    <script>
        window.onload = function() {
            searchCandidateFromCareer('all');
        }
    </script>
</div>

<?php

$pageContent = ob_get_contents();
ob_get_clean();
include 'forms_template.php';
?>
