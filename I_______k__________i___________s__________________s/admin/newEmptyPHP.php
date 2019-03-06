<body>
        <div id="wrapper" style="width:800px;">
            <fieldset>
                <legend>Student Information</legend>
                <table width="100%" cellspacing="2" cellpadding="2">
                    <tr>
                        <td width="42%" align="right">Name of the Student*</td>
                        <td width="2%">&nbsp;</td>
                        <td width="29%"><?php echo $data['std_name']; ?></td>
                        <td width="27%" rowspan="5" valign="top"><table width="100%" cellspacing="2" cellpadding="2">
                                <tr>
                                    <td height="129" valign="top"><img src="../Images/default-profile-pic.png" height="100" width="100"/></td>
                                </tr>
                            </table></td>
                    </tr>
                    <tr>
                        <td align="right">Year joined*</td>
                        <td>&nbsp;</td>
                        <td><?php echo $data['join_year']; ?></td>
                    </tr>
                    <tr>
                        <td align="right">Class joined*</td>
                        <td>&nbsp;</td>
                        <td><?php echo $data['join_class']; ?></td>
                    </tr>
                    <tr>
                        <td align="right">Information about Kiss*</td>
                        <td>&nbsp;</td>
                        <td><?php echo $data['info_kiss']; ?></td>
                    </tr>
                    <tr>
                        <td align="right">Gender*</td>
                        <td>&nbsp;</td>
                        <td><?php echo $data['gender']; ?></td>
                    </tr>
                    <tr>
                        <td align="right">Maritial Status*</td>
                        <td>&nbsp;</td>
                        <td><?php echo $data['maritial_status']; ?></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="right">Class*</td>
                        <td>&nbsp;</td>
                        <td><?php echo $data['class']; ?></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="right">Section*</td>
                        <td>&nbsp;</td>
                        <td><?php echo $data['section']; ?></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="right">Roll No.*</td>
                        <td>&nbsp;</td>
                        <td><?php echo $data['roll_no']; ?></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="right">Blood Group*</td>
                        <td>&nbsp;</td>
                        <td><?php echo $data['blood_group']; ?></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="right">Date of Birth*</td>
                        <td>&nbsp;</td>
                        <td><?php echo $data['dob']; ?></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="right">Name of Mentor*</td>
                        <td>&nbsp;</td>
                        <td><?php echo $data['mentor_name']; ?></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="right">Contact No. Mentor*</td>
                        <td>&nbsp;</td>
                        <td><?php echo $data['mentor_ph']; ?></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="right">Name Local Guardian*</td>
                        <td>&nbsp;</td>
                        <td><?php echo $data['l_gaurdian_name']; ?></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="right">Contact No. Loc.Guardian*</td>
                        <td>&nbsp;</td>
                        <td><?php echo $data['l_gaurdian_ph']; ?></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="right">Contact No. Parents*</td>
                        <td>&nbsp;</td>
                        <td><?php echo $data['parents_ph']; ?></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="right">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><a href="javascript:void(0)" onclick="winClose()">&lt;&lt;Back</a></td>
                        <td>&nbsp;</td>
                    </tr>
                    
                </table>
            </fieldset>
        </div>
        
    </body>