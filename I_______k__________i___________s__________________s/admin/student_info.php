<?php
include '../config.php';
$std_id = $_REQUEST['s_id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Untitled Document</title>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
        <script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
    </head>

    <body>
        <div id="wrapper" style="width:800px;">
            <fieldset>
                <legend>Student Information</legend>
                <div id="TabbedPanels1" class="TabbedPanels">
                    <ul class="TabbedPanelsTabGroup">
                        <li class="TabbedPanelsTab" tabindex="0">General Information</li>
                        <li class="TabbedPanelsTab" tabindex="0">House Hold</li>
                        <li class="TabbedPanelsTab" tabindex="0">Anual Income</li>
                        <li class="TabbedPanelsTab" tabindex="0">Sanitation Health</li>
                        <li class="TabbedPanelsTab" tabindex="0">Education</li>
                    </ul>
                    <div class="TabbedPanelsContentGroup">
                        <div class="TabbedPanelsContent">
                            <table width="50%" cellspacing="2" cellpadding="2">
                                <tr>
                                    <td>Name of the Student*</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Year joined*</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Class joined*</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Information about kiss*</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Gender*</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Maritial Status*</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Class*</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Section*</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Roll No*</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Blood Group*</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Date of Birth*</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Name of the mentor*</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Contact number of mentor*</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                        </div>
                        <div class="TabbedPanelsContent">Content 2</div>
                        <div class="TabbedPanelsContent">Content 3</div>
                        <div class="TabbedPanelsContent">Content 4</div>
                        <div class="TabbedPanelsContent">Content 5</div>
                    </div>
                </div>
            </fieldset>
        </div>
        <script type="text/javascript">
            var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
        </script>
    </body>
</html>